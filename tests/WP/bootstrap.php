<?php

/**
 * PHPUnit WP integration test bootstrap file
 */

namespace Hirasso\WP\ThumbhashPlaceholders\Tests\WP;

use Yoast\WPTestUtils\WPIntegration;

// Disable xdebug backtrace.
if (\function_exists('xdebug_disable')) {
    \xdebug_disable();
}

echo 'Welcome to the Thumbhash Placeholders Test Suite' . \PHP_EOL;
echo 'Version: 1.0' . \PHP_EOL . \PHP_EOL;

/*
 * Load the plugin(s).
 */
require_once \dirname(__DIR__, 2) . '/vendor/yoast/wp-test-utils/src/WPIntegration/bootstrap-functions.php';

// Get access to tests_add_filter() function.
require_once WPIntegration\get_path_to_wp_test_dir() . 'includes/functions.php';

\tests_add_filter(
    'muplugins_loaded',
    static function () {
        require_once \dirname(__DIR__, 2) . '/thumbhash-placeholders.php';
    }
);

/*
 * Load WordPress, which will load the Composer autoload file, and load the MockObject autoloader after that.
 */
WPIntegration\bootstrap_it();
