<?php
/**
 * Autoloader class
 */

namespace WCUP\Classes;

class Autoloader {

	/**
	 * Register autoloader
	 */
	public static function register() {
		spl_autoload_register( array( __CLASS__, 'autoload' ) );
	}

	/**
	 * Autoload classes
	 */
	public static function autoload( $class ) {
		if ( 0 !== strpos( $class, 'WCUP' ) ) {
			return;
		}

		$class_path = str_replace( 'WCUP\\', '', $class );
		$class_path = str_replace( '\\', DIRECTORY_SEPARATOR, $class_path );
		$class_path = strtolower( str_replace( '_', '-', $class_path ) );

		$file = WCUP_PLUGIN_DIR . 'includes' . DIRECTORY_SEPARATOR . $class_path . '.php';

		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}
}

Autoloader::register();
