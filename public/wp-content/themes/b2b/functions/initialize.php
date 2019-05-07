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
require_once($base_path . 'classes/class-companyscreenlist.php');
require_once($base_path . 'classes/class-companyscreen.php');