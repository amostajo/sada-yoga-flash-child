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
        $config = $this->get_config();
        if ( empty( $config ) )
            return;
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
     * @hook wp_head
     */
    public function render()
    {
        // Load configuration
        $config = $this->get_config();
        if ( empty( $config ) )
            return;
        // Render settings
        $settings = $config->get( 'rendering' );
        if ( ! empty( $settings ) )
            $this->view->show( 'customizer.styles', ['settings' => $settings ] );
    }
    /**
     * Returns configuration.
     * @since 1.0.0
     * 
     * @return \WPMVC\Config
     */
    public function get_config()
    {
        $customizer_data = include sada_yoga()->config->get( 'paths.base' ) . 'Config/customizer.php';
        return ! isset( $customizer_data ) || empty( $customizer_data )
            ? null
            : new Config( $customizer_data );
    }
    /**
     * Prints a style line related to a customizer setting.
     * @since 1.0.0
     * 
     * @param string $setting_id
     * @param string $style
     * @param mixed  $value
     */
    public function print_style( $setting_id, $style, $value )
    {
        // Load configuration
        $config = $this->get_config();
        if ( empty( $config ) )
            return;
        // Check if setting is media
        if ( $config->get( 'controls.' . $setting_id . '.type' ) === 'media' ) {
            $value = wp_get_attachment_image_src( $value );
            if ( is_wp_error( $value ) )
                return;
            if ( is_array( $value ) )
                $value = $value[0];
        }
        // Print
        printf( $style, $value );
    }
}