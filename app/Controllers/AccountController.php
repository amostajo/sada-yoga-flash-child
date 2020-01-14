<?php

namespace SadaYogaFlash\Controllers;

use WPMVC\Cache;
use WPMVC\MVC\Controller;
/**
 * Account controller.
 * Generated with ayuco.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.1
 */
class AccountController extends Controller
{
    /**
     * Returns account link url.
     * @since 1.0.1
     *
     * @hook sada_yoga_account_url
     *
     * @return string
     */
    public function account_url()
    {
        if (function_exists('WC')) {
            return get_permalink(get_option('woocommerce_myaccount_page_id'));
        }
        return admin_url('/');
    }
    /**
     * Displays polylangs language picker.
     * @since 1.0.1
     *
     * @hook sada_yoga_header_actions
     */
    public function lang_picker()
    {
        if (!function_exists('pll_current_language')) {
            return;
        }
        $current = pll_current_language('slug');
        $languages = Cache::remember('languages', 1440, function () {
            return array_map(function ($slug) {
                return ['slug' => $slug, 'url' => pll_home_url($url)];
            }, pll_languages_list());
        });
        $languages = array_map(function ($lang) use(&$current) {
            $lang['active'] = $lang['slug'] === $current;
            return $lang;
        }, $languages);
        $this->view->show('nav.lang-picker', ['languages' => $languages]);
    }
    /**
     * Returns site url.
     * @since 1.0.1
     *
     * @hook login_headerurl
     *
     * @return string
     */
    public function login_headerurl()
    {
        return home_url('/');
    }
}