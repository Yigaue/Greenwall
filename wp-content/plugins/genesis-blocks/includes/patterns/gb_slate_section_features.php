<?php
/**
 * Genesis Blocks Features section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_features',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":1,\"layout\":\"one-column\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":5,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ffffff\",\"className\":\"gb-slate-section-features gpb-slate-features \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-features gpb-slate-features gb-layout-columns-1 one-column gb-has-custom-background-color gb-has-custom-text-color alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:5em;padding-left:1em;background-color:#ffffff;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":3,\"align\":\"full\",\"columnMaxWidth\":1200} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-equal gb-columns-center alignfull\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-3 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":40}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:40px\">Build better websites in half the time with beautiful design collections.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">The Genesis design collection library has everything you need to design beautiful block-powered websites with just a few clicks. Go Pro to get our entire collection!</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {\"height\":20} -->
<div style=\"height:20px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-equal\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Build your site with design collections</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Design collections help you launch any simple or complex website with curated collections of beautiful page sections and layouts.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Design better with powerful tools</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Build better sites faster with powerful site building tools for the WordPress editor.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Full page layouts help you launch quicker</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Need a landing page built quickly? Start with one of our professionally designed page layouts, replace the sample text, and you're done!</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":24}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:24px\">Create compelling content faster</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Create and use content quickly with customizable content sections.</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Features', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'features', 'genesis-blocks' ),
		esc_html__( 'columns', 'genesis-blocks' ),
		esc_html__( 'slate features', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_features.jpg',
];
