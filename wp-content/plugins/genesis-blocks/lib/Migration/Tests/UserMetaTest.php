<?php
/**
 * Module Unit tests.
 *
 * @since 1.1.0
 * @package Genesis\Blocks\Migration\Tests
 */

declare(strict_types=1);
namespace Genesis\Blocks\Migration\Tests;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use Brain\Monkey\Functions;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Genesis\Blocks\Migration\UserMeta;

/**
 * Class UserMetaTest
 *
 * @package Genesis\Blocks\Tests
 */
final class UserMetaTest extends TestCase {

	use MockeryPHPUnitIntegration;

	/**
	 * The instance to test.
	 *
	 * @since 1.1.0
	 * @var UserMeta
	 */
	protected $instance;

	/**
	 * Sets up tests.
	 *
	 * @since 1.1.0
	 */
	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		$this->instance = new UserMeta();
	}

	/**
	 * Tears down tests.
	 *
	 * @since 1.1.0
	 */
	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

	/**
	 * Tests migrate on success.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\UserMeta::migrate_user()
	 */
	public function test_migrate_success(): void {
		$old_user_meta = [
			0 => 'ab_layout_fake',
		];

		$new_user_meta = [
			0 => 'gb_layout_fake',
		];

		Functions\expect( 'get_user_meta' )
			->once()
			->with(
				1,
				UserMeta::AB_USER_META_KEY,
				true
			)
			->andReturn( $old_user_meta );

		Functions\expect( 'get_user_meta' )
			->once()
			->with(
				1,
				UserMeta::GB_USER_META_KEY,
				true
			)
			->andReturn( '' );

		Functions\expect( 'update_user_meta' )
			->once()
			->with(
				1,
				UserMeta::GB_USER_META_KEY,
				$new_user_meta
			)
			->andReturn( true );

		Functions\expect( 'delete_user_meta' )
			->once()
			->with(
				1,
				UserMeta::AB_USER_META_KEY
			)
			->andReturn( true );

		$this->instance->migrate_user( 1 );
	}
	/**
	 * Tests migrate when there is user meta.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\UserMeta::migrate_user()
	 */
	public function test_migrate_no_user_meta_to_migrate(): void {
		$old_user_meta = '';

		Functions\expect( 'get_user_meta' )
			->once()
			->with(
				1,
				UserMeta::AB_USER_META_KEY,
				true
			)
			->andReturn( $old_user_meta );

		Functions\expect( 'update_user_meta' )
			->never();

		$this->assertTrue( $this->instance->migrate_user( 1 ) );
	}

	/**
	 * Tests migrate when it doesn't update the user meta.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\UserMeta::migrate_user()
	 */
	public function test_migrate_user_meta_not_updated(): void {
		$old_user_meta = [
			0 => 'ab_layout_fake',
		];

		Functions\stubs( [ '__' => '' ] );

		Functions\expect( 'get_user_meta' )
			->once()
			->with(
				1,
				UserMeta::AB_USER_META_KEY,
				true
			)
			->andReturn( $old_user_meta );

			Functions\expect( 'get_user_meta' )
			->once();

		Functions\expect( 'update_user_meta' )
			->once()
			->andReturn( false );

		Functions\expect( 'delete_user_meta' )
			->never();

		$this->assertEquals( 'WP_Error', get_class( $this->instance->migrate_user( 1 ) ) );
	}

	/**
	 * Tests migrate when it doesn't delete the old user meta.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\UserMeta::migrate_user()
	 */
	public function test_migrate_not_deleted(): void {
		$old_user_meta = [
			0 => 'ab_layout_fake',
		];

		$new_user_meta = [
			0 => 'gb_layout_fake',
		];

		Functions\expect( 'get_user_meta' )
			->once()
			->with(
				1,
				UserMeta::AB_USER_META_KEY,
				true
			)
			->andReturn( $old_user_meta );

		Functions\expect( 'get_user_meta' )
			->once();

		Functions\expect( 'update_user_meta' )
			->once()
			->with(
				1,
				UserMeta::GB_USER_META_KEY,
				$new_user_meta
			)
			->andReturn( true );

		Functions\expect( 'delete_user_meta' )
			->once()
			->andReturn( false );

		$this->assertFalse( $this->instance->migrate_user( 1 ) );
	}

	/**
	 * Tests migrating multiple users successfully.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\UserMeta::migrate_all()
	 * @runInSeparateProcess
	 */
	public function test_migrate_all_success(): void {
		Mockery::mock( 'overload:WP_Error' )
			->shouldReceive( 'has_errors' )
			->andReturn( false );

		Functions\stubs(
			[
				// Simulate one user with data to migrate.
				// First call gives a mocked user, second call gives none
				// so that the while loop in migrate_all() ends.
				'get_users' => function() {
					static $first_time = true;
					if ( $first_time ) {
						$user       = Mockery::mock( 'WPUser' );
						$user->ID   = 1;
						$first_time = false;
						return [ $user ];
					}
					return [];
				},
			]
		);

		Functions\expect( 'get_user_meta' )
			->twice()
			->andReturn( [ 'gb_section_hero_1' ] );

		Functions\expect( 'update_user_meta' )
			->once()
			->andReturn( true );

		Functions\expect( 'delete_user_meta' )
			->once()
			->andReturn( true );

		$this->assertEquals(
			[
				'successCount' => 1,
				'errorCount'   => 0,
			],
			$this->instance->migrate_all()
		);
	}

	/**
	 * Tests migrating multiple users where all migrations fail.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\UserMeta::migrate_all()
	 * @runInSeparateProcess
	 */
	public function test_migrate_all_failure(): void {
		Mockery::mock( 'overload:WP_Error' )
			->shouldReceive(
				[
					'add'               => true,
					'get_error_code'    => 'update_user_meta_failed',
					'get_error_message' => '',
				]
			);

		Functions\stubs(
			[
				// Simulate 21 users with data to migrate.
				// First call gives 21 mocked users, second call gives none so
				// that the while loop in migrate_all() ends.
				// The expectation for update_user_meta below ensures migrate_user()
				// fails for all users, simulating a fail condition that exceeds
				// the max_allowed_errors of 20.
				'get_users' => function() {
					static $first_time = true;
					if ( $first_time ) {
						$user       = Mockery::mock( 'WPUser' );
						$user->ID   = 1;
						$first_time = false;
						return array_fill( 0, 20, $user );
					}
					return [];
				},
				'__'        => '',
			]
		);

		Functions\expect( 'get_user_meta' )
			->andReturn( [ 'gb_section_hero_1' ] );

		Functions\expect( 'update_user_meta' )
			->andReturn( false );

		$this->assertEquals( 'WP_Error', get_class( $this->instance->migrate_all() ) );
	}
}

