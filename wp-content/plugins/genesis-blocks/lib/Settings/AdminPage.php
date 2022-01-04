<?php
/**
 * Genesis Blocks admin page.
 *
 * @package Genesis\Blocks\Settings
 * @since   1.0.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Settings;

/**
 * Admin Page Class
 *
 * @since 1.0.0
 */
final class AdminPage {
	/**
	 * Page Title
	 *
	 * @since 1.0.0
	 * @var string
	 */
	private $page_title;

	/**
	 * Menu Title
	 *
	 * @since 1.0.0
	 * @var string
	 */
	private $menu_title;

	/**
	 * Plugin context, such as path and url.
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private $context;

	/**
	 * The slug of the parent menu.
	 *
	 * @var string
	 */
	const PARENT_MENU_SLUG = 'genesis-blocks-getting-started';

	/**
	 * The slug of the settings submenu.
	 *
	 * @var string
	 */
	const SETTINGS_SUBMENU_SLUG = 'genesis-blocks-settings';

	/**
	 * Constructs the AdminPage class.
	 *
	 * @since 1.0.0
	 * @param array $context Plugin context.
	 */
	public function __construct( array $context ) {
		$this->page_title = __( 'Genesis', 'genesis-blocks' );
		$this->menu_title = __( 'Genesis Blocks', 'genesis-blocks' );
		$this->context    = $context;
	}

	/**
	 * Initializes the admin page.
	 *
	 * @since 1.0.0
	 */
	public function init(): void {
		add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
		add_action( 'load-genesis-blocks_page_' . self::SETTINGS_SUBMENU_SLUG, [ $this, 'load_admin_scripts' ] );
		add_action( 'load-toplevel_page_' . self::PARENT_MENU_SLUG, [ $this, 'enqueue_shared_admin_styles' ] );
		add_action( 'load-toplevel_page_' . self::PARENT_MENU_SLUG, [ $this, 'hide_admin_notices' ] );
		add_filter( 'admin_body_class', [ $this, 'add_body_class' ] );
	}

	/**
	 * Loads admin JavaScript.
	 *
	 * @since 1.0.0
	 */
	public function load_admin_scripts(): void {
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_scripts' ] );
	}

	/**
	 * Adds the admin menu
	 *
	 * @since 1.0.0
	 */
	public function add_admin_menu(): void {
		$menu_position_above_appearance = 59;

		$genesis_icon_encoded = require "{$this->context['path']}lib/Settings/assets/images/genesis-icon-encoded.php";

		/*
		 * Adds the top-level Genesis Blocks menu item.
		 */
		add_menu_page(
			$this->page_title,
			$this->menu_title,
			'manage_options',
			self::PARENT_MENU_SLUG,
			[ $this, 'render_getting_started_page' ],
			$genesis_icon_encoded,
			$menu_position_above_appearance
		);

		/*
		 * Adds the Getting Started submenu page.
		 */
		add_submenu_page(
			self::PARENT_MENU_SLUG,
			esc_html__( 'Getting Started with Genesis Blocks', 'genesis-blocks' ),
			esc_html__( 'Getting Started', 'genesis-blocks' ),
			'manage_options',
			self::PARENT_MENU_SLUG,
			[ $this, 'render_getting_started_page' ]
		);

		/*
		 * Adds the Settings submenu page.
		 */
		add_submenu_page(
			self::PARENT_MENU_SLUG,
			esc_html__( 'Genesis Blocks Settings', 'genesis-blocks' ),
			esc_html__( 'Settings', 'genesis-blocks' ),
			'manage_options',
			self::SETTINGS_SUBMENU_SLUG,
			[ $this, 'render' ]
		);

	}

	/**
	 * Enqueues the admin page scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts(): void {
		$dependencies = require $this->context['path'] . 'lib/Settings/js/build/app.asset.php';

		wp_enqueue_media(); // For the image field.

		wp_enqueue_script(
			'genesis-blocks-settings-app',
			$this->context['url'] . 'lib/Settings/js/build/app.js',
			$dependencies['dependencies'],
			$dependencies['version'],
			true
		);

		wp_localize_script(
			'genesis-blocks-settings-app',
			'genesisBlocksSettingsData',
			$this->get_settings_sections( 'genesis_blocks_global_settings' )
		);

		$this->enqueue_shared_admin_styles();
	}

	/**
	 * Enqueues the styles shared between the admin pages.
	 *
	 * @since 1.1.0
	 */
	public function enqueue_shared_admin_styles(): void {
		wp_enqueue_style(
			'genesis-blocks-getting-started-style',
			$this->context['url'] . 'lib/Settings/assets/css/admin.css',
			[ 'wp-components' ],
			$this->context['version'],
			'all'
		);
	}

