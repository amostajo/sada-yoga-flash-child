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
    <?php $value = get_theme_mod( $id, array_key_exists( 'default', $css ) ? $css['default'] : '' ) ?>
    <?php if ( $value === false ) : ?>
        <?php continue; ?>
    <?php endif ?>
    <?php if ( array_key_exists( 'breakpoint', $css ) && $css['breakpoint'] ) : ?>
    @media screen and ( max-width: <?= $value ?>px ) {
    <?php endif ?>
    <?php foreach ( $css['selectors'] as $selector => $styles ) : ?>
        <?= esc_attr( $selector ) ?> {
            <?php foreach ( $styles as $style ) : ?>
                <?php print_customizer_setting_style( $id, $style, $value ) ?>
            <?php endforeach ?>
        }
    <?php endforeach ?>
    <?php if ( array_key_exists( 'breakpoint', $css ) && $css['breakpoint'] ) : ?>
    }
    <?php endif ?>
<?php endforeach ?>
</style>