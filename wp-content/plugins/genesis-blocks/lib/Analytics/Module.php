<?php
/**
 * Genesis Analytics Module
 *
 * Controls Analytics usage for the Genesis Blocks plugin.
 *
 * @package Genesis\Blocks\Analytics
 * @since   1.3.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Analytics;

use Genesis\Blocks\Interfaces\ModuleInterface;

/**
 * Module Class
 * Allows Genesis Blocks to initiate this module.
 *
 * @since 1.3.0
 * @uses  \Genesis\Blocks\Interface\ModuleInterface
 */
final class Module implements ModuleInterface {
	/**
	 * Checks if this module is enabled.
	 *
	 * Modules can specify conditions when they should be disabled (other plugin
	 * is active, or in response to a user preference). Can also be used to
	 * quickly disable a module manually by editing the is_enabled return value.
	 *
	 * @since 1.0.0
	 * @return bool
	 */
	public function is_enabled(): bool {
		return current_user_can( 'manage_options' );
	}

	/**
	 * Module Activation
	 * Logic to be run when this module is activated.
	 *
	 * @since 1.0.0
	 * @uses Genesis\Blocks\Analytics\AdminPage
	 * @uses Genesis\Blocks\Analytics\AssetManager
	 * @param array $context Current environment information.
	 *
	 * @return void
	 */
	public function activate( array $context ): void {
		( new AdminPage( $context ) )->init();
		( new AssetManager( $context ) )->init();
	}
}
