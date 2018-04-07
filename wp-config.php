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
    /** The name of the database for WordPress */
    define('DB_NAME', 'swjudytadeusza');

    /** MySQL database username */
    define('DB_USER', 'root');

    /** MySQL database password */
    define('DB_PASSWORD', 'root');

    define('WP_ENV_VERSION', 'develop');

    /** MySQL hostname */
    define('DB_HOST', 'db');

    define('WP_HOME','http://localhost');
    define('WP_SITEURL','http://localhost');
    define('FORCE_SSL_ADMIN', false);


define('WP_CONTENT_DIR', __DIR__ . '/wp-content');

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
define('AUTH_KEY',         'E#;yX4!;RbZpf|0u8KH0L6ejhe|EIHDcPro3T~X.@jKs>v<egXn|])QgQY#ntdNS');
define('SECURE_AUTH_KEY',  '*bty>N,%?%Y^%LKCu.$x%^8.H8rn+:~PY,8csA(W7b~wK^3 1[|VQG-!tdWe7S}.');
define('LOGGED_IN_KEY',    '7XrTaY*C)-7yaoK^s(P/kx-w(?52|6BnUl+T2YJ=QZErw98VKC+e4/LX?**W2+cT');
define('NONCE_KEY',        '1msUap]-&icu`v~z3B+.F8|?%Z;P)JY<rxZ}jslXzdU=AJRr`:VE99;]?GTFv _3');
define('AUTH_SALT',        'M-z+3]vg?UPF)KPw,b;{B%Dy`|vB@t?m@S+6f~N&oh6RTF@k/7Et]{zO`BC+-VD2');
define('SECURE_AUTH_SALT', 'jaG(j+X<+x{BYi)^3M7K{!RA&gN[OzBU2]b6Q3cz#.>4p~(^o0L12OOagi=T1-yC');
define('LOGGED_IN_SALT',   '$m>=6r/AYwycp>ynk0`Q]%)$|?Q>R/-<5o9rSjlv`Dh|%BCMa3-C*[PPQOez{<V,');
define('NONCE_SALT',       'rX.Pk!JhN9ftuV|8S]Fg-(WKM#L<( !G<|Ax+%r~>E+DiSE/0p<=4xpef!.x#j|!');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR', __DIR__ . '/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'mod193_';

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
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/wordpress/');
}

/** SENTRY */
require_once __DIR__ . '/ErrorHandler.php';
ErrorHandler::make();

try {
    /** Sets up WordPress vars and included files. */
    require_once ABSPATH . 'wp-settings.php';
} catch (Exception $exception) {
    ErrorHandler::captureException($exception);
} catch (Throwable $exception) {
    ErrorHandler::captureException($exception);
}