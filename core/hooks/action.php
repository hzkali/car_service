<?php

	if ( ! function_exists( 'autixir_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function autixir_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on autixir, use a find and replace
		 * to change 'autixir' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'autixir', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'autixir' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'autixir_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add editor style.
		add_editor_style( AUTIXIR_DEFAULT_URL.'assets/css/editor-style.css' );

		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link' ) );

		add_image_size( 'autixir-blog-grid', 370, 260, true );
		add_image_size( 'autixir-blog-sidebar', 80, 80, true );

	}
endif;
add_action( 'after_setup_theme', 'autixir_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function autixir_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'autixir_content_width', 640 );
}
add_action( 'after_setup_theme', 'autixir_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function autixir_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'autixir' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'autixir' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="ltn__widget-title ltn__widget-title-border">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Service Sidebar', 'autixir' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'autixir' ),
			'before_widget' => '<div id="%1$s" class="widget-2 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="ltn__widget-title ltn__widget-title-border">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Faq Sidebar', 'autixir' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'autixir' ),
			'before_widget' => '<div id="%1$s" class="widget-2 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="ltn__widget-title ltn__widget-title-border">',
			'after_title'   => '</h4>',
		)
	);

}
add_action( 'widgets_init', 'autixir_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function autixir_scripts() {

	wp_enqueue_style( 'fontawesome', AUTIXIR_DEFAULT_URL. 'assets/css/fontawesome.min.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'iconmoon', AUTIXIR_DEFAULT_URL. 'assets/css/iconmoon.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'bootstrap', AUTIXIR_DEFAULT_URL. 'assets/css/bootstrap.min.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'slick', AUTIXIR_DEFAULT_URL. 'assets/css/slick.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'animate', AUTIXIR_DEFAULT_URL. 'assets/css/animate.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'lightcase', AUTIXIR_DEFAULT_URL. 'assets/css/lightcase.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'nice-select', AUTIXIR_DEFAULT_URL. 'assets/css/nice-select.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'jqueryui', AUTIXIR_DEFAULT_URL. 'assets/css/jqueryui.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'bootstrap-datepicker', AUTIXIR_DEFAULT_URL. 'assets/css/bootstrap-datepicker.min.css', false, AUTIXIR_DEFAULT_VERSION );
	wp_enqueue_style( 'autixir-style-main', AUTIXIR_DEFAULT_URL. 'assets/css/style.css', false, time() );
	wp_enqueue_style( 'autixir-unittest', AUTIXIR_DEFAULT_URL. 'assets/css/unittest.css', false, time() );
	wp_enqueue_style( 'autixir-style', get_stylesheet_uri() );
	wp_enqueue_style( 'autixir-responsive', AUTIXIR_DEFAULT_URL. 'assets/css/responsive.css', false, AUTIXIR_DEFAULT_VERSION );

	$autixir_inline_style = '';
	if ( function_exists( 'autixir_color_styles' ) ) {
		$autixir_inline_style = autixir_color_styles();
	}
	wp_add_inline_style( 'autixir-style', $autixir_inline_style );

	
	wp_enqueue_script( 'popper', AUTIXIR_DEFAULT_URL. 'assets/js/popper.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'bootstrap', AUTIXIR_DEFAULT_URL. 'assets/js/bootstrap.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'slick', AUTIXIR_DEFAULT_URL. 'assets/js/slick.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'isotope-pkgd', AUTIXIR_DEFAULT_URL. 'assets/js/isotope.pkgd.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'imagesloaded');
	wp_enqueue_script( 'lightcase', AUTIXIR_DEFAULT_URL. 'assets/js/lightcase.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'jquery-counterup', AUTIXIR_DEFAULT_URL. 'assets/js/jquery.counterup.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'jquery-countdown', AUTIXIR_DEFAULT_URL. 'assets/js/jquery.countdown.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'waypoint', AUTIXIR_DEFAULT_URL. 'assets/js/waypoint.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'jquery-nice-select', AUTIXIR_DEFAULT_URL. 'assets/js/jquery.nice-select.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'jqueryui', AUTIXIR_DEFAULT_URL. 'assets/js/jqueryui.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'scrollup', AUTIXIR_DEFAULT_URL. 'assets/js/scrollup.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'jquery-easing', AUTIXIR_DEFAULT_URL. 'assets/js/jquery.easing.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'wow', AUTIXIR_DEFAULT_URL. 'assets/js/wow.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'parallax', AUTIXIR_DEFAULT_URL. 'assets/js/parallax.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'bootstrap-datepicker', AUTIXIR_DEFAULT_URL. 'assets/js/bootstrap-datepicker.min.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
	wp_enqueue_script( 'autixir-main', AUTIXIR_DEFAULT_URL. 'assets/js/main.js', array('jquery'), time(), true );

	$header_sticky = autixir_get_options( 'header_sticky' );

	wp_localize_script( 'autixir-main', 'ajax_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'sticky' => $header_sticky,
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'autixir_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function autixir_admint_scripts(){
	 wp_enqueue_media();
	 wp_enqueue_script( 'autixir-admin', AUTIXIR_DEFAULT_URL. 'assets/js/autixir-admin.js', array('jquery'), AUTIXIR_DEFAULT_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'autixir_admint_scripts' );



function autixir_post_views_count( $postID ) {
	$count_key = 'views';
	$count     = get_post_meta( $postID, $count_key, true );
	if ( $count == '' ) {
		delete_post_meta( $postID, $count_key );
		add_post_meta( $postID, $count_key, '1' );
	} else {
		$count++;
		update_post_meta( $postID, $count_key, $count );
	}
}

/*
 * track post views
 */
function autixir_track_post_views( $post_id ) {
	if ( is_single() ) {
		if ( empty( $post_id ) ) {
			global $post;
			$post_id = $post->ID;
			autixir_post_views_count( $post_id );
		}
	}
}
add_action( 'wp_head', 'autixir_track_post_views' );



function autixir_google_font() {
	$protocol   = is_ssl() ? 'https' : 'http';
	$subsets    = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
	$variants   = ':300,400,400i,500,500i,600,600i,700,700i,800,800i';
	$query_args = array(
		'family' => 'Open+Sans/Rajdhani' . $variants,
		'family' => 'Open+Sans' . $variants . '%7CRajdhani' . $variants,
		'subset' => $subsets,
	);
	$font_url   = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );
	wp_enqueue_style( 'autixir-google-fonts', $font_url, array(), null );
}
add_action( 'init', 'autixir_google_font' );



function autixir_body_classes( $classes ) {

	$unittest_css = autixir_get_options( 'unittest_css' );
	if($unittest_css){
		$classes[] = '';
	}else{
		$classes[] = 'unittest';
	}
    

      
    return $classes;
}
add_filter( 'body_class','autixir_body_classes' );




//Demo content file include here

function autixir_import_files() {
	return array(
	  array(
		'import_file_name'           => 'Autixir Demo Import',
		'categories'                 => array( 'Category 1' ),
		'import_file_url'            => trailingslashit( get_template_directory_uri() ) . 'ocdi/content.xml',
		'import_widget_file_url'     => trailingslashit( get_template_directory_uri() ) . 'ocdi/widget.wie',
		'import_customizer_file_url' =>  trailingslashit( get_template_directory_uri() ) . 'ocdi/customize.dat',
		'import_notice'              => esc_html__( 'Caution: For importing demo data please click on "Import Demo Data" button. During demo data installation please do not refresh the page.', 'autixir' ),
		
	  ),
	  
	);
  }
  
  add_filter( 'pt-ocdi/import_files', 'autixir_import_files' );
  
  function autixir_after_import_setup() {
	// Assign menus to their locations.
	$main_menu   = get_term_by( 'name', 'Primary Menu', 'nav_menu' ); 
  
	set_theme_mod( 'nav_menu_locations', array(
		'main-menu' => $main_menu->term_id,          
	  )
	);
  
	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );
  
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID ); 
   
  }
  add_action( 'pt-ocdi/after_import', 'autixir_after_import_setup' );