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
define( 'DB_NAME', 'imperial' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'toor' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'FS_METHOD', 'direct' );

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
define( 'AUTH_KEY',         '%{Y<# )Ix@292@kr,2~Her*IH6.U/l){FOA?:6_C@cW6~B1=wu1ZX[d5Pm2W;_Y2' );
define( 'SECURE_AUTH_KEY',  '+=Mkr>9Q(+VS)Ms)atwLZp_eP!G8Nz#=pL^wDZL%SA CNPvuIus^uNm|UxIh$}t^' );
define( 'LOGGED_IN_KEY',    '[cT9JF Gj!TzGS 75 &3w2lxp^NNSPgc` -w&MOA&DIqEd-Krzcdasa/$Igm1k7A' );
define( 'NONCE_KEY',        'gRUd8}kcWn9x{5:P1aljD0Q#l;|$#l!.vP.i,y]R30Ah{_/6,vEs$+k#b,5k^BWb' );
define( 'AUTH_SALT',        '7B5WKO0#0#>/619bWS4-ItDh>f]TrYSNs^M8jO6LSpy|{FZyf0cPD!%2L,NOj;h#' );
define( 'SECURE_AUTH_SALT', 'K=XX:Iv-k3V6o[TCQ&#?s~UB4|^I]jlA%-e&b8eD#$m!{*MNg%HQ1([Sw.gXOA/c' );
define( 'LOGGED_IN_SALT',   '84u8>+Cm*W19,qu^5xN?6w{Ty,h}rNf+G$?TH[<*hX]8>[4GBb&Eh9.9s^ w${O2' );
define( 'NONCE_SALT',       'U*T>9| f7X#aPZ1xP.gRGG62-k3c)7M?zzL1Tb1RWt*WY6gH?SkMxB2S:^gl|hDt' );

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
define( 'WP_DEBUG', true );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
