<?php

class Company extends DatabaseObject {

    // Properties
    public static $table_name = "b2b_company";
    public static $db_columns = ['id','name','category','rank','logoURL','award','rating','address1','state','city','zip','description','slug','email','phone','is_accredited','deal_type','pod_1','pod_2','pod_3','pod_4','CTA','primary_color','secondary_color'];
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


    // Methods
    public function __construct($args=[]){
         foreach($args as $k => $v) {
           if(property_exists($this, $k)) {
             $this->$k = $v;
           }
         }
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