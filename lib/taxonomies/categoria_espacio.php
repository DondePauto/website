<?php

namespace Roots\Sage\Taxonomies;

/**
 * Register 'Categoría' taxonomy for 'Espacios Ofertados'
 *
 * @return null
 */
add_action('init', __NAMESPACE__ . '\\register_categoria_espacio_taxonomy', 0);
function register_categoria_espacio_taxonomy() {
    $labels = [
        'name'                       => 'Categorías',
        'singular_name'              => 'Categoría',
        'menu_name'                  => 'Categorías',
        'all_items'                  => 'Todas las categorías',
        'new_item_name'              => 'Nueva categoría',
        'add_new_item'               => 'Agregar nueva categoría',
        'edit_item'                  => 'Editar categoría',
        'update_item'                => 'Actualizar categoría',
        'view_item'                  => 'Ver categoría',
        'separate_items_with_commas' => 'Separar categorías con comas',
        'add_or_remove_items'        => 'Agregar o quitar categorías',
        'choose_from_most_used'      => 'Escoger de las más usadas',
        'popular_items'              => 'Categorías populares',
        'search_items'               => 'Buscar categorías',
        'not_found'                  => 'Categoría no encontrada',
        'no_terms'                   => 'No hay categorías',
        'items_list'                 => 'Lista de categorías',
        'items_list_navigation'      => 'Navegar lista de categorías',
    ];
    $rewrite = [
        'slug'                       => 'categoría',
        'with_front'                 => true,
        'hierarchical'               => false,
    ];
    $capabilities = [
        'manage_terms'               => 'manage_categorias',
        'edit_terms'                 => 'manage_categorias',
        'delete_terms'               => 'manage_categorias',
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
        'query_var'                  => 'categoria',
        'rewrite'                    => $rewrite,
        'capabilities'               => $capabilities,
    ];
    register_taxonomy('Categoría', ['espacio'], $args);
}

/**
 * Add capabilities to Administrators
 *
 * @return null
 */
add_action('admin_init', __NAMESPACE__ . '\\add_categorias_capabilities');
function add_categorias_capabilities() {
    $role = get_role('administrator');
    $role->add_cap('manage_categorias');
}
