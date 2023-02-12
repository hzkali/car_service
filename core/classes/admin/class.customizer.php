<?php
if( !class_exists('Kirki') ){
	return;
}

function autixir_get_menu_list() {
	$menulist = array();
	$menus    = get_terms( 'nav_menu' );
	foreach ( $menus as $menu ) {
		$menulist[ $menu->name ] = $menu->name;
	}
	return $menulist;
}

class autixir_options{

	public function __construct() {
		$this->confix();
		$this->panel();
		$this->sections();
		$this->fileds();
	}

	public function confix() {
		Kirki::add_config( 'autixir_options', array(
			'capability'    => 'edit_theme_options',
			'option_type'   => 'theme_mod',
		) );
	}

	public function panel(){

		Kirki::add_panel( 'autixir_id', array(
		    'priority'    => 10,
		    'title'       => esc_html__( 'Auitixir', 'autixir' ),
		    'description' => esc_html__( 'Auitixir Customizer Options', 'autixir' ),
		) );

	}

	public function sections(){

		Kirki::add_section( 'header_top_section', array(
		    'title'          => esc_html__( 'Header Top', 'autixir' ),
		    'description'    => esc_html__( 'Header Top', 'autixir' ),
		    'panel'          => 'autixir_id',
		    'priority'       => 10,
		) );

		Kirki::add_section( 'header_section', array(
		    'title'          => esc_html__( 'Header', 'autixir' ),
		    'description'    => esc_html__( 'Header', 'autixir' ),
		    'panel'          => 'autixir_id',
		    'priority'       => 20,
		) );
		Kirki::add_section( 'breadcrumb_section', array(
		    'title'          => esc_html__( 'Breadcrumb', 'autixir' ),
		    'panel'          => 'autixir_id',
		    'priority'       => 20,
		) );
		Kirki::add_section( 'blog_section', array(
		    'title'          => esc_html__( 'Blog Settings', 'autixir' ),
		    'panel'          => 'autixir_id',
		    'priority'       => 20,
		) );
		Kirki::add_section( 'footer_section', array(
		    'title'          => esc_html__( 'Footer Settings', 'autixir' ),
		    'panel'          => 'autixir_id',
		    'priority'       => 20,
		) );
		Kirki::add_section( 'color_section', array(
		    'title'          => esc_html__( 'Color Settings', 'autixir' ),
		    'panel'          => 'autixir_id',
		    'priority'       => 20,
		) );
	}

