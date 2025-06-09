<?php
defined( 'ABSPATH' ) || exit;
get_header( 'shop' );
?>
<main id="primary" class="site-main py-5">
  <div class="main-container">
    <?php do_action( 'woocommerce_before_main_content' ); ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php wc_get_template_part( 'content', 'single-product' ); ?>
    <?php endwhile; ?>
    <?php do_action( 'woocommerce_after_main_content' ); ?>
  </div>
</main>
<?php
get_footer( 'shop' );
