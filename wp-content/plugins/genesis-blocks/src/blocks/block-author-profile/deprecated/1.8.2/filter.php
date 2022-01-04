<?php
/**
 * Filter the output for the Profile Box block, because SVG files cannot be properly handled in the block editor.
 * note that this is not a deprecation handler, but is a frontend handler to get around the SVG limittions.
 * WordPress core uses server side rendering (like this) for it's SVG blocks as well.
 * For example, see: https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/social-link/index.php
 *
 * @since   1.3
 * @package Genesis\Blocks
 */

declare(strict_types=1);
namespace GenesisBlocks\Blocks\ProfileBox;

/**
 * Handle front-end deprecations for the Profile Box block.
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block         The full block, including name and attributes.
 * @return string HTML content for the post grid.
 */
function profile_box_deprecation_handlers( $block_content, $block ) {
	if ( 'genesis-blocks/gb-profile-box' !== $block['blockName'] ) {
		return $block_content;
	}

	// Grab all of the deprecations and put them into an array.
	$deprecations = array(
		__NAMESPACE__ . '\deprecation_1_8_2',
	);

	foreach ( $deprecations as $function_name ) {
		$result = call_user_func( $function_name, $block_content, $block );

		if ( $result ) {
			$block_content = $result;
			break;
		}
	}

	return $block_content;
}
add_filter( 'render_block', __NAMESPACE__ . '\profile_box_deprecation_handlers', 11, 2 );

/**
 * Handle the change when font awesome was removed, which is version 1_8_2 of this block.
 *
 * @param string $block_content The block content about to be appended.
 * @param array  $block         The full block, including name and attributes.
 * @return string HTML content for the post grid.
 */
function deprecation_1_8_2( $block_content, $block ) {
	$icons_url          = plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'dist/assets/social-icons/';
	$profile_link_color = isset( $block['attrs']['profileLinkColor'] ) && ! empty( $block['attrs']['profileLinkColor'] ) ? $block['attrs']['profileLinkColor'] : '#392f43';
	$uuid               = isset( $block['attrs']['clientId'] ) ? $block['attrs']['clientId'] : uniqid();

	$links = [
		'website'   => [
			'aria_label'          => __( 'Website', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['website'] ) ? $block['attrs']['website'] : '',
			'icon'                => genesis_blocks_get_svg( 'website', 'ui', '', $uuid, __( 'Visit Website (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fas fa-link',
		],
		'twitter'   => [
			'aria_label'          => __( 'Twitter', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['twitter'] ) ? $block['attrs']['twitter'] : '',
			'icon'                => genesis_blocks_get_svg( 'twitter', 'ui', '', $uuid, __( 'Visit Twitter account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-twitter',
		],
		'facebook'  => [
			'aria_label'          => __( 'Facebook', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['facebook'] ) ? $block['attrs']['facebook'] : '',
			'icon'                => genesis_blocks_get_svg( 'facebook', 'ui', '', $uuid, __( 'Visit Facebook account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-facebook-f',
		],
		'instagram' => [
			'aria_label'          => __( 'Instagram', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['instagram'] ) ? $block['attrs']['instagram'] : '',
			'icon'                => genesis_blocks_get_svg( 'instagram', 'ui', '', $uuid, __( 'Visit Instagram account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-instagram',
		],
		'pinterest' => [
			'aria_label'          => __( 'Pinterest', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['pinterest'] ) ? $block['attrs']['pinterest'] : '',
			'icon'                => genesis_blocks_get_svg( 'pinterest', 'ui', '', $uuid, __( 'Visit Pinterest account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-pinterest',
		],
		'google'    => [
			'aria_label'          => __( 'Google', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['google'] ) ? $block['attrs']['google'] : '',
			'icon'                => genesis_blocks_get_svg( 'google', 'ui', '', $uuid, __( 'Visit Google account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-google',
		],
		'youtube'   => [
			'aria_label'          => __( 'YouTube', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['youtube'] ) ? $block['attrs']['youtube'] : '',
			'icon'                => genesis_blocks_get_svg( 'youtube', 'ui', '', $uuid, __( 'Visit YouTube account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-youtube',
		],
		'github'    => [
			'aria_label'          => __( 'Github', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['github'] ) ? $block['attrs']['github'] : '',
			'icon'                => genesis_blocks_get_svg( 'github', 'ui', '', $uuid, __( 'Visit Github account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-github',
		],
		'linkedin'  => [
			'aria_label'          => __( 'LinkedIn', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['linkedin'] ) ? $block['attrs']['linkedin'] : '',
			'icon'                => genesis_blocks_get_svg( 'linkedin', 'ui', '', $uuid, __( 'Visit Linkedin account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-linkedin',
		],
		'wordpress' => [
			'aria_label'          => __( 'WordPress', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['wordpress'] ) ? $block['attrs']['wordpress'] : '',
			'icon'                => genesis_blocks_get_svg( 'wordpress', 'ui', '', $uuid, __( 'Visit WordPress account (opens in a new tab)', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'fab fa-wordpress-simple',
		],
		'email'     => [
			'aria_label'          => __( 'Email', 'genesis-blocks' ),
			'link_url'            => isset( $block['attrs']['email'] ) ? $block['attrs']['email'] : '',
			'icon'                => genesis_blocks_get_svg( 'email', 'ui', '', $uuid, __( 'Email', 'genesis-blocks' ) ),
			'fontawesome_classes' => 'far fa-envelope',
		],
	];

	foreach ( $links as $link_data ) {
		$replacement_html = deprecation_1_8_2_link_replacement_html( $link_data['aria_label'], $link_data['link_url'], $link_data['icon'], $profile_link_color );
		$regex            = '/<\s*a[^>]*>([' . $link_data['aria_label'] . ' ]*?)<\s*i[^>]*(class="' . $link_data['fontawesome_classes'] . '")>(.*?)<\s*\/\s*i><\s*\/\s*a>/';
		$block_content    = preg_replace( $regex, $replacement_html, $block_content, 1 );
	}

	return $block_content;
}

/**
 * Handle the change when font awesome was removed, which is version 1_8_2 of this block.
 *
 * @param string $aria_label The string to use for the aria label (Twitter, Facebook, Website).
 * @param string $link_url The link URL for the a tag.
 * @param string $icon The code for the icon (like svg).
 * @param string $profile_link_color The string to use for the background color.
 * @return string The replacement html for the links.
 */
function deprecation_1_8_2_link_replacement_html( $aria_label, $link_url, $icon, $profile_link_color ) {
	return '<a href="' . esc_url( $link_url ) . '" target="_blank" rel="noopener noreferrer" style="background-color:' . esc_attr( $profile_link_color ) . '" aria-label="' . esc_attr( $aria_label ) . '">' . $icon . '</a>';
}
