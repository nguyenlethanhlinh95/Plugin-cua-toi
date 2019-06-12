<?php
/**
 * Plugin Name: My First learn plugin
 * Plugin URI: http://skytechkey.com // Địa chỉ trang chủ của plugin
 * Description: Đây là plugin đầu tiên mà tôi viết dành riêng cho WordPress, chỉ để học tập mà thôi. // Phần mô tả cho plugin
 * Version: 1.0 // Đây là phiên bản đầu tiên của plugin
 * Author: Thanh Linh // Tên tác giả, người thực hiện plugin này
 * Author URI: http://skytechkey.com // Địa chỉ trang chủ của tác giả
 * License: GPLv2 or later // Thông tin license của plugin, nếu không quan tâm thì bạn cứ để GPLv2 vào đây
 */

defined('ABSPATH') or die('Hey , you\t access this file, you silly human!');

class LearnPlugin{

    public function __construct()
    {
        add_action('init', array($this,'custom_post_type'));
    }

    // active
    function activate()
    {
        // generated a CPT
        $this->custom_post_type()
        // flush rewrite rules
        flush_rewrite_rules();
    }

    // deactive
    function deactivate()
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    //uninstall
    function uninstall()
    {
        // delete CPT
        // delete all the plugin data from the DB
    }


    // custom post type
    function custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
}


if (class_exists('LearnPlugin'))
{
    $LearnPlugin = new LearnPlugin();
}

// activation
register_activation_hook(__FILE__, array($LearnPlugin, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($LearnPlugin, 'deactivate'));

//uninstall