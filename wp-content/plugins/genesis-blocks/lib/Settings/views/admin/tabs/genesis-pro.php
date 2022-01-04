<?php
/**
 * Genesis Pro Tab
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
	<div class="gb-admin-plugin-grid-2 wide-gap">
		<div>
			<h2><?php esc_html_e( 'Genesis Pro', 'genesis-blocks' ); ?></h2>
			<p><?php esc_html_e( 'Genesis Pro provides advanced tools for building better WordPress websites faster! Unlock new features and tools across the Genesis platform including additional blocks and collections, advanced block features, and access to the industry’s most beloved customer support team when you need it.', 'genesis-blocks' ); ?></p>
			<div class="gb-admin-button-controls">
				<a href="https://my.wpengine.com/signup?plan=genesis-pro-only" class="gb-admin-button-primary" target="_blank" rel="noopener"><?php esc_html_e( 'Get Genesis Pro', 'genesis-blocks' ); ?></a>
				<a href="https://wpengine.com/genesis-pro/" class="gb-admin-button-secondary" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'Learn more about Genesis Pro (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Learn More', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<div>
			<h3><?php esc_html_e( 'Genesis Pro at a glance', 'genesis-blocks' ); ?></h3>
			<ul class="gb-admin-plugin-ul-checks">
				<li><?php esc_html_e( 'Advanced features for Genesis Blocks', 'genesis-blocks' ); ?></li>
				<li><?php esc_html_e( 'Access to all design Collections', 'genesis-blocks' ); ?></li>
				<li><?php esc_html_e( 'Extra Genesis Blocks', 'genesis-blocks' ); ?></li>
				<li><?php esc_html_e( '24/7 Customer Support', 'genesis-blocks' ); ?></li>
			</ul>
		</div>
	</div>
</div>
<div class="gb-admin-plugin-container">
	<div class="gb-admin-plugin-grid-2">
		<div>
			<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/layout.svg' ); ?>" alt="" />
			<h2><?php esc_html_e( 'Sections and Layouts', 'genesis-blocks' ); ?></h2>
			<p><?php esc_html_e( 'Genesis Pro provides you with a growing collection of page-building section and layout designs. Mix and match from over 70 pre-made designs to create beautiful pages in seconds. There are plenty of designs to choose from in the ever-growing collection.', 'genesis-blocks' ); ?></p>
		</div>
		<div>
			<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/blocks.svg' ); ?>" alt="" />
			<h2><?php esc_html_e( 'Premium Block Library', 'genesis-blocks' ); ?></h2>
			<p><?php esc_html_e( 'Genesis Pro comes with additional blocks for advanced site building including the Device Mockup and Portfolio blocks.', 'genesis-blocks' ); ?></p>
		</div>
	</div>
	<div class="gb-admin-plugin-grid-2">
		<div>
			<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/controls.svg' ); ?>" alt="" />
			<h2><?php esc_html_e( 'Block-based access controls', 'genesis-blocks' ); ?></h2>
			<p><?php esc_html_e( 'Genesis Pro provides you the option to control which user roles have access to the settings of individual blocks. This is useful if you have specific brand styles (font styles, colors, etc.) and you don’t want to allow editors, authors, and/or contributors to change any branded elements.', 'genesis-blocks' ); ?></p>
		</div>
		<div>
			<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/support.svg' ); ?>" alt="" />
			<h2><?php esc_html_e( 'Industry-leading support', 'genesis-blocks' ); ?></h2>
			<p><?php esc_html_e( 'A Genesis Pro subscription gives you access to the incredible Customer Experience teams that have been the foundation of WP Engine and StudioPress. You will be able to build with confidence, knowing that you have extensive documentation and 24/7 support available.', 'genesis-blocks' ); ?></p>
		</div>
	</div>
	<div class="gb-admin-button-controls centered">
		<a href="https://my.wpengine.com/signup?plan=genesis-pro-only" class="gb-admin-button-primary" target="_blank" rel="noopener"><?php esc_html_e( 'Get started with Genesis Pro', 'genesis-blocks' ); ?></a>
	</div>
</div>
