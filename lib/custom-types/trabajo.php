<?php

namespace Roots\Sage\CustomTypes;

/**
 * Register 'Trabajo' custom type
 *
 * @return null
 */
add_action('init', __NAMESPACE__ . '\\register_trabajo_post_type', 0);
function register_trabajo_post_type() {
    $labels = [
        'name'                  => 'Trabajos',
        'singular_name'         => 'Trabajo',
        'menu_name'             => 'Trabajos',
        'name_admin_bar'        => 'Trabajos',
        'archives'              => 'Trabajos archivados',
        'attributes'            => 'Atributos de trabajo',
        'all_items'             => 'Todos los trabajos',
        'add_new_item'          => 'Agregar nuevo trabajo',
        'add_new'               => 'Agregar trabajo',
        'new_item'              => 'Nuevo trabajo',
        'edit_item'             => 'Editar trabajo',
        'update_item'           => 'Actualizar trabajo',
        'view_item'             => 'Ver trabajo',
        'view_items'            => 'Ver trabajos',
        'search_items'          => 'Buscar trabajos',
        'not_found'             => 'Trabajo no encontrado',
        'not_found_in_trash'    => 'Trabajo no encontrado en la papelera',
        'featured_image'        => 'Imagen principal',
        'set_featured_image'    => 'Establecer imagen principal',
        'remove_featured_image' => 'Eliminar imagen principal',
        'use_featured_image'    => 'Usar como imagen principal',
        'insert_into_item'      => 'Insertar a trabajo',
        'uploaded_to_this_item' => 'Cargado a este trabajo',
        'items_list'            => 'Lista de trabajos',
        'items_list_navigation' => 'Navegar lista de trabajos',
        'filter_items_list'     => 'Filtrar lista de trabajos',
    ];
    $args = [
        'label'                 => 'Trabajo',
        'labels'                => $labels,
        'supports'              => ['title', 'excerpt', 'editor'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => '',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    ];
    register_post_type('trabajo', $args);
}

/**
 * Display the additional column headers
 *
 * @param  mixed $defaults
 * @return string
 */
add_filter('manage_trabajo_posts_columns', __NAMESPACE__ . '\\trabajo_columns_headers');
function trabajo_columns_headers( $defaults ) {
    unset($defaults['date']);
    $defaults['area']   = 'Área';
    $defaults['status'] = 'Estado';

    $defaults['date'] = 'Fecha';
    return $defaults;
}

/**
 * Display the additional column values
 *
 * @param  string $column
 * @param  intenger $post_id
 * @return string
 */
add_action('manage_trabajo_posts_custom_column', __NAMESPACE__ . '\\trabajo_columns_values', 10, 2);
function trabajo_columns_values( $column, $post_id ) {
    switch( $column ) {
        case 'area':
            echo rwmb_meta('trabajo_area'); break;
        case 'status':
            $status = rwmb_meta('trabajo_estado');
            switch( $status ) {
                case 'Abierto': ?>
                    <h3 style="margin: 0px;"><span class="label label-success">Abierto</span></h3><?php break;
                case 'Cerrado': ?>
                    <h3 style="margin: 0px;"><span class="label label-default">Cerrado</span></h3><?php break;
                default: break;
            } break;
        default: break;
    }
}
