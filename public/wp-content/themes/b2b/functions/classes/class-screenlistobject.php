<?php
// create an abstract class for wp admin lists
// adapted from https://github.com/Collizo4sky/

class ScreenListObject extends WP_List_Table {

    public static $singular_name = "";
    public static $plural_name = "";
    public static $class_reference = "";

    /** Class constructor */
    public function __construct() {

        parent::__construct( [
            'singular' => __( '', static::$singular_name ), //singular name of the listed records
            'plural'   => __( static::$plural_name, 'sp' ), //plural name of the listed records
            'ajax'     => false //does this table support ajax?
        ] );

    }


    /**
     * Retrieve data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_database_objs( $per_page = 5, $page_number = 1, $columns=[] ) {

        global $wpdb;

        $sql = "SELECT {$columns} FROM " . static::$class_reference::$table_name;

        if ( ! empty( $_REQUEST['orderby'] ) ) {
            $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
            $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
        }

        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


        $result = $wpdb->get_results( $sql, 'ARRAY_A' );

        return $result;
    }

    public static function get_pretty_objs(){

        if(empty($columns)){$columns = "*";}else{$columns = implode(", ", $columns);}

        $array = static::get_database_objs( $per_page = 5, $page_number = 1, $columns);

        foreach ($array as $item => $value){

            $array[$item] = wp_unslash($value);

        }

        return $array;
    }


    /**
     * Delete a record.
     *
     * @param int $id ID
     */
    public static function delete($id) {
        global $db;

        $obj = new static::$class_reference();
        $obj = $obj->find_by_id($id);
        $obj->delete();
    }


    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count() {
        global $db;

        $obj = new static::$class_reference();
        $count = $obj->count_all();

        return $count;
    }


    /** Text displayed when no data is available */
    public function no_items() {
        _e( "Nothing avaliable.", 'sp' );
    }


    /**
     * Render a column when no column specific method exist.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default( $item, $column_name ) {

            $columns = static::$class_reference::$db_columns;

            if (in_array($column_name, $columns)){
                return $item[ $column_name ];
            }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb( $item ) {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
        );
    }


    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_name( $item ) {

        $object_nonce = wp_create_nonce( 'sp_obj' );

        $title = '<strong>' . $item['name'] . '</strong>';

        $actions = [
            'edit' => sprintf( '<a href="?page=%s&action=%s&obj=%s&_wpnonce=%s">Edit</a>', esc_attr( $_REQUEST['page'] ) . '_edit', 'edit', absint( $item['id'] ), $object_nonce ),
            'delete' => sprintf( '<a href="?page=%s&action=%s&obj=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $object_nonce )
        ];

        return $title . $this->row_actions( $actions );
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

        $arr = static::$class_reference::$db_columns;

        array_shift($arr);
        foreach ($arr as $item){
            $columns[$item] = __( ucwords($item), 'sp' );
        }

        return $columns;
    }


    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions() {
        $actions = [
            'bulk-delete' => 'Delete'
        ];

        return $actions;
    }


    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( 'objs_per_page', 20 );
        $current_page = $this->get_pagenum();
        $total_items  = static::record_count();

        $this->set_pagination_args( [
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page //WE have to determine how many items to show on a page
        ] );

        $this->items = self::get_pretty_objs();
    }

    public function process_bulk_action() {

        //Detect when a bulk action is being triggered...
        if ( 'delete' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, 'sp_obj' ) ) {
                die( 'Something went wrong' );
            }
            else {
                static::delete( absint( $_GET['obj'] ) );

                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
                // add_query_arg() return the current url
                $redirect_location = esc_url_raw(add_query_arg());
                $redirect_location = remove_query_arg(array('action','obj','_wpnonce'),$redirect_location);

               echo "<script type='text/javascript'>location.replace(\"$redirect_location\")</script>";
               exit;
            }

        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
            || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
        ) {

            $delete_ids = esc_sql( $_POST['bulk-delete'] );

            // loop over the array of record IDs and delete them
            foreach ( $delete_ids as $id ) {
                static::delete( $id );

            }

            // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
            // add_query_arg() return the current url
            //wp_redirect( esc_url_raw(add_query_arg()) );
            $redirect_location = esc_url_raw(add_query_arg());
            $redirect_location = remove_query_arg(array('action','obj','_wpnonce'),$redirect_location);

            echo "<script type='text/javascript'>location.replace(\"$redirect_location\")</script>";
            exit;
        }
    }

}
?>