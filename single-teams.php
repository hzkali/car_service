<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Autixir
 */

get_header();
while ( have_posts() ) :
    the_post();
    $designation = get_post_meta(get_the_ID(),'autixir_meta_designation', true);
    $fb_url = get_post_meta(get_the_ID(),'autixir_meta_fb_url', true);
    $tw_url = get_post_meta(get_the_ID(),'autixir_meta_tw_url', true);
    $lnk_url = get_post_meta(get_the_ID(),'autixir_meta_lnk_url', true);
?>
<div class="ltn__team-details-area mb-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="ltn__team-details-member-info text-center mb-40">
                    <div class="team-details-img">
                        <?php the_post_thumbnail('full');?>
                    </div>
                    <h2><?php the_title();?></h2>
                    <h6 class="text-uppercase ltn__secondary-color"><?php echo esc_html($designation);?></h6>
                    <div class="ltn__social-media-3">
                        <ul>
                            <li><a href="<?php echo esc_url($fb_url);?>"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="<?php echo esc_url($tw_url);?>"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="<?php echo esc_url($lnk_url);?>"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ltn__team-details-member-info-details">
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
endwhile; // End of the loop.
get_footer();
