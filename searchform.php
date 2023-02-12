<?php 
/**
 * The template for displaying Search form.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package autixir
 */

?>
<!-- Search Widget -->
<div class="ltn__search-widget">
    <form action="<?php echo esc_url(home_url( '/' )); ?>" method="GET">
        <input type="text"  name="s"  placeholder="<?php echo esc_attr_x( 'Search your keyword...', 'placeholder', 'autixir' ); ?>" />
        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>
<!-- Popular Post Widget -->
