<?php
/**
 * Genesis Blocks Hero Title section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_hero_title',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"backgroundImgURL\":\"https://demo.studiopress.com/page-builder/slate/gb_slate_hero_background.jpg\",\"backgroundDimRatio\":20,\"focalPoint\":{\"x\":\"0.48\",\"y\":\"0.72\"},\"columns\":1,\"layout\":\"one-column\",\"columnsGap\":1,\"align\":\"full\",\"paddingTop\":5,\"paddingRight\":1,\"paddingBottom\":5,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#f5f5f5\",\"customBackgroundColor\":\"#1f1f1f\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-hero-title gpb-slate-section-hero-title \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-hero-title gpb-slate-section-hero-title gb-layout-columns-1 one-column gb-has-background-dim gb-has-background-dim-20 gb-background-cover gb-background-no-repeat gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:5em;padding-right:1em;padding-bottom:5em;padding-left:1em;background-color:#1f1f1f;color:#f5f5f5;background-image:url(https://demo.studiopress.com/page-builder/slate/gb_slate_hero_background.jpg);background-position:48% 72%\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-1 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-wideleft\",\"columnsGap\":8,\"align\":\"full\",\"columnMaxWidth\":1200} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-wideleft gb-columns-center alignfull\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-8 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"top\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-top\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":60},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:60px\">Features and services</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">The Genesis block pattern library has everything you need to design beautiful block-powered websites with just a few clicks.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Hero Title', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'header', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'header', 'genesis-blocks' ),
		esc_html__( 'hero', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'title', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate hero title', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_hero_title.jpg',
];
