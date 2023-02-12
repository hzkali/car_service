<?php
/**
 * Cuatom Logo
 *
 * @param      string  $custom_logo  Logo id
 * @return     void
 */
if ( ! function_exists( 'autixir_logo') ) {
	function autixir_logo(){
		if (has_custom_logo()) {
			the_custom_logo();
		}else{ ?>
			<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo AUTIXIR_IMG_URL;?>logo-2.png" alt="<?php esc_attr_e('Logo','autixir');?>"></a>
		<?php
		}
	}
}

if ( ! function_exists( 'autixir_logo_black') ) {
	function autixir_logo_black(){
		if (has_custom_logo()) {
			the_custom_logo();
		}else{ ?>
			<a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo AUTIXIR_IMG_URL;?>logo.png" alt="<?php esc_attr_e('Logo','autixir');?>"></a>
		<?php
		}
	}
}


/**
 * Get excerpt
 */
if ( ! function_exists( 'autixir_excerpt' ) ) {
	function autixir_excerpt( $length = 50 ) {
		global $post;
		$output = '';

		// Check for custom excerpt
		if ( isset( $post->ID ) && has_excerpt( $post->ID ) ) {
			$output = $post->post_excerpt;
		}

		// No custom excerpt
		elseif ( isset( $post->post_content ) ) {
			// Check for more tag and return content if it exists
			if ( strpos( $post->post_content, '<!--more-->' ) ) {
				$output = apply_filters( 'the_content', get_the_content() );
			}
			// No more tag defined
			else {
				$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );
			}
		}

		$output = apply_filters( 'autixir_excerpt', $output );
		return $output;
	}
}


/**
 * Get Short text
 */
if ( ! function_exists( 'autixir_text_shorter' ) ) {
	function autixir_text_shorter( $text, $length = 10 ) {

		$output = '';

		// Check for text
		if ( isset( $text ) ) {
			$output = wp_trim_words( $text, $length );
		}

		$output = apply_filters( 'autixir_text_shorter', $output );
		return $output;
	}
}

if ( ! function_exists( 'autixir_get_option' ) ) {
	function autixir_get_option( $section, $option ){
		if ( !class_exists( 'Kirki' ) ) {
			return;
		}

		$value = Kirki::get_option( $section, $option );
		return $value;
	}
}


/**
 * Numbered Pagination
 *
 * @link	https://codex.wordpress.org/Function_Reference/paginate_links
 */
if ( ! function_exists( 'autixir_pagination') ) {
	function autixir_pagination( $query = '', $echo = true ) {
		
		// Arrows with RTL support
		$prev_arrow = is_rtl() ? 'fas fa-angle-double-right' : 'fas fa-angle-double-left';
		$next_arrow = is_rtl() ? 'fas fa-angle-double-left' : 'fas fa-angle-double-right';
		
		// Get global $query
		if ( ! $query ) {
			global $wp_query;
			$query = $wp_query;
		}

		// Set vars
		$total  = $query->max_num_pages;
		$big    = 999999999;

		// Display pagination if total var is greater then 1 ( current query is paginated )
		if ( $total > 1 ) {

			// Get current page
			if ( $current_page = get_query_var( 'paged' ) ) {
				$current_page = $current_page;
			} elseif ( $current_page = get_query_var( 'page' ) ) {
				$current_page = $current_page;
			} else {
				$current_page = 1;
			}

			// Get permalink structure
			if ( get_option( 'permalink_structure' ) ) {
				if ( is_page() ) {
					$format = 'page/%#%/';
				} else {
					$format = '/%#%/';
				}
			} else {
				$format = '&paged=%#%';
			}

			$args = apply_filters( 'autixir_pagination_args', array(
				'base'      => str_replace( $big, '%#%', html_entity_decode( get_pagenum_link( $big ) ) ),
				'format'    => $format,
				'current'   => max( 1, $current_page ),
				'total'     => $total,
				'mid_size'  => 3,
				'type'      => 'list',
				'prev_text' => '<span class="screen-reader-text">'. esc_attr__( 'Go to the previous page','autixir' ) .'</span><i class="'. $prev_arrow .'" aria-hidden="true"></i>',
				'next_text' => '<span class="screen-reader-text">'. esc_attr__( 'Go to the next page','autixir' ) .'</span><i class="'. $next_arrow .'" aria-hidden="true"></i>',
			) );

			// Output pagination
			if ( $echo ) {
				echo '<div class="ltn__pagination">'. wp_kses_post( paginate_links( $args ) ) .'</div>';
			} else {
				return '<div class="ltn__pagination">'. wp_kses_post( paginate_links( $args ) ) .'</div>';
			}
		}
	}
}

