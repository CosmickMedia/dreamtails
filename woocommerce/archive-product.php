<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>
<main id="primary" class="site-main py-5">
  <div class="main-container">
    <?php do_action( 'woocommerce_before_main_content' ); ?>

    <header class="woocommerce-products-header mb-4 text-center">
      <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="page-title mb-2"><?php woocommerce_page_title(); ?></h1>
      <?php endif; ?>
      <div class="breadcrumbs small">
        <?php dreamtails_breadcrumb(); ?>
      </div>
    </header>

    <?php if ( woocommerce_product_loop() ) : ?>
      <div class="shop-toolbar d-flex justify-content-between align-items-center mb-3">
        <?php woocommerce_result_count(); ?>
        <?php woocommerce_catalog_ordering(); ?>
      </div>
      <select class="product-filter form-select mb-3 d-block d-md-none">
        <option value=""><?php esc_html_e( 'Filter Products', 'dreamtails' ); ?></option>
      </select>

      <?php woocommerce_product_loop_start(); ?>

      <?php if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
          the_post();
          wc_get_template_part( 'content', 'product' );
        }
      } ?>

      <?php woocommerce_product_loop_end(); ?>

      <?php do_action( 'woocommerce_after_shop_loop' ); ?>
    <?php else : ?>
      <?php do_action( 'woocommerce_no_products_found' ); ?>
    <?php endif; ?>

    <?php do_action( 'woocommerce_after_main_content' ); ?>
  </div>
</main>
<?php
get_footer( 'shop' );
