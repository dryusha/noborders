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
define( 'DB_NAME', 'noborders' );

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
define( 'AUTH_KEY',         'W|h_&](_`[H)-1&rG 6[[8eLo_:LWSO{NuTEpNs2lqGa-hY3,vITyyFqMNi=^2T8' );
define( 'SECURE_AUTH_KEY',  ' 0k{%e,-bYouSZ<E|h:8DP>R}61=Q+kV1#r-0*17-o^$~%TLVr7yONG`v/82N/:N' );
define( 'LOGGED_IN_KEY',    'lAjW*!f,B`evxiE;|>kS!^ef_[9PC(G4p6Mup7JKH)ZX0p-vJT=4[Ca}HRVpI<>n' );
define( 'NONCE_KEY',        '|FY!%ApQ_vO^BD&XW()q/y.%c4US]1.w6+mV6ZRk+?LOlY$+kV(#*fkIAHm~iIqs' );
define( 'AUTH_SALT',        'V!A@D+6c~dE8:tg6)|>,,ivn9XV6%yYY 7` ?^*4+0WT~e/:JCwhr>O_h[Gxo6$h' );
define( 'SECURE_AUTH_SALT', 'x+}-EC.;F:xmn>%W`E&Dl5s3%(Wm7aw#%5X?ntckqH9,e,**rA#SDa;7kS64RwCs' );
define( 'LOGGED_IN_SALT',   ';Vd`G;l549gna|.f m7hKJ-,w0caL6,5ANF6T2^3w1|04?(HZCNAu/TqL*tbZ7KE' );
define( 'NONCE_SALT',       'qJ7*X)j8v]NF*t7mq MnyW}!mU4+=-js$j$Ro54(Ip|KAI<AUn:#+DE8@!.S?#O6' );

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
