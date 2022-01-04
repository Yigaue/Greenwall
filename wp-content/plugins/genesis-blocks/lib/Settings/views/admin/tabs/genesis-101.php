<?php
/**
 * Genesis 101 Tab
 *
 * @package Genesis\Blocks\Settings
 * @since   1.3.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>

<div class="gb-admin-plugin-container">
	<h2><?php esc_html_e( 'Genesis 101', 'genesis-blocks' ); ?></h2>
	<a href="https://developer.wpengine.com/genesis-blocks/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Genesis documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Genesis documentation', 'genesis-blocks' ); ?></a>
	<div class="gb-admin-plugin-grid-2">
		<div class="gb-admin-column">
			<p>
			<?php
			printf(
				/* translators: %1$: opening i tag, %2$: closing i tag */
				esc_html__( '%1$sBlock%2$s is a term used for any kind of content that you add in the new WordPress editor. When editing, anything you insert within a page or a post is a block. WordPress includes a few default blocks such as the Paragraph, Image, Heading, Gallery, etc. that give you a great head start.', 'genesis-blocks' ),
				'<i>',
				'</i>'
			);
			?>
			</p>
		</div>
		<div class="gb-admin-column">
			<p><?php esc_html_e( 'Working with Genesis Blocks is just like working with the default WordPress blocks. They all offer a quick way to add various types of content to your posts and pages.', 'genesis-blocks' ); ?></p>
		</div>
	</div>
</div>

<div class="gb-admin-plugin-container gb-genesis-101">
	<h2 class="centered"><?php esc_html_e( 'Block Documentation', 'genesis-blocks' ); ?></h2>
	<div class="gb-admin-plugin-grid-auto">
		<!-- Working with blocks -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/blocks.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Working with blocks', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'We’ll give a brief overview of how to add blocks and change their settings, as well as how to easily locate existing blocks so you can edit their content or settings.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/working-with-blocks/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View working with blocks documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Responsive Typography -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/desktop.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Responsive Typography', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'Learn about Genesis responsive controls within the default WP Heading and Paragraph blocks that allow you to choose different font sizes or line heights for desktop, tablet, & mobile.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/responsive-typography/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Responsive typography documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Advanced columns block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/layout.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Advanced Columns block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Advanced Columns block gives you a powerful, flexible column system to build custom, full-page layouts for your posts and pages.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/advanced-columns-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Advanced Columns block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Container block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/layout.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Container block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Container block allows you to wrap several individual blocks inside a parent container which can help you create differently styled sections of content on your posts and pages.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/container-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Container block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Layouts block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/layout.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Layouts block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Layouts block gives you a quick and easy way to build beautiful pages with a library of pre-designed sections, layouts, and collections.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/layouts-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Layouts block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Drop cap block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/design.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Drop Cap block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Drop Cap block allows you to add a stylized letter to the first word of a paragraph. After adding a paragraph to the post or page, you can configure the drop cap settings.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/drop-cap-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Drop Cap block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Spacer block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/design.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Spacer block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Spacer block allows you to easily add an adjustable-height spacer between other blocks. It also includes an optional divider with settings to change its style.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/spacer-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Spacer block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Button block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/cta.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Button block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Button block allows you to add a customizable button to your posts and pages with settings for changing the link target, button shape, button size, and button colors.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/button-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Button block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Call to Action block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/cta.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Call to Action block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Call to Action block allows you to add a compact, wide, or full-width call-to-action section to your post or page. ', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/call-to-action-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Call to Action block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Email Newsletter block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/cta.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Email Newsletter block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Email Newsletter block allows you to add a Mailchimp email subscription form to any location in a post or page. This block currently works with the Mailchimp service only.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/email-newsletter-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Email Newsletter block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Accordion block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Accordion block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Accordion block allows you to display content in expandable/collapsible tabs so you can easily add lots of content without increasing page length.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/accordion-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Accordion block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Device Mockup block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Device Mockup block', 'genesis-blocks' ); ?><span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></h3>
				<p><?php esc_html_e( 'The Device Mockup block allows you to quickly and easily showcase how your designs look on a smartphone or tablet.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/device-mockup-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Device Mockup block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Notice block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Notice block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Notice block allows you add an inline notice box to any post or page. You can use it to highlight information or draw attention to a special message.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/notice-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Notice block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Portfolio block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Portfolio block', 'genesis-blocks' ); ?><span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></h3>
				<p><?php esc_html_e( 'The Portfolio block allows you to display your latest work in a customizable grid-style layout. Using a dedicated custom post type, you can create unique portfolio pages on your own!', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/portfolio-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Portfolio block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Post and Page Grid block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Post and Page Grid block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Post and Page Grid block gives you an advanced, customizable, and sortable grid of posts and pages for your site.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/post-and-page-grid-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Post and Page Grid block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Pricing block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Pricing block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Pricing block allows you to build beautiful, dynamic, responsive pricing tables with settings to change columns, colors, padding, and position.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/pricing-table-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Pricing block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Profile Box block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Profile Box block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Profile Box block allows you to easily add a user profile box to any location on a post or page.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/profile-box-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Profile Box block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Sharing block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Sharing block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Sharing block makes it easy to add social media sharing icons anywhere on your post or page that allow readers to share your content on their social media profiles.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/sharing-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Sharing block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Testimonial block -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/content.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Testimonial block', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The Testimonial block allows you to add a testimonial box to your post or page that includes the testimonial text as well as the author’s name, title, and avatar.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/testimonial-block/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Testimonial block documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Block Permissions -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/permissions.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Block Permissions', 'genesis-blocks' ); ?><span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></h3>
				<p><?php esc_html_e( 'Genesis Blocks Pro includes the option to control which user roles have access to the settings of individual blocks.', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/block-permissions/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Block Permissions documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<!-- Reusable blocks -->
		<div class="gb-admin-column">
			<div>
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/reusable.svg' ); ?>" alt="" />
				<h3><?php esc_html_e( 'Reusable blocks', 'genesis-blocks' ); ?></h3>
				<p><?php esc_html_e( 'The WordPress block editor includes a handy Reusable Blocks feature that allows you to save a block (or a group of blocks) and reuse it in other posts and pages on your site. ', 'genesis-blocks' ); ?></p>
			</div>
			<div class="gb-admin-button-controls centered">
				<a class="gb-admin-button-secondary" href="https://developer.wpengine.com/genesis-blocks/reusable-blocks/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Reusable blocks documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View docs', 'genesis-blocks' ); ?></a>
			</div>
		</div>
	</div>
</div>
