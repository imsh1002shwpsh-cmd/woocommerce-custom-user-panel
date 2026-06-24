<?php
/**
 * Frontend Login Register Class
 */

namespace WCUP\Classes\Frontend;

class Login_Register {

	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_footer', array( $this, 'render_login_modal' ) );
	}

	/**
	 * Enqueue scripts
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'wcup-login', WCUP_PLUGIN_URL . 'assets/js/login.js', array( 'jquery' ), WCUP_VERSION, true );
	}

	/**
	 * Render login modal
	 */
	public function render_login_modal() {
		if ( is_user_logged_in() ) {
			return;
		}

		require_once WCUP_PLUGIN_DIR . 'templates/login-register.php';
	}
}
