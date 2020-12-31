<?php
namespace Hostzaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hostza elementor video section section widget.
 *
 * @since 1.0
 */
class Hostza_Video_Section extends Widget_Base {

	public function get_name() {
		return 'hostza-video-section';
	}

	public function get_title() {
		return __( 'Video Section', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Video Section ------------------------------
        $this->start_controls_section(
            'video_left_content',
            [
                'label' => __( 'Video Left Content', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'How We Work', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Watch the Video <br>How we Work?',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'hostza-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Inspires employees and organizations to support causes they care <br>about. We do this to bring more resources to the nonprofits that are <br>changing our world.',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Book Now', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'hostza-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        // Right section
        $this->start_controls_section(
            'video_section_content',
            [
                'label' => __( 'Video Section', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'video_thumb',
            [
                'label' => esc_html__( 'Video Thumbnail', 'hostza-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Popup Video URL', 'hostza-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=E_-lMZDi7Uw'
                ],
            ]
        );
        
        
        $this->end_controls_section(); // End video_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'hostza-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact h2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact .btn_1' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_hov_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact .btn_1:hover' => 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'bg_overlay_col', [
				'label' => __( 'Bg Overlay Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact:after' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? esc_html($settings['sub_title']) : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? wp_kses_post(nl2br($settings['sec_title'])) : '';
    $sec_text       = !empty( $settings['sec_text'] ) ? wp_kses_post(nl2br($settings['sec_text'])) : '';
    $btn_text       = !empty( $settings['btn_text'] ) ? esc_html($settings['btn_text']) : '';
    $btn_url        = !empty( $settings['btn_url']['url'] ) ? esc_url($settings['btn_url']['url']) : '';
    $video_thumb    = !empty( $settings['video_thumb']['id'] ) ? wp_get_attachment_image( $settings['video_thumb']['id'], 'hostza_video_thumb_877x750', '', array( 'alt' => $sec_title.' image' ) ) : '';
    $video_url      = !empty( $settings['video_url']['url'] ) ? esc_url($settings['video_url']['url']) : '';
    ?>

    <!-- video_area_start -->
    <div class="video_area">
        <div class="container-fluid p-0">
            <div class="row align-items-center no-gutters">
                <div class="col-xl-6 col-lg-6">
                    <div class="video_info">
                        <div class="about_info">
                            <div class="section_title mb-20px">
                                <?php 
                                    if ( $sub_title ) { 
                                        echo "<span>{$sub_title}</span>";
                                    }
                                    if ( $sec_title ) { 
                                        echo "<h3>{$sub_title}</h3>";
                                    }
                                ?>
                            </div>
                            <?php 
                                if ( $sec_text ) { 
                                    echo "<p>{$sec_text}</p>";
                                }
                                if ( $btn_text ) { 
                                    echo "<a href='{$btn_url}' class='boxed-btn3'>{$btn_text}</a>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="video_thumb">
                        <div class="video_thumb_inner">
                            <?php 
                                if ( $video_thumb ) { 
                                    echo $video_thumb;
                                }
                                if ( $video_url ) { 
                                    echo "<a href='{$video_url}' class='popup-video'>
                                    <i class='fa fa-play'></i>
                                </a>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video_area_end -->
    <?php

    }
}
