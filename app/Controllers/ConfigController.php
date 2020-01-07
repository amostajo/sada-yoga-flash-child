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
    /**
     * Removes parent hooks.
     * @since 1.0.0
     * 
     * @hook init
     */
    public function remove_hooks()
    {
        remove_action( 'flash_copyright_area', 'flash_footer_copyright' );
    }
    /**
     * Returns filtered copyright text message.
     * @since 1.0.0
     * 
     * @hook sada_yoga_copyright
     * 
     * @param string $text
     * 
     * @return string 
     */
    public function footer_copyright( $text )
    {
        if ( empty( $text ) )
            return $text;
        return preg_replace(
            [
                '/\{copy\}/',
                '/\{year\}/',
                '/\{name\}/',
                '/\{link\}/',
            ],
            [
                '&copy;',
                date( 'Y' ),
                esc_html( get_bloginfo( 'name' ) ),
                sprintf( '<a href="%s">%s</a>', esc_url( home_url( '/' ) ), esc_html( get_bloginfo( 'name' ) ) ),
            ],
            $text
        );
    }
}