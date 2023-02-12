<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autixir
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
	<div class="body-wrapper">
	<?php
	$header_style = get_post_meta( get_the_ID(), 'autixir_meta_header_style', true );
	$header_style_op = autixir_get_options( 'header_style' );
	if($header_style != ''){
		$headerstyle = $header_style;
	}elseif($header_style_op != ''){
		$headerstyle = $header_style_op;
	}else{
		$headerstyle = 'default';
	}	

	get_template_part('template-parts/header/header',$headerstyle);
	?>
	<div class="ltn__utilize-overlay"></div>
	<?php
$show_breadcrumb = get_post_meta( get_the_ID(), 'autixir_meta_show_breadcrumb', true );
$breadcrumb_subtitle = get_post_meta( get_the_ID(), 'autixir_meta_breadcrumb_subtitle', true );
if (!is_front_page() && $show_breadcrumb != 'off' || is_search() ) {
?>
	<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
						<div class="section-title-area ltn__section-title-2">
							<?php if(!empty($breadcrumb_subtitle)){?>
							<h6 class="section-subtitle ltn__secondary-color"><?php echo esc_html($breadcrumb_subtitle);?></h6>
							<?php } ?>
							<h1 class="section-title white-color">
							<?php
							if ( is_front_page() || is_home() ) {
								$breadcrumb_title = esc_html__( 'Blog Posts', 'autixir' );
							}elseif ( is_archive() ) {
								$breadcrumb_title = get_the_archive_title();
							}elseif ( is_single() ) {
								if ( get_post_type( get_the_ID() ) == 'post' ){
									$breadcrumb_title = get_the_title();
								}else{
									// post type
									$breadcrumb_title = get_post_type() . esc_html__( ' Details', 'autixir' );
								}
							}elseif ( is_404() ) {
								$breadcrumb_title = esc_html__( 'Error Page', 'autixir' );
							}elseif ( is_search() ) {
								$breadcrumb_title =  esc_html__( 'Search Results for: ', 'autixir' ) . get_search_query();
							}else{
								$breadcrumb_title = get_the_title();
							}
							echo wp_kses_post($breadcrumb_title);
							?>
							</h1>
						</div>
						<div class="ltn__breadcrumb-list">
							<ul>
							<?php Autixir_Breadcrumb();?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
