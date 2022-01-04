<?php
/**
 * Genesis Pro upgrade page.
 *
 * @package Genesis\Blocks\Settings
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

?>

<div class="wrap genesis-blocks-genesis-pro-page">
	<div class="intro-wrap">
		<div class="intro">
			<h1 class="screen-reader-text"><?php echo esc_html_e( 'Genesis Pro', 'genesis-blocks' ); ?></h1>
			<section class="container">
				<div class="gb-hero">
					<div>
						<img src="<?php echo esc_url( $this->context['url'] . 'lib/Settings/assets/images/genesis-icon-reversed.svg' ); ?>" alt="<?php esc_html_e( 'Genesis Blocks', 'genesis-blocks' ); ?>" />
						<h3><?php esc_html_e( 'Advanced tools for building better WordPress websites faster.', 'genesis-blocks' ); ?></h3>
					</div>
					<div class="gb-hero__actions">
						<a href="https://www.studiopress.com/genesis-pro/" target="_blank" rel="noopener noreferrer"><button class="btn"><img src="<?php echo esc_url( $this->context['url'] . 'lib/Settings/assets/images/genesis-planet-icon.svg' ); ?>" alt="<?php esc_html_e( 'Genesis Blocks', 'genesis-blocks' ); ?>" /> <?php esc_html_e( 'Get Genesis Pro Today!', 'genesis-blocks' ); ?></button></a>
					</div>
				</div>
				<div class="gb-content-body">
					<div class="gb-content">
						<div>
							<h2><?php esc_html_e( 'Sections and Layouts', 'genesis-blocks' ); ?></h2>
							<p><?php esc_html_e( 'Genesis Pro provides you with a growing collection of page-building section and layout designs. Mix and match from over 70 pre-made designs to create beautiful pages in seconds. There are plenty of designs to choose from in the ever-growing collection.', 'genesis-blocks' ); ?></p>

							<h2><?php esc_html_e( 'Premium block library', 'genesis-blocks' ); ?></h2>
							<p><?php esc_html_e( 'Genesis Pro comes with additional blocks for advanced site building.', 'genesis-blocks' ); ?></p>
							<ul>
								<li>
									<?php esc_html_e( 'Device Mockup block: Quickly and easily showcase how your designs look on a smartphone or tablet. You can choose the device type, device color, and device orientation.', 'genesis-blocks' ); ?>
								</li>
								<li>
									<?php esc_html_e( 'Portfolio block: Display your latest work in a customizable grid-style layout. Using a dedicated custom post type, you can create unique portfolio pages complete with a title, text, images, galleries, videos, and more.', 'genesis-blocks' ); ?>
								</li>
								<li><?php esc_html_e( 'More coming soon!', 'genesis-blocks' ); ?></li>
							</ul>

							<h2><?php esc_html_e( 'Block-based access controls', 'genesis-blocks' ); ?></h2>
							<p><?php esc_html_e( 'Genesis Pro provides you the option to control which user roles have access to the settings of individual blocks. This is useful if you have specific brand styles (font styles, colors, etc.) and you don’t want to allow editors, authors, and/or contributors to change any branded elements.', 'genesis-blocks' ); ?></p>
						</div>
						<div>
							<h2><?php esc_html_e( 'Industry-leading support', 'genesis-blocks' ); ?></h2>
							<p><?php esc_html_e( 'A Genesis Pro subscription gives you access to the incredible Customer Experience teams that have been the foundation of WP Engine and StudioPress. You will be able to build with confidence, knowing that you have extensive documentation and 24/7 support available.', 'genesis-blocks' ); ?></p>
						</div>
						<div>
							<h2><?php esc_html_e( 'Do even more with Genesis', 'genesis-blocks' ); ?></h2>
							<p><?php esc_html_e( 'With Genesis Pro, you get access to the entire suite of Genesis products and all of their advanced feature sets.', 'genesis-blocks' ); ?></p>
						</div>
					</div>
					<div class="gen-feature-table">
						<div class="gen-feature-table--col">
							<h3><?php esc_html_e( 'Get more with Genesis Pro', 'genesis-blocks' ); ?></h3>
							<ul>
								<li><?php esc_html_e( 'Advanced Features for Genesis Blocks', 'genesis-blocks' ); ?></li>
								<li><?php esc_html_e( 'Genesis Framework', 'genesis-blocks' ); ?></li>
								<li><?php esc_html_e( 'StudioPress Themes', 'genesis-blocks' ); ?></li>
								<li><?php esc_html_e( '24/7 Support', 'genesis-blocks' ); ?></li>
							</ul>
							<a class="btn" target="_blank" rel="noopener noreferrer" style="margin-top: auto;" href="https://www.studiopress.com/genesis-pro/"><?php esc_html_e( 'Learn more', 'genesis-blocks' ); ?></a>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
