<?php
/**
 * Genesis Blocks block loader.
 *
 * @package Genesis\Blocks\BlockLoader
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\BlockLoader;

/**
 * Manual Require class.
 *
 * This module manually loads all the blocks and
 * related code like it was in the old AB plugin.
 * That is to avoid any additional refactoring
 * on top of the existing migration work.
 *
 * @since 1.0.0
 */
final class ManualRequire {
	/**
	 * Plugin context, such as path and url.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private $context;

	/**
	 * Constructs the ManualRequire class.
	 *
	 * @since 1.0.0
	 * @param array $context Plugin context.
	 */
	public function __construct( array $context ) {
		$this->context = $context;
	}

	/**
	 * Initializes the manual loading.
	 *
	 * @since 1.0.0
	 */
	public function init(): void {
		$this->require_files();
	}

	/**
	 * Loads the block files and related utilities.
	 */
	private function require_files(): void {
		$blocks_path   = $this->context['path'] . 'src/blocks/';
		$includes_path = $this->context['path'] . 'includes/';

		require_once $includes_path . 'load-scripts.php';

		require_once $blocks_path . 'block-container/index.php';
		require_once $blocks_path . 'block-sharing/index.php';
		require_once $blocks_path . 'block-post-grid/index.php';

		/**
		 * Load the newsletter block and related dependencies.
		 */
		if ( ! class_exists( '\DrewM\MailChimp\MailChimp' ) ) {
			require_once $this->context['path'] . 'lib/drewm/mailchimp-api/MailChimp.php';
		}

		require_once $blocks_path . 'block-newsletter/includes/exceptions/class-api-error-exception.php';
		require_once $blocks_path . 'block-newsletter/includes/exceptions/class-mailchimp-api-error-exception.php';
		require_once $blocks_path . 'block-newsletter/includes/interfaces/newsletter-provider-interface.php';
		require_once $blocks_path . 'block-newsletter/includes/classes/class-mailchimp.php';
		require_once $blocks_path . 'block-newsletter/includes/newsletter-functions.php';
		require_once $blocks_path . 'block-newsletter/index.php';

		/**
		 * Layout Component Registry.
		 */
		require_once $includes_path . 'layout/layout-functions.php';
		require_once $includes_path . 'layout/class-component-registry.php';
		require_once $includes_path . 'layout/register-layout-components.php';

		/**
		 * REST API Endpoints for Layouts.
		 */
		require_once $includes_path . 'layout/layout-endpoints.php';

		/**
		 * SVG Icon class and helper functions.
		 */
		require_once $includes_path . 'icons/class-genesisblocks-svg-icons.php';
		require_once $includes_path . 'icons/svg-icons.php';

		/**
		 * Block Deprecation Handlers.
		 */
		require_once $blocks_path . 'block-author-profile/deprecated/1.8.2/filter.php';

		/**
		 * Genesis Responsive Controls Handlers.
		 */
		require_once $blocks_path . 'responsive-controls/fonts.php';
	}
}
