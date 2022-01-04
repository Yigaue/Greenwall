<?php
/**
 * Genesis Blocks Testimonials section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_testimonials',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":1,\"layout\":\"one-column\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#f5f5f5\",\"customBackgroundColor\":\"#1f1f1f\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-testimonials gb-slate-section-testimonial \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-testimonials gb-slate-section-testimonial gb-layout-columns-1 one-column gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#1f1f1f;color:#f5f5f5\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-container {\"containerMarginBottom\":5,\"containerMaxWidth\":840} -->
<div style=\"margin-bottom:5%\" class=\"wp-block-genesis-blocks-gb-container gb-block-container\"><div class=\"gb-container-inside\"><div class=\"gb-container-content\" style=\"max-width:840px\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h2 class=\"has-text-align-center has-text-color\" style=\"color:#f5f5f5;font-size:40px\">Kind words from customers</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-align-center has-text-color\" style=\"color:#f5f5f5\">The Genesis block pattern library has everything you need to design beautiful block-powered websites with just a few clicks.</p>
<!-- /wp:paragraph --></div></div></div>
<!-- /wp:genesis-blocks/gb-container -->

<!-- wp:genesis-blocks/gb-columns {\"columns\":3,\"layout\":\"gb-3-col-equal\"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-3 gb-3-col-equal\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column {\"padding\":15} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-testimonial {\"testimonialImgID\":10230,\"testimonialBackgroundColor\":\"#ffffff\"} -->
<div style=\"background-color:#ffffff;color:#32373c\" class=\"wp-block-genesis-blocks-gb-testimonial left-aligned gb-has-avatar gb-font-size-18 gb-block-testimonial\"><div class=\"gb-testimonial-text\"><p>My new site is so much faster and easier to work with than my old site. It used to take me an hour or more to update a page. I would definitely work with them again!</p></div><div class=\"gb-testimonial-info\"><div class=\"gb-testimonial-avatar-wrap\"><div class=\"gb-testimonial-image-wrap\"><img class=\"gb-testimonial-avatar\" src=\"https://demo.studiopress.com/page-builder/person-w-4.jpg\" alt=\"avatar\"/></div></div><h2 class=\"gb-testimonial-name\" style=\"color:#32373c\">Mary Sequoia</h2><small class=\"gb-testimonial-title\" style=\"color:#32373c\">Author</small></div></div>
<!-- /wp:genesis-blocks/gb-testimonial --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-testimonial {\"testimonialImgID\":10211,\"testimonialBackgroundColor\":\"#ffffff\"} -->
<div style=\"background-color:#ffffff;color:#32373c\" class=\"wp-block-genesis-blocks-gb-testimonial left-aligned gb-has-avatar gb-font-size-18 gb-block-testimonial\"><div class=\"gb-testimonial-text\"><p>My new site is so much faster and easier to work with than my old site. It used to take me an hour or more to update a page. I would definitely work with them again!</p></div><div class=\"gb-testimonial-info\"><div class=\"gb-testimonial-avatar-wrap\"><div class=\"gb-testimonial-image-wrap\"><img class=\"gb-testimonial-avatar\" src=\"https://demo.studiopress.com/page-builder/person-m-1.jpg\" alt=\"avatar\"/></div></div><h2 class=\"gb-testimonial-name\" style=\"color:#32373c\">Philip Glacier</h2><small class=\"gb-testimonial-title\" style=\"color:#32373c\">Publisher</small></div></div>
<!-- /wp:genesis-blocks/gb-testimonial --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-testimonial {\"testimonialImgID\":10230,\"testimonialBackgroundColor\":\"#ffffff\"} -->
<div style=\"background-color:#ffffff;color:#32373c\" class=\"wp-block-genesis-blocks-gb-testimonial left-aligned gb-has-avatar gb-font-size-18 gb-block-testimonial\"><div class=\"gb-testimonial-text\"><p>My new site is so much faster and easier to work with than my old site. It used to take me an hour or more to update a page. I would definitely work with them again!</p></div><div class=\"gb-testimonial-info\"><div class=\"gb-testimonial-avatar-wrap\"><div class=\"gb-testimonial-image-wrap\"><img class=\"gb-testimonial-avatar\" src=\"https://demo.studiopress.com/page-builder/person-w-3.jpg\" alt=\"avatar\"/></div></div><h2 class=\"gb-testimonial-name\" style=\"color:#32373c\">Amy Redwood</h2><small class=\"gb-testimonial-title\" style=\"color:#32373c\">Consultant</small></div></div>
<!-- /wp:genesis-blocks/gb-testimonial --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Testimonials', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'testimonial', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'testimonial', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate testimonials', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_testimonials.jpg',
];
