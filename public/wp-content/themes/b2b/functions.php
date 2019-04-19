<?php

// Define base directory for functions
$base_path = get_template_directory() . '/functions/';

// Initialize
require($base_path . 'initialize.php');

add_action( 'init', function () {
    CompanyScreen::get_instance();
} );