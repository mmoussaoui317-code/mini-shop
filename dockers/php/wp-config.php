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

$table_prefix = 'wp_';
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'dev.ibtacem.com') !== false) {
    define('DB_NAME', 'ibtacem');
    define('UPLOADS', 'wp-content/uploads/ibtacem');
    $table_prefix = 'wpws_';
} elseif (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'dev.jeldeex.com') !== false) {
    define('DB_NAME', 'jeldeex');
    define('UPLOADS', 'wp-content/uploads/jeldeex');
} elseif (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'dev.khutwa.com') !== false) {
    define('DB_NAME', 'khutwa');
    define('UPLOADS', 'wp-content/uploads/khutwa');
} elseif (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'perfumes.local') !== false) {
    define('DB_NAME', 'perfumes');
    define('UPLOADS', 'wp-content/uploads/perfumes');
} elseif (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'dev.tomobil.com') !== false) {
    define('DB_NAME', 'tomobil');
    define('UPLOADS', 'wp-content/uploads/tomobil');
} else {
    define('DB_NAME', 'isfdown');
    define('UPLOADS', 'wp-content/uploads/isfdown');
}

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'root');

/** Database hostname */
define('DB_HOST', 'db');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'o[dQX[ghC HLZctYptk/7Je9NWqn6f%.r.UDJc I#cGTafGZ ))`exuD~u}bxWFh');
define('SECURE_AUTH_KEY',  '0+S0Z&-e0td,-~2]+-mkj9xC&~nn=N=%f/g.-aMg~]!Hg|3}Qm|kJg<x3$b&r,<U');
define('LOGGED_IN_KEY',    'li#rDl#!eduz3So!U=B*~PkG>73a$b(LI%1ij55x[vkP@>Q2V1W$(AaLf:9i>$a[');
define('NONCE_KEY',        'tRuG);G/Mxr> /^[q% {|ohz~6O-9S<Rp<1Tik{%jSrQJcaRuU8}/x&1k7C*oBYr');
define('AUTH_SALT',        'g/ng9i,J*,tj>c41f0XYXU3{GN8V[NhGATWkF+IO;&>}BL .nT4|<pU&K(vFoLyX');
define('SECURE_AUTH_SALT', 'B[(3B+(Gt0lZ:XYV=AQrs8y49iUMXjCYd#_u1qCyW9[tkxTC3xTrZ*Q9`-6n[uph');
define('LOGGED_IN_SALT',   '$-K<dg;:b/xDmlnCBjWCt7bVB O,j]xo.]S0UEin!7Af8AqIe`A?VY=E-:<Fq&s%');
define('NONCE_SALT',       '}}?mV_*:%!sm p6Mr_UKK8&DNMv*SN<1wLlq9Ue[~{1>kJI*O#<RIhp~~=2]Kr_I');

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
define('WP_DEBUG', $_GET['debug_mode'] ?? false);

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
