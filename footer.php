<?php
/**
 * The template for displaying the footer
 *
 * @package Dream_Tails
 */
?>

</div><footer id="colophon" class="site-footer pt-5 pb-4" style="background-color: var(--color-footer-bg); color: #000;"> <?php // Using custom color var ?>
    <div class="container">
        <div class="row gy-4"> <?php // Bootstrap row with gutter spacing ?>

            <?php // Footer Column 1: Navigation ?>
            <div class="col-lg-3 col-md-6 footer-navigation">
                <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
                    <div class="footer-logo mb-3">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php endif; ?>
                <h5 class="widget-title"><?php echo esc_html( get_theme_mod( 'footer_col1_heading', __( 'Navigation', 'dreamtails' ) ) ); ?></h5>
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'list-unstyled footer-menu', // Basic list styling
                            'container'      => false,
                            'depth'          => 1,
                        )
                    );
                }
                $footer_col1_text = get_theme_mod( 'footer_col1_text', '' );
                if ( $footer_col1_text ) {
                    echo wpautop( wp_kses_post( $footer_col1_text ) );
                }
                ?>
            </div><?php // Footer Column 2: Info/Address ?>
            <div class="col-lg-3 col-md-6 footer-info">
                <h5 class="widget-title"><?php echo esc_html( get_theme_mod( 'footer_col2_heading', __( 'Dream Tails Sarasota', 'dreamtails' ) ) ); ?></h5>
                <?php
                $address = get_theme_mod( 'footer_col2_address', "6453 Lockwood Ridge Rd\nSarasota, FL 34243" );
                $phone   = get_theme_mod( 'homepage_phone_number', '' );
                ?>
                <p><i class="fas fa-map-marker-alt me-2"></i><?php echo nl2br( esc_html( $address ) ); ?></p>
                <?php if ( $phone ) : ?>
                    <p><i class="fas fa-phone me-2"></i><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></p>
                <?php endif; ?>
                <div class="mt-2">
                    <iframe src="https://www.google.com/maps?q=<?php echo rawurlencode( $address ); ?>&amp;output=embed" width="100%" height="150" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div><?php // Footer Column 3: Hours ?>
            <div class="col-lg-3 col-md-6 footer-hours">
                <h5 class="widget-title"><?php echo esc_html( get_theme_mod( 'footer_col3_heading', __( 'Store Hours', 'dreamtails' ) ) ); ?></h5>
                <p><i class="far fa-clock me-2"></i><?php echo nl2br( esc_html( get_theme_mod( 'footer_col3_hours', "Mon - Sat: 10am - 8pm\nSun: 11am - 7pm" ) ) ); ?></p>
            </div><?php // Footer Column 4: Extra Info ?>
            <div class="col-lg-3 col-md-6 footer-extra">
                <h5 class="widget-title"><?php echo esc_html( get_theme_mod( 'footer_col4_heading', __( 'About Us', 'dreamtails' ) ) ); ?></h5>
                <p><?php echo esc_html( get_theme_mod( 'footer_col4_text', __( 'Part of the Petland family of stores.', 'dreamtails' ) ) ); ?></p>
                <div>
                    <a href="<?php echo esc_url( get_theme_mod( 'footer_facebook_url', '#' ) ); ?>" class="me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo esc_url( get_theme_mod( 'footer_instagram_url', '#' ) ); ?>" class="me-2"><i class="fab fa-instagram"></i></a>
                </div>
            </div></div><hr class="mt-4 mb-3" style="border-color: rgba(255, 255, 255, 0.2);">

        <div class="footer-bottom text-center">
            <p class="mb-1">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'dreamtails' ); ?></p>
            <p class="mb-0 small"><?php esc_html_e( 'Developed by', 'dreamtails' ); ?> <a href="https://cosmickmedia.com/" target="_blank" rel="noopener">Cosmick Media</a></p>
        </div></div></footer></div><?php wp_footer(); ?>

</body>
</html>