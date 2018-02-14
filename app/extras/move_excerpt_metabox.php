<?php

namespace App\Extras;

/**
 * Removes the regular excerpt box.
 *
 * @return null
 */
add_action('admin_menu', function() {
    remove_meta_box('postexcerpt' , 'espacio' , 'normal');
    remove_meta_box('postexcerpt' , 'trabajo' , 'normal');
});


/**
 * Add the excerpt meta box back in with a custom screen location.
 *
 * @param  string $post_type
 * @return null
 */
add_action('add_meta_boxes', function( $post_type ) {
    if( $post_type=='espacio' or $post_type=='trabajo' ) {
        add_meta_box(
            $post_type.'_postexcerpt',
            __('Extracto', 'dondepauto'),
            'post_excerpt_meta_box',
            $post_type,
            'after_title',
            'high'
        );
    }
});
