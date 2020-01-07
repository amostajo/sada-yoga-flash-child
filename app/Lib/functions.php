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