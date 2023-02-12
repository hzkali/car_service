<?php
$post_view_onoff = autixir_get_options( 'post_view_onoff' );
$count      = get_post_meta(get_the_id(), 'views', true);
$count      = ($count == null ? '0' : $count);
$view       = ($count > 1 ? ' Views' : ' View');
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('ltn__blog-item ltn__blog-item-5'); ?>>
    <?php if( has_post_thumbnail() ): ?>
        <div class="ltn__blog-img">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </div>
    <?php endif ?>
    <div class="ltn__blog-brief">
        <?php
        if ( is_sticky() ) {
            echo '<div class="sticky_post_icon " title="' . esc_attr__( 'Sticky Post', 'autixir' ) . '"><i class="fas fa-map-pin"></i></div>';
        }
        ?>
        <div class="ltn__blog-meta">
            <?php autixir_get_category_list(); ?>
        </div>
        <h3 class="ltn__blog-title">
            <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="ltn__blog-meta">
            <ul>
                <?php if($post_view_onoff){?>
                <li><a href="<?php esc_url(the_permalink()); ?>"><i class="far fa-eye"></i><?php echo esc_html($count . $view); ?></a></li>
                <?php } ?>
                <li><i class="far fa-comments"></i><?php comments_popup_link( esc_html__( '0 Comments', 'autixir' ), esc_html__( '1 Comment', 'autixir' ), esc_html__( '% Comments', 'autixir' ), 'comments-link' ); ?></li>
                <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i><?php autixir_posted_time(); ?></li>
            </ul>
        </div>
        <p><?php echo autixir_excerpt(); ?></p>
        <div class="ltn__blog-meta-btn">
            <div class="ltn__blog-meta">
                <ul>
                    <li class="ltn__blog-author">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), 40 ).esc_html__( 'By: ', 'autixir' ); echo esc_html( the_author_posts_link() ); ?>
                    </li>
                </ul>
            </div>
            <div class="ltn__blog-btn">
                <a href="<?php the_permalink(); ?>"><i class="fas fa-arrow-right"></i><?php echo esc_html__( 'Read more', 'autixir' ); ?></a>
            </div>
        </div>
        <div class="entry-content">
            <?php
                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'autixir' ),
                        'after'  => '</div>',
                    )
                );
            ?>
        </div>
    </div>
</div>


