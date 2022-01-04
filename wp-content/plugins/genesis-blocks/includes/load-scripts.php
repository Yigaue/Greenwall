<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package Genesis Blocks
 */

/**
 * Enqueue assets for frontend and backend
 *
 * @since 1.0.0
 */
function genesis_blocks_block_assets() {

	// phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison -- Could be true or 'true'.
	$postfix = ( SCRIPT_DEBUG == true ) ? '' : '.min';

	// Load the compiled styles.
	wp_register_style(
		'genesis-blocks-style-css',
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ),
		array(),
		filemtime( plugin_dir_path( genesis_blocks_main_plugin_file() ) . 'dist/blocks.style.build.css' )
	);

}
add_action( 'init', 'genesis_blocks_block_assets' );

/**
 * Enqueue assets for backend editor
 *
 * @since 1.0.0
 */
function genesis_blocks_editor_assets() {

	// phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison -- Could be true or 'true'.
	$postfix = ( SCRIPT_DEBUG == true ) ? '' : '.min';

	// Load the compiled blocks into the editor.
	wp_enqueue_script(
		'genesis-blocks-block-js',
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ),
		array( 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-data', 'wp-edit-post', 'wp-element', 'wp-i18n' ),
		filemtime( plugin_dir_path( genesis_blocks_main_plugin_file() ) . 'dist/blocks.build.js' ),
		true
	);

	// Load the compiled styles into the editor.
	wp_enqueue_style(
		'genesis-blocks-block-editor-css',
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( genesis_blocks_main_plugin_file() ) . 'dist/blocks.editor.build.css' )
	);

	$user_data = wp_get_current_user();
	unset( $user_data->user_pass, $user_data->user_email );

	// Pass in REST URL.
	wp_localize_script(
		'genesis-blocks-block-js',
		'genesis_blocks_globals',
		array(
			'rest_url'               => esc_url( rest_url() ),
			'user_data'              => $user_data,
			'pro_activated'          => genesis_blocks_is_pro(),
			'is_wpe'                 => function_exists( 'is_wpe' ),
			'pattern_fallback_image' => plugins_url( 'dist/assets/images/gb-fallback-image.jpg', dirname( __FILE__ ) ),
		)
	);
}
add_action( 'enqueue_block_editor_assets', 'genesis_blocks_editor_assets' );


/**
 * Enqueue assets for frontend
 *
 * @since 1.0.0
 */
function genesis_blocks_frontend_assets() {

	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		return;
	}

	// Load the dismissible notice js.
	wp_enqueue_script(
		'genesis-blocks-dismiss-js',
		plugins_url( '/dist/assets/js/dismiss.js', dirname( __FILE__ ) ),
		array(),
		filemtime( plugin_dir_path( genesis_blocks_main_plugin_file() ) . '/dist/assets/js/dismiss.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'genesis_blocks_frontend_assets' );

/**
 * Adds the Genesis Blocks block category.
 *
 * @param array $categories Array of categories for block types.
 * @return array Updated block categories.
 */
function genesis_blocks_add_custom_block_category( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'genesis-blocks',
				'title' => __( 'Genesis Blocks', 'genesis-blocks' ),
			),
		),
		$categories
	);
}

if ( class_exists( 'WP_Block_Editor_Context' ) ) {
	add_filter( 'block_categories_all', 'genesis_blocks_add_custom_block_category', PHP_INT_MAX );
} else {
	add_filter( 'block_categories', 'genesis_blocks_add_custom_block_category', PHP_INT_MAX );
}

/**
 * Genesis Async Tagger appends the async prop to scripts when required.
 *
 * @param string $tag Tag name.
 * @param string $handle Script handle provided by wp_enqueue.
 *
 * @return string Maybe modified script.
 */
function genesis_async_tagger( $tag, $handle ) {
	if ( ! strpos( $handle, '#async' ) ) {
		return $tag;
	}

	$tag = str_replace( '<script ', '<script async ', $tag );

	return $tag;
}
add_filter( 'script_loader_tag', 'genesis_async_tagger', 10, 2 );
