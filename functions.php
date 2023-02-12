<?php
/**
 * autixir functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package autixir
 */

// Constants definition
define( 'AUTIXIR_DEFAULT_PATH', trailingslashit( get_template_directory() ) );
define( 'AUTIXIR_DEFAULT_URL',  trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'AUTIXIR_IMG_URL', AUTIXIR_DEFAULT_URL . 'assets/images/' );
define( 'AUTIXIR_DEFAULT_VERSION', '1.0.0' );

// Initialize core file
require AUTIXIR_DEFAULT_PATH . 'core/init.php';