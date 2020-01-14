<?php
/**
 * nav.account-login view.
 * Generated with ayuco.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.1
 */
?>
<div class="account-login-profile">
    <?php if ( is_user_logged_in() ) : ?>
        <a href="<?= esc_url( apply_filters( 'sada_yoga_account_url', '' ) ) ?>"
            class="nav-link account-link"
        ><?= get_avatar( get_current_user_id() ) ?> <span class="name"><?= wp_get_current_user()->display_name ?></span></a>
    <?php else : ?>
        <a href="<?= esc_url( wp_login_url() ) ?>" class="nav-link login-url"><?php _e( 'Login' ) ?></a>
    <?php endif ?>
</div>