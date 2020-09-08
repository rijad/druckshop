<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

define('FS_METHOD', 'direct');
ini_set('memory_limit', '256M');
ini_set('upload_max_filesize', '128M');
ini_set('post_max_size', '128M');
ini_set('file_uploads', 'On');
ini_set('max_execution_time', '3000');
ini_set('file_uploads', 'On');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'organic' );

/** MySQL database username */
define( 'DB_USER', 'organic' );

/** MySQL database password */
define( 'DB_PASSWORD', 'OrGN$#(!c9' );

/** MySQL hostname */
define( 'DB_HOST', '192.168.8.8' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6Hc(dYiUh,7|YVOeTQ?_f8T/&){uWEhZ[1ok+lZcDw~Rt1[NJGO_ce6hn,#JQM8q' );
define( 'SECURE_AUTH_KEY',  'L)a5!}DEI78[KrhArB%QC(_ME}Nn]9IQR6}Pq7DM${[}Mkh*^`|DZ2o{cv.H>GfE' );
define( 'LOGGED_IN_KEY',    'X*vuA&H>G30<GY.?TJEJ3aml6Z{xW&z_3zmli:WzCFj%@<g=QL-Z,VLR%j70!`sl' );
define( 'NONCE_KEY',        '1W5e k}/2_dS[=vg{w!tK7 u4#iNaf;&P`Ij+:wg6kP)mtkN.<rY,8 SB)M&Kb%&' );
define( 'AUTH_SALT',        'LU+M#)*M!=Ghd_E0d=AX;%R~rO.D|cv47?[bUO9O( f8SVYYX%!N=a )aYg=6pzu' );
define( 'SECURE_AUTH_SALT', 'YEJHHQ>.mC>&lN~|{y.D<-B4I(wi92u/?Epcj[?$5H:Nd xf{I-r[/tT>/Y9i!iX' );
define( 'LOGGED_IN_SALT',   '}0&2&i7,cB2fJW89Tm_e0v)wd+FBJRyA/7JZ_RplSx?Y+E!mhWPH++u${wTQ8xww' );
define( 'NONCE_SALT',       '5:mryX->3cY+D*ego~#Xp=(RLdjabr%>B*4^dR36 m[c-gM_WZDID=0[U/L.&eHO' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
