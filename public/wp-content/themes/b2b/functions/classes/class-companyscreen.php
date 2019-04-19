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
    }

    /**
     * Plugin settings page
     */
    public function plugin_settings_page() {
        ?>
        <div class="wrap">
            <h2>WP_List_Table Class Example</h2>

            <div id="poststuff">
                <div id="post-body" class="metabox-holder columns-2">
                    <div id="post-body-content">
                        <div class="meta-box-sortables ui-sortable">
                            <form method="post">
                                <?php
                                $this->CompanyScreenList->prepare_items();
                                $this->CompanyScreenList->display(); ?>
                            </form>
                        </div>
                    </div>
                </div>
                <br class="clear">
            </div>
        </div>
        <?php
    }

    /**
     * Screen options
     */
    public function screen_options() {

        $option = 'per_page';
        $args   = [
            'label'   => 'Companies',
            'default' => 5,
            'option'  => '_per_page'
        ];

        add_screen_option( $option, $args );

        $this->CompanyScreenList = new CompanyScreenList();
    }

    public function company_menu() {

        $hook = add_menu_page(
            'Company List',
            'Company List',
            'manage_options',
            'companies',
            [ $this, 'plugin_settings_page' ]
        );

        add_action( "load-$hook", [ $this, 'screen_options' ] );

    }
}
?>