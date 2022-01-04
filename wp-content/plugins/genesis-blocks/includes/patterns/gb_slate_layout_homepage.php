<?php
/**
 * Genesis Blocks Homepage layout for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'layout',
	'key'        => 'gb_layout_homepage',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => [
		'gb_slate_section_hero_with_buttons',
		'gb_slate_section_features',
		'gb_slate_section_image_and_text_cta',
		'gb_slate_section_content_boxes',
		'gb_slate_section_testimonials',
		'gb_slate_section_contact_columns',
		'gb_slate_section_text_with_cta',
	],
	'name'       => esc_html__( 'Slate Homepage', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'homepage', 'genesis-blocks' ),
		esc_html__( 'home', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate homepage', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_layout_homepage.jpg',
];
