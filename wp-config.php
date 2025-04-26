<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "a30858c4_orion" );

/** Database username */
define( 'DB_USER', "a30858c4_orion" );

/** Database password */
define( 'DB_PASSWORD', "ea%1cB744" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'eec::# <CzM&^;g,Jk~8 kPP{Bt=sOYi>kBJC)GAcWu8)>YMW`GbhU@JOzf5nz67' );
define( 'SECURE_AUTH_KEY',  'z9<T y&3$fiL/I%n`pqVmobBkz0jf$m_5?*h}>E5B[~(FZPmtN`el~nza:Da^?t!' );
define( 'LOGGED_IN_KEY',    'mNR>wVM`ONVeeN,8wI%$cn1h`,mJUbzgD[joi/RSc5FgK7>c9`J}gvSR0$6;9S}1' );
define( 'NONCE_KEY',        'IEBC-bYyPMoV[TC>oz.=f{H-cGk)vw$/_$VdKcnrT!ZR9uYtN3Jf6dhh]:.AF%|d' );
define( 'AUTH_SALT',        'n==y}J|abLFQ|@aMG=%XhF*}h WyfmN}bH2JD8g%6&hu?^Qidy{s#W]d=|x_aYl ' );
define( 'SECURE_AUTH_SALT', '<,KanV.v_*n}_% ~!p<U7Ec3^BAf:O@p#pdO7X2/gs~_ ]N/+rXh&dlgIHi*R}]k' );
define( 'LOGGED_IN_SALT',   '9Z7/&Fu1z |NDx`k8EFQVL{qX:7=vK(Ak;K_j77BP>/>-[{3Z  K1IPJ8H#C6MG5' );
define( 'NONCE_SALT',       '=0U_%O_^q~xCcQ6`]JM*>|gC:QX:$3T=(e[RnwIJPLgYGZquCj{2*_WW:h)326Hs' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
