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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vertexeducation' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', '6/@7H!#[T&-R%Tffi1%[#9n%-*XOK:6Bj[6)bVQAz3in6vj3PbB_)o6B%i1_nh[[');
define('SECURE_AUTH_KEY', 'ZYAOt(*Dh;x8oo-C8ZvL(6g7;!r2f_N2oSs_;CuUMolC_3G@:94z2x9!GB0kZ8WO');
define('LOGGED_IN_KEY', '+#b73_:noz]8(-k:kRJ3Emv|)4u9l;Si~%zh6!ekjdHr)/:H0]5%u19l!n;68ki5');
define('NONCE_KEY', '-fXq2Q*c69S(66pAi9v9C#075M9WWTcikx!@W*I0|W7~jD43Fk34Ojs8)8n[u-AF');
define('AUTH_SALT', '[8Ke0U*C2Pz*3[c[nVdY2+3q[:)8-HNpLL@m|C99idfu4&e_s[Xoz7934eD13|O]');
define('SECURE_AUTH_SALT', 'Uj4/Zr1~R0H#Jx]@u]!U]B/LF|jho;83T81e:u[*[c/g91elx6_@M%Aq37&48&92');
define('LOGGED_IN_SALT', ':&4V;_7l:6Hf*0;W#848A[L1qwv_%%%m(/a#~#2H05h:k5S6nQD~@UN&#4wH076%');
define('NONCE_SALT', 'q]+8C!8MNpd!67MOcT3c@_;07VRXH8n(6tENl52:@]dI/2[2Q2R-!RIi9_&Idr6L');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mhhpJWO_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
