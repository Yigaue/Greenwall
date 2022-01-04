<?php
/**
 * Genesis Blocks Feature Image and Text Columns section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_feature_image_columns',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":1,\"layout\":\"one-column\",\"align\":\"full\",\"paddingTop\":8,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ededed\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-feature-image-and-text-columns gb-slate-section-feature-image-columns \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-feature-image-and-text-columns gb-slate-section-feature-image-columns gb-layout-columns-1 one-column gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:8em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ededed;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":3} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-equal\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-3 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:image {\"sizeSlug\":\"large\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://demo.studiopress.com/page-builder/gb-placeholder-hero.jpg\" alt=\"\"/></figure>
<!-- /wp:image -->

<!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":26},\"color\":{\"text\":\"#1f1f1f\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Build your site with Genesis Blocks today.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Genesis design collections have everything you need to design beautiful block-powered websites with just a few clicks.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {\"height\":25} -->
<div style=\"height:25px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:image {\"sizeSlug\":\"large\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://demo.studiopress.com/page-builder/gb-placeholder-hero.jpg\" alt=\"\"/></figure>
<!-- /wp:image -->

<!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":26},\"color\":{\"text\":\"#1f1f1f\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Build your site with Genesis Blocks today.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Genesis design collections have everything you need to design beautiful block-powered websites with just a few clicks.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Feature Image and Text Columns', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'portfolio', 'genesis-blocks' ),
		esc_html__( 'media', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'portfolio', 'genesis-blocks' ),
		esc_html__( 'column', 'genesis-blocks' ),
		esc_html__( 'image', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate feature image and text columns', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_feature_image_columns.jpg',
];
