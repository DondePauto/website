<?php

namespace Roots\Sage\Taxonomies;

/**
 * Register 'Formato' taxonomy for 'Espacios Ofertados'
 *
 * @return null
 */
add_action('init', __NAMESPACE__ . '\\register_formato_espacio_taxonomy', 0);
function register_formato_espacio_taxonomy() {
    $labels = [
        'name'                       => 'Formatos',
        'singular_name'              => 'Formato',
        'menu_name'                  => 'Formatos',
        'all_items'                  => 'Todas los formatos',
        'new_item_name'              => 'Nuevo formato',
        'add_new_item'               => 'Agregar nuevo formato',
        'edit_item'                  => 'Editar formato',
        'update_item'                => 'Actualizar formato',
        'view_item'                  => 'Ver formato',
        'separate_items_with_commas' => 'Separar formatos con comas',
        'add_or_remove_items'        => 'Agregar o quitar formatos',
        'choose_from_most_used'      => 'Escoger de los más usados',
        'popular_items'              => 'Formatos populares',
        'search_items'               => 'Buscar formatos',
        'not_found'                  => 'Formato no encontrado',
        'no_terms'                   => 'No hay formatos',
        'items_list'                 => 'Lista de formatos',
        'items_list_navigation'      => 'Navegar lista de formatos',
    ];
    $rewrite = [
        'slug'                       => 'Formato',
        'with_front'                 => true,
        'hierarchical'               => false,
    ];
    $capabilities = [
        'manage_terms'               => 'manage_formatos',
        'edit_terms'                 => 'manage_formatos',
        'delete_terms'               => 'manage_formatos',
        'assign_terms'               => 'edit_posts',
    ];
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'query_var'                  => 'Formato',
        'rewrite'                    => $rewrite,
        'capabilities'               => $capabilities,
    ];
    register_taxonomy('Formato', ['espacio'], $args);
}

/**
 * Add capabilities to Administrators
 *
 * @return null
 */
add_action('admin_init', __NAMESPACE__ . '\\add_formatos_capabilities');
function add_formatos_capabilities() {
    $role = get_role('administrator');
    $role->add_cap('manage_formatos');
}
