<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ':xt5:7`PT;QEMjv$4>-_l{krA0KorHq?y< ]?)-y%!KpLMA;,h&HG7N/9-|u--z2');
define('SECURE_AUTH_KEY',  't9EsD=1v<4X}#p/>o*A:q-nXf!9f:~v2__mzg|yO`~c*[LLba7`|g4VGPW1k(C )');
define('LOGGED_IN_KEY',    't`ky/_z;(x>=U9!4]pp+q)~A+TUj+nl<U!7V;uYwDVru;(fFq&+S|VF|C1weY3H&');
define('NONCE_KEY',        'bq|D8N:+:iSoTL5$:YB Yy_2Y`!--u!ARTMs}|@mL-o4NSGe`M0[Q#v+|p:=R|2E');
define('AUTH_SALT',        '{6;IYm7?<;8cC+CwyX[j5E0.}.ArZjd-mJB<<gDr|dr#`uCo`1g2Y[g*]q?Vjs.`');
define('SECURE_AUTH_SALT', 'L%e~oxJi4&K_~}E9h>A,~e.$=K2&]@9Ec%r3RCVamV-!To%}s>K=em{]&}k|Ni^/');
define('LOGGED_IN_SALT',   'Kf.u-AiDp,v6RBE]{1<_dmjO$)dI{F|-]7).d|$R|QFv%JM,QC$BOdv9z(ZLN)Q}');
define('NONCE_SALT',       '-x-z8V*Iv9a6}D-~yA+8ZP^/(,9tPC^Ejh[mBv$Zjb60jW9~T+s%*7|PiWv)I?S9');

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

// define('WP_HOME','http://londonstudent.xyz');
// define('WP_SITEURL','http://londonstudent.xyz');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
