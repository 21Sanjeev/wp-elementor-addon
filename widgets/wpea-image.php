<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Image widget.
 *
 * Elementor widget that displays two images.
 *
 * @since 1.0.0
 */
class WPEA_Elementor_Image extends \Elementor\Widget_Base {
	public function get_name() {
        return 'wpea_image';
    }

    public function get_title() {
        return esc_html__('Wpea Image', 'wpea');
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return ['wpea-category'];
    }

    public function get_keywords() {
        return [ 'WPEA', 'Image' ];
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
                'label' => esc_html__( 'Content', 'wpea' ),
            ]
        );

    	$this->add_control(
            'image_1',
            [
                'label' => __( 'Choose First Image', 'wpea' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_one_alt',
            [
                'label' => __('Alt Text', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'image_2',
            [
                'label' => __( 'Choose Second Image', 'wpea' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'image_two_alt',
            [
                'label' => __('Alt Text', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
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

        $this->start_controls_tabs( 'tabs_nav_style' );

        $this->start_controls_tab(
            'tab_image_1',
            [
                'label' => esc_html__( 'First Image Style', 'wpea' ),
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label' => __( 'Width', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-one' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'max_width',
            [
                'label' => __( 'Max Width', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-one' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => __( 'Height', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-one' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-one' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_img_1',
				'selector' => '{{WRAPPER}} .wpea-image-wrapper .wpea-img-one',
			]
		);

        $this->end_controls_tab();
        $this->start_controls_tab(
            'tab_image_2',
            [
                'label' => esc_html__( 'Second Image Style', 'wpea' ),
            ]
        );

        $this->add_responsive_control(
            'image_width_two',
            [
                'label' => __( 'Width', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-two' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'max_width_two',
            [
                'label' => __( 'Max Width', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-two' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_height_two',
            [
                'label' => __( 'Height', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-two' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'border_radius_two',
            [
                'label' => __( 'Border Radius', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-wrapper .wpea-img-two' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_img_2',
				'selector' => '{{WRAPPER}} .wpea-image-wrapper .wpea-img-two',
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
        // End style section
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
    	<div class="wpea-image-wrapper">
    		<div class="wpea-image-inner">
            <?php
		        // Render first image
		        if ( $settings['image_1']['url'] ) {
		            echo '<img class="wpea-img-one" src="' . esc_url( $settings['image_1']['url'] ) . '" alt="' . esc_attr($settings['image_one_alt']) . '">';
		        }

		        // Render second image
		        if ( $settings['image_2']['url'] ) {
		            echo '<img class="wpea-img-two" src="' . esc_url( $settings['image_2']['url'] ) . '" alt="' . esc_attr($settings['image_two_alt']) . '">';
		        }
	        ?>
		    </div>
		</div>
        <?php
    }
}
?>