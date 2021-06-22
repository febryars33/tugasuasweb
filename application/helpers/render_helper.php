<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('render')) {

    /**
     * Render function
     *
     * @param string $render
     * @param array $data
     * @return void
     */
    function render(string $render, array $data = array()): void
    {
        $CI = &get_instance();
        $CI->load->view($render, $data);
    }
}

if (!function_exists('need_login')) {

    /**
     * Need Login function
     *
     * @param string $session_name
     * @param integer $http_response_code
     * @return void
     */
    function need_login(string $session_name, $http_response_code = 301): void
    {
        $CI = &get_instance();
        if (empty($CI->session->userdata($session_name))) {
            redirect('login', 'auto');
        }
    }
}
