<?php
/**
 * Plugin Name: Genesis Blocks
 * Plugin URI: https://studiopress.com/genesis-pro/
 * Description: A beautiful collection of handy blocks to help you get started with the new WordPress editor.
 * Author: StudioPress
 * Author URI: https://www.studiopress.com/
 * Version: 1.4.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package Genesis\Blocks
 */

// Include Composer Autoloader.
require __DIR__ . '/vendor/autoload.php';

/**
 * Instantiate Genesis Blocks Plugin.
 *
 * @since 1.0.0
 */
function genesis_blocks_load(): void {
	$context = [
		'url'     => plugin_dir_url( __FILE__ ),
		'path'    => plugin_dir_path( __FILE__ ),
		'version' => get_file_data( __FILE__, [ 'Version' ] )[0],
		'theme'   => sanitize_title( get_stylesheet() ),
	];

	( new Genesis\Blocks\PluginLoader( $context ) )->init();
}
add_action( 'plugins_loaded', 'genesis_blocks_load' );

function genesis_blocks_main_plugin_file(): string {
	return __FILE__;
}

/**
 * Load the plugin textdomain
 */
function genesis_blocks_text_domain() {
	load_plugin_textdomain( 'genesis-blocks', false, basename( __DIR__ ) . '/languages' );
}
add_action( 'init', 'genesis_blocks_text_domain' );

/**
 * Check for Pro version.
 */
function genesis_blocks_is_pro() {
	return function_exists( 'AtomicBlocksPro\atomic_blocks_pro_main_plugin_file' ) || function_exists( 'Genesis\PageBuilder\main_plugin_file' );
}
