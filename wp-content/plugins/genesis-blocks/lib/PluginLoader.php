<?php
/**
 * Genesis Blocks
 * Main init class for the Genesis Blocks plugin.
 *
 * @since 1.0.0
 * @package Genesis\Blocks
 */

declare(strict_types=1);
namespace Genesis\Blocks;

/**
 * Genesis Blocks PluginLoader class
 *
 * @since 1.0.0
 */
final class PluginLoader {
	/**
	 * Environment Information
	 *
	 * @var array
	 */
	public $context;

	/**
	 * Class Constructor
	 *
	 * @since 0.1.0
	 * @param array $context Data such as 'path', 'url' and 'version'.
	 */
	public function __construct( array $context ) {
		$this->context = $context;
	}

	/**
	 * Initialization
	 * Initialize class.
	 *
	 * @since 0.1.0
	 * @uses \Genesis\Blocks\ModuleLoader::init
	 */
	public function init(): void {
		( new ModuleLoader( $this->context ) )->init();
	}
}
