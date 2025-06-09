<?php
/**
 * The template for displaying the static front page.
 *
 * @package Dream_Tails
 */

get_header();
?>

    <main id="primary" class="site-main">

<?php // --- Hero Section --- ?>
    <section class="front-page-hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 d-none d-md-block p-0 hero-image" style=background-image: url('<?php echo esc_url( get_theme_mod( 'front_hero_image', get_template_directory_uri() . '/assets/images/homepage_hero.png') ); ?>');"></div>
                <div class="col-md-6">
                    <div class="hero-content bg-light bg-opacity-75 p-4 p-md-5 rounded text-center">
                        <h1 class="display-4" style="color: var(--color-primary-dark-teal);">
                            <?php echo esc_html( get_theme_mod( 'front_hero_heading', __( 'where pets find their people', 'dreamtails' ) ) ); ?>
                        </h1>
                        <a href="<?php echo esc_url( get_theme_mod( 'front_hero_button_url', '/book-appointment/' ) ); ?>" class="btn btn-lg mt-3" style="background-color: var(--color-button); color: var(--color-button-text);">
                            <i class="fa-regular fa-calendar-check me-2"></i> <?php echo esc_html( get_theme_mod( 'front_hero_button_text', __( 'Book an Appointment', 'dreamtails' ) ) ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php // --- Icon Section --- ?>
    <section class="front-page-section py-5" id="dreaming-of-you">
        <div class="container">
            <div class="row text-center gy-4">
                <div class="col-md-4 icon-item">
                    <img src="<?php echo esc_url( get_theme_mod( 'front_icon1_img', get_template_directory_uri() . '/assets/images/puppy_ico.png' ) ); ?>" alt="<?php esc_attr_e( 'Puppy icon', 'dreamtails' ); ?>" class="mb-3" />
                    <p class="fw-bold"><?php echo esc_html( get_theme_mod( 'front_icon1_text', __( 'puppies dreaming of you', 'dreamtails' ) ) ); ?></p>
                </div>
                <div class="col-md-4 icon-item">
                    <img src="<?php echo esc_url( get_theme_mod( 'front_icon2_img', get_template_directory_uri() . '/assets/images/kittens_ico.png' ) ); ?>" alt="<?php esc_attr_e( 'Kitten icon', 'dreamtails' ); ?>" class="mb-3" />
                    <p class="fw-bold"><?php echo esc_html( get_theme_mod( 'front_icon2_text', __( 'kittens dreaming of you', 'dreamtails' ) ) ); ?></p>
                </div>
                <div class="col-md-4 icon-item">
                    <img src="<?php echo esc_url( get_theme_mod( 'front_icon3_img', get_template_directory_uri() . '/assets/images/concierge.png' ) ); ?>" alt="<?php esc_attr_e( 'Concierge icon', 'dreamtails' ); ?>" class="mb-3" />
                    <p class="fw-bold"><?php echo esc_html( get_theme_mod( 'front_icon3_text', __( 'concierge service', 'dreamtails' ) ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

<?php // --- Featured Pets Section --- ?>
    <section class="front-page-section py-5 bg-light" id="featured-pets">
        <div class="container">
            <h2 class="section-title text-center mb-4">
                <?php echo esc_html( get_theme_mod( 'front_featured_pets_heading', __( 'featured dream pets', 'dreamtails' ) ) ); ?>
            </h2>
            <div class="row featured-pets-row align-items-center">
                <div class="col-12 col-md-9">
                    <div class="featured-pets-images d-flex flex-wrap flex-md-nowrap justify-content-between">
                        <?php
                        // Output featured pet images from Customizer settings.
                        for ( $i = 1; $i <= 3; $i++ ) {
                            $image = get_theme_mod( 'front_featured_pet_image' . $i, get_template_directory_uri() . '/assets/images/pet-placeholder-' . $i . '.jpg' );
                            ?>
                            <div class="featured-pet-image mb-3 mb-md-0 text-center">
                                <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( sprintf( __( 'Featured Pet %d', 'dreamtails' ), $i ) ); ?>" class="img-fluid">
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-md-start text-center mt-3 mt-md-0 d-flex align-items-center justify-content-center">
                    <a href="/view-pets/" class="view-all-pets-link d-inline-flex align-items-center">
                        <span class="me-2"><?php esc_html_e('View all Dream Pets', 'dreamtails'); ?></span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php // --- Testimonial Section --- ?>
    <section class="front-page-section py-5" id="happy-tails">
        <div class="container position-relative">
            <h2 class="section-title text-center mb-5">
                <?php echo esc_html( get_theme_mod( 'front_testimonial_heading', __( 'happy tails start here', 'dreamtails' ) ) ); ?>
            </h2>
            <?php
            $review_query = new WP_Query( array(
                'post_type'      => 'reviews',
                'posts_per_page' => 3,
            ) );

            if ( $review_query->have_posts() ) :
                echo '<div class="row justify-content-center gy-4">';
                while ( $review_query->have_posts() ) :
                    $review_query->the_post();
                    $rating = intval( get_post_meta( get_the_ID(), '_dreamtails_review_rating', true ) );
                    ?>
                    <div class="col-md-4 text-center testimonial-content">
                        <i class="fas fa-quote-left fa-2x mb-3" style="color: var(--color-secondary-light-pink);"></i>
                        <blockquote class="blockquote fs-5 fst-italic mb-3"><?php the_content(); ?></blockquote>
                        <div class="mb-2" style="color: var(--color-secondary-light-pink);">
                            <?php
                            for ( $i = 1; $i <= 5; $i++ ) {
                                echo $i <= $rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                            }
                            ?>
                        </div>
                        <footer class="blockquote-footer fw-bold" style="color: var(--color-heading);"><?php the_title(); ?></footer>
                    </div>
                    <?php
                endwhile;
                echo '</div>';
                wp_reset_postdata();
            endif;
            ?>
            <img class="testimonial-decor" src="<?php echo esc_url( get_theme_mod( 'front_testimonial_image', get_template_directory_uri() . '/assets/images/reviews-image.png' ) ); ?>" alt="<?php esc_attr_e( 'Testimonial image', 'dreamtails' ); ?>" />
        </div>
    </section>

<?php // --- Concierge Level Care Section --- ?>
    <section class="front-page-section py-5 bg-light" id="concierge-care">
        <div class="container text-center">
            <h2 class="section-title mb-4">
                <?php echo esc_html( get_theme_mod( 'front_concierge_heading', __( 'concierge level care', 'dreamtails' ) ) ); ?>
            </h2>
            <div class="concierge-care-content mx-auto" style="max-width: 800px;">
                <p class="lead"><?php echo esc_html( get_theme_mod( 'front_concierge_lead', __( 'Our service and environment are designed to match the high quality of puppies and kittens in our store and meet your expectations.', 'dreamtails' ) ) ); ?></p>
                <p><?php echo esc_html( get_theme_mod( 'front_concierge_desc', __( 'We think the puppies and kittens are worth it and so are you!', 'dreamtails' ) ) ); ?></p>
                <a href="<?php echo esc_url( get_theme_mod( 'front_concierge_button_url', '/about/' ) ); ?>" class="btn mt-3" style="background-color: var(--color-button); color: var(--color-button-text);">
                    <i class="fas fa-info-circle me-1"></i> <?php echo esc_html( get_theme_mod( 'front_concierge_button_text', __( 'Learn more about Dream Tails Boutique', 'dreamtails' ) ) ); ?>
                </a>
            </div>
        </div>
    </section>

<?php // Optional: WP Editor Content for Front Page
// while ( have_posts() ) : the_post();
//  echo '<div class="container py-5 wp-content">';
//  the_content();
//  echo '</div>';
// endwhile;
?>

    </main><?php
get_footer();