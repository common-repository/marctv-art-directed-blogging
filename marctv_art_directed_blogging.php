<?php
/*
  Plugin Name: MarcTV Art Directed Blogging
  Plugin URI: http://www.marc.tv/blog/marctv-wordpress-plugins/
  Description: Simple put powerfull: adds the ability to reference a css file with a custom field for each article.
  Version: 1.7.1
  Author: MarcDK
  Author URI: http://marc.tv
  License: GPL2

  Simple but powerful: adds the ability to reference a css file with a custom field for each article.

 */

// enqueue stylesheet for individual styled articles
function post_add_stylesheet()
{
    $path = WP_CONTENT_URL . '/articlestyles/';
    if (is_single()) {
        $id = get_the_ID();
        if (function_exists('get_post_meta') && get_post_meta($id, 'extraCss', true) != '') {

            wp_enqueue_style(
                'extraCss', $path . get_post_meta($id, 'extraCss', true) . "/" . get_post_meta($id, 'extraCss', true) . '.css', array(), false, 'screen');

            wp_enqueue_style(
                'dashicons');

            if (!get_option('marctvadb_disable_sw')) {
                wp_enqueue_style(
                    'extraCss_helper', WP_PLUGIN_URL . "/marctv-art-directed-blogging/helper.css", array(), false, 'screen');
                wp_enqueue_script(
                    "jquery.marctv_art_directed_blogging", WP_PLUGIN_URL . "/marctv-art-directed-blogging/marctv_art_directed_blogging_setup.js",
                    array("jquery"), "", 1);
            }
        }
    }
}

function browser_body_class($classes)
{
    $id = get_the_ID();

    if (is_single()) {
        if (function_exists('get_post_meta') && get_post_meta($id, 'extraCss', true) != '') {
            $classes[] = 'artdirected';
        }
    }
    return $classes;
}

function marctv_adb_add_admin_menu()
{
    if (is_super_admin()) {
        wp_enqueue_style(
            "marctv-adb-admin-settings", WP_PLUGIN_URL . "/marctv-art-directed-blogging/admin_helper.css",
            false, "1.5.1");
        add_options_page('Art Directed Blogging', 'Art Directed Blogging', 'edit_posts', 'marctv_adb', 'menu');
    }
}

function menu()
{

    if (isset($_POST['marctvadb-settings'])) {
        check_admin_referer('marctvadb-settings' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        update_option('marctvadb_disable_sw', trim(stripslashes($_POST['marctvadb-disable-js'])));
    }

    $disable_sw = get_option('marctvadb_disable_sw');
    ?>
    <div class="wrap">
        <h2>MarcTV Art Directed Blogging Settings</h2>
        <form method="post" action="">
            <input type="hidden" value="1" name="marctvadb-settings" id="marctvadb-settings"/>
            <?php wp_nonce_field('marctvadb-settings' . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']); ?>
            <fieldset class="options">
                <legend>Style Switcher: The little X in the top right corner</legend>
                <label for="marctvadb-disable-js">Disable Style Switcher?
                    <input type="checkbox" <?php
                    if ($disable_sw == true) {
                        echo 'checked="checked"';
                    } ?> value="true" name="marctvadb-disable-js" id="marctvadb-disable-js"/>
                </label>
            </fieldset>
            <p class="submit"><input type="submit" name="submit" value="Save &raquo;"/></p>
        </form>
    </div>
    <?php
}

if (!is_admin()) {
    add_action('wp_print_styles', 'post_add_stylesheet');
    add_filter('body_class', 'browser_body_class');
} else {
    add_action('admin_menu', 'marctv_adb_add_admin_menu');
}
?>
