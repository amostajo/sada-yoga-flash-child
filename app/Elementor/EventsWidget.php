<?php

namespace SadaYogaFlash\Elementor;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
/**
 * Incoming events from The Events Calendar plugin.
 * Elementor widget.
 *
 * @author amostajo <https://github.com/amostajo/>
 * @license MIT
 * @package flash-child
 * @version 1.0.2
 */
class EventsWidget extends Widget_Base
{
    /**
     * Returns a widget name that will be used in the code.
     * @since 1.0.2
     * 
     * @return string
     */
    public function get_name()
    {
        return 'the_events_calendar';
    }
    /**
     * Returns the widget title that will be displayed as the widget label.
     * @since 1.0.2
     * 
     * @return string
     */
    public function get_title()
    {
        return __( 'Events', 'the-events-calendar' );
    }
    /**
     * Returns the widget icon. you can use any of the eicon or font-awesome icons,
     * simply return the class name as a string.
     * @since 1.0.2
     * 
     * @return string
     */
    public function get_icon()
    {
        return 'fa fa-calendar';
    }
    /**
     * Returns the category of the widget, return the category name as a string.
     * @since 1.0.2
     * 
     * @return array
     */
    public function get_categories()
    {
        return ['general'];
    }
    /**
     * Widget controls.
     * @since 1.0.2
     */
    protected function _register_controls()
    {
        // CONTENT
        $this->start_controls_section(
            'events_section',
            [
                'label' => __( 'Events', 'the-events-calendar' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title' ),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __( 'Events', 'the-events-calendar' ),
            ]
        );
        $this->add_control(
            'show_title',
            [
                'label' => __( 'Show title' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'query',
            [
                'label' => __( 'Query', 'the-events-calendar' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'limit',
            [
                'label' => __( 'Limit', 'flash-child' ),
                'type' => Controls_Manager::NUMBER,
                'description' => __( 'Number of events to display.', 'flash-child' ),
                'default' => 3,
                'min' => 1,
            ]
        );
        $terms = [];
        foreach ( get_terms( [
            'taxonomy'      => 'post_tag',
            'post_type'     => 'tribe_events',
            'hide_empty'    => false,
        ] ) as $term ) {
            $terms[$term->slug] = $term->name;
        }
        $this->add_control(
            'tag',
            [
                'label' => __( 'Tag' ),
                'type' => Controls_Manager::SELECT,
                'options' => array_merge( [
                    '-' => '-None-',
                ], $terms ),
                'default' => '-',
            ]
        );
        $this->add_control(
            'results',
            [
                'label' => __( 'Results', 'the-events-calendar' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'noresults',
            [
                'label' => __( 'No results message', 'flash-child' ),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __( 'Text to display if no results have been found.', 'flash-child' ),
            ]
        );
        $this->add_control(
            'event_title',
            [
                'label' => __( 'Event title' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'title'     => __( 'Title' ),
                    'city'      => __( 'City name', 'flash-child' ),
                    'state'     => __( 'State name', 'flash-child' ),
                    'country'   => __( 'Country name', 'flash-child' ),
                ],
                'default' => 'title',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'learnmore_button_section',
            [
                'label' => __( 'Learn more button', 'flash-child' ),
                'description' => __( 'This button will display only if there is an external event website attached to the event.', 'flash-child' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'learnmore_label',
            [
                'label' => __( 'Label' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Details' ),
            ]
        );
        $this->add_control(
            'show_learnmore',
            [
                'label' => __( 'Show' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'enroll_button_section',
            [
                'label' => __( 'Enroll button', 'flash-child' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enroll_label',
            [
                'label' => __( 'Label' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Enroll' ),
            ]
        );
        $this->add_control(
            'show_enroll',
            [
                'label' => __( 'Show' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // HEADING STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_heading',
            [
                'label' => __( 'Heading', 'elementor' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'heading_bg_color',
                'label' => __( 'Background', 'elementor' ),
                'selector' => '{{WRAPPER}} .heading',
            ]
        );
        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typo',
                'label' => __( 'Typography', 'elementor' ),
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selector' => '{{WRAPPER}} .heading',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'heading_border',
                'label' => __( 'Border', 'elementor' ),
                'separator' => 'before',
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selector' => '{{WRAPPER}} .heading',
            ]
        );
        $this->add_control(
            'heading_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'heading_align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // RESULTS STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_results',
            [
                'label' => __( 'Results container', 'flash-child' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'results_bg_color',
                'label' => __( 'Background', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .results',
            ]
        );
        $this->add_control(
            'results_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .results' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'results_border',
                'label' => __( 'Border', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .results',
            ]
        );
        $this->add_control(
            'results_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .results' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'style_noresults',
            [
                'label' => __( 'No results', 'the-events-calendar' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'noresults_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .noresults' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'noresults_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .noresults',
            ]
        );
        $this->add_control(
            'noresults_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .noresults' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'noresults_align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // EVENT STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_event',
            [
                'label' => __( 'Event', 'the-events-calendar' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'event_'.uniqid(),
            [
                'label' => __( 'Title', 'the-events-calendar' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_control(
            'event_title_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .event .title' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'event_title_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .title',
            ]
        );
        $this->add_control(
            'event_title_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .event .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'event_title_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .event .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'event_'.uniqid(),
            [
                'label' => __( 'Date', 'the-events-calendar' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'event_date_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .event .date' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'event_date_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .date',
            ]
        );
        $this->add_control(
            'event_date_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .event .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'event_date_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .event .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // LEARNMORE STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_learnmore',
            [
                'label' => __( 'Learn more button', 'the-events-calendar' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'learnmore_bg_color',
                'label' => __( 'Background', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .learnmore',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'learnmore_hoverbg_color',
                'label' => __( 'Hover', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .learnmore:hover',
            ]
        );
        $this->add_control(
            'learnmore_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .event .learnmore' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'learnmore_title_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .learnmore',
            ]
        );
        $this->add_control(
            'learnmore_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .event .learnmore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'learnmore_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .event .learnmore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '5',
                    'bottom' => '5',
                    'left' => '10',
                    'right' => '10',
                    'isLinked' => false,
                ],
            ]
        );
        $this->add_control(
            'learnmore_align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'learnmore_border',
                'label' => __( 'Border', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .event .learnmore',
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // ENROLL STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_enroll',
            [
                'label' => __( 'Enroll button', 'the-events-calendar' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'enroll_bg_color',
                'label' => __( 'Background', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .enroll',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'enroll_hoverbg_color',
                'label' => __( 'Hover', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .enroll:hover',
            ]
        );
        $this->add_control(
            'enroll_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .event .enroll' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'enroll_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .event .enroll',
            ]
        );
        $this->add_control(
            'enroll_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => ['top','left','bottom'],
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .event .enroll' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '',
                    'bottom' => '',
                    'left' => '10',
                    'right' => '',
                    'isLinked' => false,
                ],
            ]
        );
        $this->add_control(
            'enroll_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .event .enroll' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '5',
                    'bottom' => '5',
                    'left' => '10',
                    'right' => '10',
                    'isLinked' => false,
                ],
            ]
        );
        $this->add_control(
            'enroll_align',
            [
                'label' => __( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'enroll_border',
                'label' => __( 'Border', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .event .enroll',
            ]
        );
        $this->end_controls_section();
    }
    /**
     * Render widget.
     * @since 1.0.2
     */
    protected function render()
    {
        // Data
        $settings = $this->get_settings_for_display();
        $events_query = [
            'posts_per_page' => $settings['limit'], 
            'start_date'     => 'now',
        ];
        if ( ! empty( $settings['tag'] ) && $settings['tag'] !== '-' )
            $events_query['tag'] = $settings['tag'];
        // Render settings
        $this->add_render_attribute(
            'wrapper',
            [
                'class' => [ 'wrapper the-events-calendar-widget', $settings['custom_class'] ],
                'role' => 'events',
            ]
        );
        $this->add_render_attribute(
            'heading',
            [
                'class' => [ 'heading' ],
                'style' => 'text-align:'.$settings['heading_align'],
            ]
        );
        $this->add_render_attribute(
            'results',
            [
                'class' => [ 'results' ],
            ]
        );
        $this->add_render_attribute(
            'event',
            [
                'class' => [ 'event' ],
                'style' => implode( '', [
                    'display: flex;',
                    'justify-content: space-between;',
                    'align-items: center;',
                ] ),
            ]
        );
        $this->add_render_attribute(
            'actions',
            [
                'class' => [ 'actions' ],
                'style' => implode( '', [
                    'display: flex;',
                    'justify-content: space-between;',
                    'align-items: center;',
                ] ),
            ]
        );
        $this->add_render_attribute(
            'learnmore',
            [
                'class' => [ 'learnmore' ],
                'style' => 'text-align:'.$settings['learnmore_align'],
                'role'  => 'button',
            ]
        );
        $this->add_render_attribute(
            'enroll',
            [
                'class' => [ 'enroll' ],
                'style' => 'text-align:'.$settings['enroll_align'],
                'role'  => 'button',
            ]
        );
        $this->add_render_attribute(
            'noresults',
            [
                'class' => [ 'noresults' ],
                'style' => 'text-align:'.$settings['noresults_align'],
            ]
        );
        // Render
        sada_yoga()->view( 'elementor.the_events_calendar', [
            'settings'  => &$settings,
            'events'    => tribe_get_events( $events_query ),
            'widget'    => &$this,
        ] );
    }
}