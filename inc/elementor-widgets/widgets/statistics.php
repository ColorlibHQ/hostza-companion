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
 * Hostza elementor Statistics section widget.
 *
 * @since 1.0
 */
class Hostza_Statistics extends Widget_Base {

	public function get_name() {
		return 'hostza-statistics';
	}

	public function get_title() {
		return __( 'Statistics', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Statistics content ------------------------------
		$this->start_controls_section(
			'statistics_contents',
			[
				'label' => __( 'Statistics content', 'hostza-companion' ),
			]
        );

		$this->add_control(
            'statistics', [
                'label' => __( 'Create New', 'hostza-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_value',
                        'label' => __( 'Statistic Value', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '278390', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Client around the World', 'hostza-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'item_value' => __( '278390', 'hostza-companion' ),
                        'item_title'  => __( 'Client around the World', 'hostza-companion' ),
                    ],
                    [      
                        'item_value' => __( '200', 'hostza-companion' ),
                        'item_title'  => __( 'Dedicated team', 'hostza-companion' ),
                    ],
                    [      
                        'item_value' => __( '563278', 'hostza-companion' ),
                        'item_title'  => __( 'Domain registation', 'hostza-companion' ),
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
                'label' => esc_html__( 'Member Styles', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}
    
	protected function render() {
    $settings  = $this->get_settings();
    $statistics = !empty( $settings['statistics'] ) ? $settings['statistics'] : '';
    ?>

    <div class="about_boxes">
        <div class="container">
            <div class="row">
                <?php
                if( is_array( $statistics ) && count( $statistics ) > 0 ) {
                    foreach( $statistics as $item ) {
                        $item_value = ( !empty( $item['item_value'] ) ) ? esc_html( $item['item_value'] ) : '';
                        $item_title  = ( !empty( $item['item_title'] ) ) ? esc_html( $item['item_title'] ) : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_box">
                                <?php
                                    if ( $item_value ) {
                                        echo "
                                        <h3>{$item_value}</h3>
                                        ";
                                    }
                                    if ( $item_title ) {
                                        echo "
                                        <p>{$item_title}</p>
                                        ";
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
    <?php
    }
}