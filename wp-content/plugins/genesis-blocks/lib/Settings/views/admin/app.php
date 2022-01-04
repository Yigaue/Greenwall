<?php
/**
 * App view for the settings page.
 *
 * The React application from js/src/app.js mounts at #root.
 *
 * @package Genesis\Blocks\Settings
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

?>

<div class="wrap">
	<div id="gb-admin-plugin-admin">
		<div class="gb-admin-plugin-admin-header gb-admin-plugin-grid-2">
			<div class="gb-admin-plugin-header-title-area">
				<h1><img class="gb-plugin-common-logo" src="<?php echo esc_url( $this->context['url'] . 'lib/Settings/assets/images/genesis-planet-icon.svg' ); ?>" alt="<?php esc_html_e( 'Genesis Blocks', 'genesis-blocks' ); ?>" /><?php echo esc_html( $this->page_title ); ?></h1>
			</div>
			<div class="gb-admin-plugin-header-controls-area">
				<a class="gb-header-button" href="//wordpress.org/support/plugin/genesis-blocks/reviews/" target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Leave a review!', 'genesis-blocks' ); ?>
				</a>
			</div>
		</div>
		<div id="root"></div>
	</div>
</div>
