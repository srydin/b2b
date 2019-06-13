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

        $obj = $_GET['obj'] ?? '';
        $is_edit = ($obj ? true : false);
        // check for nonce & verify
        if ($is_edit && !wp_verify_nonce($_GET['_wpnonce'], 'sp_obj')){
            wp_die('Action failed.');
        }

        // setup the company
        $company = new Company();
        if (!empty($obj)){
            $company = $company->find_by_id((int) $obj);
        }

        if ($_POST) {
            // MERGE attributes
            $post_data = $_POST;

            $has_logo = !empty($_FILES);

            if ($has_logo){
                // works to here
                $image_id = media_handle_upload( 'company_logo', 0 );
                $image_url = wp_get_attachment_url( $image_id );
                $post_data['logoURL'] = $image_url;
            }


            foreach ($post_data as $name => $value){
                if (property_exists($company, $name)){
                    $company->$name = $value;
                }
            }

            $company->merge_attributes();
            $result = $company->save();

            if ($result > 0){
                create_b2b_notice('Company info saved successfully.', 'notice');
            }

            elseif($result === 0){
                create_b2b_notice('Nothing saved.', 'notice');
            }

            else{
                create_b2b_notice('Something went wrong.', 'warning');
            }

        }

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
            'Companies',
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
            'companies_edit', // menu_slug,
            [ $this, 'company_edit_page' ]
        );
    }

}


?>