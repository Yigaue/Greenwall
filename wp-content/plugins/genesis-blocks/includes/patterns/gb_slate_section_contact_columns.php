<?php
/**
 * Genesis Blocks Contact Columns section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_contact_columns',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":1,\"layout\":\"one-column\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ffffff\",\"className\":\"gb-slate-section-contact-columns gpb-slate-contact-columns \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-contact-columns gpb-slate-contact-columns gb-layout-columns-1 one-column gb-has-custom-background-color gb-has-custom-text-color alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ffffff;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":3,\"align\":\"full\",\"columnMaxWidth\":1200} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-equal gb-columns-center alignfull\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-3 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"top\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-top\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":40}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:40px\">Contact us today and let's build something.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">We're taking new clients and new projects this summer. Want to build the next big thing? Send us an email.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Contact Us Today</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:spacer {\"height\":20} -->
<div style=\"height:20px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"top\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-top\"><div class=\"gb-block-layout-column-inner\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-equal\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Office</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Startup Square<br>123 Block Ave<br>Austin, Texas 36521</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Hours</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Mon-Fri: 8am - 5pm<br>Sat: 8am 9pm<br>Sun: 8am - 2pm</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Via Email</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">hello@example.com<br>sales@example.com<br>support@example.com</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"style\":{\"color\":{\"text\":\"#1f1f1f\"},\"typography\":{\"fontSize\":26}}} -->
<h2 class=\"has-text-color\" style=\"color:#1f1f1f;font-size:26px\">Via Phone</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f\">Tel: 514-281-3821<br>Fax: 514-281-5210</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Contact Columns', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'portfolio', 'genesis-blocks' ),
		esc_html__( 'agency', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'portfolio', 'genesis-blocks' ),
		esc_html__( 'agency', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate contact columns', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_contact_columns.jpg',
];