	public function fileds() {

		// Topbar Fields
		Kirki::add_field( 'autixir_options', [
			'type'        => 'checkbox',
			'settings'    => 'show_top_bar',
			'label'       => esc_html__( 'Show Topbar', 'autixir' ),
			'description' => esc_html__( 'Yes / No', 'autixir' ),
			'section'     => 'header_top_section',
			'default'     => true,
		] );

		// Header Fileds
		Kirki::add_field( 'autixir_options', [
			'type'        => 'select',
			'settings'    => 'header_style',
			'label'       => esc_html__( 'Header Style', 'autixir' ),
			'section'     => 'header_section',
			'default'     => '1',
			'choices'     => [
				'1' => esc_html__( 'Style 1', 'autixir' ),
				'2' => esc_html__( 'Style 2', 'autixir' ),
			],
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'text',
			'settings'    => 'header_phone_title',
			'label'       => esc_html__( 'Header Phone Title', 'autixir' ),
			'section'     => 'header_section',
			'default'     => esc_html__( 'Get Support', 'autixir' ),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'text',
			'settings'    => 'header_phone_number',
			'label'       => esc_html__( 'Header Phone Number', 'autixir' ),
			'section'     => 'header_section',
			'default'     => esc_html__( '123-456-789-10', 'autixir' ),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'text',
			'settings'    => 'header_email',
			'label'       => esc_html__( 'Header Email', 'autixir' ),
			'section'     => 'header_section',
			'default'     => esc_html__( 'info@webmail.com', 'autixir' ),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'text',
			'settings'    => 'header_address',
			'label'       => esc_html__( 'Header Address', 'autixir' ),
			'section'     => 'header_section',
			'default'     => esc_html__( '15/A, Nest Tower, NYC', 'autixir' ),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'url',
			'settings'    => 'header_address_url',
			'label'       => esc_html__( 'Header Address URL', 'autixir' ),
			'section'     => 'header_section',
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'text',
			'settings'    => 'header_button_text',
			'label'       => esc_html__( 'Header Button Text', 'autixir' ),
			'section'     => 'header_section',
			'default'     => esc_html__( 'GET APPOINTMENT', 'autixir' ),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'url',
			'settings'    => 'header_button_url',
			'label'       => esc_html__( 'Header Button URL', 'autixir' ),
			'section'     => 'header_section',
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'url',
			'settings'    => 'header_facebook_url',
			'label'       => esc_html__( 'Header Facebook URL', 'autixir' ),
			'section'     => 'header_section',
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'url',
			'settings'    => 'header_twitter_url',
			'label'       => esc_html__( 'Header Twitter URL', 'autixir' ),
			'section'     => 'header_section',
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'url',
			'settings'    => 'header_linkedin_url',
			'label'       => esc_html__( 'Header Linkedin URL', 'autixir' ),
			'section'     => 'header_section',
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'url',
			'settings'    => 'header_instagram_url',
			'label'       => esc_html__( 'Header Instagram URL', 'autixir' ),
			'section'     => 'header_section',
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'checkbox',
			'settings'    => 'header_search',
			'label'       => esc_html__( 'Header Search', 'autixir' ),
			'description' => esc_html__( 'Yes / No', 'autixir' ),
			'section'     => 'header_section',
			'default'     => true,
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'checkbox',
			'settings'    => 'header_sticky',
			'label'       => esc_html__( 'Header Sticky', 'autixir' ),
			'description' => esc_html__( 'Yes / No', 'autixir' ),
			'section'     => 'header_section',
			'default'     => false,
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'switch',
			'settings'    => 'unittest_css',
			'label'       => esc_html__( 'Unittest CSS', 'autixir' ),
			'section'     => 'header_section',
			'choices' => [
				'on'  => esc_html__( 'Enable', 'autixir' ),
				'off' => esc_html__( 'Disable', 'autixir' )
			]
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'background',
			'settings'    => 'breadcrumb_bg',
			'label'       => esc_html__( 'Breadcrumb BG', 'autixir' ),
			'section'     => 'breadcrumb_section',
			'output'      => [
				[
					'element' => '.ltn__breadcrumb-area',
				],
			],
		] );
		// Blog Settings
		Kirki::add_field( 'autixir_options', [
			'type'        => 'select',
			'settings'    => 'blog_sidebar',
			'label'       => esc_html__( 'Blog Sidebar', 'autixir' ),
			'section'     => 'blog_section',
			'default'     => 'right',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => [
				'nosidebar' => esc_html__( 'No Sidebar', 'autixir' ),
				'left' 		=> esc_html__( 'Left Sidebar', 'autixir' ),
				'right' 	=> esc_html__( 'Right Sidebar', 'autixir' ),
			],
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'switch',
			'settings'    => 'post_view_onoff',
			'label'       => esc_html__( 'Post View Oo/Off', 'autixir' ),
			'section'     => 'blog_section',
			'choices' => [
				'on'  => esc_html__( 'Enable', 'autixir' ),
				'off' => esc_html__( 'Disable', 'autixir' )
			]
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'switch',
			'settings'    => 'post_social_share',
			'label'       => esc_html__( 'Post Social Share', 'autixir' ),
			'section'     => 'blog_section',
			'choices' => [
				'on'  => esc_html__( 'Enable', 'autixir' ),
				'off' => esc_html__( 'Disable', 'autixir' )
			]
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'switch',
			'settings'    => 'post_nav',
			'label'       => esc_html__( 'Post Nav', 'autixir' ),
			'section'     => 'blog_section',
			'choices' => [
				'on'  => esc_html__( 'Enable', 'autixir' ),
				'off' => esc_html__( 'Disable', 'autixir' )
			]
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'switch',
			'settings'    => 'author_box',
			'label'       => esc_html__( 'Author Box', 'autixir' ),
			'section'     => 'blog_section',
			'choices' => [
				'on'  => esc_html__( 'Enable', 'autixir' ),
				'off' => esc_html__( 'Disable', 'autixir' )
			]
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'switch',
			'settings'    => 'related_post',
			'label'       => esc_html__( 'Related Post', 'autixir' ),
			'section'     => 'blog_section',
			'choices' => [
				'on'  => esc_html__( 'Enable', 'autixir' ),
				'off' => esc_html__( 'Disable', 'autixir' )
			]
		] );
		// Footer Settings
		Kirki::add_field( 'autixir_options', [
			'type'        => 'select',
			'settings'    => 'footer_widget_template',
			'label'       => esc_html__( 'Footer Widget Template', 'autixir' ),
			'section'     => 'footer_section',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => autixir_elementor_list(),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'select',
			'settings'    => 'footer_menu_select',
			'label'       => esc_html__( 'Footer Menu', 'autixir' ),
			'section'     => 'footer_section',
			'priority'    => 10,
			'multiple'    => 1,
			'choices'     => autixir_get_menu_list(),
		] );
		Kirki::add_field( 'autixir_options', [
			'type'        => 'textarea',
			'settings'    => 'footer_copyright_text',
			'label'       => esc_html__( 'Copyright Text', 'autixir' ),
			'section'     => 'footer_section',
		] );
		// color Settings
		Kirki::add_field( 'autixir_options', [
			'type'        => 'color',
			'settings'    => 'primary_color',
			'label'       => esc_html__( 'Primary Color', 'autixir' ),
			'section'     => 'color_section',
		] );
	}

}
new autixir_options();
