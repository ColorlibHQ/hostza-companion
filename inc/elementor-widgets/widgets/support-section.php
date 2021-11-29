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
 * Hostza elementor support section widget.
 *
 * @since 1.0
 */
class Hostza_Support_Section extends Widget_Base {

	public function get_name() {
		return 'hostza-support-section';
	}

	public function get_title() {
		return __( 'Support Section', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-heart';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Support Section ------------------------------
        $this->start_controls_section(
            'support_right_content',
            [
                'label' => __( 'Support Content', 'hostza-companion' ),
            ]
        );
        
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'hostza-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'   => [
                    'url'   => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => '24h Dedicated Support',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'Section Text', 'hostza-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god moving. Moving in fourth air night bring upon you’re it beast.',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Get Start Now', 'hostza-companion' ),
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
        $this->add_control(
            'phone_number',
            [
                'label' => esc_html__( 'Phone Number', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( '+10 267 367 678 2678', 'hostza-companion' ),
            ]
        );
        
        
        $this->end_controls_section(); // End support_section

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
					'{{WRAPPER}} .dedicated_support .support_info h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'text_col', [
				'label' => __( 'Text Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dedicated_support .support_info p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_phn_col', [
				'label' => __( 'Button & Phone Text Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dedicated_support .support_info .get_started a' => 'background: {{VALUE}};',
					'{{WRAPPER}} .dedicated_support .support_info .get_started .phone_num' => 'background: none; color: {{VALUE}};',
					'{{WRAPPER}} .dedicated_support .support_info .get_started .boxed_btn_green:hover' => 'background: transparent; color: {{VALUE}} !important; border-color:{{VALUE}} ',
				],
			]
        );

        $this->add_control(
			'btn_phn_hover_col', [
				'label' => __( 'Button & Phone Hover Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dedicated_support .support_info .get_started .boxed_btn_green:hover' => 'background: transparent; color: {{VALUE}} !important; border-color:{{VALUE}} ',
					'{{WRAPPER}} .dedicated_support .support_info .get_started .phone_num:hover' => 'color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings     = $this->get_settings();
    $bg_img       = !empty( $settings['bg_img']['url'] ) ? esc_url($settings['bg_img']['url']) : '';
    $sec_title    = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sec_text     = !empty( $settings['sec_text'] ) ? esc_html($settings['sec_text']) : '';
    $btn_text     = !empty( $settings['btn_text'] ) ? esc_html($settings['btn_text']) : '';
    $btn_url      = !empty( $settings['btn_url']['url'] ) ? esc_url($settings['btn_url']['url']) : '';
    $phone_number = !empty( $settings['phone_number'] ) ? esc_html($settings['phone_number']) : '';
    $tel_url      = 'tel:' . trim( $phone_number );
    ?>
    
    <!-- dedicated_support_start -->
    <div class="dedicated_support" <?php echo hostza_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-8">
                    <div class="support_info">
                        <?php 
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                            if ( $sec_text ) { 
                                echo "<p>{$sec_text}</p>";
                            }
                        ?>
                        <div class="get_started">
                            <?php 
                                if ( $btn_text ) { 
                                    echo "<a class='boxed_btn_green' href='{$btn_url}'>{$btn_text}</a>";
                                }
                                if ( $phone_number ) { 
                                    echo "<a class='phone_num' href='{$tel_url}'>{$phone_number}</a>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dedicated_support_end -->
    <?php

    }
}
