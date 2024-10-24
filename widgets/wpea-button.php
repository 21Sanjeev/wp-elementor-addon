<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Button Widget.
 *
 * Elementor widget that displays button.
 *
 * @since 1.0.0
 */
class WPEA_Elementor_Button extends \Elementor\Widget_Base {
	public function get_name() {
        return 'wpea_btn';
    }

    public function get_title() {
        return esc_html__('Wpea Button', 'wpea');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['wpea-category'];
    }

    public function get_keywords() {
        return [ 'WPEA', 'Button' ];
    }

    public function get_style_depends() {
        return [ 'wpea-css'];
    }

    public function get_custom_help_url() {
        return 'https://www.stallioni.com/';
    }
    // Add Your Controll In This Function
    protected function register_controls() {
    	// Start content section
    	$this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__( 'Button', 'wpea' ),
            ]
        );

        $this->add_control(
            'style_varient',
            [
                'label' => esc_html__( 'Select Style', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__( 'Style 1', 'wpea' ),
                    '2' => esc_html__( 'Style 2', 'wpea' ),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Button Text', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Click Here', 'wpea'),
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'wpea' ),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );

    	$this->end_controls_section();
        // End content section

        // Start style section
        $this->start_controls_section(
            'section_additional_options',
            [
                'label' => esc_html__( 'Style', 'wpea' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typography',
                'label'    => esc_html__( 'Typography', 'wpea' ),
                'selector' => '{{WRAPPER}} .wpea-btn-wrapper',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__( 'Padding', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-btn-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__( 'Margin', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-btn-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box2_style_transform',
            [
                'label' => esc_html__( 'Transform', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'condition' => [
                    'style_varient' => '1',
                ],
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
                    '{{WRAPPER}} .wpea-btn-style-1 .wpea-btn-inner' => '--wpea-btn-translate-x: {{SIZE}}{{UNIT}};  --wpea-btn-translate-y: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'border-width-style2',
            [
                'label' => esc_html__( 'Border Width', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'condition' => [
                    'style_varient' => '2',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 5,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-style-2::after, {{WRAPPER}} .wpea-btn-style-2::before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-btn-style-2 .wpea-btn-text::after, {{WRAPPER}} .wpea-btn-style-2 .wpea-btn-text::before' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'button_normal',
            [
                'label' => esc_html__( 'Normal', 'wpea' ),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-wrapper' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-btn-style-2 .wpea-btn-text' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'button_background_style_1',
            [
                'label'     => esc_html__( 'Background Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-wrapper .wpea-btn-inner-two' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .wpea-btn-style-2' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'button_border_color_2',
            [
                'label'     => esc_html__( 'Border Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-style-2::after,
                    {{WRAPPER}} .wpea-btn-style-2::before,
                    {{WRAPPER}} .wpea-btn-style-2 .wpea-btn-text::after,
                    {{WRAPPER}} .wpea-btn-style-2 .wpea-btn-text::before' => 'Background: {{VALUE}};'
                ],
                'condition' => [
                    'style_varient' => '2',
                ],
            ]
        );

        $this->add_control(
            'button_background_style_1_box_2',
            [
                'label'     => esc_html__( 'Box Two Background Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-wrapper .wpea-btn-inner' => 'Background: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => '1',
                ],
            ]
        );

        // $this->add_responsive_control(
        //     'button_border_radius',
        //     [
        //         'label'      => esc_html__( 'Border Radius', 'wpea' ),
        //         'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%' ],
        //         'selectors'  => [
        //             '{{WRAPPER}} .wpea-btn-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_style_1',
                'label'    => esc_html__( 'Border', 'wpea' ),
                'selector' => '{{WRAPPER}} .wpea-btn-wrapper .wpea-btn-inner-two',
                'condition' => [
                    'style_varient' => '1',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => esc_html__( 'Hover', 'wpea' ),
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-wrapper:hover' => 'color: {{VALUE}} !important;',
                    '{{WRAPPER}} .wpea-btn-style-2:hover .wpea-btn-text' => 'color: {{VALUE}} !important;'
                ],
            ]
        );

        $this->add_control(
            'button_background_style_1_hover',
            [
                'label'     => esc_html__( 'Background Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-wrapper:hover .wpea-btn-inner-two' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .wpea-btn-style-2:hover' => 'background: {{VALUE}};'
                ],
            ]
        );

        $this->add_control(
            'button_border_color_2_hover',
            [
                'label'     => esc_html__( 'Border Color', 'wpea' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-btn-style-2:hover::after,
                    {{WRAPPER}} .wpea-btn-style-2:hover::before,
                    {{WRAPPER}} .wpea-btn-style-2:hover .wpea-btn-text::after,
                    {{WRAPPER}} .wpea-btn-style-2:hover .wpea-btn-text::before' => 'Background: {{VALUE}};'
                ],
                'condition' => [
                    'style_varient' => '2',
                ],
            ]
        );

        // $this->add_responsive_control(
        //     'button_hover_border_radius',
        //     [
        //         'label'      => esc_html__( 'Border Radius', 'wpea' ),
        //         'type'       => \Elementor\Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%' ],
        //         'selectors'  => [
        //             '{{WRAPPER}} .wpea-btn-wrapper:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_style_1_hover',
                'label'    => esc_html__( 'Border', 'wpea' ),
                'selector' => '{{WRAPPER}} .wpea-btn-wrapper:hover .wpea-btn-inner-two',
                'condition' => [
                    'style_varient' => '1',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        

        $this->end_controls_section();
        // End style section
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';

        if ($settings['style_varient'] == "1") {
            if (!empty($settings['link']['url'])) {
                echo '<a href="' . esc_url($settings['link']['url']) . '" class="wpea-btn-wrapper wpea-btn-style-' . esc_html($settings['style_varient']) . '"' . $target . $nofollow . '>';
                ?>
                <span class="wpea-btn-inner"></span>
                <span class="wpea-btn-inner-two"></span>
                <span class="wpea-btn-text"><?php echo esc_html__( $settings['title'], 'wpea' ); ?></span>
                </a>
                <?php
            } else {
                ?>
                <button class="wpea-btn-wrapper wpea-btn-style-1">
                    <span class="wpea-btn-inner"></span>
                    <span class="wpea-btn-inner-two"></span>
                    <span class="wpea-btn-text"><?php echo esc_html__( $settings['title'], 'wpea' ); ?></span>
                </button>
                <?php
            }
        } elseif ($settings['style_varient'] == "2") {
            if (!empty($settings['link']['url'])) {
                echo '<a href="' . esc_url($settings['link']['url']) . '" class="wpea-btn-wrapper wpea-btn-style-' . esc_html($settings['style_varient']) . '"' . $target . $nofollow . '>';
                ?>
                <span class="wpea-btn-text"><?php echo esc_html__( $settings['title'], 'wpea' ); ?></span>
                </a>
                <?php
            } else {
                ?>
                <button class="wpea-btn-wrapper wpea-btn-style-2">
                    <span class="wpea-btn-text"><?php echo esc_html__( $settings['title'], 'wpea' ); ?></span>
                </button>
                <?php
            }
        }
    }
}
?>
