<?php
/**
 * elementor.the_events_calendar view.
 * Generated with ayuco.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.2
 */
?>
<div <?php echo $widget->get_render_attribute_string( 'wrapper' ) ?>>
    <?php if ( $settings['show_title'] ) : ?>
        <div <?php echo $widget->get_render_attribute_string( 'heading' ) ?>><?php echo $settings['title'] ?></div>
    <?php endif ?>
    <div <?php echo $widget->get_render_attribute_string( 'results' ) ?>>
        <?php if ( empty( $events ) ) : ?>
            <div <?php echo $widget->get_render_attribute_string( 'noresults' ) ?>><?php echo $settings['noresults'] ?></div>
        <?php else : ?>
            <?php foreach ( $events as $event ) : ?>
                <div class="event-data">
                    <div <?php echo $widget->get_render_attribute_string( 'event' ) ?>>
                        <div class="details">
                            <?php if ( $settings['event_title_link'] === 'yes' ) : ?><a href="<?php echo tribe_get_event_link( $event ) ?>"><?php endif ?>
                            <?php if ( $settings['event_title'] === 'title' ) : ?>
                                <h4 class="title"><?php echo $event->post_title ?></h4>
                            <?php elseif ( $settings['event_title'] === 'city' ) : ?>
                                <h4 class="title"><?php echo tribe_get_city( $event ) ?></h4>
                            <?php elseif ( $settings['event_title'] === 'state' ) : ?>
                                <h4 class="title"><?php echo tribe_get_state( $event ) ?></h4>
                            <?php elseif ( $settings['event_title'] === 'country' ) : ?>
                                <h4 class="title"><?php echo tribe_get_country( $event ) ?></h4>
                            <?php endif ?>
                            <?php if ( $settings['event_title_link'] === 'yes' ) : ?></a><?php endif ?>
                            <div class="date"><?php echo tribe_get_start_date( $event ) ?></div>
                        </div>
                        <div <?php echo $widget->get_render_attribute_string( 'actions' ) ?>>
                            <?php if ( $settings['show_learnmore'] === 'yes' && tribe_get_event_website_url( $event ) != '' ) : ?>
                                <a href="<?php echo tribe_get_event_link( $event ) ?>" <?php echo $widget->get_render_attribute_string( 'learnmore' ) ?>><?php echo  $settings['learnmore_label'] ?></a>
                            <?php endif ?>
                            <?php if ( $settings['show_enroll'] === 'yes' ) : ?>
                                <a href="<?php echo tribe_get_event_website_url( $event ) ? tribe_get_event_website_url( $event ) : tribe_get_event_link( $event ) ?>" <?php echo $widget->get_render_attribute_string( 'enroll' ) ?>><?php echo  $settings['enroll_label'] ?></a>
                            <?php endif ?>
                        </div>
                    </div><!--event-->
                </div><!--event-data-->
            <?php endforeach ?>
        <?php endif ?>
    </div><!--events-results-->
</div>