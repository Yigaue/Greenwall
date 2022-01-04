<?php
/**
 * Genesis Blocks Homepage Alternative layout for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'layout',
	'key'        => 'gb_slate_layout_homepage_alt',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => [
		'gb_slate_section_hero_with_buttons',
		'gb_slate_section_feature_text_columns',
		'gb_slate_section_image_text_columns',
		'gb_slate_section_team_members',
		'gb_slate_section_blog_posts',
		'gb_slate_section_call_to_action_accent',
	],
	'name'       => esc_html__( 'Slate Homepage Alternative', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'homepage', 'genesis-blocks' ),
		esc_html__( 'home', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'layout', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_layout_homepage_alt.jpg',
];
