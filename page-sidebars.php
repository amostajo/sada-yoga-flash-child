<?php
/**
 * Template Name: No sidebars
 *
 * This page template has been created to display posts which content only has
 * shortcodes. For example, WooCommerce and a like.
 * 
 * Removes No sidebar
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.3
 */

get_header(); ?>

<?php do_action( 'flash_before_body_content' ) ?>

<div id="wide-primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php do_action( 'flash_after_body_content' ) ?>

<?php
get_footer();