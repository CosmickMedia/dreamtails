<?php
/**
 * Theme Customizer additions for Dream Tails.
 */

function dreamtails_customize_register( $wp_customize ) {
    // Panel for front page settings
    $wp_customize->add_panel( 'dreamtails_front_page', array(
        'title'    => __( 'Front Page', 'dreamtails' ),
        'priority' => 160,
    ) );

    /* Hero Section */
    $wp_customize->add_section( 'dreamtails_hero', array(
        'title' => __( 'Hero Section', 'dreamtails' ),
        'panel' => 'dreamtails_front_page',
    ) );

    $wp_customize->add_setting( 'front_hero_image', array(
        'default'           => get_template_directory_uri() . '/assets/images/homepage_hero.png',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_hero_image', array(
        'label'   => __( 'Hero Image', 'dreamtails' ),
        'section' => 'dreamtails_hero',
    ) ) );

    $wp_customize->add_setting( 'front_hero_heading', array(
        'default'           => __( 'where pets find their people', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_hero_heading', array(
        'label'   => __( 'Hero Heading', 'dreamtails' ),
        'section' => 'dreamtails_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'front_hero_button_text', array(
        'default'           => __( 'Book an Appointment', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_hero_button_text', array(
        'label'   => __( 'Hero Button Text', 'dreamtails' ),
        'section' => 'dreamtails_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'front_hero_button_url', array(
        'default'           => '/book-appointment/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'front_hero_button_url', array(
        'label'   => __( 'Hero Button URL', 'dreamtails' ),
        'section' => 'dreamtails_hero',
        'type'    => 'url',
    ) );

    /* Icon Section */
    $wp_customize->add_section( 'dreamtails_icons', array(
        'title' => __( 'Icon Section', 'dreamtails' ),
        'panel' => 'dreamtails_front_page',
    ) );

    $wp_customize->add_setting( 'front_icon1_img', array(
        'default'           => get_template_directory_uri() . '/assets/images/puppy_ico.png',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_icon1_img', array(
        'label'   => __( 'First Icon Image', 'dreamtails' ),
        'section' => 'dreamtails_icons',
    ) ) );

    $wp_customize->add_setting( 'front_icon1_text', array(
        'default'           => __( 'puppies dreaming of you', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_icon1_text', array(
        'label'   => __( 'First Icon Text', 'dreamtails' ),
        'section' => 'dreamtails_icons',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'front_icon2_img', array(
        'default'           => get_template_directory_uri() . '/assets/images/kittens_ico.png',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_icon2_img', array(
        'label'   => __( 'Second Icon Image', 'dreamtails' ),
        'section' => 'dreamtails_icons',
    ) ) );

    $wp_customize->add_setting( 'front_icon2_text', array(
        'default'           => __( 'kittens dreaming of you', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_icon2_text', array(
        'label'   => __( 'Second Icon Text', 'dreamtails' ),
        'section' => 'dreamtails_icons',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'front_icon3_img', array(
        'default'           => get_template_directory_uri() . '/assets/images/concierge.png',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'front_icon3_img', array(
        'label'   => __( 'Third Icon Image', 'dreamtails' ),
        'section' => 'dreamtails_icons',
    ) ) );

    $wp_customize->add_setting( 'front_icon3_text', array(
        'default'           => __( 'concierge service', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_icon3_text', array(
        'label'   => __( 'Third Icon Text', 'dreamtails' ),
        'section' => 'dreamtails_icons',
        'type'    => 'text',
    ) );

    /* Featured Pets */
    $wp_customize->add_section( 'dreamtails_featured_pets', array(
        'title' => __( 'Featured Pets', 'dreamtails' ),
        'panel' => 'dreamtails_front_page',
    ) );

    $wp_customize->add_setting( 'front_featured_pets_heading', array(
        'default'           => __( 'featured dream pets', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_featured_pets_heading', array(
        'label'   => __( 'Section Heading', 'dreamtails' ),
        'section' => 'dreamtails_featured_pets',
        'type'    => 'text',
    ) );

    // Featured Pet Images
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "front_featured_pet_image{$i}", array(
            'default'           => get_template_directory_uri() . "/assets/images/pet-placeholder-{$i}.jpg",
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "front_featured_pet_image{$i}", array(
            'label'   => sprintf( __( 'Featured Pet Image %d', 'dreamtails' ), $i ),
            'section' => 'dreamtails_featured_pets',
        ) ) );
    }

    /* Testimonials */
    $wp_customize->add_section( 'dreamtails_testimonials', array(
        'title' => __( 'Testimonials', 'dreamtails' ),
        'panel' => 'dreamtails_front_page',
    ) );

    $wp_customize->add_setting( 'front_testimonial_heading', array(
        'default'           => __( 'happy tails start here', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_testimonial_heading', array(
        'label'   => __( 'Section Heading', 'dreamtails' ),
        'section' => 'dreamtails_testimonials',
        'type'    => 'text',
    ) );

    /* Concierge Section */
    $wp_customize->add_section( 'dreamtails_concierge', array(
        'title' => __( 'Concierge Section', 'dreamtails' ),
        'panel' => 'dreamtails_front_page',
    ) );

    $wp_customize->add_setting( 'front_concierge_heading', array(
        'default'           => __( 'concierge level care', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_concierge_heading', array(
        'label'   => __( 'Section Heading', 'dreamtails' ),
        'section' => 'dreamtails_concierge',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'front_concierge_lead', array(
        'default'           => __( 'Our service and environment are designed to match the high quality of puppies and kittens in our store and meet your expectations.', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'front_concierge_lead', array(
        'label'   => __( 'Lead Text', 'dreamtails' ),
        'section' => 'dreamtails_concierge',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'front_concierge_desc', array(
        'default'           => __( 'We think the puppies and kittens are worth it and so are you!', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'front_concierge_desc', array(
        'label'   => __( 'Secondary Text', 'dreamtails' ),
        'section' => 'dreamtails_concierge',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'front_concierge_button_text', array(
        'default'           => __( 'Learn more about Dream Tails Boutique', 'dreamtails' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'front_concierge_button_text', array(
        'label'   => __( 'Button Text', 'dreamtails' ),
        'section' => 'dreamtails_concierge',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'front_concierge_button_url', array(
        'default'           => '/about/',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'front_concierge_button_url', array(
        'label'   => __( 'Button URL', 'dreamtails' ),
        'section' => 'dreamtails_concierge',
        'type'    => 'url',
    ) );
}
add_action( 'customize_register', 'dreamtails_customize_register' );

/**
 * Output dynamic CSS based on customizer settings.
 */
function dreamtails_customizer_css() {
    $hero = get_theme_mod( 'front_hero_image', get_template_directory_uri() . '/assets/images/homepage_hero.png');
    ?>
    <style type="text/css">

        @media (min-width: 768px) {
            .hero-image { background-image: url('<?php echo esc_url( $hero ); ?>'); }
        }
    </style>
    <?php
}
add_action( 'wp_head', 'dreamtails_customizer_css' );
