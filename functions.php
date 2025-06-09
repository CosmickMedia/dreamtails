<?php
/**
 * Dream Tails functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dream_Tails
 */

if ( ! defined( 'DREAMTAILS_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( 'DREAMTAILS_VERSION', '1.1' ); // Updated version
}

/**
 * Determine if catalog mode is enabled.
 * This allows toggling WooCommerce into a browse-only mode.
 */
function is_catalog_mode() {
    return get_option( 'enable_catalog_mode' ) === 'yes';
}

/**
 * Output breadcrumbs with YoastSEO support.
 */
function dreamtails_breadcrumb() {
    if ( function_exists( 'yoast_breadcrumb' ) ) {
        yoast_breadcrumb( '<nav class="breadcrumb-wrapper mb-3">', '</nav>' );
    } else {
        woocommerce_breadcrumb();
    }
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function dreamtails_setup() {
    // Make theme available for translation.
    load_theme_textdomain( 'dreamtails', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // Register navigation menus.
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'dreamtails' ),
            'footer'  => esc_html__( 'Footer Menu', 'dreamtails' ),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 80, // Adjusted example height
            'width'       => 300, // Adjusted example width
            'flex-width'  => true,
            'flex-height' => true,
            'header-text' => array( 'site-title', 'site-description' ),
        )
    );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );
    // add_editor_style( 'assets/css/editor-style.css' );

    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );

    // Add WooCommerce Support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Yoast SEO breadcrumbs
    add_theme_support( 'yoast-seo-breadcrumbs' );

}
add_action( 'after_setup_theme', 'dreamtails_setup' );

/**
 * Enqueue scripts and styles.
 */
