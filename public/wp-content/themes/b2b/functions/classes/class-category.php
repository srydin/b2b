<?php

class Category extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_category";
    public static $db_columns = ['id','name'];
    public $id;
    public $name;


    // Methods
    public function __construct($args=[]){
         foreach($args as $k => $v) {
           if(property_exists($this, $k)) {
             $this->$k = $v;
           }
         }
    }

    public function categories_array(){
        global $wpdb;
        $categories = $wpdb->get_results( "SELECT * FROM b2b_category", ARRAY_A );
        return $categories;
    }

    public function category_name_by_id($id){

        global $wpdb;

        $category = $wpdb->get_row( "SELECT * FROM b2b_category WHERE id={$id}", ARRAY_A );

        return $category['name'];
    }
}
?>