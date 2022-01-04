<?php
/**
 * Genesis Blocks migration admin page.
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
 * Admin represents the migration admin page.
 *
 * @since 1.1.0
 */
class Admin {
	/**
	 * The menu slug for the migration menu.
	 *
	 * @var string
	 * @since 1.1.0
	 */
	const MENU_SLUG = 'genesis-blocks-migrate';

	/**
	 * Environment Information
	 *
	 * @var array
	 */
	public $plugin_info;

	/**
	 * Class Constructor
	 *
	 * @since 1.1.0
	 * @param array $plugin_info Data such as 'path', 'url' and 'version'.
	 */
	public function __construct( array $plugin_info ) {
		$this->plugin_info = $plugin_info;
	}

	/**
	 * Adds actions.
	 *
	 * @since 1.1.0
	 */
	public function init() {
		add_action( 'admin_menu', [ $this, 'add_submenu_page' ], 11 );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Adds the Migrate submenu items and page.
	 *
	 * @since 1.1.0
	 */
	public function add_submenu_page() {
		add_submenu_page(
			'genesis-blocks-getting-started',
			esc_html__( 'Migrate to Genesis Blocks', 'genesis-blocks' ),
			esc_html__( 'Migrate', 'genesis-blocks' ),
			'manage_options',
			self::MENU_SLUG,
			[ $this, 'render_page' ]
		);
	}

	/**
	 * Enqueues migration scripts.
	 *
	 * @since 1.1.0
	 */
	public function enqueue_scripts() {
		$page = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_STRING );

		if ( self::MENU_SLUG !== $page ) {
			return;
		}

		wp_enqueue_style(
			'genesis-blocks-getting-started-style',
			plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/css/admin.css',
			[],
			$this->plugin_info['version']
		);

		wp_enqueue_style(
			self::MENU_SLUG,
			$this->plugin_info['url'] . '/lib/Migration/assets/css/admin.css',
			[ 'genesis-blocks-getting-started-style' ],
			$this->plugin_info['version']
		);

		$script_config = require $this->plugin_info['path'] . '/lib/Migration/js/build/migration.asset.php';
		wp_enqueue_script(
			self::MENU_SLUG,
			$this->plugin_info['url'] . '/lib/Migration/js/build/migration.js',
			$script_config['dependencies'],
			$script_config['version'],
			true
		);

		$script_data = [
			'gbUrl' => menu_page_url( 'genesis-blocks-getting-started', false ),
			'isPro' => genesis_blocks_is_pro(),
		];

		wp_add_inline_script(
			self::MENU_SLUG,
			'const genesisBlocksMigration = ' . wp_json_encode( $script_data ) . ';',
			'before'
		);
	}

	/**
	 * Renders the Migrate page.
	 *
	 * @since 1.1.0
	 */
	public function render_page() {
		$page_title = __( 'Migrate from Atomic Blocks to Genesis Blocks', 'genesis-blocks' );
		if ( genesis_blocks_is_pro() ) {
			$page_title = __( 'Genesis Blocks Pro Migration Tool', 'genesis-blocks' );
		}
		?>

		<div class="wrap">
			<div id="gb-admin-plugin-admin">
				<div class="gb-admin-plugin-admin-header">
					<div class="gb-admin-plugin-header-title-area">
						<h1><img class="gb-plugin-common-logo" src="<?php echo esc_url( plugin_dir_url( genesis_blocks_main_plugin_file() ) . 'lib/Settings/assets/images/genesis-planet-icon.svg' ); ?>" alt="<?php esc_html_e( 'Genesis Blocks', 'genesis-blocks' ); ?>" /><?php echo esc_html( $page_title ); ?></h1>
					</div>
				</div>
				<div class="gb-migration__content gb-admin-plugin-admin-body"></div>
			</div>
		</div>

		<?php
	}
}
