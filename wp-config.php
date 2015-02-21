<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', '%%DB_NAME%%' );
	define( 'DB_USER', '%%DB_USER%%' );
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
	define( 'DB_HOST', '%%DB_HOST%%' ); // Probably 'localhost'
}

// ========================
// Custom Content Directory
// ========================
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
if ( ! defined( 'AUTH_KEY' ) )
    define('AUTH_KEY', 'yUN6gdM+qTMqci+&# xfU3WHa1m[8i-X{7@2(#wx@,MvBPp=hmUVZ+_>$}6QjqHm');
if ( ! defined( 'SECURE_AUTH_KEY' ) )
    define('SECURE_AUTH_KEY', '(&Po>`,##DQ|-ok)Kd*Y_,F;7M.SM7eKy+d7qDT|~$6Jz;nX%[>>qoa#(Fq3Jyc-');
if ( ! defined( 'LOGGED_IN_KEY' ) )
    define('LOGGED_IN_KEY', 'cU*0N;n^/TrJc /.t7^-%@HB7r,%9$dXi}|GK]Ej,^^XGoO^RsSYz=:#{WO2zU+R');
if ( ! defined( 'NONCE_KEY' ) )
    define('NONCE_KEY', 'L1ECU&YZ%<-SCp`|D?[xx)jfq$Cq3w!|-P1Gjf>L@2#S+UzN54YmYh~jaq*|v~jC');
if ( ! defined( 'AUTH_SALT' ) )
    define('AUTH_SALT', '=<:9,f2E@,@]_+`eJ:l9kHAs|4|0rfd-Hj WYY)boLcPE|>3-E$cwZOg*}N{E6RJ');
if ( ! defined( 'SECURE_AUTH_SALT' ) )
    define('SECURE_AUTH_SALT', '!9Y1WHILYI`hArw~P/|h#  vK4Iix[V;~I!u`X0Zct|5kj]UV>E{{u-0=p);t,gl');
if ( ! defined( 'LOGGED_IN_SALT' ) )
    define('LOGGED_IN_SALT', '|{u+Co1S(}Q@)j*K`|eCTroC[E0>~aIK=I>M-7>Mj8+;vK/PCRu s==][E|yJ !B');
if ( ! defined( 'NONCE_SALT' ) )
    define('NONCE_SALT', '16TsnTUgDQs0h^X7r-30%~4I|hmb*U.z[=Mjya:u_QnRqfvrG.vqCR@H41as@CEj');
// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'wp_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', '' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/WordPress/' );
require_once( ABSPATH . 'wp-settings.php' );

define('FS_METHOD', 'direct');