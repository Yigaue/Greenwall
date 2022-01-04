<?php
/**
 * Genesis Blocks Testimonial Image section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_testimonial_image',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"backgroundImgURL\":\"https://demo.studiopress.com/page-builder/gp_tangerine_sky.jpg\",\"backgroundDimRatio\":20,\"columns\":2,\"layout\":\"gb-2-col-equal\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#f5f5f5\",\"customBackgroundColor\":\"#1f1f1f\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-testimonial-image gb-slate-section-testimonial \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-testimonial-image gb-slate-section-testimonial gb-layout-columns-2 gb-2-col-equal gb-has-background-dim gb-has-background-dim-20 gb-background-cover gb-background-no-repeat gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#1f1f1f;color:#f5f5f5;background-image:url(https://demo.studiopress.com/page-builder/gp_tangerine_sky.jpg)\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:image {\"id\":16080} -->
<figure class=\"wp-block-image\"><img src=\"https://demo.studiopress.com/page-builder/person-w-1-1200.jpg\" alt=\"testimonial\" class=\"wp-image-16080\"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":32},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:32px\">This team took my product from an idea to a reality in record time. Not only were they easy to work with, but the design they came up with was better than I could have even asked for.</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#abb8c3\"}}} -->
<p class=\"has-text-color\" style=\"color:#abb8c3\">- Annie Alpine / Nature First</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Testimonial Image', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'testimonial', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'media', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'testimonial', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'avatar', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate testimonial image', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_testimonial_image.jpg',
];
