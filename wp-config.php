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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '$a/OSR#gy3Lf!8m@1uY9*@K|`q>.&T<X[-yEz{sGoA>ipps)Qal;6U:h(#)Bs_D@' );
define( 'SECURE_AUTH_KEY',  '1UlAj,wM+V-vO]k=$Ci^AuB{ 0=7m!ll!D[^xj$+RGRJL_Y4X-y;J(vG7#h@OJ</' );
define( 'LOGGED_IN_KEY',    'M9>Z_POi1G~(P8a*%4OeB<H[}$j*MG 5s*hg(1CwoRa)13Q]U-NMfC<J%,ek[9^5' );
define( 'NONCE_KEY',        '-O@C-*@;B=+Q;I]$h)V|Fu:$W[ZvJ?eR>If]<}s!Kt#cz4r%iE0j1q<56=)|wNSZ' );
define( 'AUTH_SALT',        'SuEupoN56JWI+m^fZzCKTk47]ghj`d-/V--3Qb^K}8#uU&gU.mt(c]k@PMD,{nXf' );
define( 'SECURE_AUTH_SALT', 'Av}]M?}X_T|^/u}svm7Ln>C_(X22-NJAd@ZK>co.R>Nj[T+X,+;#9JIsp`*1It6z' );
define( 'LOGGED_IN_SALT',   '-e{1d]Ds0HkpfU|+E,vs8c{j|m4XKQ~>$* j0XZRaacbQ#A}{HVLh2;*UE[!Rude' );
define( 'NONCE_SALT',       'qlIxBJ1Zd1q@:38p<f5Idf-oE4v^vQu{X%$$/tR,e)r K-Fw>~r|+J8%4Q@{_E+;' );

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



define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
