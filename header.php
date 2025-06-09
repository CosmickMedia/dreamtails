<?php
/**
 * The header for the Dream Tails theme (Two-Bar Structure - Revised Styling)
 *
 * Displays all of the <head> section and everything up till <div id="content">
 * Implements a two-bar header:
 * 1) Top bar: Larger Logo left, Larger Button right (Light Blue/Grey BG, More Padding)
 * 2) Nav bar: Hamburger ALWAYS left, Menu centered (White BG)
 *
 * @package Dream_Tails
 */
?>
    <!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dreamtails' ); ?></a>

    <header id="masthead" class="site-header">

        <?php // --- Top Header Bar --- (Logo Left, Button Right) ?>
        <div class="top-header-bar py-3" style="background-color: var(--color-header-bg);"> <?php // Increased padding w/ py-3 ?>
            <div class="container d-flex justify-content-between align-items-center">

                <?php // Site Branding Logo - Use CSS class on wrapper for size control ?>
                <div class="site-branding">
                    <div class="top-bar-logo"> <?php // Add wrapper div with class ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php
                            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                                the_custom_logo(); // Output WP Customizer logo
                            } else {
                                // Fallback to theme's logo file
                                $logo_url = get_template_directory_uri() . '/assets/images/logo_horizontal.png';
                                ?>
                                <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?> Logo"> <?php // Img is now inside .top-bar-logo ?>
                            <?php } ?>
                        </a>
                    </div>
                </div>

                <?php // Header contact info and CTA button ?>
                <div class="header-top-button d-flex align-items-center">
                    <div class="header-contact d-flex align-items-center me-3">
                        <?php
                        $phone     = get_theme_mod( 'homepage_phone_number', '' );
                        $book_url  = get_theme_mod( 'header_book_button_url', '' );
                        if ( $phone ) : ?>
                            <span class="header-phone-number me-3">
                                <i class="fas fa-phone me-2"></i><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
                            </span>
                        <?php endif; ?>
                        <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'myaccount' ) : '#' ); ?>" class="header-icon header-account-icon me-3">
                            <i class="fas fa-user"></i>
                        </a>
                        <?php if ( function_exists( 'wc_get_cart_url' ) && ! is_catalog_mode() ) : ?>
                            <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-icon header-cart-icon me-3">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if ( $book_url ) : ?>
                        <a href="<?php echo esc_url( $book_url ); ?>" class="btn btn-lg btn-book-appointment">
                            <i class="fa-regular fa-calendar-check me-2"></i><?php esc_html_e( 'Book Appointment', 'dreamtails' ); ?>
                        </a>
                    <?php endif; ?>
                </div>

            </div></div><?php // --- Main Navigation Bar (Bottom Bar - White BG, Hamburger ALWAYS Left, Menu Center) --- ?>
        <nav class="navbar navbar-expand-lg main-navbar bg-white shadow-sm">
            <div class="container">

                <?php // Navbar Toggle Button (Hamburger) for Mobile - ALWAYS Visible, Left Aligned ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNavbarCollapse" aria-controls="primaryNavbarCollapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'dreamtails' ); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php // Collapsible container for Main Nav Menu - Centered ?>
                <div class="collapse navbar-collapse justify-content-center" id="primaryNavbarCollapse">
                    <?php
                    // Main Navigation Menu (Puppies, Kittens, Concierge)
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav mb-2 mb-lg-0', // Centering handled by parent div
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 2,
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <div id="content" class="site-content"> <?php // Opening content div - closed in footer.php ?>
