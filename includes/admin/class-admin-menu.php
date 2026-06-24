<?php
/**
 * Admin Menu Class
 */

namespace WCUP\Classes\Admin;

class Admin_Menu {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
	}

	/**
	 * Add admin menu
	 */
	public function add_admin_menu() {
		add_menu_page(
			__( 'User Panel Settings', 'woocommerce-custom-user-panel' ),
			__( 'User Panel', 'woocommerce-custom-user-panel' ),
			'manage_options',
			'wcup-settings',
			array( $this, 'render_settings_page' ),
			'dashicons-admin-users',
			20
		);

		// Announcements submenu
		add_submenu_page(
			'wcup-settings',
			__( 'Announcements', 'woocommerce-custom-user-panel' ),
			__( 'Announcements', 'woocommerce-custom-user-panel' ),
			'manage_options',
			'wcup-announcements',
			array( $this, 'render_announcements_page' )
		);

		// Discount Codes submenu
		add_submenu_page(
			'wcup-settings',
			__( 'Discount Codes', 'woocommerce-custom-user-panel' ),
			__( 'Discount Codes', 'woocommerce-custom-user-panel' ),
			'manage_options',
			'wcup-discount-codes',
			array( $this, 'render_discount_codes_page' )
		);

		// Tickets submenu
		add_submenu_page(
			'wcup-settings',
			__( 'Support Tickets', 'woocommerce-custom-user-panel' ),
			__( 'Tickets', 'woocommerce-custom-user-panel' ),
			'manage_options',
			'wcup-tickets',
			array( $this, 'render_tickets_page' )
		);
	}

	/**
	 * Render settings page
	 */
	public function render_settings_page() {
		require_once WCUP_PLUGIN_DIR . 'templates/admin/settings.php';
	}

	/**
	 * Render announcements page
	 */
	public function render_announcements_page() {
		require_once WCUP_PLUGIN_DIR . 'templates/admin/announcements.php';
	}

	/**
	 * Render discount codes page
	 */
	public function render_discount_codes_page() {
		require_once WCUP_PLUGIN_DIR . 'templates/admin/discount-codes.php';
	}

	/**
	 * Render tickets page
	 */
	public function render_tickets_page() {
		require_once WCUP_PLUGIN_DIR . 'templates/admin/tickets.php';
	}
}
