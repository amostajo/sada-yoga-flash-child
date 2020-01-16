<?php
/**
 * elementor.sada_posts view.
 * Generated with ayuco.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.3
 */
?>
<div <?php echo $widget->get_render_attribute_string( 'wrapper' ) ?>>
    <?php if ( empty( $posts ) ) : ?>
        <div <?php echo $widget->get_render_attribute_string( 'noresults' ) ?>><?php echo $settings['noresults'] ?></div>
    <?php else : ?>
        <div <?php echo $widget->get_render_attribute_string( 'results' ) ?>>
            <?php foreach ( $posts as $post ) : ?>
                <?php $permalink = esc_url( get_permalink( $post->ID ) ) ?>
                <div <?php echo $widget->get_render_attribute_string( 'post' ) ?>>
                    <div <?php echo $widget->get_render_attribute_string( 'postinner' ) ?>>
                        <div class="post-data">
                            <?php if ( $settings['show_image'] === 'yes' && has_post_thumbnail( $post->ID ) ) : ?>
                                <div class="attachment">
                                    <?php if ( $settings['image_link'] === 'yes' ) : ?><a href="<?php echo $permalink ?>"><?php endif ?>
                                        <img src="<?php echo esc_url( get_the_post_thumbnail_url( $post, $settings['image_size'] ) ) ?>"
                                            title="<?php echo esc_attr( $post->post_title ) ?>"
                                            <?php echo $widget->get_render_attribute_string( 'image' ) ?>/>
                                    <?php if ( $settings['image_link'] === 'yes' ) : ?></a><?php endif ?>
                                </div>
                            <?php endif ?>
                            <?php if ( $settings['title_link'] === 'yes' ) : ?><a href="<?php echo $permalink ?>"><?php endif ?>
                            <h4 class="title"><?php echo get_the_title( $post ) ?></h4>
                            <?php if ( $settings['title_link'] === 'yes' ) : ?></a><?php endif ?>
                            <p class="excerpt"><?php echo get_the_excerpt( $post ) ?></p>
                        </div>
                        <div <?php echo $widget->get_render_attribute_string( 'meta' ) ?>>
                            <div class="date"><?php echo date( $settings['date_format'], strtotime( $post->post_date ) ) ?></div>
                            <?php if ( $settings['show_readmore'] === 'yes' ) : ?>
                                <a href="<?php echo $permalink ?>" <?php echo $widget->get_render_attribute_string( 'readmore' ) ?>><?php echo  $settings['readmore_label'] ?></a>
                            <?php endif ?>
                        </div>
                    </div><!--post-->
                </div><!--inner-->
            <?php endforeach ?>
        </div><!--results-->
    <?php endif ?>
</div>