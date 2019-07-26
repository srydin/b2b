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


// post support
function b2b_add_excerpt_support_for_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'b2b_add_excerpt_support_for_pages' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


// error notices

function create_b2b_notice($message = "", $type = ""){
    $_SESSION['b2b_notice'] = $message;
    $_SESSION['b2b_notice_type'] = $type;
}

function display_theme_notices(){
    if (isset($_SESSION['b2b_notice']) && $_SESSION['b2b_notice_type'] === 'notice'){
        b2b_update_notice($_SESSION['b2b_notice']);
        unset($_SESSION['b2b_notice_type']);
        unset($_SESSION['b2b_notice']);
    }
    if (isset($_SESSION['b2b_notice']) && $_SESSION['b2b_notice_type'] === 'warning'){
        b2b_error_notice($_SESSION['b2b_notice']);
        unset($_SESSION['b2b_notice_type']);
        unset($_SESSION['b2b_notice']);
    }
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

function review_form($company_id){
    // todo create modal?
    $reviews = new Review(['company_id' => $company_id]);
    echo $reviews->review_form();
}

function collect_review($company_id){
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $rating = $_POST['review_rating'];
    $timestamp = date('Y-m-d G:i:s');

    $args = [
        'first_name' => $fname,
        'last_name' => $lname,
        'status' => 'submitted',
        'company_id' => $company_id,
        'rating' => (int) $rating,
        'review_text_unmoderated' => $_POST['review_text_unmoderated'],
        'date_submitted' => $timestamp
    ];
    $submitted_review = new Review($args);
    $submitted_review->save(); // these are escaped on the save

    // todo send notification? move to separate page?
    // todo is this secure enough? is there anything else we do .. eg. tokens?
}