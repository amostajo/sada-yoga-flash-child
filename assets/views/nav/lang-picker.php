<?php
/**
 * nav.lang-picker view.
 * Generated with ayuco.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.1
 */
?>
<div class="lang-picker">
    <ul>
        <?php foreach ( $languages as $language ) : ?>
            <li class="lang <?php if ( $language['active'] ) : ?>active<?php endif ?>"
            ><?php if ( ! $language['active'] ) : ?><a href="<?= esc_url( $language['url'] ) ?>" class="nav-link lang-link"><?php endif ?><?= $language['slug'] ?><?php if ( ! $language['active'] ) : ?></a><?php endif ?></li>
        <?php endforeach ?>
    </ul>
</div>