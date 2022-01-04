<?php
/**
 * Genesis Blocks migration admin notice.
 *
 * @package Genesis\Blocks\Migration
 * @since   1.1.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration;

/**
 * Admin represents the migration admin notice.
 *
 * @since 1.1.0
 */
class AdminNotice {

	/**
	 * Adds actions.
	 *
	 * @since 1.1.0
	 */
	public function init() {
		add_action( 'admin_notices', [ $this, 'admin_notice' ] );
	}

	/**
	 * Adds the Migrate admin notice.
	 *
	 * @since 1.1.0
	 */
	public function admin_notice() {
		// If the get_current_screen function doesn't exist, we're not even in wp-admin.
		if ( ! function_exists( 'get_current_screen' ) ) {
			return;
		}

		$current_screen = get_current_screen();

		// Don't show the notice if we are already on the migrate page.
		if ( 'genesis-blocks_page_genesis-blocks-migrate' === $current_screen->base ) {
			return;
		}

		if ( $this->has_migrated() ) {
			return;
		}

		if ( ! $this->has_content_to_migrate() ) {
			return;
		}

		$this->print_notice_text();

	}

	/**
	 * Checks if the site has Atomic Blocks content to migrate.
	 *
	 * @since 1.1.2
	 * @return int 1 for true, 0 for false.
	 */
	private function has_content_to_migrate() {
		$has_content = get_option( 'genesis_blocks_has_content_to_migrate' );

		if ( $has_content === false ) {
			$has_posts         = ( new PostContent() )->query_for_posts();
			$has_mailchimp_key = get_option( 'atomic_blocks_mailchimp_api_key' );
			$block_permissions = get_option( 'genesis_page_builder_block_settings_permissions' );
			$has_permissions   = strpos( wp_json_encode( $block_permissions ), 'atomic-blocks' ) !== false;

			$has_content = (int) ( $has_posts || $has_mailchimp_key || $has_permissions );

			update_option( 'genesis_blocks_has_content_to_migrate', $has_content );
		}

		return (int) $has_content;
	}

	/**
	 * Determines whether a site has been migrated or not.
	 *
	 * @since 1.1.2
	 * @return bool
	 */
	private function has_migrated(): bool {
		if ( genesis_blocks_is_pro() ) {
			return (bool) get_option( 'genesis_blocks_pro_migrated_from_genesis_blocks_pro', false );
		}

		return (bool) get_option( 'genesis_blocks_migrated_from_atomic_blocks', false );
	}

	/**
	 * Prints the migration admin notice text.
	 *
	 * @since 1.1.2
	 */
	private function print_notice_text(): void {
		$migration_url = admin_url( 'admin.php?page=genesis-blocks-migrate' );
		if ( genesis_blocks_is_pro() ) :
			?>
			<div class="notice notice-info ab-notice-migration">
				<p><?php echo esc_html__( 'Genesis Blocks Pro: We need to migrate your blocks to give you the latest features!', 'genesis-blocks' ); ?></p>
				<p><a href="<?php echo esc_url( $migration_url ); ?>" class="button"><?php echo esc_html__( 'Migrate now', 'genesis-blocks' ); ?></a></p>
			</div>
			<?php
		else :
			?>
			<div class="notice notice-info ab-notice-migration">
				<p><?php echo esc_html__( 'Welcome to Genesis Blocks! Would you like to migrate your Atomic Blocks content to Genesis Blocks?', 'genesis-blocks' ); ?></p>
				<p><a href="<?php echo esc_url( $migration_url ); ?>" class="button"><?php echo esc_html__( 'Migrate now', 'genesis-blocks' ); ?></a></p>
			</div>
			<?php
		endif;
	}
}
