<?php
/**
 * Genesis Analytics Admin Page
 * Handles settings registration.
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
 * Genesis Analytics Admin Page
 *
 * @since 1.3.0
 */
final class AdminPage {
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
	 * @since 1.4.0
	 */
	public function init(): void {
		add_action( 'init', [ $this, 'register_analytics_settings' ] );
		add_action( 'admin_init', [ $this, 'register_general_settings_section' ] );
		add_action( 'admin_init', [ $this, 'register_general_settings_heading' ], 1 );
		add_action( 'admin_init', [ $this, 'register_analytics_fields' ] );
	}

	/**
	 * Registers the General settings tab.
	 *
	 * @since 1.4.0
	 */
	public function register_general_settings_section(): void {
		add_settings_section(
			'genesis_blocks_settings_general_section',
			__( 'General', 'genesis-blocks' ),
			null, // Rendering is handled by React, not WordPress.
			'genesis_blocks_global_settings'
		);
	}

	/**
	 * Adds the General Settings tab heading.
	 *
	 * @since 1.4.0
	 */
	public function register_general_settings_heading(): void {
		add_settings_field(
			'genesis_blocks_general_intro',
			__( 'General Settings', 'genesis-blocks' ),
			null, // Rendering is handled by React, not WordPress.
			'genesis_blocks_global_settings',
			'genesis_blocks_settings_general_section',
			[
				// phpcs:ignore WordPress.WP.I18n.NoHtmlWrappedStrings -- passing to React to render.
				'content' => __( '<h2>General Settings</h2>', 'genesis-blocks' ),
				'type'    => 'html',
			]
		);
	}

	/**
	 * Registers the Analytics Opt In settings.
	 *
	 * @since 1.4.0
	 */
	public function register_analytics_settings(): void {
		register_setting(
			'genesis_blocks_analytics_settings',
			'genesis_blocks_analytics_opt_in',
			array(
				'type'              => 'string',
				'sanitize_callback' => 'sanitize_text_field',
				'show_in_rest'      => true,
				'default'           => '0',
			)
		);
	}

	/**
	 * Registers form fields for the Analytics Opt In setting.
	 *
	 * @since 1.4.0
	 */
	public function register_analytics_fields(): void {
		add_settings_field(
			'genesis_blocks_analytics_opt_in',
			__( 'Analytics', 'genesis-blocks' ),
			null, // Rendering is handled by React, not WordPress.
			'genesis_blocks_global_settings',
			'genesis_blocks_settings_general_section',
			[
				'class'   => 'gb-inline-radio',
				'help'    => __( 'Opt into anonymous usage tracking to help us make Genesis Blocks better.', 'genesis-blocks' ),
				'type'    => 'radio',
				'options' => [
					'1' => __( 'Enabled', 'genesis-blocks' ),
					'0' => __( 'Disabled', 'genesis-blocks' ),
				],
			]
		);
	}
}
