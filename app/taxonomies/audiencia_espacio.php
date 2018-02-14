<?php

namespace App\Taxonomies;

/**
 * Register 'Audiencia' taxonomy for 'Espacios Ofertados'
 *
 * @return null
 */
add_action('init', __NAMESPACE__ . '\\register_audiencia_espacio_taxonomy', 0);
function register_audiencia_espacio_taxonomy() {
    $labels = [
        'name'                       => 'Audiencias',
        'singular_name'              => 'Audiencia',
        'menu_name'                  => 'Audiencias',
        'all_items'                  => 'Todas las audiencias',
        'new_item_name'              => 'Nueva audiencia',
        'add_new_item'               => 'Agregar nueva audiencia',
        'edit_item'                  => 'Editar audiencia',
        'update_item'                => 'Actualizar audiencia',
        'view_item'                  => 'Ver audiencia',
        'separate_items_with_commas' => 'Separar audiencias con comas',
        'add_or_remove_items'        => 'Agregar o quitar audiencias',
        'choose_from_most_used'      => 'Escoger de las más usadas',
        'popular_items'              => 'Audiencias populares',
        'search_items'               => 'Buscar audiencias',
        'not_found'                  => 'Audiencia no encontrada',
        'no_terms'                   => 'No hay audiencias',
        'items_list'                 => 'Lista de audiencias',
        'items_list_navigation'      => 'Navegar lista de audiencias',
    ];
    $rewrite = [
        'slug'                       => 'Audiencia',
        'with_front'                 => true,
        'hierarchical'               => false,
    ];
    $capabilities = [
        'manage_terms'               => 'manage_audiencias',
        'edit_terms'                 => 'manage_audiencias',
        'delete_terms'               => 'manage_audiencias',
        'assign_terms'               => 'edit_posts',
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'query_var'                  => 'audiencia',
        'rewrite'                    => $rewrite,
        'capabilities'               => $capabilities,
    ];
    register_taxonomy('Audiencia', ['espacio'], $args);
}

/**
 * Add capabilities to Administrators
 *
 * @return null
 */
add_action('admin_init', function() {
    $role = get_role('administrator');
    $role->add_cap('manage_audiencias');
});
