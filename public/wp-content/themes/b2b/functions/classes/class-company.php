<?php

class Company extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_company";
    public static $db_columns = ['id','name','category','rank'];
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
}
?>