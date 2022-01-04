<?php
/**
 * Genesis Blocks Content Boxes section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_content_boxes',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":0,\"align\":\"full\",\"padding\":7,\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ffffff\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-content-boxes gpb-slate-content-boxes \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-content-boxes gpb-slate-content-boxes gb-layout-columns-2 gb-2-col-equal gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ffffff;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-0 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"customBackgroundColor\":\"#1f1f1f\",\"customTextColor\":\"#f5f5f5\",\"paddingSync\":true,\"paddingUnit\":\"em\",\"padding\":4} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner gb-has-custom-background-color gb-has-custom-text-color\" style=\"padding:4em;background-color:#1f1f1f;color:#f5f5f5\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:40px\">Contact us and let's start building something!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">Genesis design collections have everything you need to design beautiful block-powered websites with just a few clicks. Design collections help you launch any simple or complex website with curated collections of beautiful page sections and layouts. Go Pro to get our entire collection!</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" href=\"#\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Download Now</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"customBackgroundColor\":\"#006CD8\",\"customTextColor\":\"#f5f5f5\",\"paddingSync\":true,\"paddingUnit\":\"em\",\"padding\":4} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner gb-has-custom-background-color gb-has-custom-text-color\" style=\"padding:4em;background-color:#006CD8;color:#f5f5f5\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:40px\">Contact us and let's start building something!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">Genesis design collections have everything you need to design beautiful block-powered websites with just a few clicks. Design collections help you launch any simple or complex website with curated collections of beautiful page sections and layouts. Go Pro to get our entire collection!</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#006CD8\",\"background\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" href=\"#\" style=\"border-radius:4px;background-color:#ffffff;color:#006CD8\"><strong>Download Now</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Content Boxes', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'content', 'genesis-blocks' ),
		esc_html__( 'boxes', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate content boxes', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_content_boxes.jpg',
];
