<?php
/**
 * Database Class
 */

namespace WCUP\Classes;

class Database {

	/**
	 * Create tables on plugin activation
	 */
	public static function create_tables() {
		global $wpdb;

		$charset_collate = $wpdb->get_charset_collate();

		// Announcements table
		$announcements_table = $wpdb->prefix . 'wcup_announcements';
		if ( $wpdb->get_var( "SHOW TABLES LIKE '$announcements_table'" ) !== $announcements_table ) {
			$sql = "CREATE TABLE $announcements_table (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				title VARCHAR(255) NOT NULL,
				content LONGTEXT NOT NULL,
				status ENUM('active', 'inactive') DEFAULT 'active',
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
				updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				PRIMARY KEY (id)
			) $charset_collate;";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}

		// Discount Codes table
		$discount_table = $wpdb->prefix . 'wcup_discount_codes';
		if ( $wpdb->get_var( "SHOW TABLES LIKE '$discount_table'" ) !== $discount_table ) {
			$sql = "CREATE TABLE $discount_table (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				code VARCHAR(100) NOT NULL UNIQUE,
				discount_percent DECIMAL(5, 2) NOT NULL,
				discount_fixed DECIMAL(10, 2) DEFAULT 0,
				status ENUM('active', 'inactive') DEFAULT 'active',
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
				updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				PRIMARY KEY (id),
				UNIQUE KEY code (code)
			) $charset_collate;";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}

		// Tickets table
		$tickets_table = $wpdb->prefix . 'wcup_tickets';
		if ( $wpdb->get_var( "SHOW TABLES LIKE '$tickets_table'" ) !== $tickets_table ) {
			$sql = "CREATE TABLE $tickets_table (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				user_id BIGINT(20) UNSIGNED NOT NULL,
				title VARCHAR(255) NOT NULL,
				description LONGTEXT NOT NULL,
				status ENUM('open', 'closed', 'resolved') DEFAULT 'open',
				priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
				updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
				PRIMARY KEY (id),
				KEY user_id (user_id)
			) $charset_collate;";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}

		// Ticket Messages table
		$ticket_messages_table = $wpdb->prefix . 'wcup_ticket_messages';
		if ( $wpdb->get_var( "SHOW TABLES LIKE '$ticket_messages_table'" ) !== $ticket_messages_table ) {
			$sql = "CREATE TABLE $ticket_messages_table (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				ticket_id BIGINT(20) UNSIGNED NOT NULL,
				user_id BIGINT(20) UNSIGNED NOT NULL,
				message LONGTEXT NOT NULL,
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (id),
				KEY ticket_id (ticket_id),
				KEY user_id (user_id)
			) $charset_collate;";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}

		// Wishlist table
		$wishlist_table = $wpdb->prefix . 'wcup_wishlist';
		if ( $wpdb->get_var( "SHOW TABLES LIKE '$wishlist_table'" ) !== $wishlist_table ) {
			$sql = "CREATE TABLE $wishlist_table (
				id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				user_id BIGINT(20) UNSIGNED NOT NULL,
				product_id BIGINT(20) UNSIGNED NOT NULL,
				created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (id),
				UNIQUE KEY user_product (user_id, product_id)
			) $charset_collate;";
			require_once ABSPATH . 'wp-admin/includes/upgrade.php';
			dbDelta( $sql );
		}
	}
}
