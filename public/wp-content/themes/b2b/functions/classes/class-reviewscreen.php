<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class ReviewScreen extends ScreenObject {

    // class instance
    static $instance;

    // WP_List_Table object
    public $ReviewScreenList;

    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
        add_action( 'admin_menu', [ $this, 'reviews_menu' ] );
        add_action( 'admin_menu', [ $this, 'reviews_moderate' ] );
    }

    /**
     * listings page
     */
    public function reviews_listing_page() {
        include ( __DIR__ . '/templates/review-listing.php');
    }

    public function reviews_moderate_page() {
        include ( __DIR__ . '/templates/review-edit.php');
    }

    /**
     * Screen options
     */
    public function reviews_screen_options() {

        $option = 'per_page';
        $args   = [
            'label'   => 'Reviews',
            'default' => 20,
            'option'  => '_per_page'
        ];

        add_screen_option( $option, $args );

        $this->ReviewScreenList = new ReviewScreenList();
    }

    public function reviews_edit_options() {

        add_query_arg(['action' => 'edit']);
    }

    public function reviews_menu() {

        $hook = add_menu_page(
            'Consumer Reviews',
            'Consumer Reviews',
            'manage_options',
            'manage_reviews',
            [ $this, 'reviews_listing_page' ]
        );

        add_action( "load-$hook", [ $this, 'reviews_screen_options' ] );

    }

    public function reviews_moderate() {

        add_submenu_page(
            'manage_reviews',
            "Moderate", // page title
            "Moderate", // menu title
            'manage_options', // capability
            'manage_reviews_edit', // menu_slug,
            [ $this, 'reviews_moderate_page' ]
        );
    }

}


?>