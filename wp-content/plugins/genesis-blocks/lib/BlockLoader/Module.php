<?php
/**
 * Block Loader Module
 *
 * Loads all the block related code.
 *
 * @package Genesis\Blocks\BlockLoader
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\BlockLoader;

use Genesis\Blocks\Interfaces\ModuleInterface;

/**
 * Module class
 * Allow Genesis Blocks to initiate this module.
 *
 * @since 1.0.0
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
	 * @since 1.0.0
	 * @return bool
	 */
	public function is_enabled(): bool {
		return true;
	}

	/**
	 * Module Activation
	 * Logic to be run when this module is activated.
	 *
	 * @since 1.0.0
	 * @uses Genesis\Blocks\BlockLoader;
	 * @param array $context Current environment information.
	 *
	 * @return void
	 */
	public function activate( array $context ): void {
		( new ManualRequire( $context ) )->init();
	}
}
