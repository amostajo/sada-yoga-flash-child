<?php

namespace SadaYogaFlash;

use WPMVC\Bridge;
/**
 * Main class.
 * Bridge between Wordpress and App.
 * Class contains declaration of hooks and filters.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */
class Main extends Bridge
{
    /**
     * Declaration of public wordpress hooks.
     */
    public function init()
    {
        // Config
        $this->add_action( 'init', 'ConfigController@remove_hooks', 99 );
        $this->add_action( 'wp_enqueue_scripts', 'ConfigController@enqueue', 99 );
        // Customizer
        $this->add_action( 'customize_register', 'CustomizerController@register', 99 );
        $this->add_action( 'wp_head', 'CustomizerController@render', 99 );
        // Footer & copyright
        $this->add_action( 'flash_copyright_area', 'view@footer.copyright' );
        $this->add_filter( 'sada_yoga_copyright', 'ConfigController@footer_copyright' );
    }
}