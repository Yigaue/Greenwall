<?php
/**
 * Module Interface
 *
 * @since 0.1.0
 * @package Genesis\Blocks
 */

declare(strict_types=1);
namespace Genesis\Blocks\Interfaces;

/**
 * Module Interface
 * Set methods required for all module Register classes.
 */
interface ModuleInterface {
	/**
	 * Activate Module
	 * Method to Activate this module.
	 *
	 * @since 0.1.0
	 * @param array $context Current environment information.
	 *
	 * @return void
	 */
	public function activate( array $context ) : void;

	/**
	 * Checks if this module is enabled.
	 *
	 * Modules can specify conditions when they should be disabled (other plugin
	 * is active, or in response to a user preference). Can also be used to
	 * quickly disable a module manually by editing the is_enabled return value.
	 *
	 * @since 0.1.0
	 *
	 * @return bool
	 */
	public function is_enabled() : bool;
}
