<?php
function create_post_type() {
    register_post_type( 'reviews',
        array(
            'labels' => array(
                'name' => __( 'Company Reviews' ),
                'singular_name' => __( 'Review' )
            ),
            'public' => true,
            'supports' => array('revisions', 'title','editor','custom-fields'),
            'has_archive' => false
        )
    );
}
add_action( 'init', 'create_post_type' );
