<?php
namespace Hostzaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hostza elementor simple contact section widget.
 *
 * @since 1.0
 */
class Hostza_Simple_Contact_Section extends Widget_Base {

	public function get_name() {
		return 'hostza-simple-contact-section';
	}

	public function get_title() {
		return __( 'Simple Contact Section', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  simple contact section ------------------------------
		$this->start_controls_section(
			'simple_contact_content',
			[
				'label' => __( 'Simple Contact Section', 'hostza-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => __( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Have any Question?', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'chat_btn',
            [
                'label' => __( 'Chat Button Label', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Live Chat', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'chat_btn_url',
            [
                'label' => __( 'Chat Button URL', 'hostza-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'start_btn',
            [
                'label' => __( 'Start Button Label', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'get start now', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'start_btn_url',
            [
                'label' => __( 'Start Button URL', 'hostza-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->end_controls_section(); // End service content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'simple_contact_sec_style', [
                'label' => __( 'Simple Contact Section Styles', 'hostza-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .have_question h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn1_bg_col', [
				'label' => __( 'Button 1 Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .have_question .chat .boxed_btn_green' => 'background: {{VALUE}};',
					'{{WRAPPER}} .have_question .chat .boxed_btn_green:hover' => 'background: transparent; border-color: {{VALUE}}; color: {{VALUE}} !important;',
				],
			]
        );
        $this->add_control(
			'btn1_hover_col', [
				'label' => __( 'Button 1 Hover Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .have_question .chat .boxed_btn_green:hover' => 'background: transparent; border-color: {{VALUE}}; color: {{VALUE}} !important;',
				],
			]
        );

        $this->add_control(
			'btn2_bg_col', [
				'label' => __( 'Button 2 Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .have_question .chat .boxed_btn_green2' => 'color: {{VALUE}} !important; border-color: {{VALUE}} !important',
					'{{WRAPPER}} .have_question .chat .boxed_btn_green2:hover' => 'border-color: {{VALUE}} !important; background: {{VALUE}}; color: #fff !important',
				],
			]
        );
        $this->add_control(
			'btn2_hover_col', [
				'label' => __( 'Button 2 Hover Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .have_question .chat .boxed_btn_green2:hover' => 'border-color: {{VALUE}} !important; background: {{VALUE}}; color: #fff !important',
				],
			]
        );

        $this->end_controls_section();
	}

	protected function render() {
    $settings      = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $chat_btn = !empty( $settings['chat_btn'] ) ? $settings['chat_btn'] : '';
    $chat_btn_url = !empty( $settings['chat_btn_url']['url'] ) ? $settings['chat_btn_url']['url'] : '';
    $start_btn = !empty( $settings['start_btn'] ) ? $settings['start_btn'] : '';
    $start_btn_url = !empty( $settings['start_btn_url']['url'] ) ? $settings['start_btn_url']['url'] : '';
    ?>

    <div class="have_question">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="single_border">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-4 col-lg-6">
                                <?php
                                    if ( $sec_title ) { 
                                        echo "<h3>{$sec_title}</h3>";
                                    }
                                ?>
                            </div>
                            <div class="col-xl-6 col-md-8 col-lg-6">
                                <div class="chat">
                                    <?php
                                        if ( $chat_btn ) { 
                                            echo "
                                            <a class='boxed_btn_green' href='{$chat_btn_url}'>
                                                <i class='flaticon-chat'></i>
                                                <span>{$chat_btn}</span>
                                            </a>";
                                        }
                                        if ( $start_btn ) { 
                                            echo "
                                            <a class='boxed_btn_green2' href='{$start_btn_url}'>
                                                {$start_btn}
                                            </a>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}