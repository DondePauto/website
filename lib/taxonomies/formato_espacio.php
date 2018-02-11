<?php

namespace Roots\Sage\Taxonomies;

/**
 * Register 'Escenario' taxonomy for 'Espacios Ofertados'
 *
 * @return null
 */
add_action('init', __NAMESPACE__ . '\\register_escenario_espacio_taxonomy', 0);
function register_escenario_espacio_taxonomy() {
    $labels = [
        'name'                       => 'Escenarios',
        'singular_name'              => 'Escenario',
        'menu_name'                  => 'Escenarios',
        'all_items'                  => 'Todas los escenarios',
        'new_item_name'              => 'Nuevo escenario',
        'add_new_item'               => 'Agregar nuevo escenario',
        'edit_item'                  => 'Editar escenario',
        'update_item'                => 'Actualizar escenario',
        'view_item'                  => 'Ver escenario',
        'separate_items_with_commas' => 'Separar escenarios con comas',
        'add_or_remove_items'        => 'Agregar o quitar escenarios',
        'choose_from_most_used'      => 'Escoger de los más usadas',
        'popular_items'              => 'Escenarios populares',
        'search_items'               => 'Buscar escenarios',
        'not_found'                  => 'Escenario no encontrado',
        'no_terms'                   => 'No hay escenarios',
        'items_list'                 => 'Lista de escenarios',
        'items_list_navigation'      => 'Navegar lista de escenarios',
    ];
    $rewrite = [
        'slug'                       => 'Escenario',
        'with_front'                 => true,
        'hierarchical'               => false,
    ];
    $capabilities = [
        'manage_terms'               => 'manage_escenarios',
        'edit_terms'                 => 'manage_escenarios',
        'delete_terms'               => 'manage_escenarios',
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
        'query_var'                  => 'escenario',
        'rewrite'                    => $rewrite,
        'capabilities'               => $capabilities,
    ];
    register_taxonomy('Escenario', ['espacio'], $args);
}

/**
 * Add capabilities to Administrators
 *
 * @return null
 */
add_action('admin_init', __NAMESPACE__ . '\\add_escenarios_capabilities');
function add_escenarios_capabilities() {
    $role = get_role('administrator');
    $role->add_cap('manage_escenarios');
}
