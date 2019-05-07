<?php

// path definition
$base_path = get_template_directory() . '/functions/';

// make sure this wp class is loaded
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


require_once($base_path . 'classes/class-databaseobject.php');
require_once($base_path . 'classes/class-screenlistobject.php');
require_once($base_path . 'classes/class-screenobject.php');
require_once($base_path . 'classes/class-company.php');
require_once($base_path . 'classes/class-category.php');
require_once($base_path . 'classes/class-companyscreenlist.php');
require_once($base_path . 'classes/class-categoryscreenlist.php');
require_once($base_path . 'classes/class-companyscreen.php');
require_once($base_path . 'classes/class-categoryscreen.php');


function b2b_create_table( $table_name, $create_ddl ) {
    global $wpdb;

    $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $table_name ) );

    if ( $wpdb->get_var( $query ) == $table_name ) {
        return true;
    }

    // Didn't find it try to create it..
    $wpdb->query( $create_ddl );

    // We cannot directly tell that whether this succeeded!
    if ( $wpdb->get_var( $query ) == $table_name ) {
        return true;
    }
    return false;
}

$table_name = "b2b_category";
$create_ddl = "CREATE TABLE `b2b_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
b2b_create_table($table_name,$create_ddl);

$table_name = "b2b_company";
$create_ddl = "CREATE TABLE `b2b_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `rank` int(11) DEFAULT '0',
  `zip` int(11) DEFAULT '0',
  `logoURL` varchar(255) DEFAULT NULL,
  `award` varchar(30) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT '0',
  `state` varchar(255) DEFAULT '',
  `city` varchar(255) DEFAULT '',
  `country` varchar(25) DEFAULT '',
  `address1` varchar(45) DEFAULT '',
  `description` text,
  `slug` varchar(255) DEFAULT '',
  `email` varchar(255) DEFAULT '',
  `phone` varchar(25) DEFAULT '',
  `is_accredited` tinyint(4) DEFAULT '0',
  `pod_1` varchar(40) DEFAULT '',
  `pod_2` varchar(40) DEFAULT '',
  `pod_3` varchar(40) DEFAULT NULL,
  `pod_4` varchar(40) DEFAULT NULL,
  `CTA` varchar(40) DEFAULT '',
  `primary_color` varchar(10) DEFAULT '',
  `secondary_color` varchar(10) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
b2b_create_table($table_name,$create_ddl);