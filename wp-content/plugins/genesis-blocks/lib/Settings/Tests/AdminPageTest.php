<?php
/**
 * Module Unit Tests
 *
 * @since 1.0.0
 * @package Genesis\Blocks\GlobalSettings\Tests
 */

declare(strict_types=1);
namespace Genesis\Blocks\Settings\Tests;

use PHPUnit\Framework\TestCase;
use ReflectionObject;
use Brain\Monkey;
use Brain\Monkey\Functions;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Genesis\Blocks\Settings\AdminPage;

/**
 * Tests the AdminPage Class.
 *
 * @since 1.0.0
 * @package Genesis\Blocks\GlobalSettings\Tests
 */
final class AdminPageTest extends TestCase {
	// Adds Mockery expectations to the PHPUnit assertions count.
	// See https://giuseppe-mazzapica.gitbook.io/brain-monkey/functions-testing-tools/functions-setup#phpunit-example.
	use MockeryPHPUnitIntegration;

	/**
	 * An instance of the AdminPage class.
	 *
	 * @since 1.0.0
	 * @var AdminPage
	 */
	protected $admin_page;

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

		$this->admin_page = new AdminPage(
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
	 * @since 1.0.0
	 */
	public function testInitAddsActions(): void {
		$this->admin_page->init();

		$this->assertTrue(
			has_action(
				'admin_menu',
				get_class( $this->admin_page ) . '->add_admin_menu()'
			)
		);
		$this->assertTrue(
			has_filter(
				'admin_body_class',
				get_class( $this->admin_page ) . '->add_body_class()'
			)
		);
	}

	/**
	 * Tests an Admin Menu is added.
	 *
	 * @throws Monkey\Expectation\Exception\ExpectationArgsRequired For a non-accessible property.
	 * @since 1.0.0
	 */
	public function testSettingsMenusAndPagesAreProperlySetUp(): void {
		$reflection = new ReflectionObject( $this->admin_page );
		$property   = $reflection->getProperty( 'context' );
		$property->setAccessible( true );
		$context = $property->getValue( $this->admin_page );

		Functions\expect( 'add_menu_page' )
			->once()
			->with(
				'Genesis',
				'Genesis Blocks',
				'manage_options',
				'genesis-blocks-getting-started',
				[ $this->admin_page, 'render_getting_started_page' ],
				require "{$context['path']}lib/Settings/assets/images/genesis-icon-encoded.php",
				59
			);
		Functions\expect( 'add_submenu_page' )->times( 2 );
		Functions\expect( 'esc_html__' )->times( 4 );
		$this->admin_page->add_admin_menu();
	}

	/**
	 * Tests the get_settings_sections method for a non existent page returns the expected results.
	 *
	 * @since 1.0.0
	 */
	public function testGetSettingsSectionsNoPage(): void {

		$expected = [
			'settings' => [],
			'sections' => [],
		];
		$actual   = $this->admin_page->get_settings_sections( 'not_an_actual_page' );
		$this->assertSame( $expected, $actual );
	}

	/**
	 * Tests admin scripts are enqueued.
	 *
	 * @since 1.0.0
	 */
	public function testAdminScriptsAreEnqueued(): void {
		Functions\expect( 'wp_enqueue_media' )->once();
		Functions\expect( 'wp_enqueue_script' )->once();
		Functions\expect( 'wp_enqueue_style' )->once();
		Functions\expect( 'wp_localize_script' )->once();

		$this->admin_page->enqueue_admin_scripts();
	}

	/**
	 * Gets the data for testAddBodyClass().
	 *
	 * @return mixed[][] The test data.
	 */
	public function getAddBodyClassData() {
		return [
			[ null, 'wp-admin wp-core-ui', 'wp-admin wp-core-ui' ],
			[ 'other-plugin', 'wp-admin wp-core-ui', 'wp-admin wp-core-ui' ],
			[ 'genesis-blocks-getting-started', 'wp-admin wp-core-ui', 'wp-admin wp-core-ui genesis-blocks-admin-page' ],
			[ 'genesis-blocks-settings', 'wp-admin wp-core-ui', 'wp-admin wp-core-ui genesis-blocks-admin-page' ],
			[ 'genesis-blocks-settings', '', 'genesis-blocks-admin-page' ],
		];
	}

	/**
	 * Tests that add_body_class() adds the class when it should.
	 *
	 * @since 1.4.0
	 * @dataProvider getAddBodyClassData
	 * @throws Monkey\Expectation\Exception\ExpectationArgsRequired For Functions\expect()->with().
	 *
	 * @param mixed  $page The page query arg.
	 * @param string $initial_classes The classes passed to the filter.
	 * @param string $expected The expected return value of the filter.
	 */
	public function testAddBodyClass( $page, $initial_classes, $expected ): void {
		Functions\stubs( [ 'esc_attr' ] );
		Functions\expect( 'filter_input' )
			->once()
			->with(
				INPUT_GET,
				'page',
				FILTER_SANITIZE_STRING
			)
			->andReturn( $page );

		$this->assertEquals( $expected, $this->admin_page->add_body_class( $initial_classes ) );
	}

	/**
	 * Tests the get_settings_sections method returns the expected results.
	 *
	 * @since 1.0.0
	 */
	public function testGetSettingsSections(): void {
		// Populate the WordPress Globals.
		global $wp_settings_sections, $wp_settings_fields;

		// Since WordPress does not exist for this test, we will populate this WordPress global manually.
		$wp_settings_sections = [ //phpcs:ignore
			'genesis_blocks_global_settings' => [
				'genx_settings_custom_scripts_section' => [
					'id'    => 'genx_settings_custom_scripts_section',
					'title' => 'Custom Scripts',
				],
				'genx_open_graph_settings'             => [
					'id'    => 'genx_open_graph_settings',
					'title' => 'Open Graph',
				],
			],
		];

		// Since WordPress does not exist for this test, we will populate this WordPress global manually.
		$wp_settings_fields = [ //phpcs:ignore
			'genesis_blocks_global_settings' => [
				'genx_settings_custom_scripts_section' => [
					'genx_header_scripts' => [
						'id'       => 'genx_header_scripts',
						'title'    => 'Header Scripts',
						'callback' => null,
						'args'     => [
							'description' => 'This code will output before the closing tag in the document source.',
							'type'        => 'textarea',
							'default'     => '',
						],
					],
					'genx_body_scripts'   => [
						'id'       => 'genx_body_scripts',
						'title'    => 'Body Scripts',
						'callback' => null,
						'args'     => [
							'description' => 'This code will output after the opening tag in the document source.',
							'type'        => 'textarea',
							'default'     => '',
						],
					],
					'genx_footer_scripts' => [
						'id'       => 'genx_footer_scripts',
						'title'    => 'Footer Scripts',
						'callback' => null,
						'args'     => [
							'description' => 'This code will output before the closing tag in the document source.',
							'type'        => 'textarea',
							'default'     => '',
						],
					],
				],
				'genx_open_graph_settings'             => [
					'genx_open_graph_enabled'       => [
						'id'       => 'genx_open_graph_enabled',
						'title'    => 'Enable Open Graph',
						'callback' => null,
						'args'     => [
							'description' => 'Output tags that help social networks to display images and information when sharing your content.',
							'type'        => 'checkbox',
							'default'     => '',
						],
					],
					'genx_open_graph_default_image' => [
						'id'       => 'genx_open_graph_default_image',
						'title'    => 'Default Image',
						'callback' => null,
						'args'     => [
							'description' => 'Select an image to use on social sites if no featured image is set on your post or page.',
							'type'        => 'textarea',
							'default'     => '',
						],
					],
				],
			],
		];

		$expected = [
			'settings' => [
				'genx_header_scripts'           => 'test_value',
				'genx_body_scripts'             => 'test_value',
				'genx_footer_scripts'           => 'test_value',
				'genx_open_graph_enabled'       => 'test_value',
				'genx_open_graph_default_image' => 'test_value',
			],
			'sections' => [
				'genx_settings_custom_scripts_section' => [
					'name'   => 'genx_settings_custom_scripts_section',
					'title'  => 'Custom Scripts',
					'fields' => [
						0 => [
							'id'      => 'genx_header_scripts',
							'label'   => 'Header Scripts',
							'help'    => 'This code will output before the closing tag in the document source.',
							'type'    => 'textarea',
							'default' => '',
						],
						1 => [
							'id'      => 'genx_body_scripts',
							'label'   => 'Body Scripts',
							'help'    => 'This code will output after the opening tag in the document source.',
							'type'    => 'textarea',
							'default' => '',
						],
						2 => [
							'id'      => 'genx_footer_scripts',
							'label'   => 'Footer Scripts',
							'help'    => 'This code will output before the closing tag in the document source.',
							'type'    => 'textarea',
							'default' => '',
						],
					],
				],
				'genx_open_graph_settings'             => [
					'name'   => 'genx_open_graph_settings',
					'title'  => 'Open Graph',
					'fields' => [
						0 => [
							'id'      => 'genx_open_graph_enabled',
							'label'   => 'Enable Open Graph',
							'help'    => 'Output tags that help social networks to display images and information when sharing your content.',
							'type'    => 'checkbox',
							'default' => '',
						],
						1 => [
							'id'      => 'genx_open_graph_default_image',
							'label'   => 'Default Image',
							'help'    => 'Select an image to use on social sites if no featured image is set on your post or page.',
							'type'    => 'textarea',
							'default' => '',
						],
					],
				],
			],
		];

		Functions\stubs(
			[
				'get_option' => 'test_value',
			]
		);

		$actual = $this->admin_page->get_settings_sections( 'genesis_blocks_global_settings' );
		$this->assertSame( $expected, $actual );
	}

	/**
	 * Tests that setting values are not accidentally re-used.
	 *
	 * @since 1.0.0
	 */
	public function testSettingsValuesAreReset(): void {
		// Populate the WordPress Globals.
		global $wp_settings_sections, $wp_settings_fields;

		// Since WordPress does not exist for this test, we will populate this WordPress global manually.
		$wp_settings_sections = [ //phpcs:ignore
			'genesis_blocks_global_settings' => [
				'genx_settings_custom_scripts_section' => [
					'id'    => 'genx_settings_custom_scripts_section',
					'title' => 'Custom Scripts',
				],
			],
		];

		// Since WordPress does not exist for this test, we will populate this WordPress global manually.
		$wp_settings_fields = [ //phpcs:ignore
			'genesis_blocks_global_settings' => [
				'genx_settings_custom_scripts_section' => [
					'genx_header_scripts' => [
						'id'       => 'genx_header_scripts',
						'title'    => 'Header Scripts',
						'callback' => null,
						'args'     => [
							'description' => 'This code will output before the closing tag in the document source.',
							'type'        => 'textarea',
							'default'     => '',
						],
					],
					'genx_body_scripts'   => [
						'id'       => 'genx_body_scripts',
						'title'    => 'Body Scripts',
						'callback' => null,
						'args'     => [
							'description' => 'This code will output after the opening tag in the document source.',
							'type'        => 'textarea',
							'default'     => '',
						],
					],
				],
			],
		];

		$expected = [
			'settings' => [
				'genx_header_scripts' => 'test_value',
				'genx_body_scripts'   => '',
			],
			'sections' => [
				'genx_settings_custom_scripts_section' => [
					'name'   => 'genx_settings_custom_scripts_section',
					'title'  => 'Custom Scripts',
					'fields' => [
						0 => [
							'id'      => 'genx_header_scripts',
							'label'   => 'Header Scripts',
							'help'    => 'This code will output before the closing tag in the document source.',
							'type'    => 'textarea',
							'default' => '',
						],
						1 => [
							'id'      => 'genx_body_scripts',
							'label'   => 'Body Scripts',
							'help'    => 'This code will output after the opening tag in the document source.',
							'type'    => 'textarea',
							'default' => '',
						],
					],
				],
			],
		];

		Functions\stubs(
			[
				'get_option' => function( $option_name ) {
					if ( 'genx_header_scripts' === $option_name ) {
						return 'test_value';
					}
					if ( 'genx_body_scripts' === $option_name ) {
						return '';
					}
				},
			]
		);

		$actual = $this->admin_page->get_settings_sections( 'genesis_blocks_global_settings' );
		$this->assertSame( $expected, $actual );
	}

	/**
	 * Tears down tests.
	 *
	 * Ensures Brain Monkey `expect()` results are evaluated.
	 *
	 * @since 1.0.0
	 */
	protected function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}
}
