<?php
function autixir_color_styles() {

$primary_color = autixir_get_options( 'primary_color' );

ob_start();
if ( ( isset( $primary_color ) ) && ( ! empty( $primary_color ) ) ) {
	?>
:root {
    --ltn__secondary-color: <?php echo esc_attr( $primary_color ); ?>;
    --border-color-4: <?php echo esc_attr( $primary_color ); ?>;
}
<?php
}


$autixir_custom_css = ob_get_clean();

return $autixir_custom_css;
}

