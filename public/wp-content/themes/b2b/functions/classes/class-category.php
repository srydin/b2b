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

    public function companies_by_category(){
        global $wpdb;

        $sql = "SELECT id FROM " . Company::$table_name . " WHERE category=" . $this->id . " ORDER BY rank";

        $results = $wpdb->get_results( $sql, ARRAY_A );

        return $results;
    }

    public function the_table(){
        $companies = $this->companies_by_category();

        $output = "<h3 class='h2'>Best " . $this->name . " Companies</h3>";
        $output .= "<table class='table-condensed'><tbody>";
        echo $output;

        foreach ($companies as $company){
            $company_obj = new Company();
            $company = $company_obj->find_by_id($company['id']);
            include ('templates/category-table-row.php');
        }

        $output = "</tbody></table>";
        echo $output;
    }
}
?>