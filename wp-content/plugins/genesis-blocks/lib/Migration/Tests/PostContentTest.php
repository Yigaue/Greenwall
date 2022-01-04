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
use Genesis\Blocks\Migration\PostContent;

/**
 * Class PostContentTest
 *
 * @package Genesis\Blocks\Migration\Tests
 */
final class PostContentTest extends TestCase {

	/**
	 * The instance to test.
	 *
	 * @since 1.1.0
	 * @var PostContent
	 */
	protected $instance;

	/**
	 * Sets up tests.
	 *
	 * @since 1.1.0
	 */
	protected function setUp(): void {
		$this->instance = new PostContent();
	}

	/**
	 * Tears down tests.
	 *
	 * @since 1.1.0
	 */
	protected function tearDown(): void {
		unset( $this->instance );
	}

	/**
	 * Tests that migrated content matches the expected output.
	 *
	 * @since 1.1.0
	 * @covers \Genesis\Blocks\Migration\Content::migrate_post_content()
	 */
	public function test_migrating_content_gives_expected_result(): void {
		$migrated_content = $this->instance->migrate_post_content( $this->get_original_test_content() );
		$this->assertSame( $migrated_content, $this->expected_content() );
	}

	/**
	 * Returns the HTML content to be migrated.
	 *
	 * @since 1.1.0
	 * @return string
	 */
	private function get_original_test_content(): string {
		return include __DIR__ . '/fixtures/content/test-content.php';
	}

	/**
	 * Returns the HTML content expected from the migration.
	 *
	 * @since 1.1.0
	 * @return string
	 */
	private function expected_content(): string {
		return include __DIR__ . '/fixtures/content/expected-test-content.php';
	}
}
