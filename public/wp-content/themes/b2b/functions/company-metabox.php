<?php

add_action('add_meta_boxes', 'add_b2b_company_metabox');
add_action('add_meta_boxes', 'add_b2b_category_metabox');
add_action('save_post', 'save_b2b_metabox');


function add_b2b_company_metabox() {
    add_meta_box(
        'b2b_company_metabox',
        'Company',
        'b2b_company_metabox_render',
        ['reviews', 'post','page'],
        'side',
        'default'
    );
}

function add_b2b_category_metabox() {
    add_meta_box(
        'b2b_category_metabox',
        'Category',
        'b2b_category_metabox_render',
        ['post','page'],
        'side',
        'default'
    );
}

function b2b_company_metabox_render( $post ) {
    // Add nonce for security and authentication.
    wp_nonce_field( 'save_b2b_metabox', 'company_metabox' );

    $company_id = get_post_meta($post->ID, 'company_id', true);

    $companies = new Company();

    $args = [
        'class' => 'postbox',
        'name' => 'b2b_company',
        'id' => 'company_metabox',
        'selected' => $company_id
    ];

    $company_list = $companies->select_list($args);

    echo $company_list;
}

function b2b_category_metabox_render( $post ) {
    // Add nonce for security and authentication.
    wp_nonce_field( 'save_b2b_metabox', 'company_metabox' );

    $category_id = get_post_meta($post->ID, 'category_id', true);

    $categories = new Category();

    $args = [
        'class' => 'postbox',
        'name' => 'b2b_category',
        'id' => 'company_metabox',
        'selected' => $category_id
    ];

    $category_list = $categories->select_list($args);

    echo $category_list;
}

/**
 * Handles saving the meta box.
 *
 * @param int     $post_id Post ID.
 * @param WP_Post $post    Post object.
 * @return null
 */

function save_b2b_metabox( $post_id ) {
    // Add nonce for security and authentication.
    $nonce_name   = isset( $_POST['company_metabox'] ) ? $_POST['company_metabox'] : '';
    $nonce_action = 'save_b2b_metabox';

    // no need to save if we're not posting

    $post_type_whitelist = ['acf-field', 'acf-field-group'];

    $active_post_type = get_post_type($post_id);

    if (!$_POST){
        return;
    }

    if ( in_array($active_post_type,$post_type_whitelist) ) return;

    // Check if nonce is valid.
    if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
            wp_die('Not validated');
    }

    // Check if user has permissions to save data.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        wp_die('You dont have permission to access this');
    }

    // Check if not an autosave.
    if ( wp_is_post_autosave( $post_id ) ) {
        return;
    }

    // Check if not a revision.
    if ( wp_is_post_revision( $post_id ) ) {
        return;
    }

    if ($_POST['b2b_company']){
        update_post_meta($post_id, 'company_id', $_POST['b2b_company']);
    }
    else{
        if (get_post_meta($post_id,'company_id') ){
            delete_post_meta($post_id, 'company_id');
        }
    }
    if ($_POST['b2b_category']){
        update_post_meta($post_id, 'category_id', $_POST['b2b_category']);
    }
    else{
        if (get_post_meta($post_id,'category_id') ){
            delete_post_meta($post_id, 'category_id');
        }
    }

}
