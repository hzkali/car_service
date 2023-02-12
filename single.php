<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Autixir
 */

get_header();
if ( !is_active_sidebar( 'sidebar-1' ) ) {
	$content_area = 'col-lg-12';
}else{
	$content_area = 'col-lg-8';
}
?>
<div class="ltn__page-details-area ltn__blog-details-area mb-120">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($content_area);?>">
				<div class="ltn__blog-details-wrap">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/formats/single-content', get_post_type() );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
			</div>
			<?php if (is_active_sidebar('sidebar-1')) { ?>
			<div class="col-lg-4">
				<aside class="sidebar-area blog-sidebar ltn__right-sidebar">
					<?php get_sidebar(); ?>
				</aside>
			</div>
			<?php } ?>
		</div>
	</div>
</div><!-- #main -->
<?php
get_footer();
