<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sirgle');

/** MySQL database username */
define('DB_USER', 'sirgle');

/** MySQL database password */
define('DB_PASSWORD', 'Tjrmf');

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
define('AUTH_KEY',         '^1vPfG+6/(FsU*?223<S5?r~8pw +FlX%rN}nbbUbb5]vO77fjmVSw(aGR?%]8$w');
define('SECURE_AUTH_KEY',  '~w>cJT@}U;]^NZw^`miTUSbA-W6Y0S-|d)Q:rz-P|E-m&!3+tKvI%F48(0c[|N@,');
define('LOGGED_IN_KEY',    'xpLp,,J7;{lKTE}WPX!)Xt4r+m4$p){|C$!mL)JQDmjBURkdqk%gYJMaHfp8eEXE');
define('NONCE_KEY',        'GU(67^O>0)?~U2hd+x=l-_KGEOLCX6@%b9;{.+YzCZl(1Z3sw*5xl-Z{d>p/g2&=');
define('AUTH_SALT',        '4D71qOT.}vp}Rtkq{DBu)aP@%W<34grsA?L&gUnX{ w{a`j*vB;>D.= $Nd[]chR');
define('SECURE_AUTH_SALT', 'ag)ui}@.M74T~g_8K|~+-59Fxt5}6qnb6>{FLDs];?bGg]~&7hf+AJqnov!,2Od.');
define('LOGGED_IN_SALT',   'Nhiv;{RVnwa_]*nK?`Me1uT8V8_n:t,gX aE0u~CgOtA63hw&O63VMFCNPf>}L:q');
define('NONCE_SALT',       '[Ec %FEH.~r$<3)=i!MvN:4r-2C|^h!+y96v<]Hx!+%!-vvz#Hgf4lH<g+|!12a|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

