<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class CompanyScreen extends ScreenObject {

    // class instance
    static $instance;

    // WP_List_Table object
    public $CompanyScreenList;

    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
        add_action( 'admin_menu', [ $this, 'company_menu' ] );
        add_action( 'admin_menu', [ $this, 'company_edit' ] );
    }

    /**
     * listings page
     */
    public function company_listings_page() {
        include ( __DIR__ . '/templates/company-listing.php');
    }

    public function company_edit_page() {
        include ( __DIR__ . '/templates/company-edit.php');
    }

    /**
     * Screen options
     */
    public function screen_options() {

        $option = 'per_page';
        $args   = [
            'label'   => 'Companies',
            'default' => 20,
            'option'  => '_per_page'
        ];

        add_screen_option( $option, $args );

        $this->CompanyScreenList = new CompanyScreenList();
    }

    public function edit_options() {

        add_query_arg(['action' => 'edit']);
    }

    public function company_menu() {

        $hook = add_menu_page(
            'Companies',
            'Companies List',
            'manage_options',
            'companies',
            [ $this, 'company_listings_page' ]
        );

        add_action( "load-$hook", [ $this, 'screen_options' ] );

    }

    public function company_edit() {


        // Submenu for "Add Company"
        add_submenu_page(
            'companies',
            "Add New Company", // page title
            "Add New Company", // menu title
            'manage_options', // capability
            'company_edit', // menu_slug,
            [ $this, 'company_edit_page' ]
        );
    }

}


?>