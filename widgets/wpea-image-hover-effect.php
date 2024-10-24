<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor image hover widget.
 *
 * Elementor widget.
 *
 * @since 1.0.0
 */
class WPEA_Elementor_Image_Effect extends \Elementor\Widget_Base {

	public function get_name() {
        return 'wpea_image_effect';
    }

    public function get_title() {
        return esc_html__('Wpea Image Effects', 'wpea');
    }

    public function get_icon() {
        return 'eicon-image-rollover';
    }

    public function get_categories() {
        return ['wpea-category'];
    }

    public function get_keywords() {
		return [ 'WPEA', 'Image','wpea','Image hover' ];
    }

    public function get_style_depends() {
        return [ 'wpea-css', 'owlcarousel'];
    }

	public function get_custom_help_url() {
        return 'https://www.stallioni.com/';
    }

    protected function _register_controls() {
    	 // Image control
        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Content', 'wpea'),
            ]
        );

        $this->add_control(
            'style_varient',
            [
                'label' => esc_html__( 'Select Style', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one' => esc_html__( 'Style One', 'wpea' ),
                    'two' => esc_html__( 'Style Two', 'wpea' ),
                    'three' => esc_html__( 'Style Three', 'wpea' ),
                    'four' => esc_html__( 'Style Four', 'wpea' )
                ],
            ]
        );

        $this->add_control(
            'color_theme',
            [
                'label' => esc_html__( 'Select Color Theme', 'wpea' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'default_theme',
                'options' => [
                    'default_theme' => esc_html__( 'Default Theme', 'wpea' ),
                    'custom_theme' => esc_html__( 'Custom Theme', 'wpea' ),
                    'no_color_theme' => esc_html__( 'No Color Theme', 'wpea' ),
                ],
                'condition' => [
                    'style_varient' => 'three'
                ],
            ]
        );

        $this->add_control(
            'color_theme_1',
            [
                'label' => __('Color One', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-text-gradient' => '--wpea-theme-color-one: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'custom_theme'
                ],
            ]
        );

        $this->add_control(
            'color_theme_2',
            [
                'label' => __('Color Two', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-text-gradient' => '--wpea-theme-color-two: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'custom_theme'
                ],
            ]
        );

        $this->add_control(
            'color_theme_3',
            [
                'label' => __('Color Three', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-text-gradient' => '--wpea-theme-color-three: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'custom_theme'
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Image', 'wpea'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'title',
            [
                'label' => __('Title', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Your Title', 'wpea'),
                'placeholder' => __('Type your title here', 'wpea'),
                'condition' => [
                    'style_varient' => ['one','three','four'],
                ],
            ]
        );

        $this->add_control(
            'title_style_2',
            [
                'label' => __('Title (First Part)', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Your Title', 'wpea'),
                'placeholder' => __('Type your title here', 'wpea'),
                'condition' => [
                    'style_varient' => 'two',
                ],
            ]
        );

        $this->add_control(
            'title_style_2_middle',
            [
                'label' => __('Title (Middle Part)', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('is', 'wpea'),
                'placeholder' => __('Type your title here', 'wpea'),
                'condition' => [
                    'style_varient' => 'two',
                ],
            ]
        );

        $this->add_control(
            'title_style_2_last',
            [
                'label' => __('Title (Last Part)', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('here', 'wpea'),
                'placeholder' => __('Type your title here', 'wpea'),
                'condition' => [
                    'style_varient' => 'two',
                ],
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => __('Link', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('#', 'wpea'),
                'placeholder' => __('Type your url here', 'wpea'),
                'condition' => [
                    'style_varient' => ['one','two','three'],
                ],
            ]
        );

        $this->add_control(
            'btn-text',
            [
                'label' => __('Button Text', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore', 'wpea'),
                'placeholder' => __('Type your button text', 'wpea'),
                'condition' => [
                    'style_varient' => 'three',
                ],
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __('Content', 'wpea'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Lorem ipsum dolor sit amet. Ut dicta dolorem id excepturi autem hic quidem cupiditate.', 'wpea'),
                'placeholder' => __('Type your content here', 'wpea'),
            ]
        );

        $this->end_controls_section();

        // Style
        $this->start_controls_section(
            'style_section',
            [
                'label' => __('Style Settings', 'wpea'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'wrapper_max_width',
			[
				'label' => esc_html__( 'Max Width', 'wpea' ),
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
					'{{WRAPPER}} .wpea-image-effect-one-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'style_varient' => ['one','two','three'],
                ],
			]
		);

		$this->add_responsive_control(
			'wrapper_max_height',
			[
				'label' => esc_html__( 'Max Height', 'wpea' ),
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
					'{{WRAPPER}} .wpea-image-effect-one-wrapper' => 'max-height: calc({{SIZE}}{{UNIT}} - 30px);',
                    '{{WRAPPER}} .wpea-image-effect-three-wrapper img' => 'max-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-container' => 'max-height: {{SIZE}}{{UNIT}};'
				],
                'condition' => [
                    'style_varient' => ['one','three','four'],
                ],
			]
		);

        $this->add_responsive_control(
            'wrapper_min_height',
            [
                'label' => esc_html__( 'Min Height', 'wpea' ),
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
                    '{{WRAPPER}} .wpea-image-effect-three-wrapper img' => 'min-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-wrapper img' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'style_varient' => ['three','four'],
                ],
            ]
        );

        $this->add_group_control(
		    \Elementor\Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'wrapper_box_shadow',
		        'selector' => '{{WRAPPER}} .wpea-image-effect-one-wrapper',
                'condition' => [
                    'style_varient' => 'one',
                ],
		    ]
		);

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'wrapper_border',
                'selector' => '{{WRAPPER}} .wpea-image-effect-one-wrapper',
                'condition' => [
                    'style_varient' => 'one',
                ],
            ]
        );

        $this->add_control(
            'wrapper_background_color',
            [
                'label' => __('Background Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-wrapper' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-two-wrapper' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-four-container::after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => ['one', 'two','four'],
                ],
            ]
        );

        $this->add_responsive_control(
            'container_padding',
            [
                'label' => esc_html__( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-two-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style_varient' => ['two', 'three','four'],
                ],
            ]
        );

        $this->add_responsive_control(
            'content_wrapper_translateY',
            [
                'label' => esc_html__( 'Content TranslateY', 'wpea' ),
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
                    '{{WRAPPER}} .wpea-image-effect-three-content-wrapper' => 'transform: translateY({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'style_varient' => 'three',
                ],
            ]
        );

        $this->add_responsive_control(
            'container_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'wpea' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .wpea-image-effect-three-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'style_varient' => 'three',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title Style', 'wpea'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .wpea-image-effect-one-title, {{WRAPPER}} .wpea-image-effect-two-title,{{WRAPPER}} .wpea-image-effect-three-title,{{WRAPPER}} .wpea-image-effect-four-title',
			]
		);

        $this->add_control(
            'title_text_color',
            [
                'label' => __('Title Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-two-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-four-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient'=> ['one', 'two','four'],
                ],
            ]
        );

        $this->add_control(
            'title_text_color_theme',
            [
                'label' => __('Title Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient'=> 'three',
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->add_control(
            'title_text_color_theme_underline',
            [
                'label' => __('Underline Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-title::after' => 'background: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient'=> 'three',
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography_middle',
                'label' => __('Title Typography (Middle Part)', 'wpea'),
                'selector' => '{{WRAPPER}} .wpea-image-effect-two-title span',
                'condition' => [
                    'style_varient' => 'two',
                ],
            ]
        );

        $this->add_control(
            'title_text_middle_color',
            [
                'label' => __('Title Color (Middle Part)', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-two-title span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'two',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_text_align',
            [
                'label' => __('Text Align', 'wpea'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'wpea'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'wpea'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'wpea'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-title' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'one',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_style_section',
            [
                'label' => __('Content Style', 'wpea'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .wpea-image-effect-one-content,{{WRAPPER}} .wpea-image-effect-two-content,{{WRAPPER}} .wpea-image-effect-three-content,{{WRAPPER}} .wpea-image-effect-four-content',
			]
		);

        $this->add_control(
            'content_text_color',
            [
                'label' => __('Text Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-two-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-three-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .wpea-image-effect-four-content' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => esc_html__( 'Margin', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-four-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_text_align',
            [
                'label' => __('Text Align', 'wpea'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'wpea'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'wpea'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'wpea'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-one-content' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'one',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'btn_style_section',
            [
                'label' => __('Button Style', 'wpea'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'style_varient' => 'three',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .wpea-image-effect-three-btn',
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        // Normal state
        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'wpea'),
                'condition' => [
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->add_control(
            'btn_text_color',
            [
                'label' => __('Text Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-btn span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->add_control(
            'btn_border_color',
            [
                'label' => __('Border Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-btn' => 'background: linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) bottom right / 30px 2px, linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) bottom right / 2px 25px, linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) top left / 30px 2px, linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) top left / 2px 25px; background-repeat: no-repeat;',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->end_controls_tab(); // End Normal tab

        // Hover state
        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'wpea'),
                'condition' => [
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->add_control(
            'btn_text_hover_color',
            [
                'label' => __('Text Hover Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-btn:hover span' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->add_control(
            'btn_border_hover_color',
            [
                'label' => __('Border Hover Color', 'wpea'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-btn:hover' => 'background: linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) bottom right / 100% 2px, linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) bottom right / 2px 100%, linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) top left / 100% 2px, linear-gradient({{VALUE}},{{VALUE}},{{VALUE}}) top left / 2px 100% !important;
                    background-repeat: no-repeat !important;',
                ],
                'condition' => [
                    'style_varient' => 'three',
                    'color_theme' => 'no_color_theme',
                ],
            ]
        );

        $this->end_controls_tab(); // End Hover tab

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label' => esc_html__( 'Margin', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-image-effect-three-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-two-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .wpea-image-effect-three-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    
    protected function render() {
        $settings = $this->get_settings_for_display();

        // Determine if URL is set
        $has_url = !empty($settings['url']);

        // Function to render the title and content
        $render_title_and_content = function($style_variant, $has_url) use ($settings) {
            $output = '<div class="wpea-image-effect-' . esc_attr($style_variant) . '-content-wrapper">';
            
            // Title rendering
            if ($style_variant === 'two' && $settings['title_style_2']) {
                $output .= '<h2 class="wpea-image-effect-' . esc_attr($style_variant) . '-title">';
                $output .= esc_html($settings['title_style_2']);
                if (!empty($settings['title_style_2_middle'])) {
                    $output .= ' <span>' . esc_html($settings['title_style_2_middle']) . '</span>';
                }
                if (!empty($settings['title_style_2_last'])) {
                    $output .= ' ' . esc_html($settings['title_style_2_last']);
                }
                $output .= '</h2>';
            } else if ($settings['title']) {
                $output .= '<h2 class="wpea-image-effect-' . esc_attr($style_variant) . '-title ' . (($settings['color_theme'] != 'no_color_theme') ? 'wpea-text-gradient' : '') . '">';
                $output .= esc_html($settings['title']);
                $output .= '</h2>';
            }

            // Content rendering
            if ($settings['content']) {
                $output .= '<p class="wpea-image-effect-' . esc_attr($style_variant) . '-content">' . wp_kses_post($settings['content']) . '</p>';
            }

            // Button rendering for style variant three
            if ($has_url && $style_variant === 'three') {
                $output .= '<a class="wpea-image-effect-three-btn ' . (($settings['color_theme'] != 'no_color_theme') ? 'wpea-text-gradient' : '') . '" href="' . esc_url($settings['url']) . '">';
                $output .= '<span>' . esc_html($settings['btn-text']) . '</span>';
                $output .= '</a>';
            }

            $output .= '</div>'; // End content wrapper
            return $output;
        };

        // Styles 1 and 2
        if ($settings['style_varient'] === 'one' || $settings['style_varient'] === 'two') {
            $wrapper_tag = $has_url ? 'a' : 'div';
            $wrapper_classes = 'wpea-image-effect-' . esc_attr($settings['style_varient']) . '-wrapper';

            echo '<' . $wrapper_tag . ' class="' . $wrapper_classes . ($has_url ? '" href="' . esc_url($settings['url']) : '') . '">';
            
            // Image rendering
            if ($settings['image']['url']) {
                echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title']) . '">';
            }

            // Content rendering
            echo $render_title_and_content($settings['style_varient'], $has_url);
            echo '</' . $wrapper_tag . '>';
        }

        // Style 3
        if ($settings['style_varient'] === 'three') {
            echo '<div class="wpea-image-effect-three-container">';
            echo '<div class="wpea-image-effect-three-wrapper">';

            if ($settings['image']['url']) {
                echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title']) . '">';
            }

            echo $render_title_and_content('three', $has_url);
            echo '</div></div>';
        }

        // Style 4
        if ($settings['style_varient'] === 'four') {
            echo '<div class="wpea-image-effect-four-container">';
            echo '<div class="wpea-image-effect-four-wrapper">';

            if ($settings['image']['url']) {
                echo '<img src="' . esc_url($settings['image']['url']) . '" alt="' . esc_attr($settings['title']) . '">';
            }

            echo $render_title_and_content('four', $has_url);
            echo '</div></div>';

            // Enqueue script for dynamic margin adjustment
            add_action('wp_footer', function() {
                ?>
                <script>
                    (function ($) {
                        $(".wpea-image-effect-four-content").each(function() {
                            var wpeaContentHeight = $(this).height();
                            $(this).siblings(".wpea-image-effect-four-title").css("margin-top", wpeaContentHeight);
                        });
                    })(jQuery);
                </script>
                <?php
            });
        }
    }
}
?>