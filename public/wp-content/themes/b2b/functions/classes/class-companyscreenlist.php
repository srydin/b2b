<?php

class CompanyScreenList {

    // class instance
    static $instance;

    // WP_List_Table object
    public $company_obj;

    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
        add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
    }


    public static function set_screen( $status, $option, $value ) {
        return $value;
    }

    public function plugin_menu() {

        $hook = add_menu_page(
            'Company List',
            'Company List',
            'manage_options',
            'companies',
            [ $this, 'plugin_settings_page' ]
        );

        add_action( "load-$hook", [ $this, 'screen_option' ] );

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
                                $this->company_obj->prepare_items();
                                $this->company_obj->display(); ?>
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
    public function screen_option() {

        $option = 'per_page';
        $args   = [
            'label'   => 'Companies',
            'default' => 5,
            'option'  => '_per_page'
        ];

        add_screen_option( $option, $args );

        $this->company_obj = new CompanyScreen();
    }


    /** Singleton instance */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
?>