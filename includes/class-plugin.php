<?php
/**
 * Main Plugin Class
 */

namespace WCUP\Classes;

class Plugin {

	/**
	 * Initialize plugin
	 */
	public function init() {
		// Load text domain
		add_action( 'init', array( $this, 'load_textdomain' ) );

		// Check if WooCommerce is active
		if ( ! $this->is_woocommerce_active() ) {
			add_action( 'admin_notices', array( $this, 'woocommerce_missing_notice' ) );
			return;
		}

		// Load includes
		$this->load_includes();

		// Hook into WordPress
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}

	/**
	 * Load text domain
	 */
	public function load_textdomain() {
		load_plugin_textdomain(
			'woocommerce-custom-user-panel',
			false,
			dirname( WCUP_PLUGIN_BASENAME ) . '/language'
		);
	}

	/**
	 * Check if WooCommerce is active
	 */
	private function is_woocommerce_active() {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Display WooCommerce missing notice
	 */
	public function woocommerce_missing_notice() {
		?>
		<div class="notice notice-error">
			<p><?php esc_html_e( 'WooCommerce Custom User Panel requires WooCommerce to be installed and activated.', 'woocommerce-custom-user-panel' ); ?></p>
		</div>
		<?php
	}

	/**
	 * Load includes
	 */
	private function load_includes() {
		// Admin classes
		if ( is_admin() ) {
			require_once WCUP_PLUGIN_DIR . 'includes/admin/class-admin-menu.php';
			new Admin\Admin_Menu();
		}

		// Frontend classes
		if ( ! is_admin() ) {
			require_once WCUP_PLUGIN_DIR . 'includes/frontend/class-login-register.php';
			require_once WCUP_PLUGIN_DIR . 'includes/frontend/class-user-dashboard.php';
			new Frontend\Login_Register();
			new Frontend\User_Dashboard();
		}

		// Database
		require_once WCUP_PLUGIN_DIR . 'includes/class-database.php';
	}

	/**
	 * Enqueue frontend scripts
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'wcup-style', WCUP_PLUGIN_URL . 'assets/css/style.css', array(), WCUP_VERSION );
		wp_enqueue_script( 'wcup-script', WCUP_PLUGIN_URL . 'assets/js/script.js', array( 'jquery' ), WCUP_VERSION, true );
	}

	/**
	 * Enqueue admin scripts
	 */
	public function enqueue_admin_scripts() {
		wp_enqueue_style( 'wcup-admin-style', WCUP_PLUGIN_URL . 'assets/css/admin-style.css', array(), WCUP_VERSION );
		wp_enqueue_script( 'wcup-admin-script', WCUP_PLUGIN_URL . 'assets/js/admin-script.js', array( 'jquery' ), WCUP_VERSION, true );
	}
}
