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
    'sections' => [
        'footer' => [
            'title'             => __( 'Footer', 'sada-yoga' ),
            'priority'          => 101, // After menu
            'capability'        => 'edit_theme_options',
        ],
    ],

    // Customizer settings
    'settings' => [
        'nav_background_color' => [
            'default'           => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
        ],
        'nav_sticky_background_color' => [
            'default'           => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
        ],
        'footer_background_color' => [
            'default'           => '#333333',
            'sanitize_callback' => 'sanitize_hex_color',
        ],
        'footer_bottom_background_color' => [
            'default'           => '#28313d',
            'sanitize_callback' => 'sanitize_hex_color',
        ],
        'footer_text_color' => [
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
        'copyright_html' => [
            'default'           => '',
            'sanitize_callback' => null,
        ],
        'copyright_text_color' => [
            'default'           => '#FFFFFF',
            'sanitize_callback' => 'sanitize_hex_color',
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
        'nav_sticky_background_color' => [
            'type'              => 'color',
            'priority'          => 91,
            'section'           => 'colors',
            'label'             => __( 'Nav Sticky Background color', 'sada-yoga' ),
        ],
        'footer_background_color' => [
            'type'              => 'color',
            'priority'          => 100,
            'section'           => 'colors',
            'label'             => __( 'Footer Background color', 'sada-yoga' ),
        ],
        'footer_bottom_background_color' => [
            'type'              => 'color',
            'priority'          => 101,
            'section'           => 'colors',
            'label'             => __( 'Footer Bottom Bar Background color', 'sada-yoga' ),
        ],
        'footer_text_color' => [
            'type'              => 'color',
            'priority'          => 102,
            'section'           => 'colors',
            'label'             => __( 'Footer Text color', 'sada-yoga' ),
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
        'copyright_html' => [
            'type'              => 'textarea',
            'priority'          => 1,
            'section'           => 'footer',
            'label'             => __( 'Copyright text', 'sada-yoga' ),
            'description'       => __( 'Use wildcards:<ul><li><b>{copy}</b> to display &copy; symbol.</li><li><b>{year}</b> to display current year.<li><b>{name}</b> to display the site\'s name.<li><b>{link}</b> to display main site\'s url.</li></ul>', 'sada-yoga' ),
        ],
        'copyright_text_color' => [
            'type'              => 'color',
            'priority'          => 2,
            'section'           => 'footer',
            'label'             => __( 'Text color', 'sada-yoga' ),
        ],
    ],

    // Css rendering
    'rendering' => [
        'nav_background_color' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                'header .header-bottom' => [
                    'background-color: %s;',
                ],
            ],
        ],
        'nav_sticky_background_color' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                '.header-sticky .is-sticky .header-bottom' => [
                    'background-color: %s !important;',
                ],
            ],
        ],
        'footer_background_color' => [
            'default'   => '#28313d',
            'selectors' => [
                'footer.site-footer' => [
                    'background-color: %s;',
                ],
            ],
        ],
        'footer_bottom_background_color' => [
            'default'   => '#28313d',
            'selectors' => [
                'footer.site-footer #bottom-footer' => [
                    'background-color: %s;',
                ],
            ],
        ],
        'footer_text_color' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                'footer.site-footer' => [
                    'color: %s;',
                ],
            ],
        ],
        'copyright_text_color' => [
            'default'   => '#FFFFFF',
            'selectors' => [
                '#bottom-footer .copyright-text' => [
                    'color: %s;',
                ],
            ],
        ],
        'logo_width' => [
            'default'   => false,
            'selectors' => [
                '.logo .logo-image img' => [
                    'max-width: %spx !important;',
                    'width: 100%% !important;',
                ],
            ],
        ],
        'logo_height' => [
            'default'   => false,
            'selectors' => [
                '.logo .logo-image img' => [
                    'max-height: %spx !important;',
                    'height: auto !important;',
                ],
            ],
        ],
    ],
];