<?php
/**
 * Genesis Blocks Hero with Buttons section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_hero_with_buttons',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"backgroundImgURL\":\"https://demo.studiopress.com/page-builder/slate/gb_slate_hero_background.jpg\",\"backgroundDimRatio\":20,\"focalPoint\":{\"x\":\"0.48\",\"y\":\"0.72\"},\"columns\":1,\"layout\":\"one-column\",\"columnsGap\":1,\"align\":\"full\",\"paddingTop\":10,\"paddingRight\":1,\"paddingBottom\":10,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#f5f5f5\",\"customBackgroundColor\":\"#1f1f1f\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-hero-with-buttons gb-slate-section-hero-buttons \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-hero-with-buttons gb-slate-section-hero-buttons gb-layout-columns-1 one-column gb-has-background-dim gb-has-background-dim-20 gb-background-cover gb-background-no-repeat gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:10em;padding-right:1em;padding-bottom:10em;padding-left:1em;background-color:#1f1f1f;color:#f5f5f5;background-image:url(https://demo.studiopress.com/page-builder/slate/gb_slate_hero_background.jpg);background-position:48% 72%\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-1 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-wideleft\",\"columnsGap\":8,\"align\":\"full\",\"columnMaxWidth\":1200} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-wideleft gb-columns-center alignfull\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-8 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"top\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-top\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":60},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:60px\">The future of WordPress starts with Genesis</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">A complete design system of beautiful block patterns and full page designs at your fingertips. Start building with Genesis today.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" href=\"#\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Start Building</strong></a></div>
<!-- /wp:button -->

<!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#1f1f1f\",\"background\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" href=\"#\" style=\"border-radius:4px;background-color:#ffffff;color:#1f1f1f\"><strong>Explore Genesis</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Hero with Buttons', 'genesis-blocks' ),
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
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate hero with buttons', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_hero_with_buttons.jpg',
];
