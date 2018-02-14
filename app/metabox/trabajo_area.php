<?php

namespace Roots\Sage\Metabox;

/**
 * Add side metabox for Trabajo
 *
 * @param  mixed $metaboxes
 * @return null
 */
add_filter('rwmb_meta_boxes', function( $metaboxes ) {
    $prefix = 'trabajo_';

    $metaboxes[] = [
        'id'         => 'trabajo-side',
        'title'      => esc_html__('Área', 'trabajo_metabox'),
        'post_types' => ['trabajo'],
        'context'    => 'side',
        'priority'   => 'default',
        'autosave'   => false,
        'fields'     => [
            [
                'id'      => $prefix . 'estado',
                'type'    => 'select_advanced',
                'options' => [
                        'Abierto' => 'Abierto',
                        'Cerrado' => 'Cerrado',
                ],
                'name'    => esc_html__('Estado', 'trabajo_metabox'),
            ],
            [
                'id'      => $prefix . 'area',
                'type'    => 'select_advanced',
                'options' => [
                        'Diseño'                  => 'Diseño',
                        'Mercadeo y Ventas'       => 'Mercadeo y Ventas',
                        'Desarrollo y Tecnología' => 'Desarrollo y Tecnología',
                ],
                'name'    => esc_html__('Área', 'trabajo_metabox'),
            ],
        ],
        'validation' => [
            'rules' => [
                $prefix . 'estado' => [
                    'required' => true,
                ],
                $prefix . 'area' => [
                    'required' => true,
                ],
            ],
        ],
    ];

    return $metaboxes;
});
