<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="wrap">
	<h1><?php esc_html_e( 'User Panel Settings', 'woocommerce-custom-user-panel' ); ?></h1>

	<div class="card">
		<h2><?php esc_html_e( 'General Settings', 'woocommerce-custom-user-panel' ); ?></h2>

		<form method="post" action="options.php">
			<?php
			echo '<p>' . esc_html__( 'Coming soon...', 'woocommerce-custom-user-panel' ) . '</p>';
			?>
		</form>
	</div>
</div>
