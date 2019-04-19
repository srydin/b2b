<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class CompanyScreenList extends ScreenListObject {

    public static $singular_name = "Company";
    public static $plural_name = "Companies";
    public static $class_reference = "Company";

    /** Class constructor */
    public function __construct() {

        WP_List_Table::__construct( [
            'singular' => __( '', static::$singular_name ), //singular name of the listed records
            'plural'   => __( static::$plural_name, 'sp' ), //plural name of the listed records
            'ajax'     => false //does this table support ajax?
        ] );

    }
}
?>