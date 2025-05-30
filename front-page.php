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
                <div class="col-md-6 d-none d-md-block p-0 hero-image"></div>
                <div class="col-md-6">
                    <div class="hero-content bg-light bg-opacity-75 p-4 p-md-5 rounded text-center">
                        <h1 class="display-4" style="color: var(--color-primary-dark-teal);"><?php esc_html_e( 'where pets find their people', 'dreamtails' ); ?></h1>
                        <a href="/book-appointment/" class="btn btn-lg mt-3" style="background-color: var(--color-button); color: var(--color-button-text);">
                            <i class="fa-regular fa-calendar-check me-2"></i> <?php esc_html_e( 'Book an Appointment', 'dreamtails' ); ?>
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
                    <i class="fas fa-dog fa-3x mb-3"></i>
                    <p class="fw-bold"><?php esc_html_e( 'puppies dreaming of you', 'dreamtails' ); ?></p>
                </div>
                <div class="col-md-4 icon-item">
                    <i class="fas fa-cat fa-3x mb-3"></i>
                    <p class="fw-bold"><?php esc_html_e( 'kittens dreaming of you', 'dreamtails' ); ?></p>
                </div>
                <div class="col-md-4 icon-item">
                    <i class="fas fa-concierge-bell fa-3x mb-3"></i>
                    <p class="fw-bold"><?php esc_html_e( 'concierge service', 'dreamtails' ); ?></p>
                </div>
            </div>
        </div>
    </section>

<?php // --- Featured Pets Section --- ?>
    <section class="front-page-section py-5 bg-light" id="featured-pets">
        <div class="container">
            <h2 class="section-title text-center mb-4"><?php esc_html_e( 'featured dream pets', 'dreamtails' ); ?></h2>
            <div class="row featured-pets-row align-items-center">
                <div class="col-12 col-md-9">
                    <div class="featured-pets-images d-flex flex-wrap flex-md-nowrap justify-content-between">
                        <?php
                        // --- Placeholder Content ---
                        // Replace with WP_Query for 'pet' CPT
                        for ($i = 1; $i <= 3; $i++) { ?>
                            <div class="featured-pet-image mb-3 mb-md-0 text-center">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pet-placeholder-' . $i . '.jpg'); ?>" alt="Featured Pet <?php echo $i; ?>" class="img-fluid">
                            </div>
                        <?php }
                        // --- End Placeholder ---
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
        <div class="container">
            <h2 class="section-title text-center mb-5"><?php esc_html_e( 'happy tails start here', 'dreamtails' ); ?></h2>
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
        </div>
    </section>

<?php // --- Concierge Level Care Section --- ?>
    <section class="front-page-section py-5 bg-light" id="concierge-care">
        <div class="container text-center">
            <h2 class="section-title mb-4"><?php esc_html_e( 'concierge level care', 'dreamtails' ); ?></h2>
            <div class="concierge-care-content mx-auto" style="max-width: 800px;">
                <p class="lead"><?php echo esc_html__( 'Our service and environment are designed to match the high quality of puppies and kittens in our store and meet your expectations.', 'dreamtails' ); ?></p>
                <p><?php echo esc_html__( 'We think the puppies and kittens are worth it and so are you!', 'dreamtails' ); ?></p>
                <a href="/about/" class="btn mt-3" style="background-color: var(--color-button); color: var(--color-button-text);">
                    <i class="fas fa-info-circle me-1"></i> <?php esc_html_e( 'Learn more about Dream Tails Boutique', 'dreamtails' ); ?>
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