<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor testimonail widget.
 *
 * Elementor widget that displays static testimonail quotes.
 *
 * @since 1.0.0
 */
class WPEA_Elementor_Testimonial extends \Elementor\Widget_Base {

    
    public function get_name() {
        return 'wpea_testimonial';
    }

    public function get_title() {
        return esc_html__('Wpea Testimonial', 'wpea');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['wpea-category'];
    }

    public function get_keywords() {
        return [ 'WPEA', 'Slider','Testimonial' ];
    }

    public function get_style_depends() {
        return [ 'wpea-css', 'owlcarousel'];
    }

    public function get_script_depends() {
        return [ 'wpea-owl'];
    }

    public function get_custom_help_url() {
        return 'https://www.stallioni.com/';
    }

    // Add Your Controll In This Function
    protected function register_controls() {

        /*****************************************************************
                        START CONTENT SECTION
        ******************************************************************/

        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Content', 'wpea' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'slide_background_color',
            [
                'label'   => esc_html__( 'Background Color', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} blockquote' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} {{CURRENT_ITEM}} blockquote::after' => 'border-color: {{VALUE}} transparent transparent'
                ],
            ]
        );

        $repeater->add_control(
            'slide_image',
            [
                'label'   => esc_html__( 'Choose Image', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' =>    \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'slide_name',
            [
                'label'     => esc_html__( 'Name', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   =>  esc_html__( 'John Doe', 'wpea' ),
            ]
        );

        $repeater->add_control(
            'slide_designation',
            [
                'label'     => esc_html__( 'Designation', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   =>  esc_html__( 'CEO & Co-Founder', 'wpea' ),
            ]
        );

        $repeater->add_control(
            'slide_rating',
            [
                'label'     => esc_html__( 'Rating', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    '1' => '★',
                    '2' => '★★',
                    '3' => '★★★',
                    '4' => '★★★★',
                    '5' => '★★★★★',
                ],
                'default'   => '5',
            ]
        );

        $repeater->add_control(
            'slide_description',
            [
                'label'     => esc_html__( 'Review', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => esc_html__( '"I have had the pleasure of working with a lawyer of the law firm who is knowledgeable, responsive, and easy to communicate with. I would recommend him"', 'wpea' ),
            ]
        );

        $this->add_control(
            'slides',
            [
                'label'     => esc_html__( 'Slides', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default' => [
                    [
                        'slide_name'        => esc_html__( 'Brooklyn Simmons', 'wpea' ),
                        'slide_description' => esc_html__( 'I have had the pleasure of working with a lawyer of the law firm who is knowledgeable, responsive, and easy to communicate with. I would recommend him.', 'wpea' ),
                    ],
                    [
                        'list_title' => esc_html__( 'Cameron Williamson', 'wpea' ),
                        'list_content' => esc_html__( 'I have had the pleasure of working with a lawyer of the law firm who is knowledgeable, responsive, and easy to communicate with. I would recommend him.', 'wpea' ),
                    ],
                ],
                'title_field' => '{{{ slide_name }}}',
            ]
        );
            
        $this->end_controls_section();

        /****************************  END CONTENT SECTION *********************/

        /*****************************************************************
                        START SECTION SLIDER SETTINGS
        ******************************************************************/

        $this->start_controls_section(
            'section_additional_options',
            [
                'label' => esc_html__( 'Slider Settings', 'wpea' ),
            ]
        );

        $this->add_control(
            'margin_items',
            [
                'label'   => esc_html__( 'Margin Right Items', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 10,
            ]
            
        );

        $this->add_control(
            'display_item_desktop',
            [
                'label'       => esc_html__( 'Display Items (Desktop)', 'wpea' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'description' => esc_html__( 'Set how many slides are scrolled per swipe on Desktop.', 'wpea' ),
                'default'     => 3,
            ]
        );

        $this->add_control(
            'display_item_tab',
            [
                'label'       => esc_html__( 'Display Items (Tablet)', 'wpea' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'description' => esc_html__( 'Set how many slides are scrolled per swipe on Tablet.', 'wpea' ),
                'default'     => 2,
            ]
        );

        $this->add_control(
            'display_item_mobile',
            [
                'label'       => esc_html__( 'Display Items (Mobile)', 'wpea' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'description' => esc_html__( 'Set how many slides are scrolled per swipe on Mobile.', 'wpea' ),
                'default'     => 1,
            ]
        );

        $this->add_control(
            'pause_on_hover',
            [
                'label'   => esc_html__( 'Pause on Hover', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'wpea' ),
                    'no'  => esc_html__( 'No', 'wpea' ),
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'infinite',
            [
                'label'   => esc_html__( 'Infinite Loop', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__( 'If the product count is less than the display items (desktop), turn off this option.', 'wpea' ),
                'options' => [
                    'yes' => esc_html__( 'Yes', 'wpea' ),
                    'no'  => esc_html__( 'No', 'wpea' ),
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label'   => esc_html__( 'Autoplay', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'wpea' ),
                    'no'  => esc_html__( 'No', 'wpea' ),
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label'     => esc_html__( 'Autoplay Speed', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'default'   => 3000,
                'step'      => 500,
                'condition' => [
                    'autoplay' => 'yes',
                ],
                'frontend_available' => false,
            ]
        );

        $this->add_control(
            'smartspeed',
            [
                'label'   => esc_html__( 'Smart Speed', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 500,
            ]
        );
  
        $this->add_control(
            'navText_control',
            [
                'label'   => esc_html__( 'Show Nav', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'wpea' ),
                    'no'  => esc_html__( 'No', 'wpea' ),
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'navDot_control',
            [
                'label'   => esc_html__( 'Show Dot', 'wpea' ),
                'type'    => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'wpea' ),
                    'no'  => esc_html__( 'No', 'wpea' ),
                ],
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();

        /****************************  END SLIDER SETTINGS SECTION *********************/
        /*****************************************************************
                                    START STYLE SECTION
        ******************************************************************/

        // Name
        $this->start_controls_section(
            'section_name',
            [
                'label' => esc_html__( 'Name', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'name_typography',
                'selector' => '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-name',
            ]
        );

        $this->add_control(
            'name_color',
            [
                'label'     => esc_html__( 'Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-name' => 'color : {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_padding',
            [
                'label'      => esc_html__( 'Padding', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'name_margin',
            [
                'label'      => esc_html__( 'Margin', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Designation
        $this->start_controls_section(
            'section_designation',
            [
                'label' => esc_html__( 'Designation', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'designation_typography',
                'selector' => '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-designation',
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label'     => esc_html__( 'Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-designation' => 'color : {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'designation_padding',
            [
                'label'      => esc_html__( 'Padding', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'designation_margin',
            [
                'label'      => esc_html__( 'Margin', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-author-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Description
        $this->start_controls_section(
            'section_description',
            [
                'label' => esc_html__( 'Description', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'selector' => '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text q',
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => esc_html__( 'Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text q' => 'color : {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_bg_color',
            [
                'label'     => esc_html__( 'Background Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text blockquote' => 'background : {{VALUE}};',
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text blockquote::after' => 'border-color : {{VALUE}} transparent transparent;'
                ],
            ]
        );

        $this->add_responsive_control(
            'description_padding',
            [
                'label'      => esc_html__( 'Padding', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text blockquote' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_margin',
            [
                'label'      => esc_html__( 'Margin', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text blockquote' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_des_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .wpea-testimonial-text blockquote' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Image
        $this->start_controls_section(
        'section_image_controls',
            [
                'label' => esc_html__( 'Image', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'section_image_width',
            [
                'label' => esc_html__( 'Width', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-author-pic img' => 'width: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_image_height',
            [
                'label' => esc_html__( 'Height', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-author-pic img' => 'height: {{SIZE}}{{UNIT}} !important',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_image_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-testimonial-author-pic img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Nav Style
        $this->start_controls_section(
            'section_nav',
            [
                'label' => esc_html__( 'Nav Control', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'navText_control' => 'yes',
                ]
            ]
        );
            
        $this->start_controls_tabs( 'tabs_nav_style' );

        $this->start_controls_tab(
            'tab_nav_normal',
            [
                'label' => esc_html__( 'Normal', 'wpea' ),
            ]
        );
                            
        $this->add_control(
            'nav_color_normal',
            [
                'label'     => esc_html__( 'Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-prev svg' => 'fill : {{VALUE}} !important;',
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-next svg' => 'fill : {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'nav_background_normal',
            [
                'label'     => esc_html__( 'Background Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-prev' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-next' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );
                  
        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_nav_hover',
            [
                'label' => esc_html__( 'Hover', 'wpea' ),
            ]
        );

        $this->add_control(
            'nav_color_hover',
            [
                'label'     => esc_html__( 'Color Hover', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-prev:hover svg' => 'fill : {{VALUE}} !important;',
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-next:hover svg' => 'fill : {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'nav_background_hover',
            [
                'label'     => esc_html__( 'Background Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-prev:hover' => 'background-color: {{VALUE}} !important;',
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-next:hover' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // Dot Style
        $this->start_controls_section(
            'dots_style',
            [
                'label' => esc_html__( 'Dots', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'navDot_control' => 'yes',
                ]
            ]
        );

        $this->start_controls_tabs( 'tabs_dots_style' );
                
        $this->start_controls_tab(
            'tab_dots_normal',
            [
                'label' => esc_html__( 'Normal', 'wpea' ),
            ]
        );

        $this->add_control(
            'dots_color',
            [
                'label'     => esc_html__( 'Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot' => 'background-color : {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_width',
            [
                'label'     => esc_html__( 'Width', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units'    => [ 'px' ],
                'default'       =>[
                    'size' => 10,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_height',
            [
                'label'     => esc_html__( 'Height', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units'    => [ 'px' ],
                'default'       =>[
                    'size' => 10,
                ],
                'selectors'     => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dots_border_radius',
            [
                'label'         => esc_html__( 'Border Radius', 'wpea' ),
                'type'          => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%' ],
                'selectors'     => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_dots_active',
            [
                'label' => esc_html__( 'Active', 'wpea' ),
            ]
        );

        $this->add_control(
            'dots_active_color',
            [
                'label'     => esc_html__( 'Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot.active' => 'background-color : {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_width_active',
            [
                'label'     => esc_html__( 'Width', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units'    => [ 'px' ],
                'selectors'     => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot.active' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_height_active',
            [
                'label'     => esc_html__( 'Height', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units'    => [ 'px' ],
                'selectors'     => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot.active' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'dots_border_radius_active',
            [
                'label'         => esc_html__( 'Border Radius', 'wpea' ),
                'type'          => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%' ],
                'selectors'     => [
                    '{{WRAPPER}} .wpea-testimonial-elementor .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        /****************************  END STYLE SECTION *********************/
    }

    // Render Template Here
    protected function render() {
        $settings = $this->get_settings();
        $tab_item = $settings['slides'];

        // Initialize data options from settings
        $data_options = [
            'displayItemDesktop' => $settings['display_item_desktop'],
            'displayItemTab' => $settings['display_item_tab'],
            'displayItemMobile' => $settings['display_item_mobile'],
            'margin' => $settings['margin_items'],
            'autoplayHoverPause' => $settings['pause_on_hover'] === 'yes',
            'loop' => $settings['infinite'] === 'yes',
            'autoplay' => $settings['autoplay'] === 'yes',
            'autoplayTimeout' => $settings['autoplay_speed'],
            'smartSpeed' => $settings['smartspeed'],
            'nav' => $settings['navText_control'] === 'yes',
            'dot' => $settings['navDot_control'] === 'yes',
        ];
        ?>

        <div class="wpea-testimonial-elementor">
            <div class="wpea-testimonial-slider owl-carousel owl-theme" data-options="<?php echo esc_attr(json_encode($data_options)); ?>">
                <?php 
                // Check if tab items are available
                if (!empty($tab_item)) : 
                    foreach ($tab_item as $index => $items) :
                        // Extract item data
                        $img_url = $items['slide_image']['url'];
                        $img_alt = !empty($items['slide_image']['alt']) ? $items['slide_image']['alt'] : $items['slide_name'];
                        $name = $items['slide_name'];
                        $description = $items['slide_description'];
                        $designation = $items['slide_designation'];
                        $rating = intval($items['slide_rating']);
                ?>
                    <div class="item elementor-repeater-item-<?php echo esc_attr($items['_id']); ?>">
                        <?php if (!empty($description)) : ?>
                            <div class="wpea-testimonial-text">
                                <blockquote>
                                    <q><?php echo esc_html($description); ?></q>
                                </blockquote>
                            </div>
                        <?php endif; ?>
                        <div class="wpea-testimonial-author-wrapper <?php echo !empty($img_url) ? 'wpea-testimonial-has-image' : ''; ?>">
                            <div class="wpea-testimonial-author-inner">
                                <?php if (!empty($img_url)) : ?>
                                    <div class="wpea-testimonial-author-pic">
                                        <img src="<?php echo esc_url($img_url); ?>" width="77" height="77" alt="<?php echo esc_attr($img_alt); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="wpea-testimonial-author-meta">
                                    <?php if (!empty($name)) : ?>
                                        <p class="wpea-testimonial-author-name"><?php echo esc_html($name); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($designation)) : ?>
                                        <p class="wpea-testimonial-author-designation"><?php echo esc_html($designation); ?></p>
                                    <?php endif; ?>
                                    <div class="wpea-testimonial-author-star">
                                        <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            $star_class = $i <= $rating ? 'star-checked' : '';
                                            echo '<svg class="' . esc_attr($star_class) . '" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach; 
                endif; 
                ?>
            </div>
        </div>

        <script>
            (function ($) {
                $(document).ready(function() {
                    $(".wpea-testimonial-slider").each(function() {
                        var owlsl = $(this);
                        var owlsl_ops = owlsl.data('options') ? owlsl.data('options') : {};

                        var responsive_value = {
                            0: {
                                items: owlsl_ops.displayItemMobile,
                                nav: false,
                                margin: 10
                            },
                            767: {
                                items: owlsl_ops.displayItemTab,
                                margin: 10
                            },
                            991: {
                                items: owlsl_ops.displayItemDesktop
                            }
                        };

                        owlsl.owlCarousel({
                            margin: owlsl_ops.margin,
                            items: owlsl_ops.displayItemDesktop,
                            autoHeight: true,
                            loop: owlsl_ops.loop,
                            autoplay: owlsl_ops.autoplay,
                            autoplayTimeout: owlsl_ops.autoplayTimeout,
                            nav: owlsl_ops.nav,
                            dots: owlsl_ops.dot,
                            autoplayHoverPause: owlsl_ops.autoplayHoverPause,
                            smartSpeed: owlsl_ops.smartSpeed,
                            responsive: responsive_value,
                            navText: [
                                '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>'
                            ],
                        });

                        // Fixed WCAG
                        owlsl.find(".owl-nav button.owl-prev").attr("title", "Previous");
                        owlsl.find(".owl-nav button.owl-next").attr("title", "Next");
                    });
                });
            })(jQuery);
        </script>
        <?php
    }
}
