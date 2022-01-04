<?php
/**
 * Genesis Blocks Text with CTA section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_text_with_cta',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"backgroundDimRatio\":30,\"focalPoint\":{\"x\":\"0.50\",\"y\":\"0.52\"},\"columns\":1,\"layout\":\"gb-1-col-equal\",\"columnsGap\":3,\"align\":\"full\",\"paddingTop\":9,\"paddingRight\":1,\"paddingBottom\":9,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#f5f5f5\",\"customBackgroundColor\":\"#1f1f1f\",\"columnMaxWidth\":872,\"className\":\"gb-slate-section-text-with-cta gb-slate-text-with-cta \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-text-with-cta gb-slate-text-with-cta gb-layout-columns-1 gb-1-col-equal gb-has-background-dim gb-has-background-dim-30 gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:9em;padding-right:1em;padding-bottom:9em;padding-left:1em;background-color:#1f1f1f;color:#f5f5f5;background-position:50% 52%\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-3 gb-is-responsive-column\" style=\"max-width:872px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"color\":{\"text\":\"#f5f5f5\"},\"typography\":{\"fontSize\":40}}} -->
<h2 class=\"has-text-align-center has-text-color\" style=\"color:#f5f5f5;font-size:40px\">Ready to take your next step?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"color\":{\"text\":\"#f5f5f5\"}}} -->
<p class=\"has-text-align-center has-text-color\" style=\"color:#f5f5f5\">Grow your audience and build a profitable online business.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {\"contentJustification\":\"center\"} -->
<div class=\"wp-block-buttons is-content-justification-center\"><!-- wp:button {\"borderRadius\":4,\"style\":{\"color\":{\"background\":\"#006CD8\",\"text\":\"#ffffff\"}}} -->
<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background\" style=\"border-radius:4px;background-color:#006CD8;color:#ffffff\"><strong>Get Started Today</strong></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Text with CTA', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'portfolio', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'portfolio', 'genesis-blocks' ),
		esc_html__( 'button', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'slate text with cta', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_text_with_cta.jpg',
];
