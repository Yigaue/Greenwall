<?php
/**
 * Genesis Analytics Asset Manager
 * Responsible for enqueueing GA scripts.
 *
 * @package Genesis\Blocks\Analytics
 * @since   1.3.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Analytics;

/**
 * Asset Manager Class
 *
 * @since 1.3.0
 */
final class AssetManager {
	/**
	 * Plugin context.
	 *
	 * @since 1.3.0
	 * @var array
	 */
	private $context;

	/**
	 * Class Constructor.
	 *
	 * @since 1.3.0
	 * @param array $context Plugin context.
	 */
	public function __construct( array $context ) {
		$this->context = $context;
	}

	/**
	 * Initializes this class
	 *
	 * @since 1.3.0
	 */
	public function init(): void {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_ga_script' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_ga_client_script' ) );
	}

	/**
	 * Enqueues Google Analytics Script
	 * Checks if either the new genesis_blocks_analytics_opt_in option is set
	 *   or if the old genesis_page_builder_analytics_opt_in option is set.
	 *
	 * @since 1.3.0
	 */
	public function enqueue_ga_script(): void {
		// Get the current opt in setting first
		$ga_opt_in = filter_var( get_option( 'genesis_blocks_analytics_opt_in', false ), FILTER_VALIDATE_BOOLEAN );

		if ( ! $ga_opt_in ) {
			// Get the Old GBP opt in setting
			$ga_opt_in = filter_var( get_option( 'genesis_page_builder_analytics_opt_in', false ), FILTER_VALIDATE_BOOLEAN );
		}

		// If the user still hasn't opted in, return void early
		if ( ! $ga_opt_in ) {
			return;
		}

		wp_enqueue_script(
			'genesis-analytics#async',
			'https://www.googletagmanager.com/gtag/js?id=UA-17364082-14',
			array(),
			filemtime( $this->context['path'] . 'dist/blocks.build.js' ),
			false
		);

		wp_localize_script(
			'genesis-analytics#async',
			'genesisAnalyticsConfig',
			array( 'ga_opt_in' => 1 )
		);
	}

	/**
	 * Enqueue the Genesis Analytics Client script
	 *
	 * @since 1.3.0
	 */
	public function enqueue_ga_client_script(): void {
		$file_path = 'lib/Analytics/js/gaClient.js';
		wp_enqueue_script(
			'genesis-analytics-client',
			$this->context['url'] . $file_path,
			array(),
			filemtime( $this->context['path'] . $file_path ),
			false
		);
	}

}
