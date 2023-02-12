<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Autixir
 */

get_header();
?>
<div class="ltn__page-details-area ltn__service-details-area mb-105">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="ltn__page-details-inner ltn__service-details-inner">
                    <?php
                        while ( have_posts() ) :
                            the_post();
                            ?>
                            <div class="ltn__blog-img">
                                <?php the_post_thumbnail('full');?>
                            </div>
                            <?php
                            the_content();
                        endwhile; // End of the loop.
                    ?>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area ltn__right-sidebar">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </aside>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
