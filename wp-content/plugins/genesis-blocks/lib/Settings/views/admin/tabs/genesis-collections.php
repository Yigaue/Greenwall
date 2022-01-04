<?php
/**
 * Collections Tab
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
			<h2><?php esc_html_e( 'Collections', 'genesis-blocks' ); ?></h2>
			<p><?php esc_html_e( 'Collections are groups of pre-designed sections and layouts that share the same theme or design aesthetic. They make it easy to quickly build multiple pages on your site that are cohesive in their look and feel.', 'genesis-blocks' ); ?></p>
			<div class="gb-admin-button-controls">
				<a class="gb-admin-button-primary" href="https://developer.wpengine.com/genesis-blocks/layouts-block/#collections" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Collections Documentation (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Collections Documentation', 'genesis-blocks' ); ?></a>
			</div>
		</div>
		<div>
			<h3><?php esc_html_e( 'How to access collections:', 'genesis-blocks' ); ?></h3>
			<p>
				<?php
					esc_html(
						printf(
							/* translators: %1$: opening anchor tag, %2$: closing anchor tag */
							esc_html__( 'When %1$sediting a page%2$s in your website, you can access Genesis Collections by clicking the “Layouts” button in the top menu bar.', 'genesis-blocks' ),
							'<a href="' . esc_url( admin_url( '/edit.php?post_type=page' ) ) . '">',
							'</a>'
						)
					);
					?>
			</p>
			<div class="gb-layouts-img">
				<img src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/gb-layout-button.jpg' ); ?>" alt="WordPress Editor top bar buttons">
			</div>
		</div>
	</div>
</div>
<div class="gb-admin-plugin-container">
	<h2 class="centered"><?php esc_html_e( 'Current Collections', 'genesis-blocks' ); ?></h2>
	<div class="gb-admin-plugin-grid-auto">
		<div class="gb-collection">
			<div class="gb-collection-img">
				<img src="https://demo.studiopress.com/page-builder/slate/gb_slate_layout_homepage.jpg" alt="Slate Collection">
			</div>
			<div class="gb-collection-info">
				<p class="gb-collection-title">Slate</p>
				<div class="gb-collection-demo-link">
					<a href="https://genesisplay.wpengine.com/slate/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Slate Demo (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Demo', 'genesis-blocks' ); ?></a>
				</div>
			</div>
		</div>
		<div class="gb-collection">
			<div class="gb-collection-img">
				<img src="https://demo.studiopress.com/page-builder/agency/gpb_agency_layout_homepage.jpg" alt="Agency Collection">
			</div>
			<div class="gb-collection-info">
				<p class="gb-collection-title">Agency <span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></p>
				<div class="gb-collection-demo-link">
					<a href="https://genesisplay.wpengine.com/agency/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Agency Demo (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Demo', 'genesis-blocks' ); ?></a>
				</div>
			</div>
		</div>
		<div class="gb-collection">
			<div class="gb-collection-img">
				<img src="https://demo.studiopress.com/page-builder/altitude/gpb_altitude_layout_homepage.jpg" alt="Altitude Collection">
			</div>
			<div class="gb-collection-info">
				<p class="gb-collection-title">Altitude <span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></p>
				<div class="gb-collection-demo-link">
					<a href="https://genesisplay.wpengine.com/altitude/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Altitude Demo (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Demo', 'genesis-blocks' ); ?></a>
				</div>
			</div>
		</div>
		<div class="gb-collection">
			<div class="gb-collection-img">
				<img src="https://demo.studiopress.com/page-builder/infinity/gpb_infinity_layout_homepage.jpg" alt="Infinity Collection">
			</div>
			<div class="gb-collection-info">
				<p class="gb-collection-title">Infinity <span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></p>
				<div class="gb-collection-demo-link">
					<a href="https://genesisplay.wpengine.com/infinity/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Infinity Demo (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Demo', 'genesis-blocks' ); ?></a>
				</div>
			</div>
		</div>
		<div class="gb-collection">
			<div class="gb-collection-img">
				<img src="https://demo.studiopress.com/page-builder/monochrome/gpb_monochrome_layout_homepage.jpg" alt="Monochrome Collection">
			</div>
			<div class="gb-collection-info">
				<p class="gb-collection-title">Monochrome <span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></p>
				<div class="gb-collection-demo-link">
					<a href="https://genesisplay.wpengine.com/monochrome/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Monochrome Demo (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Demo', 'genesis-blocks' ); ?></a>
				</div>
			</div>
		</div>
		<div class="gb-collection">
			<div class="gb-collection-img">
				<img src="https://demo.studiopress.com/page-builder/tangerine/gpb_tangerine_layout_homepage.jpg" alt="Tangerine Collection">
			</div>
			<div class="gb-collection-info">
				<p class="gb-collection-title">Tangerine <span class="gb-pro-badge" aria-label="<?php esc_html_e( 'Included in Genesis Pro', 'genesis-blocks' ); ?>"><?php esc_html_e( 'Pro', 'genesis-blocks' ); ?></span></p>
				<div class="gb-collection-demo-link">
					<a href="https://genesisplay.wpengine.com/tangerine/" target="_blank" rel="noopener" aria-label="<?php esc_html_e( 'View Tangerine Demo (opens in a new tab)', 'genesis-blocks' ); ?>"><?php esc_html_e( 'View Demo', 'genesis-blocks' ); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
