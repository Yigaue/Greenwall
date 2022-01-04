<?php
/**
 * Genesis Blocks Accordion and Text section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_accordion_text',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ffffff\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-accordion-and-text gb-slate-section-text-accordion \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-accordion-and-text gb-slate-section-text-accordion gb-layout-columns-2 gb-2-col-equal gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ffffff;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#1f1f1f\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:40px\">About our company</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">We can help you launch any simple or complex website. Our team of designers and engineers love pushing the envelope.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">The Genesis block pattern library has everything you need to design beautiful block-powered websites with just a few clicks. Go Pro to get our entire collection!</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-accordion {\"accordionFontSize\":20,\"className\":\"gb-slate-accordion gpb-rounded-md\"} -->
<div class=\"wp-block-genesis-blocks-gb-accordion gb-slate-accordion gpb-rounded-md gb-block-accordion gb-font-size-20\"><details><summary class=\"gb-accordion-title\">Audience Identification</summary><div class=\"gb-accordion-text\"><!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel molestie diam. Duis ultricies vestibulum nisl. Etiam egestas nisi volutpat tellus varius, a congue nibh tempus. Vestibulum dictum, dolor non tincidunt varius, mi diam pretium nulla, vitae faucibus ante nulla id nunc. </p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#353535\",\"background\":\"#ffffff\"}},\"className\":\"is-style-outline\"} -->
<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#ffffff;color:#353535\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->

<!-- wp:genesis-blocks/gb-accordion {\"accordionFontSize\":20,\"className\":\"gb-slate-accordion gpb-rounded-md\"} -->
<div class=\"wp-block-genesis-blocks-gb-accordion gb-slate-accordion gpb-rounded-md gb-block-accordion gb-font-size-20\"><details><summary class=\"gb-accordion-title\">Product Requirements</summary><div class=\"gb-accordion-text\"><!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel molestie diam. Duis ultricies vestibulum nisl. Etiam egestas nisi volutpat tellus varius, a congue nibh tempus. Vestibulum dictum, dolor non tincidunt varius, mi diam pretium nulla, vitae faucibus ante nulla id nunc. </p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#353535\",\"background\":\"#ffffff\"}},\"className\":\"is-style-outline\"} -->
<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#ffffff;color:#353535\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->

<!-- wp:genesis-blocks/gb-accordion {\"accordionFontSize\":20,\"className\":\"gb-slate-accordion gpb-rounded-md\"} -->
<div class=\"wp-block-genesis-blocks-gb-accordion gb-slate-accordion gpb-rounded-md gb-block-accordion gb-font-size-20\"><details><summary class=\"gb-accordion-title\">Market Viability</summary><div class=\"gb-accordion-text\"><!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel molestie diam. Duis ultricies vestibulum nisl. Etiam egestas nisi volutpat tellus varius, a congue nibh tempus. Vestibulum dictum, dolor non tincidunt varius, mi diam pretium nulla, vitae faucibus ante nulla id nunc.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#353535\",\"background\":\"#ffffff\"}},\"className\":\"is-style-outline\"} -->
<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#ffffff;color:#353535\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion -->

<!-- wp:genesis-blocks/gb-accordion {\"accordionFontSize\":20,\"className\":\"gb-slate-accordion gpb-rounded-md\"} -->
<div class=\"wp-block-genesis-blocks-gb-accordion gb-slate-accordion gpb-rounded-md gb-block-accordion gb-font-size-20\"><details><summary class=\"gb-accordion-title\">Product Launch</summary><div class=\"gb-accordion-text\"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vel molestie diam. Duis ultricies vestibulum nisl. Etiam egestas nisi volutpat tellus varius, a congue nibh tempus. Vestibulum dictum, dolor non tincidunt varius, mi diam pretium nulla, vitae faucibus ante nulla id nunc.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#353535\"}},\"className\":\"is-style-outline\"} -->
<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" style=\"border-radius:4px;color:#353535\"><strong>Learn More</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></details></div>
<!-- /wp:genesis-blocks/gb-accordion --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Accordion and Text', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'contact', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'accordion', 'genesis-blocks' ),
		esc_html__( 'toggle', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate accordion and text', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_accordion_text.jpg',
];
