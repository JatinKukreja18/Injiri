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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'corea6rr_injiri_wp');

/** MySQL database username */
define('DB_USER', 'corea6rr_injiri');

/** MySQL database password */
define('DB_PASSWORD', 'B;^556-F+osO');

/** MySQL hostname */
define('DB_HOST', '103.53.43.36');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wHQ&} O>i{KrGK6SA1gtpB/i5Y&4(),|U|~dei 7H^KtOSPgP67stCL:u>u3KqD?');
define('SECURE_AUTH_KEY',  'jG=!&WF ;`3~ZHkx6fSWkPvx|0J|D`m`;X9O/O^|6V-RcZ=^YY~@-pOSBW5iq=oR');
define('LOGGED_IN_KEY',    'j7A*H>T;qDoh_s6:F^,cZh0J=I!G/N.QnLi%?[N%t:3lROVydMy!eZkJfSVtkqw8');
define('NONCE_KEY',        '2Z614{2X!b+5__6^+5v^GnvW?sW]|UzOU;3t H?YGo C7v-;>M-z@d<n,LdBnxl,');
define('AUTH_SALT',        '>z:l.m1B#X44#4Pv^][L&*@m;r}b,Qsm/_v>{+_!*kkS?#!3)6`Pyy2p(&.q|^B*');
define('SECURE_AUTH_SALT', '8o]FfT85;_M:?0Jfc&&m3q/?cvd2?`lQwMof=Gb$jwmxiI!YhRQ(MH6%4_(}H/sk');
define('LOGGED_IN_SALT',   '9+@s%x7|f}}4xH.4aK9;<^B~m*3*qj)747-1<_@bfb75K.)~|K yF]!RzrQZPD={');
define('NONCE_SALT',       ']vcYO#KZBE1h;KIT>%7sWR=w f{bS L6tuY-(G!mnpA5s<Aj<z|+zVpNFS2DlkqX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
