<?php

// path definition
$base_path = get_template_directory() . '/functions/';

// make sure this wp class is loaded
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

// autoload classes from class folder
//spl_autoload_register(function ($class_name) {
//    global $base_path;
//    $class_name = strtolower($class_name);
//    include $base_path . 'classes/class-' . $class_name . '.php';
//});

require_once($base_path . 'classes/class-databaseobject.php');
require_once($base_path . 'classes/class-company.php');
require_once($base_path . 'classes/class-companyscreen.php');
require_once($base_path . 'classes/class-companyscreenlist.php');


// connect to the db
function db_connect() {
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $connection;
}

// for accessino the db outside of wordpress
$db = db_connect();
DatabaseObject::set_database($db);
