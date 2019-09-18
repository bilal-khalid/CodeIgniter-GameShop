<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_categories')) {
    function get_categories()
    {
        $CI =& get_instance();
        $CI->load->model('Product');
        $categories = $CI->Product->get_categories();
        return $categories;
    }
}

if (!function_exists('get_popular')) {
    function get_popular()
    {
        $CI =& get_instance();
        $CI->load->model('Product');
        $popular = $CI->Product->get_popular();
        return $popular;
    }
}
