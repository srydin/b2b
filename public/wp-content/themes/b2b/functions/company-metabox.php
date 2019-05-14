<?php

add_action('add_meta_boxes', 'add_b2b_metabox');
add_action('save_post', 'save_b2b_metabox');


function add_b2b_metabox() {
    add_meta_box(
        'b2b_company_metabox',
        'Company',
        'b2b_metabox_render',
        ['reviews', 'post','page'],
        'side',
        'default'
    );
}

function b2b_metabox_render( $post ) {
    // Add nonce for security and authentication.
    wp_nonce_field( 'custom_nonce_action', 'custom_nonce' );

    $company_id = get_post_meta($post->ID, 'company_id', true);

    $list = new Company();

    $args = [
        'class' => 'postbox',
        'name' => 'b2b_company',
        'id' => 'company_metabox',
        'selected' => $company_id
    ];

    $list = $list->select_list($args);

    echo $list;
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
    $nonce_name   = isset( $_POST['custom_nonce'] ) ? $_POST['custom_nonce'] : '';
    $nonce_action = 'custom_nonce_action';

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

    update_post_meta($post_id, 'company_id', $_POST['b2b_company']);

}
