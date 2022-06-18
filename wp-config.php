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
define( 'DB_NAME', 'wp_sage9kit' );

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
define( 'AUTH_KEY',         '8DzNO}Ht`>PySj6s{&?+4t~Wb4(KFhsGh*I xF-WpQsk)3J|aljr25)K43P38%X3' );
define( 'SECURE_AUTH_KEY',  'PK`<NjAYZH;}zu#pDdVD4JqVh^Gt@ah[p @wf]gC5x{9?UU`y1zLF9G?L6,RWDaD' );
define( 'LOGGED_IN_KEY',    '.&S0R<N._T?cWEKAZV5a=,z|Q<5/Yt//qX`P}fAO^6Gc;PU;o;RWe7Ha0i,Vw;T:' );
define( 'NONCE_KEY',        '!Ga9`]E.trKL$[UeQSEa&9@D~x<lyi+yHK^Stf0*L#GE[%vF1x-Jw_%u_&1P2zUK' );
define( 'AUTH_SALT',        'NJ#LoOZ @$F86lem{K]WpfBmM;kw`S9D<m!MdjaZd/&Y`K$21,&Yc%ZWu,(.<?X{' );
define( 'SECURE_AUTH_SALT', 'SKHAL4ozBu2ZGX2MbGX;COR!?v.>$f(*{D5MwMSU[{!,vZ<@YgVOm1/vi5j4lkHK' );
define( 'LOGGED_IN_SALT',   'qfYQj 5.@JyCMpPV>0]6lOrLjBU6wdJ_k?#`ji*wXz~+?y=!-3qDj[YrIWMGOi?P' );
define( 'NONCE_SALT',       '[m$H?@ybw2G(}CD1d4EQ:`_XF!58{GLt-iDSn^)}X jf.pvq:ikDs.k&lCa`=pGN' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
