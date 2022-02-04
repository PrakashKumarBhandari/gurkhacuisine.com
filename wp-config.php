<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gurkhacuisine.com' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ']*l_Yzwjivurjh_2y:G$V|~A~7{Oh)3iH &wNi7hY$5_@dvB;z,jloLeOHvL^=ZE' );
define( 'SECURE_AUTH_KEY',  'wa<YHbr;=*4djkUuuDBGbJ^%Vs8-U>|da5E |@K<E]:iXM;JGS2RHx}V {X>aGPg' );
define( 'LOGGED_IN_KEY',    'ptdu*{V:.$3k>H@TKfw.kYr=*{h;D^poz<l7cZ# ^}L?JT4|>/)M=!6B.m(9ig|{' );
define( 'NONCE_KEY',        'ex{}ApAGS{Y>Gfb6XV6S)-f+dyL-H~[^+eQCBFWpn#=R,Y?^ZK?N}$[spHeUe=Tb' );
define( 'AUTH_SALT',        'P&fu-DLVY6EjRfKEzJ;.>8@|HsA;uI!wTAfuI>Lq?De@T5g59iO[KF><q6{[c`43' );
define( 'SECURE_AUTH_SALT', '}fmCD4H LEYaSpHS5:+n?+;MF-l`i[P^[f$`hAcn$`x~{xzIWOCM}sIA`%]#g*>B' );
define( 'LOGGED_IN_SALT',   '1ZJPeY7;G/KKIv|6[aOAx]`qEnsw2);;I6iD_py#$>HK.oh{a&K) VYk>P ~m=py' );
define( 'NONCE_SALT',       'x3i#`.J7|,hi0O*(jE-iIVH|E60Bq (E)_sqat>$-&%M+ e! -u-2;w._`o%]][m' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */

/**
 * Google Recaptcha Version 3 code
 * 
 */
define( 'GOOGLE_SITE_KEY','6LeW8q4ZAAAAAOujCqPMuxyAR0jzqv6Ne58Kt870');
define( 'GOOGLE_SECRET_KEY','6LeW8q4ZAAAAANaiLRZR7nLDVux17JdU3TkRXPsE');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
