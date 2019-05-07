<?php

class Company extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_company";
    public static $db_columns = ['id','name','category','rank','zip','logoURL','award','rating','state','city','address1','description','slug','email','phone','is_accredited','pod_1','pod_2','pod_3','pod_4','CTA','primary_color','secondary_color'];
    public $id;
    public $name;
    public $category;
    public $rank;
    public $zip;
    public $logoURL;
    public $award;
    public $rating;
    public $state;
    public $city;
    public $address1;
    public $description;
    public $slug;
    public $email;
    public $phone;
    public $is_accredited;
    public $pod_1;
    public $pod_2;
    public $pod_3;
    public $pod_4;
    public $CTA;
    public $primary_color;
    public $secondary_color;


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