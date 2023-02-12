<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package autixir
 */

$footer_copyright_text = autixir_get_options( 'footer_copyright_text' );
$footer_widget_template = autixir_get_options( 'footer_widget_template' );
$footer_menu_select = autixir_get_options( 'footer_menu_select' );
?>
<!-- FOOTER AREA START (ltn__footer-2 ltn__footer-color-1) -->
    <footer class="ltn__footer-area ltn__footer-2 ltn__footer-color-1">
    <?php 
    if (class_exists('\\Elementor\\Plugin')) {
        if (isset($footer_widget_template) && !empty($footer_widget_template)) {
        $pluginElementor = \Elementor\Plugin::instance(); 
    ?>
        <div class="footer-top-area  section-bg-2 plr--5">
            <div class="container-fluid">
                <?php
                $footer_elementor = $pluginElementor->frontend->get_builder_content($footer_widget_template);
                echo do_shortcode($footer_elementor);
                ?>
            </div>
        </div>
        <?php } } ?>
        <div class="ltn__copyright-area ltn__copyright-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="site-logo-wrap">
                            <div class="site-logo">
                               <?php autixir_logo(); ?>
                            </div>
                            <div class="get-support ltn__copyright-design clearfix">
                                <div class="get-support-info">
                                    <?php if(!empty($footer_copyright_text)){?>
                                      <p><?php echo esc_html($footer_copyright_text); ?></p>
                                    <?php }else{ ?>
                                        <h6><?php esc_html_e('Copyright & Design By','autixir');?></h6>
                                        <h4><?php esc_html_e('Company -','autixir');?> <span class="current-year"></span></h4>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12 align-self-center">
                        <div class="ltn__copyright-menu text-end">
                        <?php
                        if($footer_menu_select){
                            wp_nav_menu( array(
                                'menu'=> $footer_menu_select,
                                'container'      => 'ul',
                            ) );
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER AREA END -->
</div>
<?php wp_footer(); ?>
</body>
</html>
