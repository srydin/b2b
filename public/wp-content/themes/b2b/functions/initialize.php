<?php

// path definition
$base_path = get_template_directory() . '/functions/';

// make sure this wp class is loaded
if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

// start sessions
session_start();

// theme files
require_once($base_path . 'classes/class-databaseobject.php');
require_once($base_path . 'classes/class-screenlistobject.php');
require_once($base_path . 'classes/class-screenobject.php');
require_once($base_path . 'classes/class-company.php');
require_once($base_path . 'classes/class-category.php');
require_once($base_path . 'classes/class-companyscreenlist.php');
require_once($base_path . 'classes/class-categoryscreenlist.php');
require_once($base_path . 'classes/class-companyscreen.php');
require_once($base_path . 'classes/class-categoryscreen.php');
require_once($base_path . 'classes/class-deal.php');
require_once($base_path . 'classes/class-review.php');
require_once($base_path . 'classes/class-reviewscreenlist.php');
require_once($base_path . 'classes/class-reviewscreen.php');
require_once($base_path . 'classes/class-review.php');
require_once($base_path . 'sql_initialize.php');
require_once($base_path . 'post_types.php');
require_once($base_path . 'company-metabox.php');

