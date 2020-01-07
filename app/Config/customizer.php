<?php

/**
 * Customizer settings.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */
return [

    // Customizer panels
    'panels' => [],

    // Customizer sections
    'sections' => [],

    // Customizer settings
    'settings' => [
        'nav_background_color' => [
            'default'           => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
        ],
        'logo_width' => [
            'default'           => '',
            'sanitize_callback' => 'absint',
        ],
        'logo_height' => [
            'default'           => '',
            'sanitize_callback' => 'absint',
        ],
    ],

    // Controls
    'controls' => [
        'nav_background_color' => [
            'type'              => 'color',
            'priority'          => 90,
            'section'           => 'colors',
            'label'             => __( 'Nav Background color', 'sada-yoga' ),
        ],
        'logo_width' => [
            'type'              => 'number',
            'priority'          => 1,
            'section'           => 'title_tagline',
            'label'             => __( 'Logo width', 'sada-yoga' ),
            'description'       => __( 'Leave blank if you want this to be set automatically.', 'sada-yoga' ),
        ],
        'logo_height' => [
            'type'              => 'number',
            'priority'          => 1,
            'section'           => 'title_tagline',
            'label'             => __( 'Logo height', 'sada-yoga' ),
            'description'       => __( 'Leave blank if you want this to be set automatically.', 'sada-yoga' ),
        ],
    ],

    // Css rendering
    'rendering' => [
        'nav_background_color' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                'header .header-bottom' => [
                    'background-color:%s;',
                ],
            ],
        ],
        'logo_width' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                '.logo .logo-image img' => [
                    'max-width: %spx !important;',
                    'width: 100%% !important;',
                ],
            ],
        ],
        'logo_height' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                '.logo .logo-image img' => [
                    'max-height: %spx !important;',
                    'height: auto !important;',
                ],
            ],
        ],
    ],
];