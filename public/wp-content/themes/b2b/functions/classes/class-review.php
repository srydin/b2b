<?php

class Review extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_review";

    public static $db_columns = ['id','first_name','last_name','company_id','rating','review_text_unmoderated','review_text_moderated','headers','date_submitted','token','status','name'];
    public $name;
    public $first_name;
    public $last_name;
    public $company_id;
    public $rating;
    public $review_text_unmoderated;
    public $review_text_moderated;
    public $headers;
    public $date_submitted;
    public $token;
    public $status;

    public const STATUS_TYPES = ['submitted','published','no_publish'];

    // Methods
    public function __construct($args=[]){
        foreach($args as $k => $v) {
            if(property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
        if (isset($this->first_name)){
            $this->name = ($this->first_name . " " . $this->last_name);
        }
    }

    public function leave_rating(){
        $output = "<select class=\"form-control\" name='review_rating' required>";
        $output .= "<option value=''>Leave a rating</option>";
        $min = 1;
        for ($i = 5; $i >= $min; --$i){
            $output .= "<option value='$i'>$i</option>";
        }
        $output .= "</select>";
        return $output;
    }

    public function review_form(){
        $output = "<form method='post'>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='first_name'>First Name</label>";
        $output .= "<input id='first_name' type='text' name='first_name' class='form-control'>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='last_name'>Last Name</label>";
        $output .= "<input id='last_name' type='text' name='last_name' class='form-control'>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='review_rating'>Rating</label>";
        $output .= $this->leave_rating();
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='review_text'>Review</label>";
        $output .= "<textarea name='review_text_unmoderated' class=\"form-control\" rows=\"3\"></textarea>";
        $output .= "</div>";
        $output .= "<button class='btn btn-primary' type='submit'>Send review</button>";
        $output .= "</form>";
        return $output;
    }

    public function reviews_by_company_id(){
        global $wpdb;
        $where = "SELECT * FROM " . $this::$table_name . " WHERE company_id=" . $this->company_id;
        $reviews = $wpdb->get_results( $where, ARRAY_A );
        return $reviews;
    }

    public function published_reviews_by_company_id(){
        global $wpdb;
        $where = "SELECT * FROM " . $this::$table_name . " WHERE company_id=" . $this->company_id . " AND status='published'";
        $reviews = $wpdb->get_results( $where, ARRAY_A );
        return $reviews;
    }
}
?>