<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor timeline widget.
 *
 * Elementor widget that displays timeline.
 *
 * @since 1.0.0
 */
class WPEA_Elementor_Timeline extends \Elementor\Widget_Base {

    
    public function get_name() {
        return 'wpea_timeline';
    }

    public function get_title() {
        return esc_html__('Wpea Timeline', 'wpea');
    }

    public function get_icon() {
        return 'eicon-time-line';
    }

    public function get_categories() {
        return ['wpea-category'];
    }

    public function get_keywords() {
        return [ 'WPEA', 'Timeline' ];
    }

    public function get_style_depends() {
        return [ 'wpea-css'];
    }

    public function get_custom_help_url() {
        return 'https://www.stallioni.com/';
    }

    protected function register_controls() {
        // Content Start
        $this->start_controls_section(
            'timeline_section',
            [
                'label' => __( 'Timeline', 'wpea' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'year',
            [
                'label' => __( 'Year', 'wpea' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '2018', 'wpea' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'wpea' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Timeline Title', 'wpea' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'wpea' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Timeline description goes here.', 'wpea' ),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'wpea' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'timeline_items',
            [
                'label' => __( 'Timeline Items', 'wpea' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'year' => __( '2018', 'wpea' ),
                        'title' => __( 'Lorem ipsum dolor', 'wpea' ),
                        'description' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.' ),
                    ],
                ],
                'title_field' => '{{{ year }}} - {{{ title }}}',
            ]
        );

        $this->end_controls_section();
        // content End

        // Style Start
        $this->start_controls_section(
            'timeline_style_section',
            [
                'label' => __( 'Timeline Style', 'wpea' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'theme_color',
            [
                'label' => __( 'Choose Theme Color', 'wpea' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    ':root' => '--timeline-theme: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'theme_padding',
            [
                'label' => __( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-item-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'item_gap',
            [
                'label' => esc_html__( 'Item Gap', 'wpea' ),
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
                    '{{WRAPPER}} .wpea-timeline-wrapper .wpea-timeline-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'year_style_section',
            [
                'label' => __( 'Year Style', 'wpea' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'year_color',
            [
                'label' => __( 'Year Color', 'wpea' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-year' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'year_typography',
                'label' => __( 'Year Typography', 'wpea' ),
                'selector' => '{{WRAPPER}} .wpea-timeline-year',
            ]
        );

        $this->add_responsive_control(
            'year_padding',
            [
                'label' => __( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-year' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'year_margin',
            [
                'label' => __( 'Margin', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-year' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __( 'Title Style', 'wpea' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'wpea' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'wpea' ),
                'selector' => '{{WRAPPER}} .wpea-timeline-title',
            ]
        );

        $this->add_responsive_control(
            'title_padding',
            [
                'label' => __( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __( 'Margin', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'description_style_section',
            [
                'label' => __( 'Description Style', 'wpea' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Description Color', 'wpea' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Description Typography', 'wpea' ),
                'selector' => '{{WRAPPER}} .wpea-timeline-content p',
            ]
        );

        $this->add_responsive_control(
            'description_padding',
            [
                'label' => __( 'Padding', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'description_margin',
            [
                'label' => __( 'Margin', 'wpea' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .wpea-timeline-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>

        <div class="wpea-timeline-wrapper">
            <div class="wpea-timeline-inner">
                <div class="wpea-timeline-square"></div>
                <div class="wpea-timeline-item-wrapper">
                    <?php if (!empty($settings['timeline_items'])) : ?>
                        <?php foreach ($settings['timeline_items'] as $item) : ?>
                            <div class="wpea-timeline-item">
                                <div class="wpea-timeline-content">
                                    <h3 class="wpea-timeline-year"><?php echo esc_html($item['year']); ?></h3>
                                    <h3 class="wpea-timeline-title"><?php echo esc_html($item['title']); ?></h3>
                                    <p><?php echo esc_html($item['description']); ?></p>
                                </div>
                                <div class="wpea-timeline-pointer"></div>
                                <div class="wpea-timeline-media">
                                    <?php if (!empty($item['image']['url'])) : ?>
                                        <div>
                                            <img src="<?php echo esc_url($item['image']['url']); ?>" width="200" alt="<?php echo esc_attr($item['title']); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p><?php esc_html_e('No timeline items found.', 'your-text-domain'); ?></p>
                    <?php endif; ?>
                </div>
                <div class="wpea-timeline-square bottom-square"></div>
            </div>
        </div>

    <?php
    }
}
?>