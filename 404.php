<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Autixir
 */

get_header();
?>
<div class="ltn__404-area ltn__404-area-1 mb-120 mt--30">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="error-404-inner text-center">
					<h1 class="error-404-title"><?php esc_html_e('404','autixir');?></h1>
					<h2><?php esc_html_e('Page Not Found! Page Not Found!','autixir');?></h2>
					<p><?php esc_html_e('Oops! The page you are looking for does not exist. It might have been moved or deleted.','autixir');?></p>
					<div class="btn-wrapper">
						<a href="<?php echo esc_url(get_home_url()); ?>" class="btn btn-transparent"><i class="fas fa-long-arrow-alt-left"></i> <?php esc_html_e('BACK TO HOME','autixir');?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