function dreamtails_scripts() {
    // Bootstrap CSS (CDN)
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3' );

    // Font Awesome CSS (CDN)
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), '6.5.2' );

    // Enqueue main theme stylesheet. (Loads AFTER Bootstrap to allow overrides)
    wp_enqueue_style( 'dreamtails-style', get_stylesheet_uri(), array('bootstrap'), DREAMTAILS_VERSION );

    // Google Fonts (Example - keep if needed)
    wp_enqueue_style( 'dreamtails-josefin-sans', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap', array(), null );
    // wp_enqueue_style( 'dreamtails-google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Playfair+Display:wght@700&display=swap', array(), null );

    // Enqueue comment reply script (Essential for threaded comments)
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    // Bootstrap JS Bundle (Includes Popper.js) (CDN) - Load in footer (last arg true)
    wp_enqueue_script( 'bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true );

    // Custom JS for theme interactions (e.g., mobile menu if not using Bootstrap's data attributes alone)
    // wp_enqueue_script( 'dreamtails-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'bootstrap-bundle'), DREAMTAILS_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'dreamtails_scripts' );


/**
 * Register widget area.
 */
function dreamtails_widgets_init() {
    // Footer Widget Areas (Using Bootstrap column classes)
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Column 1', 'dreamtails' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here for the first footer column.', 'dreamtails' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removed default section tag
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">', // Use h5 for footer widget titles
            'after_title'   => '</h5>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Column 2 (Info)', 'dreamtails' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here for the second footer column (e.g., address, hours).', 'dreamtails' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s footer-info">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Column 3', 'dreamtails' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here for the third footer column.', 'dreamtails' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Column 4', 'dreamtails' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here for the fourth footer column.', 'dreamtails' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5>',
        )
    );

    // WooCommerce Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'dreamtails' ),
        'id'            => 'shop-sidebar',
        'description'   => esc_html__( 'Widgets for WooCommerce product archives.', 'dreamtails' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'dreamtails_widgets_init' );

/**
 * Add WooCommerce Wrappers.
 * This ensures WooCommerce content is wrapped with your theme's structure.
 */
// Remove default WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// Add theme-specific wrappers
add_action('woocommerce_before_main_content', 'dreamtails_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'dreamtails_woocommerce_wrapper_end', 10);

function dreamtails_woocommerce_wrapper_start() {
    // Container and row for WooCommerce pages
    echo '<main id="primary" class="site-main py-5"><div class="container"><div class="row">';
}

function dreamtails_woocommerce_wrapper_end() {
    // Close row and container
    echo '</div></div></main>';
}

/**
 * Catalog Mode adjustments.
 * Hide prices and add-to-cart buttons when enabled.
 */
add_filter( 'woocommerce_is_purchasable', function( $purchasable ) {
    return is_catalog_mode() ? false : $purchasable;
} );

add_filter( 'woocommerce_get_price_html', function( $price ) {
    return is_catalog_mode() ? '' : $price;
} );

add_action( 'wp', function() {
    if ( is_catalog_mode() ) {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
    }
} );

/**
 * Add Bootstrap classes to navigation menus.
 * Optional: Walker class for more complex menu structures.
 */
// Basic filter to add nav-link class to menu items
function dreamtails_add_menu_link_class( $atts, $item, $args ) {
    if (isset($args->theme_location) && $args->theme_location === 'primary') { // Target only primary menu
        $atts['class'] = 'nav-link'; // Bootstrap 5 nav link class
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'dreamtails_add_menu_link_class', 1, 3 );

// Filter to add nav-item class to menu list items
function dreamtails_add_menu_li_class( $classes, $item, $args ) {
    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        $classes[] = 'nav-item'; // Bootstrap 5 nav item class
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'dreamtails_add_menu_li_class', 1, 3 );


// Include template tags file (optional, for helper functions)
// require get_template_directory() . '/inc/template-tags.php';

// Include customizer additions (optional, for theme options)
// require get_template_directory() . '/inc/customizer.php';

// If using a Walker Class for Bootstrap Nav:
// require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php'; // Download and place NavWalker class if needed

/**
 * Register the "reviews" custom post type.
 */
function dreamtails_register_reviews_cpt() {
    $labels = array(
        'name'               => _x( 'Reviews', 'post type general name', 'dreamtails' ),
        'singular_name'      => _x( 'Review', 'post type singular name', 'dreamtails' ),
        'menu_name'          => _x( 'Reviews', 'admin menu', 'dreamtails' ),
        'name_admin_bar'     => _x( 'Review', 'add new on admin bar', 'dreamtails' ),
        'add_new'            => _x( 'Add New', 'review', 'dreamtails' ),
        'add_new_item'       => __( 'Add New Review', 'dreamtails' ),
        'new_item'           => __( 'New Review', 'dreamtails' ),
        'edit_item'          => __( 'Edit Review', 'dreamtails' ),
        'view_item'          => __( 'View Review', 'dreamtails' ),
        'all_items'          => __( 'All Reviews', 'dreamtails' ),
        'search_items'       => __( 'Search Reviews', 'dreamtails' ),
        'parent_item_colon'  => __( 'Parent Reviews:', 'dreamtails' ),
        'not_found'          => __( 'No reviews found.', 'dreamtails' ),
        'not_found_in_trash' => __( 'No reviews found in Trash.', 'dreamtails' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'review' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-star-filled',
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );

    register_post_type( 'reviews', $args );
}
add_action( 'init', 'dreamtails_register_reviews_cpt' );

/**
 * Add meta box for star rating.
 */
function dreamtails_reviews_add_meta_box() {
    add_meta_box(
        'dreamtails_review_rating',
        __( 'Star Rating', 'dreamtails' ),
        'dreamtails_reviews_rating_meta_box_cb',
        'reviews',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes_reviews', 'dreamtails_reviews_add_meta_box' );

/**
 * Callback to display star rating field.
 */
function dreamtails_reviews_rating_meta_box_cb( $post ) {
    $rating = get_post_meta( $post->ID, '_dreamtails_review_rating', true );
    wp_nonce_field( 'dreamtails_save_review_rating', 'dreamtails_review_rating_nonce' );
    echo '<select name="dreamtails_review_rating" id="dreamtails_review_rating" class="widefat">';
    for ( $i = 1; $i <= 5; $i++ ) {
        printf( '<option value="%1$d" %2$s>%1$d</option>', $i, selected( $rating, $i, false ) );
    }
    echo '</select>';
}

/**
 * Save star rating.
 */
function dreamtails_reviews_save_meta( $post_id ) {
    if ( ! isset( $_POST['dreamtails_review_rating_nonce'] ) || ! wp_verify_nonce( $_POST['dreamtails_review_rating_nonce'], 'dreamtails_save_review_rating' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( isset( $_POST['dreamtails_review_rating'] ) ) {
        update_post_meta( $post_id, '_dreamtails_review_rating', intval( $_POST['dreamtails_review_rating'] ) );
    }
}
add_action( 'save_post_reviews', 'dreamtails_reviews_save_meta' );

/**
 * Add rating column to admin list.
 */
function dreamtails_reviews_columns( $columns ) {
    $columns['review_rating'] = __( 'Rating', 'dreamtails' );
    return $columns;
}
add_filter( 'manage_reviews_posts_columns', 'dreamtails_reviews_columns' );

function dreamtails_reviews_custom_column( $column, $post_id ) {
    if ( 'review_rating' === $column ) {
        $rating = intval( get_post_meta( $post_id, '_dreamtails_review_rating', true ) );
        echo str_repeat( '★', $rating );
    }
}
add_action( 'manage_reviews_posts_custom_column', 'dreamtails_reviews_custom_column', 10, 2 );

?>