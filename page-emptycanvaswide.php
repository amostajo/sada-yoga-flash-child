<?php
/**
 * Template Name: Empty canvas (wide)
 *
 * This page template has been created for page builders or shortcodes that need and empty canvas.
 * - Removes sidebar
 * - Removes title
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.3
 */

get_header( 'notitle-wide' ); ?>

<?php do_action( 'flash_before_body_content' ) ?>

<div id="wide-primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        while ( have_posts() ) : the_post();

            the_content();

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php do_action( 'flash_after_body_content' ) ?>

<?php
get_footer();