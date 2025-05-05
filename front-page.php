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
    <section class="front-page-hero text-center d-flex align-items-center" style="min-height: 60vh; background-color: var(--color-secondary-light-pink); background-size: cover; background-position: center;">
        <?php // Add background image via style.css or inline for testing ?>
        <div class="container">
            <div class="hero-content bg-light bg-opacity-75 p-4 p-md-5 rounded d-inline-block">
                <h1 class="display-4" style="color: var(--color-primary-dark-teal);"><?php esc_html_e( 'where pets find their people', 'dreamtails' ); ?></h1>
                <a href="/book-appointment/" class="btn btn-lg mt-3" style="background-color: var(--color-button); color: var(--color-button-text);">
                    <i class="fa-regular fa-calendar-check me-2"></i> <?php esc_html_e( 'Book an Appointment', 'dreamtails' ); ?>
                </a>
            </div>
        </div>
    </section>

<?php // --- Icon Section --- ?>
    <section class="front-page-section py-5" id="dreaming-of-you">
        <div class="container">
            <div class="row text-center gy-4">
                <div class="col-md-4 icon-item">
                    <i class="fas fa-dog fa-3x mb-3" style="color: var(--color-secondary-teal);"></i>
                    <p class="fw-bold"><?php esc_html_e( 'puppies dreaming of you', 'dreamtails' ); ?></p>
                </div>
                <div class="col-md-4 icon-item">
                    <i class="fas fa-cat fa-3x mb-3" style="color: var(--color-secondary-teal);"></i>
                    <p class="fw-bold"><?php esc_html_e( 'kittens dreaming of you', 'dreamtails' ); ?></p>
                </div>
                <div class="col-md-4 icon-item">
                    <i class="fas fa-concierge-bell fa-3x mb-3" style="color: var(--color-secondary-teal);"></i>
                    <p class="fw-bold"><?php esc_html_e( 'concierge service', 'dreamtails' ); ?></p>
                </div>
            </div>
        </div>
    </section>

<?php // --- Featured Pets Section --- ?>
    <section class="front-page-section py-5 bg-light" id="featured-pets">
        <div class="container">
            <h2 class="section-title text-center mb-5"><?php esc_html_e( 'featured dream pets', 'dreamtails' ); ?></h2>
            <div class="row g-4 justify-content-center"> <?php // Using row and gutters ?>
                <?php
                // --- Placeholder Content ---
                // Replace with WP_Query for 'pet' CPT
                for ($i = 1; $i <= 3; $i++) { ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm pet-card"> <?php // Bootstrap card component ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/pet-placeholder-' . $i . '.jpg'); ?>" class="card-img-top" alt="Featured Pet <?php echo $i; ?>" style="height: 250px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">Pet Name <?php echo $i; ?></h5>
                                <p class="card-text">Breed Name</p>
                                <a href="#" class="btn btn-sm" style="background-color: var(--color-button); color: var(--color-button-text);"><i class="fas fa-paw me-1"></i> <?php esc_html_e('View Details', 'dreamtails'); ?></a>
                            </div>
                        </div>
                    </div>
                <?php }
                // --- End Placeholder ---
                ?>
            </div>
            <div class="text-center mt-5">
                <a href="/view-pets/" class="btn btn-lg" style="background-color: var(--color-secondary-teal); color: white;"><i class="fas fa-search me-1"></i> <?php esc_html_e('View All Dream Pets', 'dreamtails'); ?></a>
            </div>
        </div>
    </section>

<?php // --- Testimonial Section --- ?>
    <section class="front-page-section py-5" id="happy-tails">
        <div class="container">
            <h2 class="section-title text-center mb-5"><?php esc_html_e( 'happy tails start here', 'dreamtails' ); ?></h2>
            <div class="testimonial-content text-center mx-auto" style="max-width: 700px;">
                <i class="fas fa-quote-left fa-2x mb-3" style="color: var(--color-secondary-light-pink);"></i>
                <blockquote class="blockquote fs-5 fst-italic mb-3"><?php esc_html_e( 'We love our little Morkie, Lilly! The store was very professional, knowledgeable and courteous. They took the time to work with us and explain every detail.', 'dreamtails'); ?></blockquote>
                <footer class="blockquote-footer fw-bold" style="color: var(--color-heading);"><?php esc_html_e( 'Jeremy D', 'dreamtails' ); ?></footer>
            </div>
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