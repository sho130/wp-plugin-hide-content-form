<?php
/*
Plugin Name: Hide Content Form
Plugin URI: http://blog.aka-megane.com
Description: 本文入力フォームの非表示機能を追加します。
Version: 0.1
Author: sho
Author URI: http://blog.aka-megane.com
Author Email: sho@aka-megane.com
*/

class hide_content_form
{
    const CONF_KEY_BLOGS = 'hcf_blogs';

    public function __construct()
    {
        if ($this->is_hide()) {
            add_action('admin_head', array($this, 'hide_content'));
        }

        if (is_admin()) {
            add_action('admin_menu', array($this, 'add_admin_menu'));
        }
    }

    private function is_hide()
    {
        $hide = get_option(self::CONF_KEY_BLOGS);
        if ($hide == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function hide_content()
    {
        require(dirname(__FILE__) . '/view/hide-style.php');
    }

    public function add_admin_menu()
    {
        add_options_page(
            '本文フォーム表示設定',
            '本文フォーム表示設定',
            'manage_options',
            basename(__FILE__),
            array($this, 'config_menu')
        );
    }

    public function config_menu()
    {
        $message = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->save_conf($_POST['blogs']);
            $message = '設定を保存しました。<br />';
        }

        require(dirname(__FILE__) . '/view/config-menu.php');
    }

    public function save_conf($is_hide)
    {
        update_option(self::CONF_KEY_BLOGS, $is_hide);
    }
}
new hide_content_form();
