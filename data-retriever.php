<?php

/**
 *Plugin Name: Data Retriever
 *Description: You can retrieve data through api by using this plugin
 *Author: Hassan Tariq
 *Version: 1.0.0
 **/


require 'admin_menu_page.php';


function get_data_through_api()
{
    $err = "Please Set your Plugin settings before using";
    $url = get_option('api_url', 'None');
    $key = get_option('api_authorization_key', 'None');

    if ($url == 'None') {
        return $err;
    }

    $args = array(
        'headers' => array(
            'Authorization' => $key
        )
    );

    $body = wp_remote_retrieve_body(wp_remote_get($url, $args));

    return $body;
}

add_shortcode('data-retriever', 'get_data_through_api');
?>
