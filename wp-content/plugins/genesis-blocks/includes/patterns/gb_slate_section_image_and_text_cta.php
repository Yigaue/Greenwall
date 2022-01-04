<?php
/**
 * Genesis Blocks Image and Text CTA section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_image_and_text_cta',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ededed\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-image-and-text-cta gpb-slate-image-text \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-image-and-text-cta gpb-slate-image-text gb-layout-columns-2 gb-2-col-equal gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ededed;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:image {\"sizeSlug\":\"large\"} -->
<figure class=\"wp-block-image size-large\"><img src=\"https://demo.studiopress.com/page-builder/slate/gb_slate_image_text_square.jpg\" alt=\"GB Square Placeholder\"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#1f1f1f\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:40px\">We design and develop memorable experiences</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Genesis design collections have everything you need to design beautiful block-powered websites with just a few clicks. Go Pro to get our entire collection!</p>
<!-- /wp:paragraph -->

<!-- wp:spacer {\"height\":24} -->
<div style=\"height:24px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Download Now</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Image and Text CTA', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'media', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'media', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'columns', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate image and text cta', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_image_and_text_cta.jpg',
];
