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
define('DB_NAME', 'wordpress');
/** MySQL database username */
define('DB_USER', 'rmanfred');
/** MySQL database password */
define('DB_PASSWORD', 'admin');
/** MySQL hostname */
define('DB_HOST', '10.96.0.2');
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
define('AUTH_KEY',         'mCrYpxf:ZyM% sUv6e!g2f?iU<A>zpRJI+THwwNQygagAkO<b`ZA+;XGZb6_O+7&');
define('SECURE_AUTH_KEY',  'zG]k|Fms&sVAJSqDek+Xf}|m&3DHTj.Hf>D]>9!NtXjVgD?Q}f0`(5-s3 [*#CUt');
define('LOGGED_IN_KEY',    'C4Jid%qoc4{|0Lsh[4+_/xTWrf1Y@5F?|as8hmlSA,*v.Zi}E2+w1kzT[VhA9b@Z');
define('NONCE_KEY',        'W+l&,vy0888+=6_}]-T)H?tD*g2R,[He52o@S_>SYNzRp&AmeN`~=k@j0b16*^D7');
define('AUTH_SALT',        ')*tvvMX0V9bgu/A4*P^ ~cx&}:qM6uG|5#@Ht*$k[1NK7|pA?iLc,<;QxN4!61r.');
define('SECURE_AUTH_SALT', 'KI*U:|H8 +|*X`N!MT-=5[=A|xXhq8q7pU?lOq-7yin?G~;5LYy|al$|wt+K&(Z*');
define('LOGGED_IN_SALT',   '+j8BJ+z`JdXjCxyL9:!/rd->3Q;Fmc5=|Kii^g*.Q!ZCfE9#_)|E#=+G2u(! /A<');
define('NONCE_SALT',       ')Z-wed#s{d+otc[4YfeaAf^xpKNAP-b8*^,It L$]BR kNnmI2!Kd} +7-sF`:8)');
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