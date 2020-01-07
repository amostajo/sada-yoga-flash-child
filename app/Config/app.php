<?php

/**
 * App configuration file.
 */
return [

    'namespace' => 'SadaYogaFlash',

    'type' => 'theme',

    'paths' => [

        'base'          => __DIR__ . '/../',
        'controllers'   => __DIR__ . '/../Controllers/',
        'views'         => __DIR__ . '/../../assets/views/',
        'lang'          => __DIR__ . '/../../assets/lang/',
        'log'           => WP_CONTENT_DIR . '/wpmvc/log',

    ],

    'version' => '1.0.0',

    'autoenqueue' => [

        // Enables or disables auto-enqueue of assets
        'enabled'       => false,
        // Assets to auto-enqueue
        'assets'        => [],

    ],

    'cache' => [

        // Enables or disables cache
        'enabled'       => true,
        // files, auto (files), apc, wincache, xcache, memcache, memcached
        'storage'       => 'auto',
        // Default path for files
        'path'          => WP_CONTENT_DIR . '/wpmvc/cache',
        // It will create a path by PATH/securityKey
        'securityKey'   => '',
        // FallBack Driver
        'fallback'      => [
                            'memcache'  =>  'files',
                            'apc'       =>  'sqlite',
                        ],
        // .htaccess protect
        'htaccess'      => true,
        // Default Memcache Server
        'server'        => [
                            [ '127.0.0.1', 11211, 1 ],
                        ],

    ],

    'localize' => [

        // Enables or disables localization
        'enabled'       => false,
        // Default path for language files
        'path'          => __DIR__ . '/../../assets/lang/',
        // Text domain
        'textdomain'    => 'text-domain',
        // Unload loaded locale files before localization
        'unload'        => false,
        // Flag that inidcates if this is a Wordpress.org plugin/theme
        'is_public'     => false,

    ],

    'addons' => [],

];