<?php
/**
 * Genesis Blocks Call To Action Accent section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_call_to_action_accent',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-wideleft\",\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#f5f5f5\",\"customBackgroundColor\":\"#006CD8\",\"columnMaxWidth\":1200,\"className\":\"gpb-slate-section-cta-accent\"} --> <div class=\"wp-block-genesis-blocks-gb-columns gpb-slate-section-cta-accent gb-layout-columns-2 gb-2-col-wideleft gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#006CD8;color:#f5f5f5\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-2 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column {\"textAlign\":\"left\",\"paddingUnit\":\"em\",\"columnVerticalAlignment\":\"center\"} --> <div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\" style=\"text-align:left\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#f5f5f5\"}}} --> <h2 class=\"has-text-color\" style=\"font-size:40px;color:#f5f5f5\">Get a project quote today!</h2> <!-- /wp:heading --> <!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} --> <p class=\"has-text-color\" style=\"color:#f5f5f5\">We'll put together a customized quote about your project and work with you to get started on your project. Let's build something together!</p> <!-- /wp:paragraph --> <!-- wp:buttons --> <div class=\"wp-block-buttons\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"text\":\"#006CD8\",\"background\":\"#ffffff\"}},\"className\":\"is-style-fill\"} --> <div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#ffffff;color:#006CD8\"><strong>Get in touch today!</strong></a></div> <!-- /wp:button --></div> <!-- /wp:buttons --></div></div> <!-- /wp:genesis-blocks/gb-column --> <!-- wp:genesis-blocks/gb-column {\"textAlign\":\"right\",\"paddingUnit\":\"em\",\"columnVerticalAlignment\":\"center\"} --> <div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\" style=\"text-align:right\"></div></div> <!-- /wp:genesis-blocks/gb-column --></div></div> <!-- /wp:genesis-blocks/gb-columns --> ",
	'name'       => esc_html__( 'Slate Call To Action Accent', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'header', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'header', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'contact', 'genesis-blocks' ),
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate call to action columns', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_call_to_action_accent.jpg',
];
