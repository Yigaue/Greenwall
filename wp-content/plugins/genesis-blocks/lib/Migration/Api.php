<?php
/**
 * Genesis Blocks migration API.
 *
 * @package Genesis\Blocks\Migration
 * @since   1.1.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration;

use WP_Error;

/**
 * Migrates the setting.
 *
 * @since 1.1.0
 */
class Api {
	/**
	 * Adds the actions.
	 *
	 * @since 1.1.0
	 */
	public function init(): void {
		add_action( 'rest_api_init', [ $this, 'register_route_migrate_setting' ] );
		add_action( 'rest_api_init', [ $this, 'register_route_migrate_content' ] );
		add_action( 'rest_api_init', [ $this, 'register_route_migrate_user_meta' ] );
		add_action( 'rest_api_init', [ $this, 'register_route_migration_cleanup' ] );
	}

	/**
	 * Registers the setting migration routes.
	 */
	public function register_route_migrate_setting(): void {
		register_rest_route(
			'genesis-blocks',
			'migrate-settings',
			[
				'methods'             => 'POST',
				'callback'            => [ $this, 'get_migrate_setting_response' ],
				'permission_callback' => function() {
					return current_user_can( 'manage_options' );
				},
			]
		);

		register_rest_route(
			'genesis-blocks',
			'migrate-pro-settings',
			[
				'methods'             => 'POST',
				'callback'            => [ $this, 'get_migrate_pro_setting_response' ],
				'permission_callback' => function () {
					return current_user_can( 'manage_options' );
				},
			]
		);
	}

	/**
	 * Gets the REST API response for migrating settings.
	 *
	 * @return WP_REST_Response|WP_Error A response on success, a WP_Error on failure.
	 */
	public function get_migrate_setting_response() {
		$was_migration_successful = ( new Setting() )->migrate();
		if ( $was_migration_successful ) {
			return rest_ensure_response( [ 'success' => true ] );
		}

		return new WP_Error( 'migration_failed', __( 'Settings migration failed', 'genesis-blocks' ) );
	}

	/**
	 * Runs the migration for the Pro plugin settings.
	 *
	 * @since 1.1.2
	 * @return bool
	 */
	public function get_migrate_pro_setting_response() {
		$was_migration_successful = ( new Setting() )->migrate_pro_settings();
		if ( $was_migration_successful ) {
			return rest_ensure_response( [ 'success' => true ] );
		}

		return new WP_Error( 'migration_failed', __( 'Pro settings migration failed', 'genesis-blocks' ) );
	}

	/**
	 * Registers the content migration route.
	 */
	public function register_route_migrate_content(): void {
		register_rest_route(
			'genesis-blocks',
			'migrate-content',
			[
				'methods'             => 'POST',
				'callback'            => [ $this, 'get_migrate_content_response' ],
				'permission_callback' => function() {
					return current_user_can( 'manage_options' );
				},
			]
		);
	}

	/**
	 * Gets the REST API response for migrating content.
	 *
	 * @return WP_REST_Response|WP_Error A response on success, a WP_Error on failure.
	 */
	public function get_migrate_content_response() {
		$migration_results = ( new PostContent() )->migrate_batch();
		if ( $migration_results ) {
			return rest_ensure_response(
				[
					'success' => true,
					'results' => $migration_results,
				]
			);
		}

		return new WP_Error( 'migration_failed', __( 'Content migration failed', 'genesis-blocks' ) );
	}

	/**
	 * Registers the user meta migration route.
	 */
	public function register_route_migrate_user_meta(): void {
		register_rest_route(
			'genesis-blocks',
			'migrate-user-meta',
			[
				'methods'             => 'POST',
				'callback'            => [ $this, 'get_migrate_user_meta_response' ],
				'permission_callback' => function() {
					return current_user_can( 'manage_options' );
				},
			]
		);
	}

	/**
	 * Gets the REST API response for migrating user meta.
	 *
	 * @return WP_REST_Response|WP_Error A response on success, a WP_Error on failure.
	 */
	public function get_migrate_user_meta_response() {
		$migration_result = ( new UserMeta() )->migrate_all();

		if ( is_wp_error( $migration_result ) ) {
			return $migration_result;
		}

		return rest_ensure_response(
			[
				'success' => true,
				'result'  => $migration_result,
			]
		);
	}

	/**
	 * Registers the migration cleanup route.
	 */
	public function register_route_migration_cleanup(): void {
		register_rest_route(
			'genesis-blocks',
			'migrate-cleanup',
			[
				'methods'             => 'POST',
				'callback'            => [ $this, 'get_migration_cleanup_response' ],
				'permission_callback' => function() {
					return current_user_can( 'manage_options' );
				},
			]
		);
	}

	/**
	 * Handles migration cleanup and sends the REST API response.
	 *
	 * `genesis_blocks_migrate_from_atomic_blocks` is deleted to prevent
	 * the admin notice prompting users to migrate from appearing after
	 * the migration.
	 *
	 * `genesis_blocks_migrated_from_atomic_blocks` is set to record that
	 * the migration completed. It helps prevent display of the Migrate
	 * menu item after the migration.
	 *
	 * @return WP_REST_Response Response indicating success.
	 */
	public function get_migration_cleanup_response() {
		if ( defined( 'ABSPATH' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php'; // Includes deactivate_plugins.
		}

		\delete_option( 'genesis_blocks_migrate_from_atomic_blocks' );
		\delete_option( 'genesis_blocks_has_content_to_migrate' );

		if ( genesis_blocks_is_pro() ) {
			\update_option( 'genesis_blocks_pro_migrated_from_genesis_blocks_pro', true );
		} else {
			\update_option( 'genesis_blocks_migrated_from_atomic_blocks', true );
		}

		\deactivate_plugins( 'atomic-blocks/atomicblocks.php', false, false );

		return rest_ensure_response(
			[
				'success' => true, // Assume success; `delete_option()` does not return truthful success state.
			]
		);
	}
}
