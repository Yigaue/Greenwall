<?php
/**
 * Genesis Blocks setting migration.
 *
 * @package Genesis\Blocks\Migration
 * @since   1.1.0
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://github.com/studiopress/genesis-blocks/
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration;

/**
 * Migrates the setting.
 *
 * @since 1.1.0
 */
class Setting {
	/**
	 * The previous setting name.
	 *
	 * @var string
	 */
	const PREVIOUS_NAME = 'atomic_blocks_mailchimp_api_key';

	/**
	 * The new setting name to migrate to.
	 *
	 * @var string
	 */
	const NEW_NAME = 'genesis_blocks_mailchimp_api_key';

	/**
	 * Migrates the setting.
	 *
	 * @since 1.1.0
	 * @return bool Whether the migration succeeded.
	 */
	public function migrate(): bool {
		$option_value_to_migrate = get_option( self::PREVIOUS_NAME );

		if ( empty( $option_value_to_migrate ) ) {
			return true;
		}

		$new_option_initial_value = get_option( self::NEW_NAME );
		$was_updated              = update_option( self::NEW_NAME, $option_value_to_migrate );

		// update_option will return false if it's already set to that value.
		if ( ! $was_updated && $new_option_initial_value !== $option_value_to_migrate ) {
			return false;
		}

		return delete_option( self::PREVIOUS_NAME );
	}

	/**
	 * Migrates the Genesis Blocks Pro settings.
	 *
	 * @since 1.1.2
	 * @return bool
	 */
	public function migrate_pro_settings(): bool {
		$permissions = (array) get_option( 'genesis_page_builder_block_settings_permissions', [] );
		if ( empty( $permissions ) ) {
			return true;
		}

		$new_permissions = $this->migrate_permissions_data( $permissions );

		return update_option( 'genesis_page_builder_block_settings_permissions', $new_permissions );
	}

	/**
	 * Migrates the old settings data to the new format.
	 *
	 * @since 1.1.2
	 * @param array $permissions The permissions data array from Atomic Blocks.
	 * @return array
	 */
	public function migrate_permissions_data( array $permissions ): array {
		if ( empty( $permissions ) ) {
			return [];
		}

		$new_permissions = [];
		foreach ( $permissions as $block_name => $block_settings ) {
			$new_block_name     = $this->migrate_block_name( $block_name );
			$new_block_settings = [];

			foreach ( $block_settings as $block_setting_name => $roles ) {
				$new_setting_name                        = $this->migrate_setting_name( $block_setting_name );
				$new_block_settings[ $new_setting_name ] = $roles;
			}
			$new_permissions[ $new_block_name ] = $new_block_settings;
		}

		return $new_permissions;
	}

	/**
	 * Migrates the block name to the new format.
	 *
	 * @since 1.1.2
	 * @param string $block_name The block name to migrate.
	 * @return string
	 */
	private function migrate_block_name( string $block_name ): string {
		// If this is a Page Builder block, return the name as is. We did not rename those blocks.
		if ( false !== strpos( 'genesis-page-builder/', $block_name ) ) {
			return $block_name;
		}

		// The newsletter block didn't follow the existing naming convention, so we target it specifically.
		if ( false !== strpos( 'atomic-blocks/newsletter', $block_name ) ) {
			return 'genesis-blocks/gb-newsletter';
		}

		return str_replace( 'atomic-blocks/ab', 'genesis-blocks/gb', $block_name );
	}

	/**
	 * Migrates the block setting name to the new format.
	 *
	 * @since 1.1.2
	 * @param string $setting_name The block setting name to migrate.
	 * @return string
	 */
	private function migrate_setting_name( string $setting_name ): string {
		return preg_replace( [ '/^ab_/' ], [ 'gb_' ], $setting_name );
	}
}
