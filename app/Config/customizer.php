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

    // Customizer sections
    'sections' => [
        'nav' => [
            'title'             => __( 'Nav', 'sada-yoga' ),
            'priority'          => 104, // After menu
            'capability'        => 'edit_theme_options',
        ],
        'footer' => [
            'title'             => __( 'Footer', 'sada-yoga' ),
            'priority'          => 105, // After menu
            'capability'        => 'edit_theme_options',
        ],
        'auth' => [
            'title'             => __( 'Authentication', 'sada-yoga' ),
            'priority'          => 115,
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
        'nav_icon_before' => [
            'default'           => 0,
            'sanitize_callback' => 'absint',
        ],
        'nav_icon_after' => [
            'default'           => 0,
            'sanitize_callback' => 'absint',
        ],
        'nav_icon_width' => [
            'default'           => '',
            'sanitize_callback' => 'absint',
        ],
        'nav_icon_height' => [
            'default'           => '',
            'sanitize_callback' => 'absint',
        ],
        'nav_icon_top_offset' => [
            'default'           => 0,
            'sanitize_callback' => 'sanitize_text_field',
        ],
        'nav_icon_side_offset' => [
            'default'           => 0,
            'sanitize_callback' => 'sanitize_text_field',
        ],
        'nav_icon_opacity' => [
            'default'           => 100,
            'sanitize_callback' => 'int_to_percentage',
        ],
        'nav_icon_breakpoint' => [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ],
        'wp_login_background_color' => [
            'default'               => '#f1f1f1',
            'sanitize_callback'     => 'sanitize_hex_color',
        ],
        'wp_login_link_color' => [
            'default'               => '#555d66',
            'sanitize_callback'     => 'sanitize_hex_color',
        ],
        'wp_login_linkhover_color' => [
            'default'               => '#777f99',
            'sanitize_callback'     => 'sanitize_hex_color',
        ],
        'wp_login_logo' => [
            'default'               => 0,
            'sanitize_callback'     => 'absint',
        ],
        'wp_login_logo_size' => [
            'default'               => 84,
            'sanitize_callback'     => 'absint',
        ],
        'wp_login_logo_position' => [
            'default'               => 'center top',
            'sanitize_callback'     => 'sanitize_text_field',
        ],
        'wp_login_linktext_color' => [
            'default'               => '#FFFFFF',
            'sanitize_callback'     => 'sanitize_hex_color',
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
        'nav_icon_before' => [
            'type'              => 'media',
            'priority'          => 1,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon [Left]', 'sada-yoga' ),
            'desc'              => __( 'This is the icon that will float at the <b>left</b> of the main nav.', 'sada-yoga' ),
            'mime_type'         => 'image',
        ],
        'nav_icon_after' => [
            'type'              => 'media',
            'priority'          => 2,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon [Right]', 'sada-yoga' ),
            'desc'              => __( 'This is the icon that will float at the <b>right</b> of the main nav.', 'sada-yoga' ),
            'mime_type'         => 'image',
        ],
        'nav_icon_width' => [
            'type'              => 'number',
            'priority'          => 10,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon width', 'sada-yoga' ),
        ],
        'nav_icon_height' => [
            'type'              => 'number',
            'priority'          => 11,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon height', 'sada-yoga' ),
        ],
        'nav_icon_top_offset' => [
            'type'              => 'number',
            'priority'          => 12,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon top offset', 'sada-yoga' ),
            'description'       => __( 'Top offset margin to use to position floaty in the middle of the nav.', 'sada-yoga' ),
        ],
        'nav_icon_side_offset' => [
            'type'              => 'number',
            'priority'          => 13,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon side offset', 'sada-yoga' ),
            'description'       => __( 'Side (left or right) offset margin to use to position floaty.', 'sada-yoga' ),
        ],
        'nav_icon_opacity' => [
            'type'              => 'range',
            'priority'          => 15,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon opacity', 'sada-yoga' ),
            'input_attrs'       => [
                                    'min' => 0,
                                    'max' => 100,
            ],
        ],
        'nav_icon_breakpoint' => [
            'type'              => 'number',
            'priority'          => 19,
            'section'           => 'nav',
            'label'             => __( 'Floaty icon hide breakpoint', 'sada-yoga' ),
            'description'       => __( 'Resolution breakpoint in which icons will disappear.', 'sada-yoga' ),
        ],
        'wp_login_logo' => [
                'type'              => 'media',
                'label'             => __( 'WordPress Login Logo', 'wpmvc-website' ),
                'section'           => 'auth',
                'mime'              => 'image',
                'priority'          => 90,
        ],
        'wp_login_logo_size' => [
                'type'              => 'number',
                'label'             => __( 'WordPress Login Logo Size', 'wpmvc-website' ),
                'description'       => __( 'In pixels.', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 91,
                'input_attrs'       => [
                                        'min' => 50,
                                        'max' => 320,
                                    ],
        ],
        'wp_login_logo_position' => [
                'type'              => 'select',
                'label'             => __( 'WordPress Login Logo Position', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 92,
                'choices'           => apply_filters( 'wpmvc_wp_logo_positions', [
                                        'center top'    => __( 'Center Top', 'wpmvc-website' ),
                                        'center center' => __( 'Center Center', 'wpmvc-website' ),
                                        'center bottom' => __( 'Center Bottom', 'wpmvc-website' ),
                                    ] ),
        ],
        'wp_login_background_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login Background', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 100,
        ],
        'wp_login_link_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login Links', 'wpmvc-website' ),
                'description'       => __( 'The small liks located after the white box.', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 101,
        ],
        'wp_login_linkhover_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login Links (hover)', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 102,
        ],
        'wp_login_linktext_color' => [
                'type'              => 'color',
                'label'             => __( 'WordPress Login link text', 'wpmvc-website' ),
                'description'       => __( 'Button text color.', 'wpmvc-website' ),
                'section'           => 'auth',
                'priority'          => 103,
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
        'nav_icon_before' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::before' => [
                    'content: " ";',
                    'background-image: url(%s);',
                    'background-size: contain;',
                    'position: absolute;',
                    'display: block;',
                    'top: 0;',
                    'left: 0;',
                ],
            ],
        ],
        'nav_icon_after' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::after' => [
                    'content: " ";',
                    'background-image: url(%s);',
                    'background-size: contain;',
                    'position: absolute;',
                    'display: block;',
                    'top: 0;',
                    'right: 0;',
                ],
            ],
        ],
        'nav_icon_width' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::before' => [
                    'width: %spx',
                ],
                '.header-bottom::after' => [
                    'width: %spx',
                ],
            ],
        ],
        'nav_icon_height' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::before' => [
                    'height: %spx',
                ],
                '.header-bottom::after' => [
                    'height: %spx',
                ],
            ],
        ],
        'nav_icon_top_offset' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::before' => [
                    'top: %spx !important',
                ],
                '.header-bottom::after' => [
                    'top: %spx !important',
                ],
            ],
        ],
        'nav_icon_side_offset' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::before' => [
                    'left: %spx !important',
                ],
                '.header-bottom::after' => [
                    'right: %spx !important',
                ],
            ],
        ],
        'nav_icon_opacity' => [
            'default'   => false,
            'selectors' => [
                '.header-bottom::before' => [
                    'opacity: %s',
                ],
                '.header-bottom::after' => [
                    'opacity: %s',
                ],
            ],
        ],
        'nav_icon_breakpoint' => [
            'default'   => false,
            'breakpoint' => true,
            'selectors' => [
                '.header-bottom::before' => [
                    'display: none;',
                ],
                '.header-bottom::after' => [
                    'display: none;',
                ],
            ],
        ],
    ],
];