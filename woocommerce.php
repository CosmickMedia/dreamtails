<?php
/**
 * WooCommerce template wrapper for all shop pages.
 *
 * Displays WooCommerce content within the theme layout and
 * adds an optional sidebar on product category archives.
 *
 * @package Dream_Tails
 */

get_header();
if ( ! ( is_shop() || is_product_category() || is_product_tag() ) ) {
    get_template_part( 'template-parts/page', 'header' );
}
?>

<?php if ( is_product_category() && is_active_sidebar( 'shop-sidebar' ) ) : ?>
    <div class="col-lg-9">
<?php else : ?>
    <div class="col-12">
<?php endif; ?>
        <?php woocommerce_content(); ?>
    </div>
<?php if ( is_product_category() && is_active_sidebar( 'shop-sidebar' ) ) : ?>
    <div class="col-lg-3">
        <?php get_sidebar( 'shop' ); ?>
    </div>
<?php endif; ?>

<?php
get_footer();
