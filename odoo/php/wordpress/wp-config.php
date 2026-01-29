<?php
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
define( 'DB_NAME', 'mydatabase' );

/** Database username */
define( 'DB_USER', 'myuser' );

/** Database password */
define( 'DB_PASSWORD', 'mypassword' );

/** Database hostname */
define( 'DB_HOST', 'mysql' );

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
define( 'AUTH_KEY',         ']<_It_8bs#D&yit?:{0F[bg.K_qLk_w?W/mytvsPm%NhA@ PuyNN!P<^XR3Q=rh9' );
define( 'SECURE_AUTH_KEY',  'UVcy,tKEKgzE_?J$O}RumovMnsUrHE~,k[%VUf`DeI)Xs]PW J8C%-&*$v]aa8K_' );
define( 'LOGGED_IN_KEY',    'K0?z2)7Q?HF_{:3-A[;hAwnp(2%QbO1BiMxZ=qg8e$BNY!de/K%4df[3eON5NI,3' );
define( 'NONCE_KEY',        'jH_!|Q$iKakzh+yhgaz}g`I,hE(8j7< +O_B8Wz={a Q_vm|inT|SEtE#2^KdF/u' );
define( 'AUTH_SALT',        'bnGCcr5Q3j&GBF>oKi|^KDlXEfy?*[|kj,q5j+Y9;S@}2KR4ly3[YsP*O2~S79PR' );
define( 'SECURE_AUTH_SALT', 'zU{cn^B?SdCWp/M8N[|rp8Dd)MsB23$5lr.l*0+SK[z FqI+9*M)Le6@7smqWq y' );
define( 'LOGGED_IN_SALT',   'W=I.5q:3wWJg:uSxo@[##h}rU23>J`)OoI|4J3=@~tBOl;eGY7}jQHV`UWx5nVb0' );
define( 'NONCE_SALT',       'x3/5j |IiG7p=.Q0I`OIg_8MSo47M`l^ZNjddf;X:X#{dzy qBv,0+NUTqMuC-NK' );

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