/**
 * Get Category list
 */
if( ! function_exists('autixir_get_category_list') ){
	function autixir_get_category_list( $id = null, $taxonomy = 'category', $limit = 1, $class = 'ltn__blog-category' ) { 
	    $terms = get_the_terms( $id, $taxonomy );
	    if( !empty( $class ) ){
	    	$class = 'class="'.$class.'" ';
	    }
	    $i = 0;
	    if ( is_wp_error( $terms ) )
	        return $terms;

	    if ( empty( $terms ) )
	        return false;

	    echo '<ul>';
		    foreach ( $terms as $term ) {
		        $i++;
		        $link = get_term_link( $term, $taxonomy );
		        if ( is_wp_error( $link ) ) {
		            return $link;
		        }
		        echo '<li '.$class.'><a href="' . esc_url( $link ) . '">' . $term->name . '</a></li>';
		        if( $i == $limit ){
		            break;
		        }else{ continue; }
		    }
	    echo '</ul>';

	}
}
if ( ! function_exists( 'autixir_posted_time' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function autixir_posted_time() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'autixir' ),
			'' . $time_string . ''
		);

		echo '' . $posted_on . '';

	}
endif;

function autixir_posted_by() {
	$byline = sprintf(
	/* translators: %s: post author. */
	esc_html_x( '%s', 'post author', 'autixir' ),'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><i class="far fa-user"></i>'.esc_html('By: ','autixir') . esc_html( get_the_author() ) . '</a>'
	);
	
	printf($byline); // WPCS: XSS OK.

}


if (!function_exists('autixir_post_categories')) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function autixir_post_categories() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf('<i class="fas fa-tags"></i>' . esc_html('%1$s','autixir') . '', $categories_list); // WPCS: XSS OK.
            }
        }
    }

endif;

if ( ! function_exists( 'autixir_tag_list' ) ) :

	function autixir_tag_list() {
		if ( 'post' === get_post_type() ) {
			$tags_list = get_the_tag_list( '<ul class="tags-list"><li>', '</li><li>', '</li></ul>' );
			if ( $tags_list ) {
				printf( $tags_list ); // WPCS: XSS OK.
			}
		}
	}

endif;

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/**
 * Comments and pingbacks
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'autixir_comment' ) ) {

	function autixir_comment( $comment, $args, $depth ) {

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
			case 'comment':
			?>

				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		            <div class="ltn__comment-item clearfix">
		                <div class="ltn__commenter-img">
		                    <?php echo get_avatar( $comment, apply_filters( 'autixir_comment_avatar_size', 100 ) ); ?>
		                </div>
		                <div class="ltn__commenter-comment">
		                    <h6><?php comment_author_link(); ?></h6>
		                    <span class="comment-date"><?php autixir_posted_time(); ?></span>
		                    <div class="comment-entry">
			                    <?php if ( '0' == $comment->comment_approved ) : ?>
			                        <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'autixir' ); ?></p>
			                    <?php endif; ?>

			                    <div class="comment-content">
			                        <?php comment_text(); ?>
			                    </div>
			                </div>
			            
			            <?php comment_reply_link( array_merge( $args, array( 'reply_text'=>'<div class="ltn__comment-reply-btn"><i class="icon-reply-1"></i>'.esc_html__('Reply','autixir').' </div>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			               
		                </div>
		            </div>
			<?php
			break;
		endswitch; // end comment_type check
	}

}

/**
* Theme option compatibility.
*/
if ( ! function_exists( 'autixir_get_options' ) ) :
	function autixir_get_options( $key ) {
		$opt_pref       = 'autixir_options';
		if ( class_exists( 'Kirki' ) ) {
			$autixir_options = Kirki::get_option( $opt_pref, $key );
		}else{
			$autixir_options = null;
		}
		return $autixir_options;
	}
endif;

function autixir_elementor_list() {
	$templatearray = array();
	$templatelist = get_posts(
		array(
			'post_type'      => 'elementor_library',
			'posts_per_page' => -1,
		)
	);
	if ( ! empty( $templatelist ) ) {
		foreach ( $templatelist as $template ) {
			$templatearray[ $template->ID ] = $template->post_title;
		}
	}
	return $templatearray;
}