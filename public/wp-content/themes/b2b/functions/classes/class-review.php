<?php

class Review extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_review";

    public static $db_columns = ['id','first_name','last_name','email','city','state','title','reviewer_company','company_id','rating','review_text_unmoderated','review_text_moderated','headers','date_submitted','token','status','name','no_publish_reason'];
    public $name;
    public $first_name;
    public $last_name;
    public $email;
    public $city;
    public $state;
    public $title;
    public $reviewer_company;
    public $company_id;
    public $rating;
    public $review_text_unmoderated;
    public $review_text_moderated;
    public $headers;
    public $date_submitted;
    public $token;
    public $status;
    public $no_publish_reason;

    public const STATUS_TYPES = ['submitted','published','no_publish'];
    public const NO_PUBLISH_REASONS = ['spam','too short','offensive','violates terms','employee','other'];
    public const MIN_REVIEW_LENGTH_CHARS = 285;

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
            $selected = (int) $_POST['review_rating'] == $i ? ' selected' : '';

            $output .= "<option value='$i'$selected>$i</option>";
        }
        $output .= "</select>";
        return $output;
    }

    public function review_form(){

        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $title = $_POST['title'];
        $rating = $_POST['review_rating'];
        $name = $_POST['company_name'] ?? false;
        $reviewer_company = $_POST['reviewer_company'];
        $timestamp = date('Y-m-d G:i:s');

        $output = "<form method='post'>";
        if (!$this->company_id){
            $output .= "<div class=\"form-group\">";
            $output .= "<label for='company_name'>Company</label>";
            $output .= "<input id='company_name' type='text' placeholder='Name' name='company_name' class='form-control'>";
            $output .= "</div>";
        }
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='review_rating'>Rating</label>";
        $output .= $this->leave_rating();
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='review_text'>Review</label>";
        $output .= "<textarea title='Please complete this review with a minimum length of 285 characters.' minlength='285'  name='review_text_unmoderated' class=\"form-control\" rows=\"3\" required>" . htmlspecialchars( $_POST['review_text_unmoderated'] ) . "</textarea>";
        $output .= "</div>";

        $output .= "<hr><h4>Reviewer</h4>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='first_name'>First Name</label>";
        $output .= "<input id='first_name' type='text' name='first_name' class='form-control' value='" . htmlspecialchars($fname) . "' required>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='last_name'>Last Name</label>";
        $output .= "<input id='last_name' type='text' name='last_name' class='form-control' value='" . htmlspecialchars($lname) . "' required>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='email'>Email</label>";
        $output .= "<input id='email' type='text' name='email' class='form-control' value='" . htmlspecialchars($email) . "' required>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='city'>City</label>";
        $output .= "<input id='city' type='text' name='city' class='form-control' value='" . htmlspecialchars($city) . "' required>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='state'>State</label>";
        $output .= "<input id='state' type='text' name='state' class='form-control' value='" . htmlspecialchars($state) . "' required>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='title'>Title (Optional)</label>";
        $output .= "<input id='title' type='text' name='title' class='form-control' value='" . htmlspecialchars($title) . "'>";
        $output .= "</div>";
        $output .= "<div class=\"form-group\">";
        $output .= "<label for='company'>Company (Optional)</label>";
        $output .= "<input id='company' type='text' name='reviewer_company' class='form-control' value='" . htmlspecialchars($reviewer_company) . "'>";
        $output .= "</div>";
        $output .= "<input type='hidden' name='company_id_check' value=" . $this->company_id . ">";
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

    public function published_reviews_by_company_id($page = 1){
        $review_per_page = 10;
        $offset = ( $page - 1 ) * $review_per_page;
        global $wpdb;
        $where = "SELECT * FROM " . $this::$table_name . " WHERE company_id=" . $this->company_id . " AND status='published'";
        if ($page > 1){
            $where .= " OFFSET {$offset}";
        }
        $reviews = $wpdb->get_results( $where, ARRAY_A );
        return $reviews;
    }
}
?>