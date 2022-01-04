<?php
/**
 * Plugin Name: WP Engine System
 * Plugin URI: https://wpengine.com/
 * Description: WP Engine-specific services and options
 * Author: WP Engine
 * Version: 5.0.1
 *
 * @package wpengine/common-mu-plugin
 */

// Our plugin.
define( 'WPE_PLUGIN_BASE', __FILE__ );

// Allow changing the version number in only one place (the header above).
$plugin_data = get_file_data( WPE_PLUGIN_BASE, array( 'Version' => 'Version' ) );
define( 'WPE_PLUGIN_VERSION', $plugin_data['Version'] );
require_once __DIR__ . '/wpengine-common/plugin.php';
require_once __DIR__ . '/wpengine-common/class-wp-abstraction.php';
require_once __DIR__ . '/wpengine-common/wp-cli/class-wp-cli-abstraction-wrapper.php';
require_once __DIR__ . '/wpengine-common/wp-cli/interface-wp-cli-abstraction.php';
require_once __DIR__ . '/wpengine-common/wp-cli/class-wp-cli-enabled-abstraction.php';
require_once __DIR__ . '/wpengine-common/wp-cli/class-wp-cli-disabled-abstraction.php';
require_once __DIR__ . '/wpengine-common/class-wpe-cache-manager.php';
require_once __DIR__ . '/wpengine-common/site-health.php';
$wpe_wp_abstraction     = new \wpe\plugin\Wp_Abstraction();
$wpe_wp_cli_abstraction = \wpe\plugin\Wp_Cli_Abstraction_Wrapper::create_abstraction();

if ( getenv( 'WPE_HEARTBEAT_AUTOSAVE_ONLY' ) === 'on' ) {
	require_once __DIR__ . '/wpengine-common/class-wpe-heartbeat-throttle.php';
	$heartbeat_throttle = new WPE_Heartbeat_Throttle();
	$heartbeat_throttle->register();
}

// Force destroy login cookies if invalid, expired, etc.
// This prevents stale cookies (which never expire in the browser) from cache busting.
// This feature is controlled by an environment variable, but defaulted to on.
if ( getenv( 'WPENGINE_CLEAR_EXPIRED_COOKIES' ) !== 'off' ) {
	require_once __DIR__ . '/wpengine-common/class-cookies.php';
	\wpe\plugin\Cookies::register_hooks();
}


add_action( 'parse_request', 'wpesec_prevent_user_enumeration', 999 );
/**
 * Prevent User Enumeration
 *
 * This function parses every requests and only allows the request to continue under certain conditions.
 */
