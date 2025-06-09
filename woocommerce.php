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
get_template_part( 'template-parts/page', 'header' );
?>

    <main id="primary" class="site-main py-5">
        <div class="main-container">
            <div class="row">
                <?php
                // Check if it is a product archive page (like category or shop) and if the sidebar is active.
                if ( is_archive() && is_active_sidebar( 'shop-sidebar' ) ) :
                    ?>
                    <div class="col-lg-9">
                        <?php woocommerce_content(); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php get_sidebar( 'shop' ); ?>
                    </div>
                <?php else : ?>
                    <div class="col-12">
                        <?php woocommerce_content(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php
get_footer();