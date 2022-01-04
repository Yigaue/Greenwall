<?php
/**
 * Genesis Blocks user meta migration.
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
 * Class User_Meta.
 *
 * @since 1.1.0
 */
class UserMeta {
	/**
	 * The previous user meta key.
	 *
	 * @var string
	 *
	 * @since 1.1.0
	 */
	const AB_USER_META_KEY = 'atomic_blocks_favorite_layouts';

	/**
	 * The new user meta key.
	 *
	 * @var string
	 *
	 * @since 1.1.0
	 */
	const GB_USER_META_KEY = 'genesis_blocks_favorite_layouts';

	/**
	 * User_Meta constructor.
	 *
	 * @since 1.1.0
	 */
	public function __construct() {
		$this->new_user_meta_namespace = 'gb';
	}

	/**
	 * Migrates all of the users that have the meta key.
	 *
	 * @return array|WP_Error The result of the migration, or a WP_Error if it failed.
	 */
	public function migrate_all() {
		$success_count      = 0;
		$error_count        = 0;
		$errors             = new WP_Error();
		$max_allowed_errors = 20;
		$users              = $this->query_for_users();

		while ( ! empty( $users ) && $error_count < $max_allowed_errors ) {
			foreach ( $users as $user ) {
				if ( isset( $user->ID ) ) {
					$migrated_user_meta = $this->migrate_user( (int) $user->ID );
					if ( is_wp_error( $migrated_user_meta ) ) {
						$error_count++;
						$errors->add( $migrated_user_meta->get_error_code(), $migrated_user_meta->get_error_message() );
					} else {
						$success_count++;
					}
				}
			}

			$users = $this->query_for_users();
		}

		$is_success = $error_count < $max_allowed_errors;
		if ( ! $is_success ) {
			return $errors;
		}

		$results = [
			'successCount' => $success_count,
			'errorCount'   => $error_count,
		];

		if ( $errors->has_errors() ) {
			$results['errorMessage'] = $errors->get_error_message();
		}

		return $results;
	}

	/**
	 * Migrates the user meta for a single user.
	 *
	 * @param  int $user_id The ID of the user to convert.
	 * @since  1.1.0
	 * @return bool|WP_Error True if migration succeeded or nothing to migrate,
	 *                       false if update succeeded but delete failed,
	 *                       WP_Error if update failed.
	 */
	public function migrate_user( int $user_id ) {
		$user_meta = get_user_meta( $user_id, self::AB_USER_META_KEY, true );

		if ( is_array( $user_meta ) && count( $user_meta ) > 0 ) {
			foreach ( $user_meta as $idx => $entry ) {
				$user_meta[ $idx ] = substr_replace( $entry, $this->new_user_meta_namespace, 0, 2 );
			}

			$new_user_meta = get_user_meta( $user_id, self::GB_USER_META_KEY, true );

			if ( is_array( $new_user_meta ) && count( $new_user_meta ) > 0 ) {
				$user_meta = array_merge( $user_meta, $new_user_meta );
			}

			if ( update_user_meta(
				$user_id,
				self::GB_USER_META_KEY,
				$user_meta
			) ) {
				return delete_user_meta(
					$user_id,
					self::AB_USER_META_KEY
				);
			} else {
				return new WP_Error(
					'update_user_meta_failed',
					__( 'User meta could not be updated', 'genesis-blocks' )
				);
			}
		}

		return true;
	}

	/**
	 * Gets users that have Atomic Blocks user meta key.
	 *
	 * @return array The users that were found.
	 */
	public function query_for_users(): array {
		$query_limit = 10;

		$result = get_users(
			[
				// phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_key
				'meta_key' => self::AB_USER_META_KEY,
				'number'   => $query_limit,
			]
		);

		return is_array( $result ) ? $result : [];
	}
}
