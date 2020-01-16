<?php

namespace SadaYogaFlash\Controllers;

use Elementor\Plugin as Elementor;
use WPMVC\MVC\Controller;
use SadaYogaFlash\Elementor\EventsWidget;
use SadaYogaFlash\Elementor\PostsWidget;
/**
 * Configuration hooks.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.3
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
        wp_dequeue_style('flash-style');
        wp_enqueue_style('flash-parent', get_template_directory_uri() . '/style.css');
    }
    /**
     * Removes parent hooks.
     * @since 1.0.0
     * 
     * @hook init
     */
    public function remove_hooks()
    {
        remove_action('flash_copyright_area', 'flash_footer_copyright');
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
    public function footer_copyright($text)
    {
        if (empty($text)) {
            return $text;
        }
        return preg_replace(['/\\{copy\\}/', '/\\{year\\}/', '/\\{name\\}/', '/\\{link\\}/'], ['&copy;', date('Y'), esc_html(get_bloginfo('name')), sprintf('<a href="%s">%s</a>', esc_url(home_url('/')), esc_html(get_bloginfo('name')))], $text);
    }
    /**
     * Returns base url fixed without language slug.
     * @since 1.0.0
     *
     * @hook asset_base_url
     * @hook home_path
     *
     * @param string $url
     * 
     * @return string
     */
    public function asset_url_or_path($url_or_path)
    {
        if (function_exists('pll_current_language')) {
            $lang = pll_current_language('slug');
            if (strpos($url_or_path, '/' . $lang) !== false) {
                $url_or_path = str_replace('/' . $lang, '', $url_or_path);
            }
        }
        return $url_or_path;
    }
    /**
     * Registers elementor widgets.
     * @since 1.0.2
     *
     * @hook elementor/widgets/widgets_registered
     */
    public function elementor_widgets()
    {
        Elementor::instance()->widgets_manager->register_widget_type(new PostsWidget());
        if (function_exists('tribe_get_events')) {
            Elementor::instance()->widgets_manager->register_widget_type(new EventsWidget());
        }
    }
    /**
     * Sets theme header name.
     * @since 1.0.3
     *
     * @hook get_header
     */
    public function get_header($name)
    {
        sada_yoga()::$header_name = $name;
    }
    /**
     * Returns flag indicating if title can be displaye dor not.
     * @since 1.0.3
     *
     * @hook sada_yoga_show_title
     *
     * @param bool $show
     * 
     * @return bool
     */
    public function show_title($show)
    {
        if ( is_singular( 'tribe_events' )
            || sada_yoga()::$header_name === 'notitle'
            || sada_yoga()::$header_name === 'notitle-wide'
        )
            return false;
        return $show;
    }
}