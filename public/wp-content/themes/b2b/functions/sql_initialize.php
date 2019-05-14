<?php

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
  `deal_type` tinyint(2) DEFAULT '0',
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

$table_name = "b2b_deal";
$create_ddl = "CREATE TABLE `b2b_deal` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `category_id` int(3) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `cpl` int(4) DEFAULT NULL,
  `mrr` int(6) DEFAULT NULL,
  `cap` int(10) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `renewal_date` timestamp NULL DEFAULT NULL,
  `lead_allowance` int(11) DEFAULT NULL,
  `phone_length_min` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

b2b_create_table($table_name,$create_ddl);

$table_name = "b2b_review";
$create_ddl = "CREATE TABLE `b2b_review` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `review_text_unmoderated` text,
  `review_text_moderated` text,
  `headers` varchar(400) DEFAULT NULL,
  `date_submitted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `token` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `status` enum('submitted','published','no_publish') NOT NULL DEFAULT 'submitted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";

b2b_create_table($table_name,$create_ddl);