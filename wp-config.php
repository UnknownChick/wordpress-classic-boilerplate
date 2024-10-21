<?php
if (getenv('WP_ENV') !== false) {
    define('WP_ENV', preg_replace('/[^a-z]/', '', getenv('WP_ENV')));
}

if (isset($_SERVER['X_FORWARDED_HOST']) && !empty($_SERVER['X_FORWARDED_HOST'])) {
    $hostname = $_SERVER['X_FORWARDED_HOST'];
} else {
    $hostname = $_SERVER['HTTP_HOST'];
}

if (!defined('WP_ENV')) {
    include 'wp-config.env.php';
}

if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

include 'wp-config.default.php';
include 'wp-config.' . WP_ENV . '.php';

if (!defined('WP_SITEURL')) {
    define('WP_SITEURL', $protocol . rtrim($hostname, '/'));
}
if (!defined('WP_HOME')) {
    define('WP_HOME', $protocol . rtrim($hostname, '/'));
}
unset($hostname, $protocol);

if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');
