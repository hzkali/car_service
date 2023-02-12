<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package autixir
 */

get_header();

$sidebar = autixir_get_option('sidebar_section', 'blog_sidebar');

if ( !is_active_sidebar( 'sidebar-1' ) ) {
	$content_area = 'col-lg-12';
}else{
	$content_area = 'col-lg-8';
}
?>
	<div class="content-area">
		<?php
			if ( have_posts() ) :
			?>
				<div class="ltn__blog-area mb-120">
			        <div class="container">
			            <div class="row">
			            	<?php
								if ( is_active_sidebar( 'sidebar-1' ) && 'left' === $sidebar && 'nosidebar' !== $sidebar) {
									echo '<div class="col-lg-4">';
										get_sidebar();
									echo '</div>';
								}
							?>
			                <div class="<?php echo esc_attr( $content_area ); ?>">
			                	<div class="ltn__blog-list-wrap">
									<?php
										/* Start the Loop */
										while ( have_posts() ) :
											the_post();

											/*
											 * Include the Post-Type-specific template for the content.
											 * If you want to override this in a child theme, then include a file
											 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
											 */
											get_template_part( 'template-parts/formats/content', get_post_format() );

										endwhile;
									?>
								</div>
								<div class="row">
			                        <div class="col-lg-12">
			                            <div class="ltn__pagination-area text-center">
			                                <div class="ltn__pagination">
			                                    <?php autixir_pagination(); ?>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
							</div>
							<?php
								if ( is_active_sidebar( 'sidebar-1' ) && 'left' !== $sidebar && 'nosidebar' !== $sidebar ) {
									echo '<div class="col-lg-4">';
										get_sidebar();
									echo '</div>';
								}
							?>
			            </div>
				    </div>
				</div>
				<?php
			else :
				get_template_part( 'template-parts/formats/content', 'none' );
			endif;
		?>
	</div>
<?php
get_footer();