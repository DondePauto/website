<?php

namespace Roots\Sage\Extras;

/**
 * Removes the regular excerpt box.
 *
 * @return null
 */
add_action('admin_menu', __NAMESPACE__ . '\\trabajo_remove_normal_excerpt');
function trabajo_remove_normal_excerpt() {
    remove_meta_box('postexcerpt' , 'trabajo' , 'normal');
}

/**
 * Add the excerpt meta box back in with a custom screen location.
 *
 * @param  string $post_type
 * @return null
 */
add_action('add_meta_boxes', __NAMESPACE__ . '\\trabajo_add_excerpt_meta_box');
function trabajo_add_excerpt_meta_box( $post_type ) {
    if( $post_type=='trabajo' ) {
        add_meta_box(
            'trabajo_postexcerpt',
            __('Excerpt', 'dondepauto'),
            'post_excerpt_meta_box',
            $post_type,
            'after_title',
            'high'
        );
    }
}
