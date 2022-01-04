<?php
/**
 * Module Loader
 * Load Genesis Blocks Modules.
 *
 * @since 0.1.0
 * @package Genesis\Blocks
 */

declare(strict_types=1);

namespace Genesis\Blocks;

/**
 * Module Loader Class
 * Manage registration of Genesis Blocks modules.
 *
 * @since 0.1.0
 */
final class ModuleLoader {
	/**
	 * Context
	 * Information about the current environment.
	 *
	 * @since 0.1.0
	 * @var array
	 */
	public $context;

	/**
	 * Class Constructor
	 *
	 * @since 0.1.0
	 * @param array $context Current environment information.
	 */
	public function __construct( array $context ) {
		$this->context = $context;
	}

	/**
	 * Initialize Registry
	 * Register Genesis Modules.
	 *
	 * @since 0.1.0
	 */
	public function init() {
		$modules = $this->get_modules();
		$this->load_modules( $modules );
	}

	/**
	 * Get Modules
	 * Return a list of avaialable modules.
	 *
	 * @uses glob
	 * @since 0.1.0
	 *
	 * @return array
	 */
	private function get_modules() : array {
		return glob( __DIR__ . '/*/Module.php' );
	}

	/**
	 * Load Modules
	 * Iterate through modules and activate each one.
	 *
	 * @todo Gracefully manage activation errors.
	 * @todo Use a better escape method than esc_html?
	 *
	 * @since 0.1.0
	 * @param array $modules Collection of modules to iterate.
	 */
	private function load_modules( array $modules ) {
		foreach ( $modules as $path ) {
			try {
				$class  = __NAMESPACE__ . '\\' . basename( dirname( $path ) ) . '\\Module';
				$module = new $class();
				$this->activate_module( $module ); // Send to new method for type safety.
			} catch ( \TypeError $e ) {
				// Invalid module.
				echo esc_html( $e->getMessage() ) . "\n\n";
				continue;
			} catch ( \Exception $e ) {
				echo esc_html( $e->getMessage() ) . "\n\n";
				return;
			}
		}
	}

	/**
	 * Activate Module
	 * Activate the provide module.
	 *
	 * @since 0.1.0
	 * @uses Genesis\Blocks\Interfaces\ModuleInterface
	 * @param Interfaces\ModuleInterface $module Interface for modules.
	 *
	 * @throws \Exception In event of module activation failure.
	 */
	private function activate_module( Interfaces\ModuleInterface $module ) {
		if ( $module->is_enabled() ) {
			$module->activate( $this->context );
		}
	}
}
