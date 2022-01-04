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
use Genesis\Blocks\Migration\Api;

/**
 * Class ApiTest
 *
 * @package Genesis\Blocks\Tests
 */
final class ApiTest extends TestCase {

	use MockeryPHPUnitIntegration;

	/**
	 * The instance to test.
	 *
	 * @since 1.1.0
	 * @var Api
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
		Functions\stubs(
			[
				'__',
			]
		);

		$this->instance = new Api();
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
	 * Tests that the actions are added.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::init()
	 */
	public function test_init(): void {
		Functions\expect( 'add_action' )
			->once()
			->with(
				'rest_api_init',
				[ $this->instance, 'register_route_migrate_setting' ]
			);

		$this->instance->init();
	}

	/**
	 * Tests that the setting route is registered.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::register_route_migrate_setting()
	 */
	public function test_register_route_migrate_setting(): void {
		Functions\expect( 'register_rest_route' )
			->once()
			->with(
				'genesis-blocks',
				'migrate-settings',
				Mockery::subset( [ 'methods' => 'POST' ] )
			);

		$this->instance->register_route_migrate_setting();
	}

	/**
	 * Tests that the Pro setting route is registered.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::register_route_migrate_setting()
	 */
	public function test_register_route_migrate_pro_setting(): void {
		Functions\expect( 'register_rest_route' )
			->once()
			->with(
				'genesis-blocks',
				'migrate-pro-settings',
				Mockery::subset( [ 'methods' => 'POST' ] )
			);

		$this->instance->register_route_migrate_setting();
	}

	/**
	 * Tests that the user meta route is registered.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::register_route_migrate_user_meta()
	 */
	public function test_register_route_migrate_user_meta(): void {
		Functions\expect( 'register_rest_route' )
			->once()
			->with(
				'genesis-blocks',
				'migrate-user-meta',
				Mockery::subset( [ 'methods' => 'POST' ] )
			);

		$this->instance->register_route_migrate_user_meta();
	}

	/**
	 * Tests the migration cleanup route is registered.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::register_route_migration_cleanup()
	 */
	public function test_register_route_migration_cleanup(): void {
		Functions\expect( 'register_rest_route' )
			->once()
			->with(
				'genesis-blocks',
				'migrate-cleanup',
				Mockery::subset( [ 'methods' => 'POST' ] )
			);

		$this->instance->register_route_migration_cleanup();
	}

	/**
	 * Tests the setting migration response on success.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::get_migrate_setting_response()
	 */
	public function test_get_migrate_setting_response_on_success(): void {
		Functions\expect( 'get_option' )
			->once()
			->andReturn( 'abcd-efg' );

		Functions\expect( 'get_option' )
			->once();

		Functions\expect( 'update_option' )
			->once()
			->andReturn( true );

		Functions\expect( 'delete_option' )
			->once()
			->andReturn( true );

		Functions\expect( 'rest_ensure_response' )
			->once()
			->with( [ 'success' => true ] );

		$this->instance->get_migrate_setting_response();
	}

	/**
	 * Tests the Pro setting migration response on success.
	 *
	 * @since 1.1.1
	 * @covers Genesis\Blocks\Migration\Api::get_migrate_setting_response()
	 */
	public function test_get_migrate_pro_setting_response_on_success(): void {
		$old_settings = include __DIR__ . '/fixtures/settings/pro-block-settings-permissions.php';

		Functions\expect( 'get_option' )
			->once()
			->andReturn( $old_settings );

		Functions\expect( 'update_option' )
			->once()
			->andReturn( true );

		Functions\expect( 'rest_ensure_response' )
			->once()
			->with( [ 'success' => true ] );

		$this->instance->get_migrate_pro_setting_response();
	}

	/**
	 * Tests the user meta migration response on success.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::get_migrate_user_meta_response()
	 * @runInSeparateProcess
	 */
	public function test_get_migrate_user_response_on_success(): void {
		Mockery::mock( 'overload:\Genesis\Blocks\Migration\UserMeta' )
			->shouldReceive( 'migrate_all' )
			->andReturn(
				[
					'successCount' => 1,
					'failureCount' => 0,
				]
			);

		Functions\expect( 'rest_ensure_response' )
			->once();

		$this->instance->get_migrate_user_meta_response();
	}

	/**
	 * Tests the setting migration response on failure.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::get_migrate_setting_response()
	 */
	public function test_get_migrate_setting_response_on_failure(): void {
		Functions\expect( 'get_option' )
			->once()
			->andReturn( 'abcd-efg' );

		Functions\expect( 'get_option' )
			->once();

		Functions\expect( 'update_option' )
			->once()
			->andReturn( false );

		Mockery::mock( 'WP_Error' );

		$this->assertEquals( 'WP_Error', get_class( $this->instance->get_migrate_setting_response() ) );
	}

	/**
	 * Tests the user meta migration response on failure.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::get_migrate_user_meta_response()
	 * @runInSeparateProcess
	 */
	public function test_get_migrate_user_meta_response_on_failure(): void {
		Mockery::mock( 'WP_Error' );

		Mockery::mock( 'overload:\Genesis\Blocks\Migration\UserMeta' )
			->shouldReceive( 'migrate_all' )
			->andReturn( new \WP_Error() );

		$this->assertEquals( 'WP_Error', get_class( $this->instance->get_migrate_user_meta_response() ) );
	}

	/**
	 * Tests the migration cleanup process and response.
	 *
	 * @since 1.1.0
	 * @covers Genesis\Blocks\Migration\Api::get_migration_cleanup_response()
	 */
	public function test_get_migration_cleanup_response(): void {
		Functions\expect( 'delete_option' )
			->twice();

		Functions\expect( 'update_option' )
			->once();

		Functions\expect( 'deactivate_plugins' )
			->once();

		Functions\expect( 'rest_ensure_response' )
			->once()
			->with( [ 'success' => true ] );

		Functions\expect( 'genesis_blocks_is_pro' )
			->once();

		$this->instance->get_migration_cleanup_response();
	}
}
