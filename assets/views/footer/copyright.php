<?php
/**
 * Copyright display.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */
$copyright = apply_filters( 'sada_yoga_copyright', get_theme_mod( 'copyright_html', false ) );
?>
<div class="copyright">
    <span class="copyright-text">
        <?php if ( empty( $copyright ) ) : ?>
            <?php printf( esc_html__( 'Copyright %1$s %2$s', 'flash' ), '&copy; ', date( 'Y' ) ); ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>.
        <?php else : ?>
            <?= $copyright ?>
        <?php endif ?>
    </span>
</div><!-- .copyright -->