<?php
/**
 * Genesis Blocks Numbered List and Image section for Slate Collection.
 *
 * @package genesis-blocks
 */

return [
	'type'       => 'section',
	'key'        => 'gb_slate_section_numbered_list_image',
	'collection' => [
		'slug'                   => 'slate',
		'label'                  => esc_html__( 'Slate', 'genesis-blocks' ),
		'allowThemeColorPalette' => false,
	],
	'content'    => "<!-- wp:genesis-blocks/gb-columns {\"columns\":2,\"layout\":\"gb-2-col-equal\",\"columnsGap\":3,\"align\":\"full\",\"paddingTop\":6,\"paddingRight\":1,\"paddingBottom\":6,\"paddingLeft\":1,\"paddingUnit\":\"em\",\"customTextColor\":\"#1f1f1f\",\"customBackgroundColor\":\"#ffffff\",\"columnMaxWidth\":1200,\"className\":\"gb-slate-section-numbered-list-and-image \"} -->
<div class=\"wp-block-genesis-blocks-gb-columns gb-slate-section-numbered-list-and-image gb-layout-columns-2 gb-2-col-equal gb-has-custom-background-color gb-has-custom-text-color gb-columns-center alignfull\" style=\"padding-top:6em;padding-right:1em;padding-bottom:6em;padding-left:1em;background-color:#ffffff;color:#1f1f1f\"><div class=\"gb-layout-column-wrap gb-block-layout-column-gap-3 gb-is-responsive-column\" style=\"max-width:1200px\"><!-- wp:genesis-blocks/gb-column -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column\"><div class=\"gb-block-layout-column-inner\"><!-- wp:image {\"id\":11445} -->
<figure class=\"wp-block-image\"><img src=\"https://demo.studiopress.com/page-builder/gb-placeholder-tall.jpg\" alt=\"\" class=\"wp-image-11445\"/></figure>
<!-- /wp:image --></div></div>
<!-- /wp:genesis-blocks/gb-column -->

<!-- wp:genesis-blocks/gb-column {\"columnVerticalAlignment\":\"center\"} -->
<div class=\"wp-block-genesis-blocks-gb-column gb-block-layout-column gb-is-vertically-aligned-center\"><div class=\"gb-block-layout-column-inner\"><!-- wp:heading {\"style\":{\"typography\":{\"fontSize\":40},\"color\":{\"text\":\"#1f1f1f\"}},\"className\":\"gpb-fluid-4\"} -->
<h2 class=\"gpb-fluid-4 has-text-color\" style=\"color:#1f1f1f;font-size:40px\">How it works</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":22},\"color\":{\"text\":\"#1f1f1f\"}}} -->
<p class=\"has-text-color\" style=\"color:#1f1f1f;font-size:22px\">We're here to help you navigate the increasingly complicated process of launching a website or native web app. </p>
<!-- /wp:paragraph -->

<!-- wp:separator {\"className\":\"is-style-default\"} -->
<hr class=\"wp-block-separator is-style-default\"/>
<!-- /wp:separator -->

<!-- wp:list {\"ordered\":true,\"className\":\"gpb-number-list\"} -->
<ol class=\"gpb-number-list\"><li><strong>Tell us your story</strong><br>Let's chat about what you're looking to build and see if our team is a good fit for the project.</li><li><strong>Define the scope</strong><br>We'll take a look at all the details of your project and discuss how to split up the work on our team.</li><li><strong>Start wireframes and code</strong><br>We'll work with you the entire way, from wireframes to walking you through live code previews.</li><li><strong>We live to launch products</strong><br>Launching products is our passion. We'll help you get your product live and help spread the word.</li></ol>
<!-- /wp:list --></div></div>
<!-- /wp:genesis-blocks/gb-column --></div></div>
<!-- /wp:genesis-blocks/gb-columns -->",
	'name'       => esc_html__( 'Slate Numbered List and Image', 'genesis-blocks' ),
	'category'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'services', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
	],
	'keywords'   => [
		esc_html__( 'business', 'genesis-blocks' ),
		esc_html__( 'product', 'genesis-blocks' ),
		esc_html__( 'landing', 'genesis-blocks' ),
		esc_html__( 'list', 'genesis-blocks' ),
		esc_html__( 'image', 'genesis-blocks' ),
		esc_html__( 'slate', 'genesis-blocks' ),
		esc_html__( 'features', 'genesis-blocks' ),
		esc_html__( 'columns', 'genesis-blocks' ),
		esc_html__( 'slate numbered list and image', 'genesis-blocks' ),
	],
	'image'      => 'https://demo.studiopress.com/page-builder/slate/gb_slate_section_numbered_list_image.jpg',
];
