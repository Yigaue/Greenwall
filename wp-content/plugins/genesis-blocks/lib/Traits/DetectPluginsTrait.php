<?php
/**
 * DetectPlugins trait
 *
 * @since 1.0.0
 * @package Genesis\Blocks\Traits
 */

declare(strict_types=1);
namespace Genesis\Blocks\Traits;

/**
 * DetectPluginsTrait helps modules check if plugins are active.
 */
trait DetectPluginsTrait {
	/**
	 * Detects active plugins by constant, class or function existence.
	 *
	 * @since 1.0.0
	 * @param array $plugins Constants, classes and functions to detect.
	 * @return bool True if ANY named constant, class, or function is detected.
	 */
	private function detect_plugins( array $plugins ): bool {
		if ( isset( $plugins['classes'] ) ) {
			foreach ( $plugins['classes'] as $name ) {
				if ( class_exists( $name ) ) {
					return true;
				}
			}
		}

		if ( isset( $plugins['functions'] ) ) {
			foreach ( $plugins['functions'] as $name ) {
				if ( function_exists( $name ) ) {
					return true;
				}
			}
		}

		if ( isset( $plugins['constants'] ) ) {
			foreach ( $plugins['constants'] as $name ) {
				if ( defined( $name ) ) {
					return true;
				}
			}
		}

		return false;
	}
}
