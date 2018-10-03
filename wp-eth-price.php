<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              fieztech.com
 * @since             1.0.0
 * @package           Wp_Eth_Price
 *
 * @wordpress-plugin
 * Plugin Name:       Crypto Coin Price
 * Plugin URI:        https://github.com/zaheeraws/wp-eth-price.git
 * Description:       You can use it in your post by calling shortcode. [eth_price coin="ETN" usd="1" eur="1"] put 0 instead of 1 to disable pricing for that currency. Write the coin short code and done. Total 3098 coins supported. see coin codes here: https://github.com/zaheeraws/wp-eth-price/blob/master/README.txt
 * Version:           1.0.0
 * Author:            fieztech
 * Author URI:        fieztech.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-eth-price
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('PLUGIN_NAME_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-eth-price-activator.php
 */
function activate_wp_eth_price()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-eth-price-activator.php';
    Wp_Eth_Price_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-eth-price-deactivator.php
 */
function deactivate_wp_eth_price()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-wp-eth-price-deactivator.php';
    Wp_Eth_Price_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wp_eth_price');
register_deactivation_hook(__FILE__, 'deactivate_wp_eth_price');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wp-eth-price.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_eth_price()
{

    $plugin = new Wp_Eth_Price();
    $plugin->run();

}
run_wp_eth_price();

function ft_eth_price($atts = [], $content = null, $tag = '')
{
    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
    $coin = "ETN";
    if (isset($atts['coin']) && $atts['coin'] != "") {
        $coin = $atts['coin'];
    }
    $json_data = file_get_contents("https://min-api.cryptocompare.com/data/pricemultifull?fsyms={$coin}&tsyms=USD,EUR");
    //https://min-api.cryptocompare.com/data/pricemulti?fsyms={$coin}&tsyms=USD,EUR
    $a = json_decode($json_data)->DISPLAY;

    require_once plugin_dir_path(__FILE__) .'./public/partials/plugin-view.php';
}
add_shortcode('eth_price_title', 'ft_eth_price');



function ft_price_graph($atts = [], $content = null, $tag = '')
{
    $atts = array_change_key_case((array) $atts, CASE_LOWER);
    $coin = "ETN";
    if (isset($atts['coin']) && $atts['coin'] != "") {
        $coin = $atts['coin'];
    }
    $json_data = file_get_contents("https://min-api.cryptocompare.com/data/histohour?fsym={$coin}&tsym=USD,EUR&limit=12");
    require_once plugin_dir_path(__FILE__) .'./public/partials/plugin-view-graph.php';

}
add_shortcode( "eth_price_graph", "ft_price_graph" );