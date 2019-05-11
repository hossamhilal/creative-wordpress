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
define('DB_NAME', 'creative');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'H5|]Yyaj{-9&8A%|HtpS1`29`zN1Yb3W<8T*!l`DnsHN;![!OMoiVW/kGYJ7i/~b');
define('SECURE_AUTH_KEY',  '=C3+:WB>kj2<&tKD>MT.b+MN@N>q%oWn?*s,5FRQN2,<_]Z6Jza$~<I#9],LU)>Z');
define('LOGGED_IN_KEY',    '.MI}4gMnli_/t~RJS7D >jPoB2z[I@FSm3%P|`z(vsr,t7v{tH<B+|!pF=id]$A<');
define('NONCE_KEY',        '_Y#uQq1Ja(*BgE<]^L6D~WHRNg}WU{K7)]n7;X6pBFA491&=3ewh,Z)WY;Eqbvc{');
define('AUTH_SALT',        '2;@wUe_,N,=iGBVePE2@yG?:{tHpCkT<9:&C<=1*u$|KG81+pW=w5U 6-?Q0EYSu');
define('SECURE_AUTH_SALT', '3* 6e7Iy*6T#.EU62&xbj>Ek0aa4ku*yA<vC4D:v/#LFSa$rCF23n>2[tB,?&$cq');
define('LOGGED_IN_SALT',   'ZVxmgTo}X.;HsL._U(E!gPU!TkVVB8&%BYI?Zl<:0ni{CbGLksdMr`Gn%7/o_6yI');
define('NONCE_SALT',       'f_L-B:S[h^/hhO=e:rYvZ8?.[n$uMKf9AsH9akN_W0O~ @Vtpu2=AtFw5H%gz4FJ');

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
