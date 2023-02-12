<div class="ltn__page-details-inner ltn__blog-details-inner">
    <div class="ltn__blog-meta">
        <?php autixir_get_category_list(); ?>
    </div>
    <div class="ltn__blog-meta">
        <ul>
            <li class="ltn__blog-author">
                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 40 ).esc_html__( 'By: ', 'autixir' ); echo esc_html( the_author_posts_link() ); ?>
            </li>
            <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i><?php autixir_posted_time(); ?></li>
            <li><i class="far fa-comments"></i><?php comments_popup_link( esc_html__( '0 Comments', 'autixir' ), esc_html__( '1 Comment', 'autixir' ), esc_html__( '% Comments', 'autixir' ), 'comments-link' ); ?></li>
        </ul>
    </div>
    <div class="ltn__blog-details-content">
        <?php the_content(); ?>
    </div>
</div>
<!-- blog-tags-social-media -->
<?php 
$post_social_share = autixir_get_options( 'post_social_share' );
if( has_tag() || $post_social_share ): ?>
<div class="ltn__blog-tags-social-media mt-80 row">
    <?php if( has_tag() ): ?>
        <div class="ltn__tagcloud-widget col-lg-8">
            <h4><?php echo esc_html__( 'Tags', 'autixir' ); ?></h4>
            <?php autixir_tag_list(); ?>
        </div>
    <?php endif; ?>
    <?php 
    if($post_social_share){
        do_action('autixir_shcial_share');
    }
    ?>
</div>
<?php endif; ?>
<!-- prev-next-btn -->
<?php 
$post_nav = autixir_get_options( 'post_nav' );
if($post_nav){?>
<hr>
<div class="ltn__prev-next-btn row mb-50">
    <div class="blog-prev col-lg-6">
        <?php 
            if( get_previous_post() ): 
                $prev = get_previous_post()->ID;
                $prev_title = get_the_title( $prev );
                $prev_link = get_the_permalink( $prev );
            ?>
            <h6><?php echo esc_html__( 'Prev Post', 'autixir' ); ?></h6>
            <h3 class="ltn__blog-title"><a href="<?php echo esc_url( $prev_link ); ?>"><?php echo wp_trim_words( $prev_title, 3, '..' ); ?></a></h3>
        <?php endif; ?>
    </div>
    <div class="blog-prev blog-next text-right col-lg-6">
        <?php 
            if( get_next_post() ): 
                $next = get_next_post()->ID;
                $next_title = get_the_title( $next );
                $next_link = get_the_permalink( $next );
        ?>
            <h6><?php echo esc_html__( 'Next Post', 'autixir' ); ?></h6>
            <h3 class="ltn__blog-title"><a href="<?php echo esc_url( $next_link ); ?>"><?php echo wp_trim_words( $next_title, 3, '..' ); ?></a></h3>
        <?php endif; ?>
    </div>
</div>
<?php } ?>
<?php 
$related_post = autixir_get_options( 'related_post' );
if($related_post){?>
<?php
$categories = wp_get_post_categories( get_the_ID() );
$tags       = wp_get_post_tags( get_the_ID() );

$related_args = array(
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => 2,
    'ignore_sticky_posts' => 1
);
if( $categories ){
    $related_args['category__in'] = $categories;
}elseif ( $tags ) {
    $related_args['tag__in'] = $tags;
}else{
    $related_args = array();
}

if( $categories || $tags ){
    $related = new WP_Query( $related_args );
}
?>
<?php if( is_object( $related ) && $related->have_posts() ):?>
    <hr>
    <!-- related-post -->
    <div class="related-post-area mb-50">
        <h4 class="title-2"><?php echo esc_html__( 'Related Post', 'autixir' ); ?></h4>
        <div class="row">
            <?php while ( $related->have_posts() ) : $related->the_post(); ?>
                <div class="col-md-6">
                    <!-- Blog Item -->
                    <div class="ltn__blog-item ltn__blog-item-6">
                        <div class="ltn__blog-img">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-date ltn__secondary-color">
                                        <i class="far fa-calendar-alt"></i><?php the_time( 'F j, Y' ); ?>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 10, '..' ); ?></a></h3>
                            <p><?php echo wp_trim_words( get_the_content(), 15, '..' ); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
<?php endif; ?>
<?php } ?>
<?php 
$author_box = autixir_get_options( 'author_box' );
if($author_box){
?>
<?php if(get_the_author_meta( 'user_description' )){?>
<div class="ltn-author-introducing clearfix">
    <div class="author-img">
        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 180 ); ?>
    </div>
    <div class="author-info">
        <h6><?php echo esc_html__( 'Written by', 'autixir' ); ?></h6>
        <h1><?php the_author(); ?></h1>
        <p><?php the_author_meta( 'user_description' ); ?></p>
    </div>
</div>
<?php 
}
}
?>