function wpesec_prevent_user_enumeration() {
	if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
		return;
	}
	if ( is_admin() ) {
		return;
	}
	if ( isset( $_SERVER['REQUEST_URI'] ) && 0 !== preg_match( '#wp-comments-post#', esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) ) {
		return;
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( ! isset( $_REQUEST['author'] ) ) {
		return;
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( ! is_numeric( $_REQUEST['author'] ) ) {
		return;
	}

	// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
	error_log( 'preventing possible attempt to enumerate users' );
	if ( ! headers_sent() ) {
		header( 'HTTP/1.0 403 Forbidden' );
	}
	die;
}

// Enforce sanity checking on wp_sessions.
// This became a problem when EDD had a bug that had sessions expiring in the year 2058.
require_once __DIR__ . '/wpengine-common/class.sessionsanity.php';
$wpe_session_sanity = new \wpe\plugin\SessionSanity();
$wpe_session_sanity->register_hooks();

// Custom site preview.
require_once __DIR__ . '/wpengine-common/class.site-preview.php';
\WPE\Site_Preview::get_instance()->register_hooks();

// Useful for multisite: Add a Site ID column to the Network Admin > Sites page.
if ( is_multisite() ) {
	add_filter( 'wpmu_blogs_columns', 'wpe_site_id' );
	/**
	 * Add or translate the site_id column
	 *
	 * @param array $columns An array of displayed site columns.
	 * @return array A array of displayed site columns which includes site_id.
	 */
	function wpe_site_id( $columns ) {
		$columns['site_id'] = __( 'ID', 'site_id' );
		return $columns;
	}

	add_action( 'manage_sites_custom_column', 'wpe_site_id_columns', 10, 3 );
	// manage_blogs_custom_column hook deprecated in WP 5.1.
	add_action( 'manage_blogs_custom_column', 'wpe_site_id_columns', 10, 3 );
	/**
	 * Display subsite ID in site column
	 *
	 * @param string $column The name of the column to display.
	 * @param string $blog_id ID of the subsite.
	 */
	function wpe_site_id_columns( $column, $blog_id ) {
		if ( 'site_id' === $column ) {
			echo esc_attr( $blog_id );
		}
	}
}

// Temporary location for login-protection script.
// @TODO should be it's own plugin probably.

// Some user-plugins have site_filters that don't always persist the query args that we set in wpe_filter_site_url.
// So let's up our priority to 99 (default 10) so that our filter gets run later than the other plugin filters.
add_filter( 'site_url', 'wpe_filter_site_url', 99, 4 );
add_filter( 'network_site_url', 'wpe_filter_site_url', 99, 3 );
/**
 * Filter the value returned for 'site_url'
 *
 * This function will only filter the url if it is the 'login_post' scheme. If
 * not, then the value is unchanged
 *
 * @since 1.0
 *
 * @param string $url     The unfiltered URL to return.
 * @param string $path    The relative path.
 * @param string $scheme  The scheme to use, such as http vs. https.
 * @param int    $blog_id The blog ID for the URL.
 * @return string The new URL.
 */
function wpe_filter_site_url( $url, $path, $scheme, $blog_id = 1 ) {
	// Filter the login_post scheme.
	$changeme = array( 'login_post' );
	if ( '4.4' === get_bloginfo( 'version' ) ) { // XXX possible regression in 4.4 release.
		$changeme[] = 'login';
	}
	if ( in_array( $scheme, $changeme, true ) ) {
		$url = add_query_arg( array( 'wpe-login' => 'true' ), $url );
	} elseif ( '/wp-comments-post.php' === $path ) {
		// Filter comment posts - from wp-includes/comment-template.php form action string.
		$url = add_query_arg( array( 'wpe-comment-post' => PWP_NAME ), $url );
	}

	return $url;
}

if ( ! function_exists( 'current_action' ) ) :
	/**
	 * Retrieve the name of the current action.
	 *
	 * This function was added in WordPress 3.9, but some sites
	 * are still running old versions of WordPress and therefore need
	 * us to define this function.
	 *
	 * The current_filter() function has been around for a long
	 * time (2.5) and so there shouldn't be any issue with calling
	 * that function.
	 *
	 * @uses  current_filter()
	 *
	 * @return string Hook name of the current action.
	 */
	function current_action() {
		return current_filter();
	}
endif;

/**
 * Disable core updates and emails.
 *
 * WP Engine handles WordPress updates. Due to our security setup auto-updates will fail anyway. Better to turn them
 * off completely than to have site owners receive emails about a failed update.
 *
 * These filters are all set to a priority of 9999 so that we're more likely to get the last say in the matter.
 *
 * - 'auto_update_core' determines whether an auto update is even attempted at all.
 * - 'auto_update_translation' determines whether to auto update language files.
 * - 'auto_core_update_send_email' determines whether to send a "success", "fail", or "critical fail" email after
 *   an auto update is attempted. Setting this to false is a bit redundant after turning off auto-updates
 *   altogether, but we're just being sure.
 * - 'send_core_update_notification_email' determines whether to alert a site admin that an update is available.
 */
add_filter( 'auto_update_core', '__return_false', 9999 );
add_filter( 'auto_update_translation', '__return_false', 9999 );
add_filter( 'auto_core_update_send_email', '__return_false', 9999 );
add_filter( 'send_core_update_notification_email', '__return_false', 9999 );

/**
 * Don't Check for Background Updates during WordPress Site Health Check
 *
 * @param array $tests WordPress Site Health Check Tests.
 * @return array modified WordPress Site Health Check Tests.
 */
function wpe_remove_update_check( $tests ) {
	unset( $tests['async']['background_updates'] );
	return $tests;
}
add_filter( 'site_status_tests', 'wpe_remove_update_check' );

/**
 * Remote Cache Purge on Utility Object Cache Flush Operations
 *
 * When attempting to flush object cache via WP CLI on a utility node we need to purge object cache on webheads.
 *
 * This is intended to be used on cluster utility nodes that do not have direct access to memcached.
 * We believe this workaround will no longer be necessary when CA-3151 is completed.
 */
\wpe\plugin\Wpe_Cache_Manager::add_action( $wpe_wp_abstraction, $wpe_wp_cli_abstraction );
