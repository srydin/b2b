<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class b2b_CategoryScreen extends ScreenObject {

    // class instance
    static $instance;

    // WP_List_Table object
    public $b2b_CategoryScreenList;

    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
        add_action( 'admin_menu', [ $this, 'b2b_category_menu' ] );
        add_action( 'admin_menu', [ $this, 'b2b_category_edit' ] );
    }

    /**
     * listings page
     */
    public function b2b_category_listings_page() {
        include ( __DIR__ . '/templates/category-listing.php');
    }

    public function b2b_category_edit_page() {
        include ( __DIR__ . '/templates/category-edit.php');
    }

    /**
     * Screen options
     */
    public function b2b_category_screen_options() {

        $option = 'per_page';
        $args   = [
            'label'   => 'Categories',
            'default' => 20,
            'option'  => '_per_page'
        ];

        add_screen_option( $option, $args );

        $this->b2b_CategoryScreenList = new b2b_CategoryScreenList();
    }

    public function b2b_edit_options() {

        add_query_arg(['action' => 'edit']);
    }

    public function b2b_category_menu() {

        $hook = add_menu_page(
            'Categories',
            'Categories',
            'manage_options',
            'b2b_categories',
            [ $this, 'b2b_category_listings_page' ]
        );

        add_action( "load-$hook", [ $this, 'b2b_category_screen_options' ] );

    }

    public function b2b_category_edit() {


        // Submenu for "Add Company"
        add_submenu_page(
            'categories',
            "Add New Category", // page title
            "Add New Category", // menu title
            'manage_options', // capability
            'b2b_categories_edit', // menu_slug,
            [ $this, 'b2b_category_edit_page' ]
        );
    }

}


?>