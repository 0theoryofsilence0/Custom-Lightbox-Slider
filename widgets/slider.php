<?php

use Elementor\Controls_Manager;
use Elementor\Repeater;

class Slider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'slider';
    }

    public function get_title() {
        return esc_html__( 'Custom Slider', 'custom-slider-addon' );
    }

    public function get_icon() {
        return 'eicon-nested-carousel';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    public function get_script_depends() {
        return [ 'slick-script', 'slider-init' ];
    }

    public function get_style_depends() {
        return [ 'slider-styles', 'slider-theme-styles' ];
    }

    public function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Content',
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => 'Slides',
                'type' => Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'image',
                        'label' => 'Image',
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                            'url' => '',
                        ],
                    ],
                    [
                        'name' => 'link',
                        'label' => 'Link',
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '',
                        ],
                    ],
                ],
                'default' => [
                    [
                        'image' => [
                            'url' => '',
                        ],
                        'link' => [
                            'url' => '',
                        ],
                    ],
                ],
                'title_field' => '{{{ image.url }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="cea-slider">
            <?php foreach ( $settings['slides'] as $slide ) : ?>
                <a href="<?php echo esc_url( $slide['link']['url'] ); ?>" rel="wp-video-lightbox">
                    <img src="<?php echo esc_url( $slide['image']['url'] ); ?>" alt="">
                </a>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
