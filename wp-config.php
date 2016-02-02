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
define('DB_NAME', 'smdba');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'hfg8Dn942Q');

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
define('AUTH_KEY',         '* mNF5 &U!JyjvrB+Yb>X#lp/|<wimG+| ,/2&W]s%v|12}!*(|tfc[|fg{-dn6h');
define('SECURE_AUTH_KEY',  'fb`tdm_]pY6pllc|SgL]-;GlYhp3z}h(0GM`[G,(W[eIrX/fHiAA+]8t-e&T >,;');
define('LOGGED_IN_KEY',    'QGg|n`i2A$9pZr)^f@{-cVR;{d E}XXs;Q<fD(XqO!wp$PAG~`vMPyLI0^*OYpCt');
define('NONCE_KEY',        'CyZE~9_C:FT1F);2{f*mvxjM<aLZdesrWbNhZJ4-Ef>_xKCMpXIN%AZGHJo j4S5');
define('AUTH_SALT',        ',z>ZnZFSZa?-e6)#>%msS8Mlms&,130=2Q_E_}xZy0yKh2~@2o$S+}(9;%ud{Y|o');
define('SECURE_AUTH_SALT', 'EBjCE;,MjjdusxYH^&?; oBP75Af_.!_Q`b(*H{|=}>e+;-oM  $W8ad$~6At|5M');
define('LOGGED_IN_SALT',   '`qbL&(74r{*Q!vl,v2(Or?-x`{bzcbQ^_C2 n2402}Ftwqy$2-Wbl$Z v,|XNNu%');
define('NONCE_SALT',       'd&7?R7/Rnq.K%&#s*t3z,_ObtnuQuH!z8U=J_~.D-iOTYPYralo^8X,>LJ<N)?N1');

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
