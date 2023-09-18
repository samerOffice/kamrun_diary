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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kamrun_diary_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         '(%jXi/Si-!j`f0t2hjaPNu}TzE%eyT(C4e7ANaH?;X?n!!lco`(0m@M4Vh&D[~Ad' );
define( 'SECURE_AUTH_KEY',  '`rK~<0DF%dvmKk6GY].Ag#x4^R/x>#QMU|m>$C-zz~P0~~zYc>@1HM8-BnsfIv7]' );
define( 'LOGGED_IN_KEY',    'uVM5a54GX}U7Yl5m.he$Ud0wIj`Uxs06LmS=E~U8Y&9^QYozL{+^#HqmhPtu:pN}' );
define( 'NONCE_KEY',        '(M~%{cuaKuh$97fzW/l*?ivyFS1KBom+O!W&.)En%H>*YC[4[XUvg5ULN!=Lovwt' );
define( 'AUTH_SALT',        '+jD!;y6Q?q 9yPCZlAzzc?8!a!ktBuYq%exz-SRcGy5.kv*v6Z,uCGhrCCn6|Joj' );
define( 'SECURE_AUTH_SALT', '46aU{SQCv=3@,txv#PM,5s}}%eF)qZ!Z]>L^1*cNvd4r}4sS:kO4Ew6~=no[4eX#' );
define( 'LOGGED_IN_SALT',   '?0/Z:LTYo+C4k1@3WRXNabK{b/iOD88~@Qy&aZfzqL (ijA+ncgtUy=S1hYRMz3v' );
define( 'NONCE_SALT',       'Nh#U0/sKe/=sA#vHE2CX,oNYXUqnJt_#Qg3jfbI30K:Jq<TI+5(arQgym(#}P&G4' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
