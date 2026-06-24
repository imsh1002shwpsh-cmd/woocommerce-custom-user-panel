<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="wcup-login-register-wrapper">
	<div class="wcup-login-container">
		<div class="wcup-tabs">
			<button class="wcup-tab-btn active" data-tab="login"><?php esc_html_e( 'Login', 'woocommerce-custom-user-panel' ); ?></button>
			<button class="wcup-tab-btn" data-tab="register"><?php esc_html_e( 'Register', 'woocommerce-custom-user-panel' ); ?></button>
		</div>

		<!-- Login Tab -->
		<div class="wcup-tab-content" id="login-tab">
			<h2><?php esc_html_e( 'Login', 'woocommerce-custom-user-panel' ); ?></h2>
			<p><?php esc_html_e( 'Coming soon...', 'woocommerce-custom-user-panel' ); ?></p>
		</div>

		<!-- Register Tab -->
		<div class="wcup-tab-content" id="register-tab" style="display: none;">
			<h2><?php esc_html_e( 'Register', 'woocommerce-custom-user-panel' ); ?></h2>
			<p><?php esc_html_e( 'Coming soon...', 'woocommerce-custom-user-panel' ); ?></p>
		</div>
	</div>
</div>
