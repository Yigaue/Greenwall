<?php
/**
 * Genesis Blocks Features and Services layout for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'layout',
	'key'        => 'gb_slate_layout_features',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => [
		'gb_slate_section_hero_title',
		'gb_slate_section_numbered_list_image',
		'gb_slate_section_feature_image_columns',
		'gb_slate_section_testimonial_image',
		'gb_slate_section_call_to_action_accent',
	],
	'name'       => esc_html__( 'Slate Features and Services', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'features', 'genesis-blocks' ),
		esc_html__( 'testimonial', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate features', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_layout_features.jpg',
];
