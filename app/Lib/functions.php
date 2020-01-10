<?php

/**
 * Global functions.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */

/**
 * Returns theme's main class.
 * @since 1.0.0
 * 
 * @return \SadaYogaFlash\Main
 */
function sada_yoga()
{
    return get_bridge( 'theme' );
}


if ( ! function_exists( 'get_customizer_config' ) ) {
    /**
     * Returns customizer.php as config reader.
     * @since 1.0.0
     * 
     * @return \WPMVC\Config
     */
    function get_customizer_config()
    {
        sada_yoga()->{'_c_return_CustomizerController@get_config'}();
    }
}

if ( ! function_exists( 'customizer_parse_setting' ) ) {
    /**
     * Prints a style line related to a customizer setting.
     * @since 1.0.0
     * 
     * @param string $setting_id
     * @param string $style
     * @param mixed  $value
     */
    function print_customizer_setting_style( $setting_id, $style, $value )
    {
        sada_yoga()->{'_c_void_CustomizerController@print_style'}( $setting_id, $style, $value );
    }
}

if ( ! function_exists( 'int_to_percentage' ) ) {
    /**
     * Returnes decimal percentage val from int.
     * @since 1.0.0
     * 
     * @param mixed $value
     * 
     * @return float
     */
    function int_to_percentage( $value )
    {
        return ! is_numeric( $value ) || $value === 0 ? 0 : $value / 100;
    }
}