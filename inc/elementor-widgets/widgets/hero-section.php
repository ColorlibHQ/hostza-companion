<?php
namespace Hostzaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hostza elementor hero section widget.
 *
 * @since 1.0
 */
class Hostza_Hero extends Widget_Base {

	public function get_name() {
		return 'hostza-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero content', 'hostza-companion' ),
			]
        );
        
		$this->add_control(
            'banner_img', [
                'label' => __( 'BG Image', 'hostza-companion' ),
                'type' => Controls_Manager::MEDIA,

            ]
		);
		$this->add_control(
            'sub_title', [
                'label' => __( 'Sub Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'The Best Domain & Hosting Provider In The Area'
            ]
        );
		$this->add_control(
            'big_title', [
                'label' => __( 'Big Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Go Big with your next Domain'
            ]
        );
		$this->add_control(
            'action_page', [
                'label' => __( 'Action Page', 'hostza-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
		$this->add_control(
            'btn_label', [
                'label' => __( 'Button Label', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'search'
            ]
        );
        
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'hostza-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button Bg Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .find_dowmain .find_dowmain_form button' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}
    
	protected function render() {
    $settings   = $this->get_settings();  
    $banner_img = !empty( $settings['banner_img']['url'] ) ? $settings['banner_img']['url'] : ''; 
    $sub_title  = !empty( $settings['sub_title'] ) ? esc_html($settings['sub_title']) : '';     
    $big_title  = !empty( $settings['big_title'] ) ? wp_kses_post(nl2br($settings['big_title'])) : '';
    $action_page  = !empty( $settings['action_page'] ) ? esc_url($settings['action_page']['url']) : '#';
    $btn_label  = !empty( $settings['btn_label'] ) ? esc_html($settings['btn_label']) : '';
	?>
	
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1 overlay2" <?php echo hostza_inline_bg_img( esc_url( $banner_img ) ); ?>>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-9">
                        <div class="slider_text text-center">
							<?php
								if ( $sub_title ) {
									echo "<p>{$sub_title}</p>";
								}
                                if ( $big_title ) {
                                    echo "<h3>{$big_title}</h3>";
                                }
                            ?>
                            <div class="find_dowmain">
                                <form action="<?php echo $action_page?>" class="find_dowmain_form">
									<input type="text" placeholder="<?php _e('Find your domain', 'hostza-companion')?>">
									<?php
										if ( $btn_label ) {
											echo "<button type='{$btn_label}'>search</button>";
										}
									?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    }
}