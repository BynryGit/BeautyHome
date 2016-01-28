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
define('DB_NAME', 'beautyhome_wp');

/** MySQL database username */
define('DB_USER', 'beautyhome_wp');

/** MySQL database password */
define('DB_PASSWORD', 'beautyhome@2015');

/** MySQL hostname */
define('DB_HOST', '198.71.225.62:3306');

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
define('AUTH_KEY',         'xeJ8+mhO%!dO91v$=d?W-S*0=`K-ncxfj-Q}Mb6 2v%mqZP*t^,o+jZi@|ys+qz+');
define('SECURE_AUTH_KEY',  'm&u;/tY6G<HQeHH$.e-Ex/BBJJ6EkHx)T0>%{6u+O-}&qqR@>$~_^KgntoID1n)G');
define('LOGGED_IN_KEY',    'w;FPc|3$<qjeFc2oL?SWek5 Z }~mhEy??O6.7+j0D3[UL,I;XSy]Kn |-H9a,%x');
define('NONCE_KEY',        'x8CITI1l <=U=Hz[qs:VT#vQ%!|%~*_cs1v5mJ96}GY^?D):~%p@RDQ -=p1xLZp');
define('AUTH_SALT',        'j(vM#Yxg;P|Y$LaRa|0yd+x|2|~U.{~ZfsIiCL4XW)0g1Y(f4KMT127BOm(BVO6K');
define('SECURE_AUTH_SALT', 'niCcEC|U+05a.Y[eIh&};6Pv:PFFO|W~(A#zgEUB!|w9iM~/~*)v@Bd!|N5zQ>c9');
define('LOGGED_IN_SALT',   '-_4D4|+6g]W*8V&cIkE!F}~1Fx8(YJaQd*iBGtoW+f<Pa2*$YZG[ ~JPmMV^x]AX');
define('NONCE_SALT',       'EkqC`x[Ma#j](TJxQ:zJ:e-cdm:H&Z3{-zoID|C$27OaWsqjFrgMt`sIMWCL;El|');

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
