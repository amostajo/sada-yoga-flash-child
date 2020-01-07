<?php

namespace SadaYogaFlash\Controllers;

use WPMVC\MVC\Controller;
/**
 * Configuration hooks.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */
class ConfigController extends Controller
{
    /**
     * Enqueue base assets.
     * @since 1.0.0
     * 
     * @hook wp_enqueue_scripts
     */
    public function enqueue()
    {
        // Enqueue parent styles
        wp_dequeue_style( 'flash-style' );
        wp_enqueue_style( 'flash-parent', get_template_directory_uri() . '/style.css' );
    }
}