<?php

namespace SadaYogaFlash\Controllers;

use WP_Customize_Media_Control;
use WP_Customize_Color_Control;
use WPMVC\Config;
use WPMVC\MVC\Controller;
/**
 * Customizer hooks and handling.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */
class CustomizerController extends Controller
{
    /**
     * Registers customizer customizations.
     * @since 1.0.0
     * 
     * @hook customize_register
     */
    public function register( $wp_customize )
    {
        // Load configuration
        $customizer_data = include sada_yoga()->config->get( 'paths.base' ) . 'Config/customizer.php';
        if ( ! isset( $customizer_data ) || empty( $customizer_data ) )
            return;
        $config = new Config( $customizer_data );
        // Register configuration
        // -- Sections
        foreach ( $config->get( 'sections' ) as $id => $options ) {
            $wp_customize->add_section( $id, $options );
        }
        // -- Settings
        foreach ( $config->get( 'settings' ) as $id => $options ) {
            $wp_customize->add_setting( $id, $options );
        }
        // -- Controls
        foreach ( $config->get( 'controls' ) as $id => $options ) {
            if ( ! array_key_exists( 'type' , $options ) )
                $options['type'] = 'text';
            switch ( $options['type'] ) {
                case 'media':
                    unset( $options['type'] );
                    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $id, $options ) );
                    break;
                case 'color':
                    unset( $options['type'] );
                    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, $options ) );
                    break;
                default:
                    $wp_customize->add_control( $id, $options );
                    break;
            }
        }
    }
    /**
     * Renders customizer settings.
     * @since 1.0.0
     * 
     * @hook customize_register
     */
    public function render()
    {
        // Load configuration
        $customizer_data = include sada_yoga()->config->get( 'paths.base' ) . 'Config/customizer.php';
        if ( ! isset( $customizer_data ) || empty( $customizer_data ) )
            return;
        $config = new Config( $customizer_data );
        // Render settings
        $settings = $config->get( 'rendering' );
        if ( ! empty( $settings ) )
            $this->view->show( 'customizer.styles', ['settings' => $settings ] );
    }
}