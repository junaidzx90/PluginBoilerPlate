<?php
 /**
 *
 * @link              https://github.com/
 * @since             1.0.0
 * @package           pluginName
 *
 * @wordpress-plugin
 * Plugin Name:       pluginName
 * Plugin URI:        https://github.com/junaidzx90/pluginName
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Junayedzx90
 * Author URI:        https://www.fiverr.com/junaidzx90
 * Text Domain:       pluginName
 * Domain Path:       /languages
 */

// If this file is called directly, abort.

define( 'PLNM_NAME', 'pluginName' );
define( 'PLNM_PATH', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'WPINC' ) && ! defined('PLNM_NAME') && ! defined('PLNM_PATH')) {
	die;
}

add_action( 'plugins_loaded', 'pluginName_init' );
function pluginName_init() {
    if(!class_exists('Dependable_className')){
        add_action( 'admin_notices', 'pluginName_admin_noticess' );
    }

    load_plugin_textdomain( 'pluginName', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

    add_action('init', 'pluginName_run');
}

// Main Function iitialize
function pluginName_run(){

    function pluginName_admin_noticess(){
        $message = sprintf(
            /* translators: 1: Plugin Name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'pluginName' ),
            '<strong>' . esc_html__( 'pluginName', 'pluginName' ) . '</strong>',
            '<strong>' . esc_html__( 'Dependable Plugin Name', 'pluginName' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    register_activation_hook( __FILE__, 'activate_pluginName_cplgn' );
    register_deactivation_hook( __FILE__, 'deactivate_pluginName_cplgn' );

    // Activision function
    function activate_pluginName_cplgn(){
        // global $wpdb;
        // require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        // $pluginName_v1 = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}pluginName__v1` (
        //     `ID` INT NOT NULL AUTO_INCREMENT,
        //     `user_id` INT NOT NULL,
        //     `username` VARCHAR(255) NOT NULL,
        //     `account1` INT NOT NULL,
        //     `account2` INT NOT NULL,
        //     PRIMARY KEY (`ID`)) ENGINE = InnoDB";
        //     dbDelta($pluginName_v1);
    }

    // Dectivision function
    function deactivate_pluginName_cplgn(){
        // Nothing For Now
    }

    // Admin Enqueue Scripts
    add_action('admin_enqueue_scripts',function(){
        wp_register_script( PLNM_NAME, plugin_dir_url( __FILE__ ).'admin/js/pluginName-admin.js', array(), 
        microtime(), true );
        wp_enqueue_script(PLNM_NAME);
        wp_localize_script( PLNM_NAME, 'admin_ajax_action', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        ) );
    });

    // WP Enqueue Scripts
    add_action('wp_enqueue_scripts',function(){
        wp_register_style( PLNM_NAME, plugin_dir_url( __FILE__ ).'public/css/pluginName-public.css', array(), microtime(), 'all' );
        wp_enqueue_style(PLNM_NAME);

        wp_register_script( PLNM_NAME, plugin_dir_url( __FILE__ ).'public/js/pluginName-public.js', array(), 
        microtime(), true );
        wp_enqueue_script(PLNM_NAME);
        wp_localize_script( PLNM_NAME, 'public_ajax_action', array(
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            'nonce' => wp_create_nonce( 'nonces' )
        ) );
    });

    // Register Menu
    add_action('admin_menu', function(){
        add_menu_page( 'pluginName', 'pluginName', 'manage_options', 'pluginName', 'pluginName_menupage_display', 'dashicons-admin-network', 45 );
    
        // // For colors
        // add_settings_section( 'pluginName_colors_section', 'Activation Colors', '', 'pluginName_colors' );
    
        // //Activate Button
        // add_settings_field( 'pluginName_activate_button', 'Activate Button', 'pluginName_activate_button_func', 'pluginName_colors', 'pluginName_colors_section');
        // register_setting( 'pluginName_colors_section', 'pluginName_activate_button');
        
    });

    // activate Button colors
    // function pluginName_activate_button_func(){
        
    // }

    // pluginName_reset_colors
    // add_action("wp_ajax_pluginName_reset_colors", "pluginName_reset_colors");
    // add_action("wp_ajax_nopriv_pluginName_reset_colors", "pluginName_reset_colors");

    // Menu callback funnction
    function pluginName_menupage_display(){
        if(class_exists('Dependable_className')){
            wp_enqueue_script(PLNM_NAME);
            ?>
            <h1>Menu page</h1>
            <?php
            // echo '<form action="options.php" method="post" id="pluginName_colors">';
            // echo '<h1>Activation Colors</h1><hr>';
            // echo '<table class="form-table">';

            // settings_fields( 'pluginName_colors_section' );
            // do_settings_fields( 'pluginName_colors', 'pluginName_colors_section' );
            
            // echo '</table>';
            // submit_button();
            // echo '<button id="rest_color">Reset</button>';
            // echo '</form>';
        }
    }
}