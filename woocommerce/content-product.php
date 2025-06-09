<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>
<div <?php wc_product_class( 'col' ); ?> >
  <div class="card h-100">
    <a href="<?php the_permalink(); ?>" class="card-img-top d-block">
      <?php
      if ( has_post_thumbnail() ) {
          the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'img-fluid' ) );
      } else {
          echo wc_placeholder_img( 'woocommerce_thumbnail' );
      }
      ?>
    </a>
    <div class="card-body text-center">
      <h2 class="woocommerce-loop-product__title h6 card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php if ( ! is_catalog_mode() ) : ?>
        <span class="price d-block mb-2"><?php echo $product->get_price_html(); ?></span>
      <?php endif; ?>
    </div>
    <?php if ( ! is_catalog_mode() ) : ?>
      <div class="card-footer bg-transparent border-0 text-center">
        <?php woocommerce_template_loop_add_to_cart(); ?>
      </div>
    <?php endif; ?>
  </div>
</div>
