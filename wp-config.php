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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-phd' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '3/K$vPl416!|v;*Z`Vd{3h^C7;yY_][F1YGr+?KrWmHc2;`m->E$0<!t[zA3_t?V' );
define( 'SECURE_AUTH_KEY',  'tTeZeX{KguJ|_e~4fJ}rEA9D<A|ia=#>kLcZw)CtLofq}2pCb_nU#7Npe@ZC0=:C' );
define( 'LOGGED_IN_KEY',    '$y2N{DdD] F~o_;Mi/Bx4-PlE/yu.`}~^bUT2q??mmDH*W8<P846;M2:;-AnSsVb' );
define( 'NONCE_KEY',        'NwZ?}TJK^>l3<Def$ro7~w4c# LGDa$`GZij6ry3^)h<vOX5`.!ULh{EpUQ8NGt^' );
define( 'AUTH_SALT',        '1V:T,UYX>.}$a6w@C+fuR3$NK{^$@7i5P^R[H&XLpy[{LJjR`8&|%MpPDdWObn@E' );
define( 'SECURE_AUTH_SALT', 'q+;k? TKYQ^`{L*2_/EyY td[3v]sU=N[Pjl;o{o+DYodPU s%58@V)tx6]ePvMs' );
define( 'LOGGED_IN_SALT',   '9gC_iM$znlJIDV)fl6A|mU9K~!lXIoJ0NNAmIl3Dgf=]hu,Kn(TS`xv(*g~elI9N' );
define( 'NONCE_SALT',       '}T=Gd9w{0#3TxmoQXLK(z%$S#)06,9QDfA9JU^yQvU|6`|#lv0>l+p/N*gC@mMT%' );

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
