<?php
define( 'WP_CACHE', true );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_plugins_themes_practice' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         'puf[tei$YLrqxKT*%KNY4~Do Dht-~A[x8e)kk {3|cc/&9@HKkHDD[oO>vi4vjE' );
define( 'SECURE_AUTH_KEY',  'LUUCN[R5+x0jnTg-c`89~=z<jo5/w#j-2mg&Jp+2/U-~~ubzx{8{IK%5/O{;8j`!' );
define( 'LOGGED_IN_KEY',    '!6GS0xtQ8U%3kHMsyq{0%mN{>]5Co4L6P4}&l1fGu!3Shon9(A@P#@*-sn,U#DV,' );
define( 'NONCE_KEY',        'nS^jUXZWa~r7X.#LSw >=S^0oeY5MqqI%IsJRQcnE+/OA!wO<JJj$K|]OG=}1pw>' );
define( 'AUTH_SALT',        'j+%_+[%#|gk/(C)A;?N-d$TTs~s)gffG]^4MdN~n]3a![z&k`t>5YwW6hHJC[Bg$' );
define( 'SECURE_AUTH_SALT', '*Xuf8Fh}ry*]R8I8KduwEqE6GJeh6BE:NsGd3WB~iQS6_J7#lF1[Yna%KV-}oe3B' );
define( 'LOGGED_IN_SALT',   'C%Y2>$JM+){z^.pJHL0n)~-):.)6R v0pB{S-sHBZbO?vI~Q{[4:zJ+?+H #`i0N' );
define( 'NONCE_SALT',       '7]=;dZi%gI{p53a)N|a6+onC7y<$32[$kM)?Q$Eo1/OtH^%rC^]7C, ?dIh!BJOq' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
