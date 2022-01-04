<?php
/**
 * Module Unit Tests
 *
 * @since 1.0.0
 * @package Genesis\Blocks\BlockLoader\Tests
 */

declare(strict_types=1);
namespace Genesis\Blocks\BlockLoader\Tests;

use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use Brain\Monkey\Functions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Genesis\Blocks\BlockLoader\Module;
use Genesis\Blocks\BlockLoader\ManualRequire;

/**
 * Tests the BlockLoader Module.
 *
 * @since 1.0.0
 * @package Genesis\Blocks\BlockLoader\Tests
 */
final class ManualRequireTest extends TestCase {
	// Adds Mockery expectations to the PHPUnit assertions count.
	// See https://giuseppe-mazzapica.gitbook.io/brain-monkey/functions-testing-tools/functions-setup#phpunit-example.
	use MockeryPHPUnitIntegration;

	/**
	 * An instance of the BlockLoader module.
	 *
	 * @since 0.2.0
	 * @var Module
	 */
	protected $module;

	/**
	 * Sets up tests.
	 *
	 * @since 1.0.0
	 */
	protected function setUp(): void {
		parent::setUp();
		Monkey\setUp();

		Functions\stubs(
			[
				'__',
			]
		);

		$this->module = new ManualRequire(
			[
				'url'     => 'https://example.com/wp-content/plugins/genesis-blocks/',
				'path'    => dirname( dirname( dirname( dirname( __FILE__ ) ) ) ) . '/',
				'version' => 1,
				'theme'   => 'unknown',
			]
		);
	}

	/**
	 * Tests init adds the expected actions.
	 *
	 * @since 0.2.0
	 */
	public function testInitAddsActions(): void {
		$this->module->init();

		$this->assertTrue(
			has_action(
				'init',
				'genesis_blocks_block_assets'
			)
		);

		$this->assertTrue(
			has_action(
				'enqueue_block_editor_assets',
				'genesis_blocks_editor_assets'
			)
		);

		$this->assertTrue(
			has_action(
				'wp_enqueue_scripts',
				'genesis_blocks_frontend_assets'
			)
		);

		if ( class_exists( 'WP_Block_Editor_Context' ) ) {
			$this->assertTrue(
				has_filter(
					'block_categories_all',
					'genesis_blocks_add_custom_block_category'
				)
			);
		} else {
			$this->assertTrue(
				has_filter(
					'block_categories',
					'genesis_blocks_add_custom_block_category'
				)
			);
		}
	}

	/**
	 * Tears down tests.
	 *
	 * Ensures Brain Monkey `expect()` results are evaluated.
	 *
	 * @since 0.2.0
	 */
	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}
}
