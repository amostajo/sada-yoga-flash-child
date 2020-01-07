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
        $this->add_action( 'customize_register', 'CustomizerController@register', 99 );
        $this->add_action( 'wp_head', 'CustomizerController@render', 99 );
        $this->add_action( 'wp_enqueue_scripts', 'ConfigController@enqueue', 99 );
    }
}