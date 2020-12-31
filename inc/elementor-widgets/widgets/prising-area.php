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
 * Hostza elementor prising area section widget.
 *
 * @since 1.0
 */
class Hostza_Prising_Area extends Widget_Base {

	public function get_name() {
		return 'hostza-prising-area';
	}

	public function get_title() {
		return __( 'Prising Areas', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Prising Area content ------------------------------
		$this->start_controls_section(
			'prising_area_content',
			[
				'label' => __( 'Prising Area content', 'hostza-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Choose your Hosting Plan', 'hostza-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Your domain control panel is designed for ease-of-use and <br>allows for all aspects of your domains.'
            ]
        );

        $this->add_control(
            'prising_area_inner_settings_seperator',
            [
                'label' => esc_html__( 'Prising Area Items', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'prising_areas', [
                'label' => __( 'Create New', 'hostza-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_icon',
                        'label' => __( 'Select Icon', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::ICON,
                        'options' => hostza_themify_icon(),
                        'default' => 'flaticon-servers'
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Package Name', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Share Hosting', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'item_text',
                        'label' => __( 'Short Text', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Easy drag and drop fully customizable mobile friendly', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'price_label',
                        'label' => __( 'Price Label', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Start From', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'price_val',
                        'label' => __( 'Price', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => '$2.5/m',
                    ],
                    [
                        'name' => 'btn_label',
                        'label' => __( 'Button Label', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Start Now', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'item_icon'         => 'flaticon-servers',
                        'item_title'        => __( 'Share Hosting', 'hostza-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'hostza-companion' ),
                        'price_label'       => __( 'Start from', 'hostza-companion' ),
                        'price_val'         => __( '$2.5/m', 'hostza-companion' ),
                        'btn_label'         => __( 'Start Now', 'hostza-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'item_icon'         => 'flaticon-hosting',
                        'item_title'        => __( 'VPS Hosting', 'hostza-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'hostza-companion' ),
                        'price_label'       => __( 'Start from', 'hostza-companion' ),
                        'price_val'         => __( '$5/m', 'hostza-companion' ),
                        'btn_label'         => __( 'Start Now', 'hostza-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'item_icon'         => 'flaticon-wordpress',
                        'item_title'        => __( 'Wordpress Hosting', 'hostza-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'hostza-companion' ),
                        'price_label'       => __( 'Start from', 'hostza-companion' ),
                        'price_val'         => __( '$8/m', 'hostza-companion' ),
                        'btn_label'         => __( 'Start Now', 'hostza-companion' ),
                        'btn_url'           => '#',
                    ],
                    [
                        'item_icon'         => 'flaticon-servers-1',
                        'item_title'        => __( 'Dedicated Hosting', 'hostza-companion' ),
                        'item_text'         => __( 'Easy drag and drop fully customizable mobile friendly', 'hostza-companion' ),
                        'price_label'       => __( 'Start from', 'hostza-companion' ),
                        'price_val'         => __( '$10/m', 'hostza-companion' ),
                        'btn_label'         => __( 'Start Now', 'hostza-companion' ),
                        'btn_url'           => '#',
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'hostza-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_styles_seperator',
            [
                'label' => esc_html__( 'Package Styles', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'first_item_icon_col', [
                'label' => __( 'First Item Icon Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:first-child i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'second_item_icon_col', [
                'label' => __( 'Second Item Icon Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:nth-child(2) i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'third_item_icon_col', [
                'label' => __( 'Third Item Icon Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:nth-child(3) i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'fourth_item_icon_col', [
                'label' => __( 'Fourth Item Icon Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prising_area .col-xl-3:last-child i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings      = $this->get_settings();
    $sec_title     = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sub_title     = !empty( $settings['sub_title'] ) ? wp_kses_post(nl2br($settings['sub_title'])) : '';
    $prising_areas = !empty( $settings['prising_areas'] ) ? $settings['prising_areas'] : '';
    ?>
    
    <!-- prising_area_start -->
    <div class="prising_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-100">
                        <?php
                            if ( $sec_title ) { 
                                echo "<h3>{$sec_title}</h3>";
                            }
                            if ( $sub_title ) { 
                                echo "<p>{$sub_title}</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $prising_areas ) && count( $prising_areas ) > 0 ) {
                    foreach( $prising_areas as $item ) {
                        $item_icon   = ( !empty( $item['item_icon'] ) ) ? esc_attr($item['item_icon']) : '';
                        $item_title  = ( !empty( $item['item_title'] ) ) ? esc_html($item['item_title']) : '';
                        $item_text   = ( !empty( $item['item_text'] ) ) ? esc_html($item['item_text']) : '';
                        $price_label = ( !empty( $item['price_label'] ) ) ? esc_html($item['price_label']) : '';
                        $price_val   = ( !empty( $item['price_val'] ) ) ? esc_html($item['price_val']) : '';
                        $btn_label   = ( !empty( $item['btn_label'] ) ) ? esc_html($item['btn_label']) : '';
                        $btn_url     = ( !empty( $item['btn_url']['url'] ) ) ? esc_url($item['btn_url']['url']) : '';
                        ?>
                        <div class="col-xl-3 col-md-6 col-lg-6">
                            <div class="single_prising">
                                <div class="prising_icon">
                                    <?php
                                        if ( $item_icon ) { 
                                            echo "<i class='{$item_icon}'></i>";
                                        }
                                    ?>
                                </div>
                                <?php
                                    if ( $item_title ) { 
                                        echo "<h3>{$item_title}</h3>";
                                    }
                                    if ( $item_text ) { 
                                        echo "<p class='prising_text'>{$item_text}</p>";
                                    }
                                    if ( $price_label ) { 
                                        echo "<p class='prise'>{$price_label} <span>{$price_val}</span></p>";
                                    }
                                    if ( $btn_label ) { 
                                        echo "<a href='{$btn_url}' class='boxed_btn_green2'>{$btn_label}</a>";
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- prising_area_end -->
    <?php
    }
}