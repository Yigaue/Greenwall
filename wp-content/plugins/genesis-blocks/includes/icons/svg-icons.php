<?php
/**
 * SVG Icon helper functions
 *
 * @package Genesis\Blocks
 */

if ( ! function_exists( 'genesis_blocks_svg' ) ) {
	/**
	 * Output and Get Theme SVG.
	 * Output and get the SVG markup for an icon in the genesis_blocks_SVG_Icons class.
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group The group the icon belongs to.
	 * @param string $color Color code.
	 */
	function genesis_blocks_svg( $svg_name, $group = 'ui', $color = '' ) {
		echo genesis_blocks_get_svg( $svg_name, $group, $color ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in genesis_blocks_get_svg();.
	}
}

if ( ! function_exists( 'genesis_blocks_get_svg' ) ) {

	/**
	 * Get information about the SVG icon.
	 *
	 * @param string $svg_name The name of the icon.
	 * @param string $group The group the icon belongs to.
	 * @param string $color Color code.
	 * @param string $uuid The unique id to use for accessibility labelleing with aria-labelledby.
	 * @param string $title The title content to use for accessibility labelleing with aria-labelledby.
	 */
	function genesis_blocks_get_svg( $svg_name, $group = 'ui', $color = '', $uuid = '', $title = '' ) {

		// Make sure that only our allowed tags and attributes are included.
		$svg = str_replace(
			'%23',
			'#', // Fix for hex codes being escaped in the path fill attribute.
			wp_kses(
				GenesisBlocks_SVG_Icons::get_svg( $svg_name, $group, $color, $uuid, $title ),
				array(
					'svg'     => array(
						'class'           => true,
						'xmlns'           => true,
						'width'           => true,
						'height'          => true,
						'viewbox'         => true,
						'aria-hidden'     => true,
						'role'            => true,
						'focusable'       => true,
						'aria-labelledby' => true,
					),
					'title'   => array(
						'id' => true,
					),
					'path'    => array(
						'fill'      => true,
						'fill-rule' => true,
						'd'         => true,
						'transform' => true,
					),
					'polygon' => array(
						'fill'      => true,
						'fill-rule' => true,
						'points'    => true,
						'transform' => true,
						'focusable' => true,
					),
				)
			)
		);

		if ( ! $svg ) {
			return false;
		}
		return $svg;
	}
}
