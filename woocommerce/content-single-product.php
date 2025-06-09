<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>
<?php do_action( 'woocommerce_before_single_product' ); ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'row' ); ?>>
  <div class="col-md-6 mb-4 mb-md-0">
    <?php woocommerce_show_product_images(); ?>
  </div>
  <div class="col-md-6">
    <h1 class="product_title entry-title mb-3"><?php the_title(); ?></h1>
    <div class="breadcrumbs small">
      <?php dreamtails_breadcrumb(); ?>
    </div>
    <?php woocommerce_template_single_rating(); ?>
    <?php if ( ! is_catalog_mode() ) : ?>
      <?php woocommerce_template_single_price(); ?>
    <?php endif; ?>
    <?php woocommerce_template_single_excerpt(); ?>
    <?php if ( ! is_catalog_mode() ) : ?>
      <?php woocommerce_template_single_add_to_cart(); ?>
    <?php endif; ?>
    <?php woocommerce_template_single_meta(); ?>
  </div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
