<?php
/**
 * Plugin Name: Innvonix testimonials
 * Description: testimonials manager for WordPress.  This plugin allows you to manage, edit, and create new testimonials items in an unlimited number of testimonials.
 * Author: Innvonix Technologies
 * Author URI: http://innvonix.com
 * Requires at least: 4.4
 * Tested up to: 4.7
 * Version:   1.0
 * Text Domain: innvonix-testimonials
 * Domain Path: /i18n/languages/
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * package innvonix-testimonials
 * Copyright Copyright (c) 2017, Innvonix Technologies LLP.

 */

class Gw_testimonials {

	/**
	 * PHP5 constructor method.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		/* Set the constants needed by the plugin. */
		add_action('plugins_loaded', array(&$this, 'constants'), 1);

		/* Internationalize the text strings used. */
		add_action('plugins_loaded', array(&$this, 'i18n'), 2);

		/* Load the functions files. */
		add_action('plugins_loaded', array(&$this, 'includes'), 3);

		/* Load the admin files. */
		add_action('plugins_loaded', array(&$this, 'admin'), 4);

		/* Register activation hook. */
		register_activation_hook(__FILE__, array(&$this, 'activation'));

	}

	/**
	 * Defines constants used by the plugin.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	public function constants() {

		/* Set constant path to the plugin directory. */
		define('INNVONIX_DIR', trailingslashit(plugin_dir_path(__FILE__)));

		/* Set the constant path to the plugin directory URI. */
		define('INNVONIX_URI', trailingslashit(plugin_dir_url(__FILE__)));

		/* Set the constant path to the includes directory. */
		define('INNVONIX_INCLUDES', INNVONIX_DIR . trailingslashit('includes'));

		/* Set the constant path to the admin directory. */
		define('INNVONIX_ADMIN', INNVONIX_DIR . trailingslashit('admin'));
	}

	/**
	 * Loads the initial files needed by the plugin.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	public function includes() {
		require_once INNVONIX_INCLUDES . 'functions.php';
	}

	/**
	 * Loads the translation files.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	public function i18n() {
		/* Load the translation of the plugin. */
		load_plugin_textdomain('innvonix-testimonials', false, 'innvonix-testimonials/languages');
	}

	/**
	 * Loads the admin functions and files.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	public function admin() {
		require_once INNVONIX_ADMIN . 'admin.php';
	}

	/**
	 * Method that runs only when the plugin is activated.
	 *
	 * @since  1.0
	 * @access public
	 * @return void
	 */
	function activation() {

		/* Get the administrator role. */
		$role = get_role('administrator');

		/* If the administrator role exists, add required capabilities for the plugin. */
		if (!empty($role)) {

			$role->add_cap('manage_testimonials');
			$role->add_cap('create_testimonials');
			$role->add_cap('edit_testimonials');
		}
	}
}

new Gw_testimonials();

add_action('wp_enqueue_scripts', 'invx_testimonials_style');
function invx_testimonials_style() {
	wp_enqueue_style('invx-testimonials-style', INNVONIX_URI . 'assets/css/style.css');
	wp_enqueue_style('font-awesome-invx-testimonials', INNVONIX_URI . 'assets/css/font-awesome.css', array(), '4.7.0', 'all');
	wp_enqueue_style('owl-carousel-invx-testimonials', INNVONIX_URI . 'assets/css/owl.carousel.css', array(), '1.3.3', 'all');
	wp_enqueue_style('owl-theme-invx-testimonials', INNVONIX_URI . 'assets/css/owl.theme.css', array(), '1.3.3', 'all');
	wp_enqueue_style('owl-transitions-invx-testimonials', INNVONIX_URI . 'assets/css/owl.transitions.css', array(), '1.3.2', 'all');
	wp_enqueue_style('bootstrap-invx-testimonials', INNVONIX_URI . 'assets/css/bootstrap.min.css', array(), '3.3.7', 'all');
	wp_enqueue_script('owl-carousel-min', INNVONIX_URI . 'assets/js/owl.carousel.js', array('jquery'), '1.0', true);
	wp_enqueue_script('innvonix-custom-js', INNVONIX_URI . 'assets/js/innvonix-custom.js', array('jquery'), '1.0', true);
}

?>