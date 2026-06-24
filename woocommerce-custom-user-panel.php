<?php
/**
 * Plugin Name: WooCommerce Custom User Panel
 * Plugin URI: https://github.com/imsh1002shwpsh-cmd/woocommerce-custom-user-panel
 * Description: پنل کاربری سفارشی و سیستم ورود/ثبت‌نام پیشرفته برای WooCommerce
 * Version: 1.0.0
 * Author: تیم توسعه
 * Author URI: https://github.com/imsh1002shwpsh-cmd
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: woocommerce-custom-user-panel
 * Domain Path: /language
 * Requires PHP: 7.4
 * Requires WP: 5.0
 * Requires Plugins: woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Define plugin constants
define( 'WCUP_VERSION', '1.0.0' );
define( 'WCUP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WCUP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WCUP_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Autoloader
require_once WCUP_PLUGIN_DIR . 'includes/class-autoloader.php';

// Main plugin class
require_once WCUP_PLUGIN_DIR . 'includes/class-plugin.php';

// Initialize the plugin
function wcup_init() {
	$plugin = new \WCUP\Classes\Plugin();
	$plugin->init();
}
add_action( 'plugins_loaded', 'wcup_init' );

// Activation hook
register_activation_hook( __FILE__, function() {
	require_once WCUP_PLUGIN_DIR . 'includes/class-installer.php';
	\WCUP\Classes\Installer::install();
} );

// Deactivation hook
register_deactivation_hook( __FILE__, function() {
	require_once WCUP_PLUGIN_DIR . 'includes/class-installer.php';
	\WCUP\Classes\Installer::deactivate();
} );
