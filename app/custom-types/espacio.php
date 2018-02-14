<?php

namespace App\CustomTypes;

/**
 * Register 'Espacio' custom type
 *
 * @return null
 */
add_action('init', __NAMESPACE__ . '\\register_espacio_post_type', 0);
function register_espacio_post_type() {
    $labels = [
        'name'                  => 'Espacios',
        'singular_name'         => 'Espacio',
        'menu_name'             => 'Espacios',
        'name_admin_bar'        => 'Espacios',
        'archives'              => 'Espacios archivados',
        'attributes'            => 'Atributos de espacio',
        'all_items'             => 'Todos los espacios',
        'add_new_item'          => 'Agregar nuevo espacio',
        'add_new'               => 'Agregar espacio',
        'new_item'              => 'Nuevo espacio',
        'edit_item'             => 'Editar espacio',
        'update_item'           => 'Actualizar espacio',
        'view_item'             => 'Ver espacio',
        'view_items'            => 'Ver espacios',
        'search_items'          => 'Buscar espacios',
        'not_found'             => 'Espacio no encontrado',
        'not_found_in_trash'    => 'Espacio no encontrado en la papelera',
        'featured_image'        => 'Imagen principal',
        'set_featured_image'    => 'Establecer imagen principal',
        'remove_featured_image' => 'Eliminar imagen principal',
        'use_featured_image'    => 'Usar como imagen principal',
        'insert_into_item'      => 'Insertar a espacio',
        'uploaded_to_this_item' => 'Cargado a este espacio',
        'items_list'            => 'Lista de espacios',
        'items_list_navigation' => 'Navegar lista de espacios',
        'filter_items_list'     => 'Filtrar lista de espacios',
    ];
    $args = [
        'label'                 => 'Espacio',
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
    register_post_type('espacio', $args);
}
