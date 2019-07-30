<?php

class Company extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_company";
    public static $db_columns = ['id','name','category','rank','logoURL','award','rating','address1','state','city','zip','description','slug','email','phone','is_accredited','deal_type','pod_1','pod_2','pod_3','pod_4','CTA','primary_color','secondary_color','profile_id'];
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
    public $deal_type;
    public $pod_1;
    public $pod_2;
    public $pod_3;
    public $pod_4;
    public $CTA;
    public $primary_color;
    public $secondary_color;
    public $profile_id;

    // Methods
    public function __construct($args=[]){
         foreach($args as $k => $v) {
           if(property_exists($this, $k)) {
             $this->$k = $v;
           }
         }
    }

    public function star_count(){
        return number_format( ( (int) $this->rating / 20 ) , 2);
    }

    public function get_category_id(){
        return $this->category;
    }

    public function get_category_name(){
        $category = new Category();
        return $category->category_name_by_id( $this::get_category_id() );
    }

    public function go_link(){
        return 'https://go.b2breviews.com/' . $this->slug;
    }

    public function get_logo(){
        $logoURL = !empty($this->logoURL) ? $this->logoURL : 'https://via.placeholder.com/300x160';
        return $logoURL;
    }

    public function get_CTA(){
        $cta = !empty($this->CTA) ? $this->CTA : 'Visit Site';
        return $cta;
    }

    public function name_to_link()
    {
        $name = $this->name;
        return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
            array('', '-', ''), $name));
    }

    public function get_review_link(){
        $has_link = !empty($this->profile_id) ? true : false;

        if ($has_link){
            return get_permalink($this->profile_id);
        }
        else {
            return $_SERVER['REQUEST_URI'] . "#" . $this->name_to_link();
        }
    }

    public function get_stats(){
        $output = "<div id=\"b2b-score\" class=\"col-sm-9 col-xs-8\">";
        for ($x = 1; $x <= 4; $x++) {
            $rating = 'rating_' . $x;
            $descriptor = 'descriptor_' . $x;

            if (get_field($rating)){
                $output .= "<div class=\"sub-line\"><span class=\"sub-label\">" . get_field($descriptor) . "</span><div class=\"sub-score\">" . get_field($rating) . "</div></div>";
            }

        }
        $output .= "</div>";
        return $output;
    }

    public function get_company_input_callback($item){

        $input = "";

        $num_inputs = [
            'rank','zip','rating'
        ];

        if ($item === 'is_accredited'){
            $is_checked = ($this->$item > 0 ? true : false);
            $input .= "<input type=\"radio\" name=\"$item\" value=\"1\"" . ($is_checked ? ' checked' : '') . "> Accredited<br>";
            $input .="<input type=\"radio\" name=\"$item\" value=\"0\"" . ($is_checked ? '' : ' checked') . "> Not Accredited<br>";
        }

        elseif ($item === 'description'){
            $input .= "<textarea class='form-control' rows='4' name=\"$item\" value=\"1\">" . $this->description . "</textarea>";
        }

        elseif ($item === 'category'){
            $categories = new Category();
            $categories = $categories->categories_array();
            $input .= "<select class='form-control' name=\"$item\" id=\"company_data_$item\" required>";
            $input .= "<option value=\"\">Select a category</option>";

            foreach ($categories as $category){
                $is_selected = ($this->category == $category['id'] ? true : false);
                $input .= "<option " . ($is_selected ? ' selected' : '') . " value=\"" . $category['id'] . "\">" . $category['name'] . "</option>";
            }
            $input .= "</select>";
        }

        elseif ($item === 'profile_id'){

            $input = "<select name=\"profile_id\" id=\"profile_id\">";
            $input .= "<option value=\"\">Please choose a <review></review></option>";
            global $post;
            $args = array(
                'post_type' => 'reviews',
                'numberposts' => -1,
                'orderby' => 'title',
                'order'   => 'ASC'
            );
            $posts = get_posts($args);
            foreach( $posts as $post ) {
                setup_postdata($post);
                $selected = ($this->profile_id == $post->ID) ? ' selected ' : '';
                $input .= "<option value=" . $post->ID . "\"" . $selected . ">" . $post->post_title . "</option>";
            } // foreach post
            $input .= "</select>";
        }

        elseif ($item === 'deal_type'){
            $deal = new Deal();
            $deal_types = $deal::DEAL_TYPES;
            $input .= "<select class='form-control' name=\"$item\" id=\"company_data_$item\" required>";
            $input .= "<option value=\"\">Select a deal type</option>";

            $i = 0;
            foreach ($deal_types as $deal_type){
                $is_selected = ($this->deal_type === (string) $i ? true : false);
                $input .= "<option " . ($is_selected ? ' selected' : '') . " value=\"" . $i . "\">" . $deal_types[$i] . "</option>";
                ++$i;
            }
            $input .= "</select>";
        }

        elseif ($item === 'logoURL'){
            if (!empty($this->logoURL)){
                $input .=  "<img src=\"$this->logoURL\" style=\"width:300px;\"><br>";
                $input .=  "<input type=\"hidden\" value='$this->logoURL' name=\"logoURL\" id=\"logoURL\" />";
                $input .=  "<a id=\"clear_logo\">Remove/replace</a>";
            }
            else{
                $input .=  "<input type=\"file\" name=\"company_logo\" id=\"company_logo\"  multiple=\"false\" />";
            }
        }

        elseif (in_array($item,$num_inputs)){
            $input .= "<input class='form-control' id=\"company_data_" . wp_unslash(esc_html($item)) ."\" name=\"$item\" type=\"number\" value=\"" . wp_unslash(esc_html($this->$item)) . "\">";

        }

        else{
            $input .= "<input class='form-control' id=\"company_data_" . wp_unslash(esc_html($item)) ."\" name=\"$item\" type=\"text\" value=\"" . wp_unslash(esc_html($this->$item)) . "\">";

        }
        return $input;
    }
}
?>