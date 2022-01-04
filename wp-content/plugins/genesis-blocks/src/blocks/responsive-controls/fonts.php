<?php
/**
 * Functions in this file filter the output for blocks so that the Genesis Responsive Controls work.
 *
 * @since   1.4
 * @package Genesis\Blocks
 */

declare(strict_types=1);
namespace GenesisBlocks\Blocks\ResponsiveControls;

/**
 * Handle responsive controls for any blocks using the gbResponsiveSettings attribute..
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block         The full block, including name and attributes.
 * @param string $uuid          Optional: Pass a uuid to use. Default is false, which causes a uuid to be generated.
 * @return string
 */
function responsive_settings( $block_content, $block, $uuid = false ) {

	if (
		'core/paragraph' !== $block['blockName'] &&
		'core/heading' !== $block['blockName']
	) {
		return $block_content;
	}

	if ( ! isset( $block['attrs']['gbResponsiveSettings'] ) || empty( $block['attrs']['gbResponsiveSettings'] ) ) {
		return $block_content;
	}

	// Generate a unique id to use as a class name so we can target it with CSS.
	$unique_class_name = 'gb-' . ( $uuid ? $uuid : uniqid() );

	// If the block has a class HTML attribute.
	preg_match( '/(?<=\bclass=")[^"]*/', $block_content, $possibly_existing_class_names );

	if ( $possibly_existing_class_names ) {
		$block_content = preg_replace( '/(?<=\bclass=")[^"]*/', $unique_class_name . ' ' . implode( ' ', $possibly_existing_class_names ), $block_content, 1 );
	} else {
		$block_content = preg_replace(
			[ '/(<p)/', '/(<h[12345])/' ],
			'$1 class="' . esc_attr( $unique_class_name ) . '"',
			$block_content,
			1
		);
	}

	// Open the style tag.
	$style_tag = '<style>';

	// Render the default fontSize value from WordPress core's typography settings.
	if ( isset( $block['attrs']['fontSize'] ) && ! empty( $block['attrs']['fontSize'] ) ) {
		$style_tag .= '.' . $unique_class_name . '{';
		$style_tag .= block_attr_name_to_css_key( 'fontSize' ) . ': ' . block_attr_value_to_css_value( 'fontSize', $block['attrs']['fontSize'] ) . ';';
		$style_tag .= '}';
	}

	// Ensure the smallest breakpoint rules are rendered last, so they can take effect.
	uksort(
		$block['attrs']['gbResponsiveSettings'],
		static function( $first_breakpoint, $second_breakpoint ) {
			return absint( $first_breakpoint ) < absint( $second_breakpoint );
		}
	);

	// Loop through each breakpoint.
	foreach ( $block['attrs']['gbResponsiveSettings'] as $breakpoint_width => $responsive_settings ) {

		$style_tag .= '@media only screen and (max-width: ' . $breakpoint_width . ') {.' . $unique_class_name . '{';

		// Loop through each value defined in this breakpoint.
		foreach ( $responsive_settings as $responsive_setting_key => $responsive_setting_value ) {

			// Render each css key and value.
			$style_tag .= block_attr_name_to_css_key( $responsive_setting_key ) . ': ' . block_attr_value_to_css_value( $responsive_setting_key, $responsive_setting_value ) . '!important;';
		}

		$style_tag .= '}}';

	}

	// Close the style tag.
	$style_tag .= '</style>';

	return $style_tag . $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\responsive_settings', 10, 2 );

/**
 * Convert a block attribute to a CSS key.
 *
 * @param string $block_attribute_name The name of the block attribute, for example: "fontSize".
 * @return string The CSS equivalent. For example: "font-size".
 */
function block_attr_name_to_css_key( $block_attribute_name ) {
	if ( 'fontSize' === $block_attribute_name ) {
		return 'font-size';
	}

	if ( 'lineHeight' === $block_attribute_name ) {
		return 'line-height';
	}

	return $block_attribute_name;
}

/**
 * Convert a block attribute value to a corresponding CSS value.
 *
 * @param string $block_attribute_name The name of the block attribute, for example: "fontSize".
 * @param string $block_attribute_value The value of the block attribute, for example: "Huge".
 * @return string The CSS equivalent value. For example: "42px". Note that in most cases, this simply returns the value passed-in.
 */
function block_attr_value_to_css_value( $block_attribute_name, $block_attribute_value ) {
	if ( 'fontSize' === $block_attribute_name ) {
		return block_font_name_to_css_value( $block_attribute_value );
	}

	return $block_attribute_value;
}

/**
 * Convert a font string to a CSS value.
 *
 * @param string $block_font_name The name of the block font name, for example: "Huge".
 * @return string The CSS equivalent. For example: "42px".
 */
function block_font_name_to_css_value( $block_font_name ) {

	// We need to get the available font sizes in the theme, and convert them to pixels here, on the fly.
	if ( ! class_exists( '\WP_Block_Editor_Context' ) ) {
		require_once ABSPATH . 'wp-includes/class-wp-block-editor-context.php';
	}
	$block_editor_context  = new \WP_Block_Editor_Context();
	$block_editor_settings = get_block_editor_settings( [], $block_editor_context );
	$font_sizes            = $block_editor_settings['fontSizes'];

	$reformatted_font_sizes = [];

	// Format font values into associative array for easier use.
	foreach ( $font_sizes as $font_size_data ) {
		$reformatted_font_sizes[ $font_size_data['slug'] ] = $font_size_data['size'];
	}

	if ( isset( $reformatted_font_sizes[ $block_font_name ] ) ) {
		return $reformatted_font_sizes[ $block_font_name ];
	}

	return $block_font_name;
}
