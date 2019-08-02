<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class ReviewScreenList extends ScreenListObject {

    public static $singular_name = "Review";
    public static $plural_name = "Reviews";
    public static $class_reference = "Review";

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
            'first_name' => array( 'first_name', true ),
            'last_name' => array( 'last_name', true ),
            'date_submitted' => array( 'date_submitted', true ),
            'id' => array( 'id', true ),
            'status' => array( 'status', true ),
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
        $arr = ['name','id','status','date_submitted'];

        //array_shift($arr);
        foreach ($arr as $item){
            $columns[$item] = __( ucwords($item), 'sp' );
        }

        return $columns;
    }
}
?>