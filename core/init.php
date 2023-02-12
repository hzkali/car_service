<?php
/**
 * autixir functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package autixir
 */

// Theme libraries
include ( AUTIXIR_DEFAULT_PATH . '/core/hooks/action.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/lib/breadcrumb.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/lib/tgm/class-tgm-plugin-activation.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/lib/tgm/config-tgm.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/lib/helper_function.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/lib/custom.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/classes/admin/class.kirki-installer-section.php' );
include ( AUTIXIR_DEFAULT_PATH . '/core/classes/admin/class.customizer.php' );

// JETPACK
if ( defined( 'JETPACK__VERSION' ) ) {
	include ( AUTIXIR_DEFAULT_PATH . '/core/lib/jetpack/jetpack.php' );
}
