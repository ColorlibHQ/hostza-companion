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
 * Hostza elementor data-center section widget.
 *
 * @since 1.0
 */
class Hostza_Data_Centers extends Widget_Base {

	public function get_name() {
		return 'hostza-data-center-section';
	}

	public function get_title() {
		return __( 'Data Centers', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Data Center Section ------------------------------
        $this->start_controls_section(
            'data_centers_content',
            [
                'label' => __( 'Data Centers Content', 'hostza-companion' ),
            ]
        );
        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Our Data Centers',
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Your domain control panel is designed for ease-of-use and <br>allows for all aspects of your domains.',
            ]
        );

        $this->add_control(
            'data_centers_seperator',
            [
                'label' => esc_html__( 'Add Data Center', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'locations', [
                'label' => __( 'Create New', 'hostza-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => __( 'Location Title', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Sydney, Australia', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => __( 'Location Text', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => 'It is a long established fact that <br>a reader',
                    ],
                    [
                        'name' => 'top_position',
                        'label' => __( 'Top Position', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ '%' ],
                        'range' => [
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => '%',
                            'size' => 20,
                        ],
                    ],
                    [
                        'name' => 'left_position',
                        'label' => __( 'Left Position', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ '%' ],
                        'range' => [
                            '%' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'default' => [
                            'unit' => '%',
                            'size' => 50,
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'item_title' => __( 'Sydney, Australia', 'hostza-companion' ),
                        'sub_title'  => 'It is a long established fact that <br>a reader',
                    ],
                    [      
                        'item_title' => __( 'Sydney, Australia', 'hostza-companion' ),
                        'sub_title'  => 'It is a long established fact that <br>a reader',
                    ],
                    [      
                        'item_title' => __( 'Sydney, Australia', 'hostza-companion' ),
                        'sub_title'  => 'It is a long established fact that <br>a reader',
                    ],
                    [      
                        'item_title' => __( 'Sydney, Australia', 'hostza-companion' ),
                        'sub_title'  => 'It is a long established fact that <br>a reader',
                    ],
                ]
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
			'big_title_col', [
				'label' => __( 'Big Title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .data_center_area .section_title h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'hostza-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .data_center_area .section_title p' => 'color: {{VALUE}};',
				],
			]
        );

        // $this->add_responsive_control(
        //     'first_marker_position',
        //     [
        //         'label' => __( 'First Marker Position', 'hostza-companion' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%', 'em' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .data_center_area .location .pulse_group span:first-child' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );
        // $this->add_responsive_control(
        //     'second_marker_position',
        //     [
        //         'label' => __( 'Second Marker Position', 'hostza-companion' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%', 'em' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .data_center_area .location .pulse_group span:nth-child(2)' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );
        // $this->add_responsive_control(
        //     'third_marker_position',
        //     [
        //         'label' => __( 'Third Marker Position', 'hostza-companion' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%', 'em' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .data_center_area .location .pulse_group span:nth-child(3)' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );
        // $this->add_responsive_control(
        //     'fourth_marker_position',
        //     [
        //         'label' => __( 'Fourth Marker Position', 'hostza-companion' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%', 'em' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .data_center_area .location .pulse_group span:last-child' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
        //         ],
        //     ]
        // );
        $this->end_controls_section();

	}

	protected function render() {
    $settings     = $this->get_settings();
    $sec_title    = !empty( $settings['sec_title'] ) ? esc_html( $settings['sec_title'] ) : '';
    $sub_title    = !empty( $settings['sub_title'] ) ? wp_kses_post( nl2br( $settings['sub_title'] )) : '';
    $locations    = !empty( $settings['locations'] ) ? $settings['locations'] : '';
    $map_path     = esc_url( HOSTZA_DIR_ASSETS_URI . 'img/map.svg' );
    ?>
    
    <div class="data_center_area">
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
                <div class="col-xl-12">
                    <div class="location">
                        <div class="pulse_group">
                            <?php 
                            if( is_array( $locations ) && count( $locations ) > 0 ) {
                                foreach( $locations as $item ) {
                                    $item_title    = ( !empty( $item['item_title'] ) ) ? esc_html($item['item_title']) : '';
                                    $sub_title     = ( !empty( $item['sub_title'] ) ) ? wp_kses_post( nl2br( $item['sub_title'] ) ) : '';
                                    $top_position  = 'top: '.$item['top_position']['size'].'%;';
                                    $left_position = 'left: '.$item['left_position']['size'].'%;';
                                    ?>
                                    <span style="<?=$top_position.$left_position?>">
                                        <div class="address_on_hover d-none d-lg-block">
                                            <div class="address_inner">
                                                <i class="fa fa-map-marker"></i>
                                                <?php 
                                                    if ( $item_title ) { 
                                                        echo "<h3>{$item_title}</h3>";
                                                    }
                                                    if ( $sub_title ) { 
                                                        echo "<p>{$sub_title}</p>";
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </span>
                                    <?php 
                                }
                            }
                            ?>
                        </div>
                        <img src="<?=$map_path?>" alt="map image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    }
}
