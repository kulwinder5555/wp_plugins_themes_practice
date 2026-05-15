<?php
/**
 * Plugin Name: Elementor-Button-Cta-Addon
 * Description: buttons for elementor
 * Version:     1.0.0
 * Author:      Kulwinder Singh
 * Author URI:  ""
 * Text Domain: elementor-button-cta-addon
 *
 * Requires Plugins: elementor
 */

function register_widgets($widgets_manager){
    require_once(__DIR__. '/widgets/Read_More_Button.php');
    $widgets_manager->register(new \Read_More_Button());
}

add_action('elementor/widgets/register' , 'register_widgets');