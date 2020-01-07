<?php

/**
 * Customizer rendering.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.0
 */?><style type="text/css">
/* CUSTOMIZER */
<?php foreach ( $settings as $id => $css ) : ?>
    <?php foreach ( $css['selectors'] as $selector => $styles ) : ?>
        <?= esc_attr( $selector ) ?> {
            <?php foreach ( $styles as $style ) : ?>
                <?php printf( $style, get_theme_mod( $id, array_key_exists( 'default', $css ) ? $css['default'] : '' ) ) ?>
            <?php endforeach ?>
        }
    <?php endforeach ?>
<?php endforeach ?>
</style>