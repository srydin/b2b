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


// error notices

function create_b2b_notice($message = "", $type = ""){
    $_SESSION['b2b_notice'] = $message;
    $_SESSION['b2b_notice_type'] = $type;
}

function display_theme_notices(){
    if (isset($_SESSION['b2b_notice']) && $_SESSION['b2b_notice_type'] === 'notice'){
        b2b_update_notice($_SESSION['b2b_notice']);
    }
    if (isset($_SESSION['b2b_notice']) && $_SESSION['b2b_notice_type'] === 'warning'){
        b2b_error_notice($_SESSION['b2b_notice']);
    }
    unset($_SESSION['b2b_notice']);
    unset($_SESSION['b2b_notice_type']);
}
add_action( 'admin_menu', 'display_theme_notices' );

function b2b_error_notice($message) {
    $notice = "<div class=\"error notice\">";
    $notice .= "<p>$message</p>";
    $notice .= "</div>";
    echo $notice;
}
function b2b_update_notice($message) {
    $notice = "<div class=\"updated notice\">";
    $notice .= "<p>$message</p>";
    $notice .= "</div>";
    echo $notice;
}
