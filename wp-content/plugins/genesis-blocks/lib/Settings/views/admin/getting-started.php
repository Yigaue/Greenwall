<?php
/**
 * Genesis Getting Started page.
 *
 * @package Genesis\Blocks\Settings
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Nonce verification is being ignored here because no user action is being taken here, and no data is being saved. This simply loads the page in question.
// Ignoring the nonce allows this page to be loaded from a bookmark, for example.
// No saving logic should be added to this page. Rather, it should be handled in a separate function, or ideally through the REST api, which has nonce protection.
$genesis_active_tab = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_STRING, [ 'options' => [ 'default' => 'no-tab' ] ] );
$tab_dir            = trailingslashit( plugin_dir_path( __FILE__ ) . 'tabs' );

/**
 * Callback function to Genesis 101 Tab
 *
 * @return void
 */
function genesis_blocks_genesis_101_tab_renderer() {
	require_once trailingslashit( plugin_dir_path( __FILE__ ) . 'tabs' ) . 'genesis-101.php';
}

/**
 * Callback function to Collections Tab
 *
 * @return void
 */
function genesis_blocks_collections_tab_renderer() {
	require_once trailingslashit( plugin_dir_path( __FILE__ ) . 'tabs' ) . 'genesis-collections.php';
}

/**
 * Callback function to Genesis Pro Tab
 *
 * @return void
 */
function genesis_blocks_genesis_pro_tab_renderer() {
	require_once trailingslashit( plugin_dir_path( __FILE__ ) . 'tabs' ) . 'genesis-pro.php';
}

?>

<div class="wrap">
	<div id="gb-admin-plugin-admin">
		<!-- Admin Header -->
		<div class="gb-admin-plugin-admin-header gb-admin-plugin-grid-2">
			<div class="gb-admin-plugin-header-title-area">
				<h1><img class="gb-plugin-common-logo" src="<?php echo esc_url( $this->context['url'] . 'lib/Settings/assets/images/genesis-planet-icon.svg' ); ?>" alt="Genesis Logo">Genesis</h1>	
			</div>
			<div class="gb-admin-plugin-header-controls-area">
				<a href="https://wpengine.com/genesis/" class="gb-header-button" target="_blank"
					rel="noopener noreferrer"><?php esc_html_e( 'About Genesis', 'genesis-blocks' ); ?></a>
			</div>
		</div>	
		<!-- Admin Nav -->
		<nav class="gb-nav-tab-wrapper">
			<?php
			$genesis_tabs = [
				[
					'tab_slug'     => 'genesis-101',
					'tab_label'    => __( 'Genesis 101', 'genesis-blocks' ),
					'tab_callback' => 'genesis_blocks_genesis_101_tab_renderer',
				],
				[
					'tab_slug'     => 'collections',
					'tab_label'    => __( 'Collections', 'genesis-blocks' ),
					'tab_callback' => 'genesis_blocks_collections_tab_renderer',
				],
				[
					'tab_slug'     => 'genesis-pro',
					'tab_label'    => __( 'Genesis Pro', 'genesis-blocks' ),
					'tab_callback' => 'genesis_blocks_genesis_pro_tab_renderer',
					'tab_icon_url' => $this->context['url'] . 'lib/Settings/assets/images/genesis-planet-icon-dark.svg',
					'tab_icon_alt' => __( 'Genesis Pro', 'genesis-blocks' ),
				],
			];

			$genesis_tabs = apply_filters( 'genesis_blocks_setting_started_tabs', $genesis_tabs );
			foreach ( $genesis_tabs as $key => $genesis_tab ) {
				$tab_uri = "?page=genesis-blocks-getting-started&tab={$genesis_tab['tab_slug']}"
				?>
					<a
						href=<?php echo esc_url( $tab_uri ); ?>
						class="gb-nav-tab gb-admin-button 
						<?php

						if ( $genesis_active_tab === $genesis_tab['tab_slug'] || ( $genesis_active_tab === 'no-tab' && $key === 0 ) ) {
							$genesis_tab_callback = $genesis_tab['tab_callback'];
							echo 'gb-nav-tab-active';
						}
						?>
						"
					>
					<?php
					if ( isset( $genesis_tab['tab_icon_url'] ) ) {
						$tab_alt = isset( $genesis_tab['tab_icon_alt'] ) ? $genesis_tab['tab_icon_alt'] : __( 'Tab icon', 'genesis-blocks' );
						?>
						<img class="gb-plugin-tab-icon" src="<?php echo esc_url( $genesis_tab['tab_icon_url'] ); ?>" alt="<?php echo esc_attr( $tab_alt ); ?>" >
						<?php
					}

					echo esc_html( $genesis_tab['tab_label'] ) . '</a>';
			}
			?>
		</nav>
		<!-- Admin Body -->
		<div class="gb-admin-plugin-admin-body">
			<?php
			isset( $genesis_tab_callback ) && call_user_func( $genesis_tab_callback );
			?>
		</div>
	</div>
</div>
