<?php
$show_top_bar = autixir_get_options( 'show_top_bar' );
$header_phone_title = autixir_get_options( 'header_phone_title' );
$header_phone_number = autixir_get_options( 'header_phone_number' );
$header_email = autixir_get_options( 'header_email' );
$header_address = autixir_get_options( 'header_address' );
$header_address_url = autixir_get_options( 'header_address_url' );
$header_facebook_url = autixir_get_options( 'header_facebook_url' );
$header_twitter_url = autixir_get_options( 'header_twitter_url' );
$header_instagram_url = autixir_get_options( 'header_instagram_url' );
$header_linkedin_url = autixir_get_options( 'header_linkedin_url' );
$header_search = autixir_get_options( 'header_search' );
?>
<!-- HEADER AREA START (header-4) -->
<header class="ltn__header-area ltn__header-5 ltn__header-transparent gradient-color-4">
    <?php if($show_top_bar){?>
    <div class="ltn__header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <?php if(!empty($header_email)){?>
                            <li><a href="mailto:<?php echo esc_attr($header_email);?>"><i class="icon-mail"></i> <?php echo esc_html($header_email);?></a></li>
                            <?php } ?>
                            <?php if(!empty($header_address)){?>
                            <li><a href="<?php echo esc_url($header_address_url);?>"><i class="icon-placeholder"></i> <?php echo esc_html($header_address);?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <?php if(!empty($header_facebook_url)){?>
                                            <li><a href="<?php echo esc_url($header_facebook_url);?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <?php } ?>
                                            <?php if(!empty($header_twitter_url)){?>
                                            <li><a href="<?php echo esc_url($header_twitter_url);?>"><i class="fab fa-twitter"></i></a></li>
                                            <?php } ?>
                                            <?php if(!empty($header_linkedin_url)){?>
                                            <li><a href="<?php echo esc_url($header_linkedin_url);?>"><i class="fab fa-linkedin"></i></a></li>
                                            <?php } ?>
                                            <?php if(!empty($header_instagram_url)){?>
                                            <li><a href="<?php echo esc_url($header_instagram_url);?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
	<!-- ltn__header-middle-area end -->
	<div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white ltn__logo-right-menu-option">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
							<?php autixir_logo_black(); ?>
                            </div>
                            <div class="get-support clearfix">
                                <div class="get-support-icon">
                                    <i class="icon-call"></i>
                                </div>
                                <div class="get-support-info">
									<h6><?php echo esc_html($header_phone_title);?></h6>
                                    <h4><a href="tel:<?php echo esc_attr($header_phone_number);?>"><?php echo esc_html($header_phone_number);?></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col header-menu-column">
                        <div class="header-menu d-none d-xl-block">
                            <nav>
                                <div class="ltn__main-menu">
								<?php
								wp_nav_menu( array(
									'theme_location'=> 'main-menu',
									'container'      => 'ul',
									'menu_class'     => 'nav-menu',
								) );
								?>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="ltn__header-options ltn__header-options-2">
                        <!-- header-search-1 -->
                        <?php if($header_search){?>
                        <div class="header-search-wrap">
                            <div class="header-search-1">
                                <div class="search-icon">
                                    <i class="icon-search for-search-show"></i>
                                    <i class="icon-cancel  for-search-close"></i>
                                </div>
                            </div>
                            <div class="header-search-1-form">
								<form action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
                                    <input type="text" name="s" placeholder="<?php esc_attr_e( 'Search here...','autixir');?>">
                                    <button type="submit">
                                        <span><i class="icon-search"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- Mobile Menu Button -->
                        <div class="mobile-menu-toggle d-xl-none">
                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                <svg viewBox="0 0 800 600">
                                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>
<!-- HEADER AREA END -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
	<div class="ltn__utilize-menu-inner ltn__scrollbar">
		<div class="ltn__utilize-menu-head">
			<div class="site-logo">
            <?php autixir_logo_black(); ?>
			</div>
			<button class="ltn__utilize-close">×</button>
		</div>
        <?php if($header_search){?>
		<div class="ltn__utilize-menu-search-form">
			<form action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
				<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...','autixir');?>">
				<button type="submit"><i class="fas fa-search"></i></button>
			</form>
		</div>
        <?php } ?>
		<div class="ltn__utilize-menu">
		<?php
			wp_nav_menu( array(
				'theme_location'=> 'main-menu',
				'container'      => 'ul',
			) );
		?>
		</div>
		<div class="ltn__social-media-2">
			<ul>
                <?php if(!empty($header_facebook_url)){?>
                <li><a href="<?php echo esc_url($header_facebook_url);?>"><i class="fab fa-facebook-f"></i></a></li>
                <?php } ?>
                <?php if(!empty($header_twitter_url)){?>
                <li><a href="<?php echo esc_url($header_twitter_url);?>"><i class="fab fa-twitter"></i></a></li>
                <?php } ?>
                <?php if(!empty($header_linkedin_url)){?>
                <li><a href="<?php echo esc_url($header_linkedin_url);?>"><i class="fab fa-linkedin"></i></a></li>
                <?php } ?>
                <?php if(!empty($header_instagram_url)){?>
                <li><a href="<?php echo esc_url($header_instagram_url);?>"><i class="fab fa-instagram"></i></a></li>
                <?php } ?>
			</ul>
		</div>
	</div>
</div>
<!-- Utilize Mobile Menu End -->