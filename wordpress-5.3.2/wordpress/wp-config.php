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
define( 'DB_NAME', 'happy' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'f:=UzB @1(gg+2+`d E;0x+dBTK1?98xs4o2xJ[:|@^deC1.hKZifW!%:r!igr8?' );
define( 'SECURE_AUTH_KEY',  '/P+b&C6&$xS4qF/4IjOskn:e#{#Ffs7QmJn1)w<TjVBJy$h bK86M/86pb=nOjpl' );
define( 'LOGGED_IN_KEY',    '0+Wm/$y3N:R ]*Ywldp!2<=;0sj5Kz&F[(:l;W[!P5Z0&s)%}o4P4_[[y/`r1Yi*' );
define( 'NONCE_KEY',        'a~K!:RBj1[ i!4DN4.]]:YFJQ$@/(>?T[W`BSQ[|0iV?GP/f>K_1as2?>yTfSQg<' );
define( 'AUTH_SALT',        'ULR{l *4:-*6:ONZLf-x(5@+u/U<}}._:vB*!.w-2N#@m>^i,guoroAD4 s!9nAm' );
define( 'SECURE_AUTH_SALT', 'oW~o}|g42V$s5h8J}Bfn/S?>ATj} bRS#B> Z_>hB9(,5#heR#122!cphAyn[fVN' );
define( 'LOGGED_IN_SALT',   '3p6e`C?CDW-EpyPLS+Tr|#(|m5Tq]$Q},RYq5>$D~&Mbk9Tf;U/SQer77FNmO%q)' );
define( 'NONCE_SALT',       '5KI?t@q+_%oX:S?RA#T+w/CLf}O-sc}g%-aQwCc3[km3oR9N=Q=IlvO@6n<{Im^5' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
