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

function b2b_add_image_support_for_posts() {
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    add_image_size( 'hero-thumb', 400, 335 );
}
add_action( 'init', 'b2b_add_image_support_for_posts' );

// remove pesky paragraph auto tagging
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function b2b_add_excerpt_support_for_reviews() {
    add_post_type_support( 'reviews', 'excerpt' );
}
add_action( 'init', 'b2b_add_excerpt_support_for_reviews' );


// error notices

function create_b2b_notice($message = "", $type = ""){
    $_SESSION['b2b_notice'] = $message;
    $_SESSION['b2b_notice_type'] = $type;
}

function display_theme_notices(){
    if (isset($_SESSION['b2b_notice']) && $_SESSION['b2b_notice_type'] === 'notice'){
        $message = $_SESSION['b2b_notice'];
        unset($_SESSION['b2b_notice_type']);
        unset($_SESSION['b2b_notice']);
        return b2b_update_notice($message);
    }
    if (isset($_SESSION['b2b_notice']) && $_SESSION['b2b_notice_type'] === 'warning'){
        $message = $_SESSION['b2b_notice'];
        unset($_SESSION['b2b_notice_type']);
        unset($_SESSION['b2b_notice']);
        return b2b_error_notice($_SESSION['b2b_notice']);
    }
}
add_action( 'admin_menu', 'display_theme_notices' );

function b2b_error_notice($message) {
    $notice = "<div class=\"error notice\">";
    $notice .= "<p>$message</p>";
    $notice .= "</div>";
    return $notice;
}
function b2b_update_notice($message) {
    $notice = "<div class=\"updated notice\">";
    $notice .= "<p>$message</p>";
    $notice .= "</div>";
    return $notice;
}



function get_http_headers(){

        $headers = [];

        foreach ($_SERVER as $k => $v) {
            if (substr($k,0,5) == 'HTTP_') {
                $hkey = str_replace(' ', '-',
                    ucwords(strtolower(str_replace('_', ' ', substr($k, 5)))));
                $headers[$hkey] = $v;
            }
        }

        return $headers;

}

function review_form($company=false){
    $reviews = new Review(['company_id' => $company->id]);
    echo $reviews->review_form();
}

function collect_review($company_id){

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $title = $_POST['title'];
    $rating = $_POST['review_rating'];
    $name = $_POST['company_name'] ?? false;
    $reviewer_company = $_POST['reviewer_company'];
    $timestamp = date('Y-m-d G:i:s');

    $args = [
        'first_name' => $fname,
        'last_name' => $lname,
        'status' => 'submitted',
        'email' => $email,
        'city' => $city,
        'state' => $state,
        'title' => $title,
        'reviewer_company' => $reviewer_company,
        'rating' => (int) $rating,
        'review_text_unmoderated' => $_POST['review_text_unmoderated'],
        'date_submitted' => $timestamp
    ];

    $is_validated = validate_review_data($args);

    if ($is_validated){

        // create a new company for validated reviews
        if(!$company_id){
            $company = new Company();
            $company->name = $name;
            $company_id = $company->save();
        };

        // only add company id after we're sure it exists
        $args['company_id'] = $company_id;

        // create the review obj and save
        $submitted_review = new Review($args);
        $submitted_review->headers = json_encode( get_http_headers() );
        $submitted_review->token = uniqid();

        $submitted_review->save(); // these are escaped on the save

        // todo configure notification
        wp_mail($submitted_review->email,'Important notice','check this out!');

        // remove company id from the session
        unset($_SESSION['company_id']);
        $url = site_url() . '/thanks';
        wp_redirect($url);
    }
    else{
        return false;
    }


    // todo is this secure enough? is there anything else we do .. eg. tokens?
}

function display_b2b_errors(){
    if ($_SESSION['errors']){
        echo "<div class=\"alert alert-warning\">";
        echo "<strong>Warning!</strong> " .$_SESSION['errors'];
        echo "</div>";
        unset($_SESSION['errors']);
    }
}
// disable html editor
add_filter( 'user_can_richedit' , '__return_false', 50 );

function get_parent_page_url($value){
    global $wpdb;

    $query_args = array(
        array(
            'key' => '_wp_page_template',
            'value' => 'template-buyers-guides.php',
            'compare' => '='
        ),
        array(
            'key' => 'category_id',
            'value' => $value,
            'compare' => '='
        )
    );

    $args = array(
        'post_type' => 'page',
        'meta_query' => $query_args
    );

    // The Query
    $alt_query = new WP_Query( $args );

    if ( $alt_query->have_posts() ) {

        while ( $alt_query->have_posts() ) {

            $alt_query->the_post();

            $this_post_url = get_the_permalink();
        }
    }

    wp_reset_query(); // in case this function is used in the loop

    $result = !empty($this_post_url) ? $this_post_url : false;

    return $result;
}