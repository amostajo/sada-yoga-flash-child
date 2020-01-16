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
 * @version 1.0.3
 */
class PostsWidget extends Widget_Base
{
    /**
     * Returns a widget name that will be used in the code.
     * @since 1.0.3
     * 
     * @return string
     */
    public function get_name()
    {
        return 'sada_posts';
    }
    /**
     * Returns the widget title that will be displayed as the widget label.
     * @since 1.0.2
     * 
     * @return string
     */
    public function get_title()
    {
        return __( 'Posts' );
    }
    /**
     * Returns the widget icon. you can use any of the eicon or font-awesome icons,
     * simply return the class name as a string.
     * @since 1.0.3
     * 
     * @return string
     */
    public function get_icon()
    {
        return 'fa fa-th-large';
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
                'label' => __( 'Posts' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'direction',
            [
                'label' => __( 'Direction', 'flash-child' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'row' => [
                        'title' => __( 'Horizontal', 'flash-child' ),
                        'icon' => 'fa fa-arrows-h',
                    ],
                    'column' => [
                        'title' => __( 'Vertical', 'flash-child' ),
                        'icon' => 'fa fa-arrows-v',
                    ],
                ],
                'default' => 'row',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'query',
            [
                'label' => __( 'Query', 'flash-child' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'limit',
            [
                'label' => __( 'Limit', 'flash-child' ),
                'type' => Controls_Manager::NUMBER,
                'description' => __( 'Number of posts to display.', 'flash-child' ),
                'default' => 3,
                'min' => 1,
            ]
        );
        $terms = [];
        foreach ( get_terms( [
            'taxonomy'      => 'category',
            'post_type'     => 'post',
            'hide_empty'    => false,
        ] ) as $term ) {
            $terms[$term->term_id] = $term->name;
        }
        $this->add_control(
            'cat',
            [
                'label' => __( 'Category' ),
                'type' => Controls_Manager::SELECT,
                'options' => array_merge( [
                    '-' => '-None-',
                ], $terms ),
                'default' => '-',
            ]
        );
        $terms = [];
        foreach ( get_terms( [
            'taxonomy'      => 'post_tag',
            'post_type'     => 'post',
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
            'title_link',
            [
                'label' => __( 'Clickable title' ),
                'type' => Controls_Manager::SWITCHER,
                'description' => __( 'Make the title link to the post.', 'flash-child' ),
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'show_image',
            [
                'label' => __( 'Show featured image' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'image_link',
            [
                'label' => __( 'Clickable image' ),
                'type' => Controls_Manager::SWITCHER,
                'description' => __( 'Make the featured image link to the post.', 'flash-child' ),
                'default' => 'yes',
            ]
        );
        $sizes = [];
        foreach ( get_intermediate_image_sizes() as $size ) {
            $sizes[$size] = ucfirst( preg_replace('/[\-\_]/', ' ', $size) );
        }
        $this->add_control(
            'image_size',
            [
                'label' => __( 'Image size' ),
                'description' => sprintf(
                    __( 'Click <a href="%s" target="_blank">here</a> to configure media sizes.', 'flash-child' ),
                    admin_url( '/options-media.php' )
                ),
                'type' => Controls_Manager::SELECT,
                'options' => array_merge( [
                    'post-thumbnail' => 'Post thumbnail',
                ], $sizes ),
                'default' => 'post-thumbnail',
            ]
        );
        $this->add_control(
            'date_format',
            [
                'label' => __( 'Date format', 'flash-child' ),
                'type' => Controls_Manager::TEXT,
                'description' => __( 'PHP <code>date()</code> format.', 'flash-child' ),
                'default' => get_option( 'date_format' ),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'readmore_button_section',
            [
                'label' => __( 'Read more button', 'flash-child' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'readmore_label',
            [
                'label' => __( 'Label' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Read more' ),
            ]
        );
        $this->add_control(
            'show_readmore',
            [
                'label' => __( 'Show' ),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'no',
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
            'results_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .results' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
            'results_align',
            [
                'label' => __( 'Content alignment', 'flash-child' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Start', 'flash-child' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'flash-child' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'End', 'flash-child' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'stretch' => [
                        'title' => __( 'Stretch', 'flash-child' ),
                        'icon' => 'fa fa-arrows-v',
                    ],
                ],
                'default' => 'stretch',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'results_justify',
            [
                'label' => __( 'Content justification', 'flash-child' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __( 'Start', 'elementor' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementor' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'flex-end' => [
                        'title' => __( 'End', 'elementor' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'space-between' => [
                        'title' => __( 'Space between', 'elementor' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                    'space-around' => [
                        'title' => __( 'Space around', 'elementor' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                    'space-evenly' => [
                        'title' => __( 'Space evenly', 'elementor' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => 'space-between',
                'toggle' => true,
            ]
        );
        $this->add_responsive_control(
            'results_wrap',
            [
                'label' => __( 'Wrap results', 'flash-child' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'unset' => [
                        'title' => __( 'Unset', 'flash-child' ),
                        'icon' => 'fa fa-arrows-h',
                    ],
                    'wrap' => [
                        'title' => __( 'Wrap', 'flash-child' ),
                        'icon' => 'fa fa-files-o',
                    ],
                ],
                'desktop_default' => 'unset',
                'tablet_default' => 'wrap',
                'mobile_default' => 'wrap',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .results' => 'flex-wrap: {{VALUE}}',
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
        // POST STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_post',
            [
                'label' => __( 'Post container' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_'.uniqid(),
            [
                'label' => __( 'Container' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_responsive_control(
            'post_width',
            [
                'label' => __( 'Width (%)', 'elementor' ),
                'type' => Controls_Manager::NUMBER,
                'devices' => [ 'tablet', 'mobile' ],
                'selectors' => [
                    '{{WRAPPER}} .post' => 'width: {{VALUE}}%;',
                ]
            ]
        );
        $this->add_control(
            'post_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'post_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'post_'.uniqid(),
            [
                'label' => __( 'Inner wrapper' ),
                'type' => Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'post_bg_color',
                'label' => __( 'Background', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .post .inner-wrapper',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'post_border',
                'label' => __( 'Border', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .post .post .inner-wrapper',
            ]
        );
        $this->add_control(
            'post_inner_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .inner-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // Image STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_image',
            [
                'label' => __( 'Image' ),
                'tab' => Controls_Manager::TAB_STYLE,
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
            'image_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'right' => '0',
                    'isLinked' => true,
                ],
            ]
        );
        $this->add_control(
            'image_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'right' => '0',
                    'isLinked' => true,
                ],
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // TITLE STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_title',
            [
                'label' => __( 'Title' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post .title' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .post .title',
            ]
        );
        $this->add_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .post .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // EXCEPT STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_excerpt',
            [
                'label' => __( 'Excerpt' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'excerpt_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post .excerpt' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'excerpt_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .post .excerpt',
            ]
        );
        $this->add_control(
            'excerpt_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .post .excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'excerpt_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // DATE STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_date',
            [
                'label' => __( 'Date' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'date_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .post .date' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'event_date_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .post .date',
            ]
        );
        $this->add_control(
            'date_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'selectors' => [
                    '{{WRAPPER}} .post .date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'date_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //---------------------------
        //
        // READMORE STYLES
        //
        //---------------------------
        $this->start_controls_section(
            'style_readmore',
            [
                'label' => __( 'Read more button', 'the-events-calendar' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'readmore_bg_color',
                'label' => __( 'Background', 'elementor' ),
                'selector' => '{{WRAPPER}} .post .readmore',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'readmore_hoverbg_color',
                'label' => __( 'Hover', 'elementor' ),
                'selector' => '{{WRAPPER}} .post .readmore:hover',
            ]
        );
        $this->add_control(
            'readmore_color',
            [
                'label' => __( 'Text color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .post .readmore' => 'color: {{VALUE}}',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'readmore_title_typo',
                'label' => __( 'Typography', 'elementor' ),
                'selector' => '{{WRAPPER}} .post .readmore',
            ]
        );
        $this->add_control(
            'readmore_margin',
            [
                'label' => __( 'Margin', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'allowed_dimensions' => 'vertical',
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .post .readmore' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'readmore_padding',
            [
                'label' => __( 'Padding', 'elementor' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .post .readmore' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'readmore_align',
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
                'name' => 'readmore_border',
                'label' => __( 'Border', 'elementor' ),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .post .readmore',
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
        $query = [
            'posts_per_page' => $settings['limit'], 
            'orderby' => 'ID',
            'order' => 'DESC'
        ];
        if ( ! empty( $settings['cat'] ) && $settings['cat'] !== '-' )
            $query['cat'] = $settings['cat'];
        if ( ! empty( $settings['tag'] ) && $settings['tag'] !== '-' )
            $query['tag'] = $settings['tag'];
        // Render settings
        $this->add_render_attribute(
            'wrapper',
            [
                'class' => [ 'wrapper sada-posts-widget', $settings['custom_class'] ],
                'role' => 'posts',
            ]
        );
        $this->add_render_attribute(
            'results',
            [
                'class' => [ 'results' ],
                'style' => implode( '', [
                    'display: flex;',
                    'justify-content: '.$settings['results_justify'].';',
                    'align-items: '.$settings['results_align'].';',
                    'flex-direction: '.$settings['direction'].';',
                ] ),
            ]
        );
        $this->add_render_attribute(
            'post',
            [
                'class' => [ 'post' ],
                'style' => implode( '', [
                    'display: flex;',
                ] ),
            ]
        );
        $this->add_render_attribute(
            'postinner',
            [
                'class' => [ 'inner-wrapper' ],
                'style' => implode( '', [
                    'display: flex;',
                    'flex-direction: column;',
                    'justify-content: space-between;',
                ] ),
            ]
        );
        $this->add_render_attribute(
            'meta',
            [
                'class' => [ 'meta' ],
                'style' => implode( '', [
                    'display: flex;',
                    'justify-content: space-between;',
                    'align-items: center;',
                ] ),
            ]
        );
        $this->add_render_attribute(
            'readmore',
            [
                'class' => [ 'readmore' ],
                'style' => 'text-align:'.$settings['readmore_align'],
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
        $this->add_render_attribute(
            'image',
            [
                'class' => [ 'image' ],
                'style' => implode( '', [
                    'width: 100%;',
                    'height: auto;',
                ] ),
            ]
        );
        // Render
        sada_yoga()->view( 'elementor.sada_posts', [
            'settings'  => &$settings,
            'posts'     => get_posts( $query ),
            'widget'    => &$this,
        ] );
    }
}