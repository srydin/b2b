<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class CompanyScreenList extends ScreenListObject {

    public static $singular_name = "Company";
    public static $plural_name = "Companies";
    public static $class_reference = "Company";

    /** Class constructor */
    public function __construct() {

        ScreenListObject::__construct( [
            'singular' => __( '', static::$singular_name ), //singular name of the listed records
            'plural'   => __( static::$plural_name, 'sp' ), //plural name of the listed records
            'ajax'     => false //does this table support ajax?
        ] );

    }

    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
        $sortable_columns = array(
            'name' => array( 'name', true ),
            'category' => array( 'category', true )
        );

        return $sortable_columns;
    }


    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        $columns = [
            'cb'      => '<input type="checkbox" />'
        ];

        //$arr = static::$class_reference::$db_columns;
        $arr = ['name','category','rank'];

        //array_shift($arr);
        foreach ($arr as $item){
            $columns[$item] = __( ucwords($item), 'sp' );
        }

        return $columns;
    }
}
?>