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
 * @version 1.0.3
 */
class Main extends Bridge
{
    /**
     * Current header name
     * @since 1.0.3
     * 
     * @see get_header()
     * 
     * @var string|null
     */
    public static $header_name = null;
    /**
     * Declaration of public wordpress hooks.
     */
    public function init()
    {
        // Config
        $this->add_action('init', 'ConfigController@remove_hooks', 99);
        $this->add_action('wp_enqueue_scripts', 'ConfigController@enqueue', 99);
        // Footer & copyright
        $this->add_action('flash_copyright_area', 'view@footer.copyright');
        $this->add_filter('sada_yoga_copyright', 'ConfigController@footer_copyright');
        // Header
        $this->add_action('get_header', 'ConfigController@get_header');
        $this->add_filter('sada_yoga_show_title', 'ConfigController@show_title');
        // Account
        $this->add_action('sada_yoga_header_actions', 'view@nav.account-login', 99);
        $this->add_filter('sada_yoga_account_url', 'AccountController@account_url');
        $this->add_action('sada_yoga_header_actions', 'AccountController@lang_picker');
        // Lang compatibility
        $this->add_filter('asset_base_url', 'ConfigController@asset_url_or_path');
        $this->add_filter('home_path', 'ConfigController@asset_url_or_path');
        // WP Login
        $this->add_action('login_head', 'view@login.style');
        $this->add_filter('login_headerurl', 'AccountController@login_headerurl');
        // Elementor
        $this->add_action('elementor/widgets/widgets_registered', 'ConfigController@elementor_widgets');
    }
}