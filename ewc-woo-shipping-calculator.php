<?php

/*
  Plugin Name: Woocommerce Calculate Shipping In Product Page
  Plugin URI: https://wordpress.org/plugins/woo-calculate-shipping-in-product-page/
  Description: Calculate shipping before adding the product to the cart with avaialable shipping methods.
  Author: enhancewc
  Version: 1.0.5
  Text Domain: ewcship
  Author URI: https://moreaddons.com/
 */

if (!defined('ABSPATH')) {
    exit;
}

global $ewcship_plugin_url, $ewcship_plugin_dir;
$ewcship_plugin_dir = dirname(__FILE__) . "/";
$ewcship_plugin_url = plugins_url() . "/" . basename($ewcship_plugin_dir) . "/";
include_once $ewcship_plugin_dir . 'lib/main.php';

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'ewc_add_action_links');

function ewc_add_action_links($links) {
    $plugin_links = array(
        '<a href="' . admin_url('admin.php?page=ewcship-calculator-setting') . '">' . __('Settings', 'ewcship') . '</a>',
        '<a href="https://wordpress.org/support/plugin/woo-calculate-shipping-in-product-page" target="_blank" style="color:#3db634;">' . __('Support', 'ewcship') . '</a>',
        '<a href="https://wordpress.org/support/plugin/woo-calculate-shipping-in-product-page/reviews/" target="_blank" style="color:#3db634;" >' . __('Review', 'ewcship') . '</a>',
    );
    return array_merge($links, $plugin_links);
}

add_action( 'init', 'load__ewc_plugin_textdomain' );
/**
 * Handle localization
 */
function load__ewc_plugin_textdomain() {
    load_plugin_textdomain('ewcship', false, dirname(plugin_basename(__FILE__)) . '/i18n/');
}