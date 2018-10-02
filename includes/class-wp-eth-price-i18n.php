<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       fieztech.com
 * @since      1.0.0
 *
 * @package    Wp_Eth_Price
 * @subpackage Wp_Eth_Price/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Eth_Price
 * @subpackage Wp_Eth_Price/includes
 * @author     fieztech <dev@fieztech.com>
 */
class Wp_Eth_Price_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-eth-price',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
