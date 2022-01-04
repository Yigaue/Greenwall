<?php
/**
 * Genesis Blocks Contact Box section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_contact_box',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":0,\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ffffff\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-contact-box gpb-slate-section-contact-box \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-contact-box gpb-slate-section-contact-box gb-layout-columns-2 gb-2-col-equal gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ffffff;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-0 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"customBackgroundColor\":\"#1f1f1f\",\"customTextColor\":\"#abb8c3\",\"paddingSync\":true,\"paddingUnit\":\"em\",\"padding\":3} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner gb-has-custom-background-color gb-has-custom-text-color\" style=\"padding:3em;background-color:#1f1f1f;color:#abb8c3\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h2 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:40px\">Contact us and let's start building something!</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#abb8c3\"}}} -->
<p class=\"has-text-color\" style=\"color:#abb8c3\">Use the details to the right to get ahold of us.</p>
<!-- /wp:paragraph -->

<!-- wp:separator {\"className\":\"is-style-default\"} -->
<hr class=\"wp-block-separator is-style-default\"/>
<!-- /wp:separator -->

<!-- wp:social-links -->
<ul class=\"wp-block-social-links\"><!-- wp:social-link {\"url\":\"https://wordpress.org\",\"service\":\"wordpress\"} /-->

<!-- wp:social-link {\"url\":\"#\",\"service\":\"facebook\"} /-->

<!-- wp:social-link {\"url\":\"#\",\"service\":\"twitter\"} /-->

<!-- wp:social-link {\"url\":\"#\",\"service\":\"instagram\"} /-->

<!-- wp:social-link {\"service\":\"linkedin\"} /-->

<!-- wp:social-link {\"service\":\"youtube\"} /--></ul>
<!-- /wp:social-links --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"customBackgroundColor\":\"#006CD8\",\"customTextColor\":\"#f5f5f5\",\"paddingSync\":true,\"paddingUnit\":\"em\",\"padding\":3} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner gb-has-custom-background-color gb-has-custom-text-color\" style=\"padding:3em;background-color:#006CD8;color:#f5f5f5\"><!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-layout-columns-2 gb-2-col-equal\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":26},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:26px\">Office</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">Startup Square<br>123 Block Ave<br>Austin, Texas 36521</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":26},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:26px\">Hours</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">Mon-Fri: 8am - 5pm<br>Sat: 8am 9pm<br>Sun: 8am - 2pm</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":26},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:26px\">Via Email</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">hello@example.com<br>sales@example.com<br>support@example.com</p>
<!-- /wp:paragraph -->

<!-- wp:heading {\"level\":3,\"style\":{\"typography\":{\"fontSize\":26},\"color\":{\"text\":\"#f5f5f5\"}}} -->
<h3 class=\"has-text-color\" style=\"color:#f5f5f5;font-size:26px\">Via Phone</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-color\" style=\"color:#f5f5f5\">Tel: 514-281-3821<br>Fax: 514-281-5210</p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Contact Box', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'links', 'genesis-blocks' ),
		esc_html__( 'social', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate contact box', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_contact_box.jpg',
];
