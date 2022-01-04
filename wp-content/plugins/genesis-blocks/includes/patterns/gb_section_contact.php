<?php
/**
 * Genesis Blocks Contact Info and Map section
 *
 * @package genesis-blocks
 */

return [
	'type'     => 'section',
	'key'      => 'gb_section_contact',
	'content'  => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":5,\"align\":\"full\",\"paddingTop\":15,\"paddingRight\":5,\"paddingBottom\":15,\"paddingLeft\":5,\"paddingUnit\":\"%\",\"columnMaxWidth\":1200,\"className\":\"gb-layout-contact-1\"} --> <div class=\"wp-block-genesis-blocks-gb-columns gb-layout-contact-1 gb-layout-columns-2 gb-2-col-equal gb-columns-center alignfull\" style=\"padding-top:15%;padding-right:5%;padding-bottom:15%;padding-left:5%\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-5 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} --> <div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading --> <h2>Contact us to get started.</h2> <!-- /wp:heading --> <!-- wp:paragraph --> <p>We'd love to hear from you and build out your next dream project. Drop us a line and we'll get back to you as soon as we can!</p> <!-- /wp:paragraph --> <!-- wp:genesis-blocks/gb-container --> <div class=\"wp-block-genesis-blocks-gb-container gb-block-container\"><div class=\"gb-container-inside\"><div class=\"gb-container-content\" style=\"max-width:1600px\"><!-- wp:paragraph --> <p><strong>NASA Mission Control Center</strong><br>Clear Lake, Houston, TX 77058</p> <!-- /wp:paragraph --> <!-- wp:paragraph --> <p>Email: hello@example.com<br>Phone: 800-854-5841</p> <!-- /wp:paragraph --> <!-- wp:genesis-blocks/gb-button {\"buttonText\":\"Drop us an email!\"} --> <div class=\"wp-block-genesis-blocks-gb-button gb-block-button\"><a href=\"mailto:name@example.com\" class=\"gb-button gb-button-shape-rounded gb-button-size-medium\" style=\"color:#ffffff;background-color:#3373dc\">Drop us an email!</a></div> <!-- /wp:genesis-blocks/gb-button --> <!-- wp:paragraph --> <p></p> <!-- /wp:paragraph --></div></div></div> <!-- /wp:genesis-blocks/gb-container --></div></div> <!-- /wp:genesis-blocks/gb-column --> <!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} --> <div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:html --> <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3470.5670865756474!2d-95.09152774886842!3d29.558099181973784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86409da671292593%3A0xf684f098a7237a30!2sNASA+Mission+Control+Center!5e0!3m2!1sen!2sus!4v1560875318343!5m2!1sen!2sus\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe> <!-- /wp:html --></div></div> <!-- /wp:genesis-blocks/gb-column --></div></div> <!-- /wp:genesis-blocks/gb-columns -->",
	'name'     => esc_html__( 'Contact Info and Map', 'genesis-blocks' ),
	'category' => [ esc_html__( 'contact', 'genesis-blocks' ) ],
	'keywords' => [
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'map', 'genesis-blocks' ),
		esc_html__( 'email', 'genesis-blocks' ),
		esc_html__( 'directions', 'genesis-blocks' ),
	],
	'image'    => 'https://demo.studiopress.com/page-builder/gb_layout_contact.jpg',
];
