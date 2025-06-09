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
                <h5 class="widget-title">Navigation</h5>
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
                ?>
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                <?php endif; ?>
            </div><?php // Footer Column 2: Info/Address ?>
            <div class="col-lg-3 col-md-6 footer-info">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                <?php else: ?>
                    <h5 class="widget-title"><?php esc_html_e( 'Dream Tails Sarasota', 'dreamtails' ); ?></h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i>6453 Lockwood Ridge Rd<br>Sarasota, FL 34243</p>
                    <p><i class="fas fa-phone me-2"></i><a href="tel:941-203-1196">941-203-1196</a></p>
                <?php endif; ?>
            </div><?php // Footer Column 3: Hours ?>
            <div class="col-lg-3 col-md-6 footer-hours">
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                <?php else: ?>
                    <h5 class="widget-title"><?php esc_html_e( 'Store Hours', 'dreamtails' ); ?></h5>
                    <p><i class="far fa-clock me-2"></i>Mon - Sat: 10am - 8pm<br>
                        <span style="padding-left: 26px;">Sun: 11am - 7pm</span> <?php // Align second line slightly ?>
                    </p>
                <?php endif; ?>
            </div><?php // Footer Column 4: Extra Info ?>
            <div class="col-lg-3 col-md-6 footer-extra">
                <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-4' ); ?>
                <?php else: ?>
                    <h5 class="widget-title"><?php esc_html_e( 'About Us', 'dreamtails' ); ?></h5>
                    <p><?php esc_html_e( 'Part of the Petland family of stores.', 'dreamtails' ); ?></p>
                    <?php // Add social icons here if desired ?>
                    <div>
                        <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-2"><i class="fab fa-instagram"></i></a>
                        <?php // Add links ?>
                    </div>
                <?php endif; ?>
            </div></div><hr class="mt-4 mb-3" style="border-color: rgba(255, 255, 255, 0.2);">

        <div class="footer-bottom text-center">
            <p class="mb-1">&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'dreamtails' ); ?></p>
            <p class="mb-0 small"><?php esc_html_e( 'Developed by', 'dreamtails' ); ?> <a href="https://cosmickmedia.com/" target="_blank" rel="noopener">Cosmick Media</a></p>
        </div></div></footer></div><?php wp_footer(); ?>

</body>
</html>