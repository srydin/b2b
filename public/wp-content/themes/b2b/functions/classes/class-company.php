<?php

class Company extends DatabaseObject {

    // Properties
    protected static $table_name = 'b2b_company';
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
}
?>