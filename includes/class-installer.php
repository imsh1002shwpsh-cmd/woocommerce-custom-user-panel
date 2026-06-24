<?php
/**
 * Installer Class
 */

namespace WCUP\Classes;

class Installer {

	/**
	 * Install plugin
	 */
	public static function install() {
		require_once WCUP_PLUGIN_DIR . 'includes/class-database.php';
		Database::create_tables();
	}

	/**
	 * Deactivate plugin
	 */
	public static function deactivate() {
		// Clean up if needed
	}
}
