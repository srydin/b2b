<?php

$base_path = get_template_directory() . '/functions/';

spl_autoload_register(function ($class_name) {
    global $base_path;
    $class_name = strtolower($class_name);
    include $base_path . 'classes/class-' . $class_name . '.php';
});

function db_connect() {
    $connection = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    return $connection;
}

$db = db_connect();
DatabaseObject::set_database($db);
