<?php

class DatabaseObject {

    // Definitions
    public $id;
    static protected $database;
    static protected $table_name = "";
    static protected $db_columns = [];
    public $errors = [];

    // Methods


    // SQL statements
    static public function find_by_sql($sql) {
        global $wpdb;
        $results = $wpdb->get_results($sql, OBJECT ); // don't forget to escape as needed
        if(!$results) {
            return false;
        }

        // results into objects
        $object_array = [];

        foreach ($results as $result){
            $object_array[] = static::instantiate($result);
        }

        return $object_array;
    }

    static public function select_list($args=[]){

        $class = $args['class'] ?? '';
        $id = $args['id'] ?? '';
        $selected = $args['selected'] ?? false;
        $name = $args['name'] ?? '';

        global $wpdb;
        $sql = "SELECT * FROM " . static::$table_name;
        $results = $wpdb->get_results($sql, ARRAY_A );
        if(!$results) {
            exit("Database query failed.");
        }

        $output = "";
        $output .= "<select id=\"$id\" class=\"$class\" name='$name'>";
        $output .= "<option value=''>Select one (optional)</option>";
        foreach ($results as $result){
            $output .= "<option value='" . $result['id'] . "'" . ($selected == $result['id'] ? ' selected' : '') .  ">" . $result['name'] . "</option>";
        }
        $output .= "</select>";

        return $output;
    }

    static public function find_all() {
        $sql = "SELECT * FROM " . static::$table_name;
        return static::find_by_sql(esc_sql($sql));
    }

    static public function count_all() {
        global $wpdb;
        $count = $wpdb->get_var( esc_sql("SELECT COUNT(*) FROM " . static::$table_name ));
        return $count;
    }

    static public function find_by_id($id) {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . (int) $id . "'";
        $obj_array = static::find_by_sql($sql);
        if(!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    static protected function instantiate($record) {
        $object = new static;
        // Could manually assign values to properties
        // but automatically assignment is easier and re-usable
        foreach($record as $property => $value) {
            if(property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }
//
    protected function validate() {
        $this->errors = [];

        // Add validators to classes that inherit this method

        return $this->errors;
    }

    protected function create() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        global $wpdb;
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = $wpdb->query($sql);
        if($result) {
            $result = $wpdb->insert_id;
        }
        return $result;
    }

    protected function update() {
        $this->validate();
        if(!empty($this->errors)) { return false; }

        global $wpdb;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id='" . esc_sql($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = $wpdb->query($sql);
        return $result;
    }

    public function save() {
        // A new record will not have an ID yet
        if(isset($this->id)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }

    public function merge_attributes($args=[]) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Properties which have database columns, excluding ID
    public function attributes() {
        $attributes = [];
        foreach(static::$db_columns as $column) {
            if($column == 'id') { continue; }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }
//
    protected function sanitized_attributes() {
        global $wpdb;
        $sanitized = [];
        foreach($this->attributes() as $key => $value) {
            $sanitized[$key] = esc_sql($value);
        }
        return $sanitized;
    }
//
    public function delete() {
        global $wpdb;
        $result = $wpdb->delete( static::$table_name, array( 'id' => $this->id ) );
        return $result;
    }

}

?>
