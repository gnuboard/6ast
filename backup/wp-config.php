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
define('AUTH_KEY',         'icK-acftl.AAO}FI.NeHCrpg]?HszyO%Gg.=iT=:|KG.IMajuUJCgS(~laeoc5~I');
define('SECURE_AUTH_KEY',  'L?3uKRw%z7)/.KD5Pj/f2On?#Z^ND<aq.|Bsd)E_4pD~9laWIfo+|IxYBk]Iq20W');
define('LOGGED_IN_KEY',    '% 8.l(|ILnqtBVdz1-<XVCz5=m=6-5~`9-Mk&F`,07^7[V)1;BE*P9OHF~V~7&A_');
define('NONCE_KEY',        '3fU+T,2&HLhqJLQ&plknjq_[Mk8|I6u#R]]I=2{B_T*5Lz wo_0V+j5$S|~W}D]C');
define('AUTH_SALT',        '+_ob#CPR:J[-TCK vx<7&-L%;sx?n}fZsgl!+uJx]0Na{5aPP8nTB@[;&i;0| J^');
define('SECURE_AUTH_SALT', 'v[xL}N>ors+^l^BO/{RB!0vo2x#Poh<>/aa-:ehI}V%[`+d$K/};2db_Uh#pY&x_');
define('LOGGED_IN_SALT',   ' uFN1-Xs0& C7r#Hw VhQ1yHlrc l$tdtGup5}EN/|{55vtXn,iIZ`psANHvD0!>');
define('NONCE_SALT',       'J)9:6E!,hXz=zKkf9C0N/wO#1YM u0P?eR:N~(rTy -6kc8 <.rX69163RJ[Vb,H');

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
