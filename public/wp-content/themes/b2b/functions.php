<?php

// Define base directory for functions
$base_path = get_template_directory() . '/functions/';

// Initialize
require($base_path . 'initialize.php');

add_action( 'init', function () {
    CompanyScreen::get_instance();
    b2b_CategoryScreen::get_instance();
    ReviewScreen::get_instance();
    }
);

// disable gutenberg

add_filter('use_block_editor_for_post', '__return_false');



