<?php
# Database Configuration
define( 'DB_NAME', 'wp_test_1' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'ejSxYv-ao42|b%Z+38+0=.yK&oVb~~Q3p*^oTt+v}D5H;:Fk?v>M[l<VB4DR;yJW');
define('SECURE_AUTH_KEY',  'r>|KrZ+aO2A>G`TS)|w=)ziWc^a34ArpU3Sv%I12v~n1bM+a373 qc`&,i-[%G07');
define('LOGGED_IN_KEY',    'L8z|v%!~t#(DZ0kZTRgzn[P/<*P^!fNfs.oo0%,a%+<6u,bF-hnTheDTXeGYhv b');
define('NONCE_KEY',        'I8D_K4^,>Q90T#3}6QO#VwTq.mi}]5HS>^2i-MV0+|D`3dHM67h,{me.MxNGH ^b');
define('AUTH_SALT',        'mPU|[spsol5U5 d))6+0h4[2%thBZKT%);-[6C){-r`|+a(>J-0WS1HoYp?}&l4J');
define('SECURE_AUTH_SALT', 'aLNy[`|8[_eE|Q;Mm.69pu-g-qvKF$PbO_&3rtg.EG0+_6*5~.>7-fr;5@qR8O*d');
define('LOGGED_IN_SALT',   '0kF/-;ywkvAc$F@b;-A0X]6}o#FAHD%?9vJrfv,hovb%.JBs}@IQdGBMGHJx[A9(');
define('NONCE_SALT',       'q]LL>a<Rjivk2W?-^t9xRXJ<ll2j;*-gWHJmHigGV=QfIiShv)>2G!1|+zP+Mr5;');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'stgplantzusstg' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

umask(0002);

define( 'WPE_APIKEY', '829f68fe53a31e32705e8a1e0ba8233a9a41f8bd' );

define( 'WPE_CLUSTER_ID', '111024' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'stgplantzusstg.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-111024', );

$wpe_special_ips=array ( 0 => '104.196.238.121', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', __DIR__ . '/');
require_once(ABSPATH . 'wp-settings.php');
