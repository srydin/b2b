<?php

class Category extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_category";
    public static $db_columns = [
        'id',
        'name',
        'description',
        'descriptor_1',
        'descriptor_2',
        'descriptor_3',
        'descriptor_4',
        'metric_1',
        'metric_2',
        'metric_3',
        'metric_4'
    ];
    public $id;
    public $name;
    public $description;
    public $descriptor_1;
    public $descriptor_2;
    public $descriptor_3;
    public $descriptor_4;
    public $metric_1;
    public $metric_2;
    public $metric_3;
    public $metric_4;

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

        $output = "<table class='table-condensed'><tbody>";
        echo $output;

        foreach ($companies as $company){
            $company_obj = new Company();
            $company = $company_obj->find_by_id($company['id']);
            include ('templates/category-table-row.php');
        }

        $output = "</tbody></table>";
        echo $output;
    }

    public function feature_row(){
        include ('templates/category-feature.php');
    }

    public function get_stats(){
        $output = "";
        for ($x = 1; $x <= 4; $x++) {
            $metric = 'metric_' . $x;
            $descriptor = 'descriptor_' . $x;
            if ( !empty( $this->$metric ) ){ // if if metric has info
                $output .= "<li><span class=\"md-blue-bg inline sm-text-1\">" . $this->$metric . "</span>" . $this->$descriptor . "</li>";
            } // if metric has info
        }
        return $output;
    }
}
?>