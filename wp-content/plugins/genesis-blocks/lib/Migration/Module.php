<?php
/**
 * Migration Module
 *
 * Migrates to this plugin.
 *
 * @package Genesis\Blocks\Migration
 * @since   1.1.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration;

use Genesis\Blocks\Interfaces\ModuleInterface;

/**
 * Module class
 * Allow Genesis Blocks to initiate this module.
 *
 * @since 1.1.0
 * @uses \Genesis\Blocks\Interface\ModuleInterface
 */
final class Module implements ModuleInterface {
	/**
	 * Checks if this module is enabled.
	 *
	 * Modules can specify conditions when they should be disabled (other plugin
	 * is active, or in response to a user preference). Can also be used to
	 * quickly disable a module manually by editing the is_enabled return value.
	 *
	 * @since 1.1.0
	 * @return bool
	 */
	public function is_enabled(): bool {
		add_action( 'admin_init', [ $this, 'maybe_reactivate_migration' ] );

		$has_completed_migration = get_option( 'genesis_blocks_migrated_from_atomic_blocks' ) || get_option( 'genesis_blocks_pro_migrated_from_genesis_blocks_pro' );

		return current_user_can( 'manage_options' ) && ! $has_completed_migration;
	}

	/**
	 * Allow re-activation of the Migrate page via a special URL:
	 * https://example.com/wp-admin/?genesis-blocks-migrate=1
	 *
	 * @since 1.1.0
	 */
	public function maybe_reactivate_migration() {
		if ( empty( $_GET['genesis-blocks-migrate'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			return;
		}

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		delete_option( 'genesis_blocks_migrated_from_atomic_blocks' );
		delete_option( 'genesis_blocks_pro_migrated_from_genesis_blocks_pro' );
		wp_safe_redirect( admin_url( 'admin.php?page=genesis-blocks-migrate' ) );
		exit;
	}

	/**
	 * Module Activation
	 * Logic to be run when this module is activated.
	 *
	 * @since 1.1.0
	 * @param array $context Current environment information.
	 * @return void
	 */
	public function activate( array $context ): void {
		( new Api() )->init();
		( new Admin( $context ) )->init();
		( new AdminNotice( $context ) )->init();
	}
}
