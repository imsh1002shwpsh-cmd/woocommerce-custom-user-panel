<?php
/**
 * Frontend User Dashboard Class
 */

namespace WCUP\Classes\Frontend;

class User_Dashboard {

	public function __construct() {
		add_shortcode( 'wcup-dashboard', array( $this, 'render_dashboard' ) );
		add_shortcode( 'wcup-login', array( $this, 'render_login_page' ) );
	}

	/**
	 * Render user dashboard
	 */
	public function render_dashboard( $atts ) {
		if ( ! is_user_logged_in() ) {
			return '<p>' . esc_html__( 'Please log in to access your dashboard.', 'woocommerce-custom-user-panel' ) . '</p>';
		}

		ob_start();
		require_once WCUP_PLUGIN_DIR . 'templates/dashboard/main.php';
		return ob_get_clean();
	}

	/**
	 * Render login page
	 */
	public function render_login_page( $atts ) {
		if ( is_user_logged_in() ) {
			return wp_redirect( home_url( '/dashboard' ) );
		}

		ob_start();
		require_once WCUP_PLUGIN_DIR . 'templates/login-register.php';
		return ob_get_clean();
	}
}
