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
define('DB_NAME', 'elitciii_wp181');

/** MySQL database username */
define('DB_USER', 'elitciii_wp181');

/** MySQL database password */
define('DB_PASSWORD', 'p71!Sh[h22');

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
define('AUTH_KEY',         'sb9ecexksjutdkifryev65vwebzd7h9sctlxcbevtczxpx9tnm4ivknaiflgxjzs');
define('SECURE_AUTH_KEY',  '4xqzcczh3skrnnxbmem6rfsajbjvyzlz9jrzh7w1fvxduubiuunuxi9ywpjxiouj');
define('LOGGED_IN_KEY',    'wmaabe6unntbu0tcywkyxwq1rbxrejcqdj3myqbz9fyu3iqfkbhsxaekje1nhwl8');
define('NONCE_KEY',        'kcbitiozclg9gr0hcg5c2oanzpvzqizvptazczcdmwpjzodqszvv3xgsm7jmdaxr');
define('AUTH_SALT',        'hlnl5yy1m7eg9hl7vvb3v8rzmzdrlggscsrny3t88aial7qqubddkagoebsne8vr');
define('SECURE_AUTH_SALT', 'ltys3eutu8t8serschiujzwmlrn8u34k3g3nya0prpfo0gmevw8gmh1jokq34psy');
define('LOGGED_IN_SALT',   'u6uljr54x8quo4z2ol2njkbhhqfzaf8upod16lyp7ldfunlrp1aoa379oyvnyn3f');
define('NONCE_SALT',       '1k77svsxwdbsg8kb9g5m3fye3y7fda3p0j2trdyex6ghmsfq8twomyguwozkurkg');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpm8_';

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
