<?php
/**
 * The template for displaying all static pages
 * @package Dream_Tails
 */

get_header();
?>

    <main id="primary" class="site-main py-5"> <?php // Added padding utility class ?>
    <div class="container">
        <div class="row justify-content-center"> <?php // Center content area ?>
            <div class="col-lg-8"> <?php // Limit content width ?>
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template(); // Ensure this is called
                    endif;

                endwhile; // End of the loop.
                ?>
            </div></div></div></main><?php
get_footer();