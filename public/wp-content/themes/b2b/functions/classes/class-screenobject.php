<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class ScreenObject {

    // class instance
    static $instance;

    // class constructor
    public function __construct() {
        add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
        add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
    }

    // set screen
    public static function set_screen( $status, $option, $value ) {
        return $value;
    }

    /** Singleton instance */
    public static function get_instance() {
        if ( ! isset( static::$instance ) ) {
            static::$instance = new static();
        }

        return static::$instance;
    }

}
?>