	/**
	 * Hide admin notices on the Getting started page.
	 *
	 * @since 1.0.0
	 */
	public function hide_admin_notices(): void {
		// Remove all admin notices on the getting started page.
		if ( filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING ) === 'genesis-blocks-getting-started' ) {
			remove_all_actions( 'admin_notices' );
		}
	}

	/**
	 * Adds a body class to all Genesis Blocks menu pages.
	 *
	 * @since 1.4.0
	 * @param string $classes The body classes.
	 * @return string The filtered body classes.
	 */
	public function add_body_class( $classes ): string {
		$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING );
		if ( is_string( $page ) && 0 === strpos( $page, 'genesis-blocks-' ) ) {
			$additional_class = 'genesis-blocks-admin-page';
			return esc_attr(
				empty( $classes ) ? $additional_class : "{$classes} {$additional_class}"
			);
		}

		return $classes;
	}

	/**
	 * Renders the admin page.
	 *
	 * @since 1.0.0
	 */
	public function render(): void {
		require "{$this->context['path']}lib/Settings/views/admin/app.php";
	}

	/**
	 * Renders the Genesis Getting Started admin page.
	 *
	 * @since 1.0.0
	 */
	public function render_getting_started_page(): void {
		require "{$this->context['path']}lib/Settings/views/admin/getting-started.php";
	}

	/**
	 * Based on the do_settings_sections function in WordPress core (see: https://github.com/WordPress/WordPress/blob/5.4.1/wp-admin/includes/template.php#L1630),
	 * this function returns an array of all settings sections for a particular settings page.
	 * The array here is formatted the way the Genesis Blocks React Settings App intends.
	 *
	 * Part of the Settings API. Use this to format an array of
	 * the sections and fields that were added to any settings page via
	 * add_settings_section() and add_settings_field()
	 *
	 * @global $wp_settings_sections Storage array of all settings sections added to admin pages.
	 * @global $wp_settings_fields Storage array of settings fields and info about their pages/sections.
	 * @since 1.0.0
	 *
	 * @param  array $page The slug name of the page whose settings sections you want to output.
	 * @return array
	 */
	public function get_settings_sections( $page ) : array {
		global $wp_settings_sections, $wp_settings_fields;

		$settings_sections = [
			'settings' => [],
			'sections' => [],
		];

		if ( ! isset( $wp_settings_sections[ $page ] ) ) {
			return $settings_sections;
		}

		$sections = $wp_settings_fields[ $page ];

		foreach ( $sections as $section => $fields ) {
			$settings_sections['sections'][ $section ] = [
				'name'   => $section,
				'title'  => $wp_settings_sections[ $page ][ $section ]['title'],
				'fields' => $this->process_fields( $fields ),
			];

			$settings_sections['settings'] = array_merge(
				$settings_sections['settings'],
				$this->get_settings( $fields )
			);
		}

		return $settings_sections;
	}

	/**
	 * Processes field data for use with the React settings application.
	 *
	 * Takes an array with structure `['id'=>'', 'title'=>'', 'args'=>[]]`
	 * and returns `['id'=>'', 'label'=>'', 'help'=>'', ...args]`.
	 *
	 * @since 1.0.0
	 * @param mixed $fields The section fields from the `$wp_settings_fields` global.
	 * @return array Fields processed for use by the Genesis Blocks React settings application.
	 */
	private function process_fields( $fields ) {
		$processed = [];

		foreach ( $fields as $original ) {
			$new = [
				'id'    => $original['id'],
				'label' => $original['title'],
			];

			foreach ( $original['args'] as $arg_key => $arg_value ) {
				if ( 'description' === $arg_key ) {
					$new['help'] = $arg_value;
					continue;
				}
				$new[ $arg_key ] = $arg_value;
			}

			$processed[] = $new;
		}

		return $processed;
	}

	/**
	 * Gets settings values from field data.
	 *
	 * Extracts the current value of each field from the named `wp_option` if
	 * present, falling back to the default value if the field specifies one.
	 *
	 * @since 1.0.0
	 * @param mixed $fields The fields to retrieve settings data from.
	 * @return array Settings with option name as key, option value or default as value.
	 */
	private function get_settings( $fields ) {
		$settings = [];

		foreach ( $fields as $field ) {
			$settings[ $field['id'] ] = get_option( $field['id'] );
		}

		return $settings;
	}
}
