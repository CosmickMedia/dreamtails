<?php
defined( 'ABSPATH' ) || exit;

global $product;

$product_id = $product->get_id();
$gender     = $product->get_attribute( 'pa_gender' );
$sku        = $product->get_sku();
$categories = get_the_terms( $product_id, 'product_cat' );
$first_cat  = $categories && ! is_wp_error( $categories ) ? array_shift( $categories ) : false;
?>
<div <?php wc_product_class( 'col' ); ?> >
    <div class="card pet-card shadow-sm border-0 rounded-3 overflow-hidden transition-hover h-100">
        <a href="<?php the_permalink(); ?>" class="text-decoration-none position-relative" aria-label="<?php echo esc_attr( sprintf( __( 'View details for %s', 'dreamtails' ), get_the_title() ) ); ?>">
            <div class="position-relative">
                <?php if ( ! is_catalog_mode() ) : ?>
                <div class="position-absolute top-0 end-0 m-2 z-index-1">
                    <div class="product-price-tag badge bg-gold rounded-pill fs-6 py-2 px-3 shadow-sm">
                        <?php echo $product->get_price_html(); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'woocommerce_thumbnail', array( 'class' => 'object-fit-cover w-100' ) );
                } else {
                    echo wc_placeholder_img( 'woocommerce_thumbnail' );
                }
                ?>
            </div>
        </a>

        <div class="card-body p-3">
            <div class="row">
                <div class="col">
                    <div class="pet-breed mb-1">
                        <?php if ( $first_cat ) : ?>
                            <span class="badge rounded-pill fs-6"><a class="text-reset" href="<?php echo esc_url( get_term_link( $first_cat ) ); ?>" rel="tag"><?php echo esc_html( $first_cat->name ); ?></a></span>
                        <?php endif; ?>
                    </div>

                    <h5 class="card-title pet-name fw-bold mb-2"><?php echo sprintf( esc_html__( 'Hi, my name is %s!', 'dreamtails' ), get_the_title() ); ?></h5>

                    <div class="card-text">
                        <?php if ( $gender ) : ?>
                        <div class="pet-detail pet-gender d-flex align-items-center mb-1">
                            <strong class="me-1"><?php esc_html_e( 'Gender:', 'dreamtails' ); ?></strong> <?php echo esc_html( $gender ); ?>
                        </div>
                        <?php endif; ?>

                        <?php if ( $sku ) : ?>
                        <div class="pet-detail pet-ref d-flex align-items-center">
                            <strong class="me-1"><?php esc_html_e( 'Ref:', 'dreamtails' ); ?></strong> <span class="ref-id badge bg-light text-dark">#<?php echo esc_html( $sku ); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-auto d-flex flex-column align-items-stretch justify-content-center gap-2">
                    <a href="tel:" class="btn btn-light btn-sm d-flex flex-column align-items-center gap-1 z-2 action-icon" title="<?php esc_attr_e( 'Call Us', 'dreamtails' ); ?>">
                        <i class="fas fa-phone-alt"></i>
                        <small><?php esc_html_e( 'Call', 'dreamtails' ); ?></small>
                    </a>

                    <a href="mailto:<?php echo antispambot( get_option( 'admin_email' ) ); ?>" class="btn btn-dark btn-sm d-flex flex-column align-items-center gap-1 z-2 action-icon" title="<?php esc_attr_e( 'Email Us', 'dreamtails' ); ?>">
                        <i class="fas fa-envelope"></i>
                        <small><?php esc_html_e( 'Email', 'dreamtails' ); ?></small>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-footer bg-transparent border-top-0 text-center p-2">
            <a href="<?php the_permalink(); ?>" class="btn btn-gold w-100 stretched-link"><?php esc_html_e( 'View Details', 'dreamtails' ); ?></a>
        </div>
    </div>
</div>
