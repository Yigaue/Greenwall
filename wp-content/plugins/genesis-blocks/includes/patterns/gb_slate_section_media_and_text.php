<?php
/**
 * Genesis Blocks Media and Text section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_media_text',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:media-text {\"align\":\"full\",\"mediaId\":16096,\"mediaLink\":\"#\",\"mediaType\":\"image\",\"imageFill\":false,\"style\":{\"color\":{\"background\":\"#ffffff\"}},\"className\":\"gb-slate-section-media-and-text gb-slate-section-media-text \"} -->
<div class=\"wp-block-media-text alignfull is-stacked-on-mobile gb-slate-section-media-and-text gb-slate-section-media-text has-background\" style=\"background-color:#ffffff\"><figure class=\"wp-block-media-text__media\"><img src=\"https://demo.studiopress.com/page-builder/slate/gb_slate_image_mountain.jpg\" alt=\"mountains\" class=\"wp-image-16096 size-full\"/></figure><div class=\"wp-block-media-text__content\"><!-- wp:spacer {\"height\":20} -->
<div style=\"height:20px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer -->

<!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f\">We’ll teach you how to build and grow an online business.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">All the resources, training, and support you need to run your dream online business! Whether you're just getting started or a seasoned business owner, we have tools and resources to help you take your business to the next level.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text -->",
	'name'       => esc_html__( 'Slate Media and Text', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'media', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'media', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate media and text', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_media_text.jpg',
];
