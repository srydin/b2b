<?php

class Deal extends DatabaseObject {

    // todo create screens for this IF you decide to manage deals within wp

    // Properties
    public static $table_name = "b2b_deal";

    public static $db_columns = ['id','company_id','type','cpl','mrr','cap','start_date','renewal_date','lead_allowance','phone_length_min'];
    public $company_id;
    public $category_id;
    public $type;
    public $cpl;
    public $mrr;
    public $cap;
    public $start_date;
    public $renewal_date;
    public $lead_allowance;
    public $phone_length_min;

    const DEAL_TYPES = ['None','CPL', 'MRR', 'Hybrid', 'CPA', 'Subscription', 'Affiliate'];


    // Methods
    public function __construct($args=[]){
         foreach($args as $k => $v) {
           if(property_exists($this, $k)) {
             $this->$k = $v;
           }
         }
    }

    public function deal_array(){
        global $wpdb;
        $deal_array = $wpdb->get_results( "SELECT * FROM b2b_deal", ARRAY_A );
        return $deal_array;
    }

    public function get_deal(){
        $deal = $this->type;
        $types = $this::DEAL_TYPES;
        return $types[$deal];
    }
}
?>