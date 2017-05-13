<?php

define( 'WP_TESTS_DIR',  'path-to-project/wordpress-develop/tests/phpunit/' );

require_once WP_TESTS_DIR . 'includes/functions.php';

function _manually_load_plugin() {
    require 'src/NonceController.php';
}
tests_add_filter( 'plugins_loaded', '_manually_load_plugin' );

require WP_TESTS_DIR . 'includes/bootstrap.php';
