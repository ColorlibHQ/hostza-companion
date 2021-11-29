<?php
namespace Hostzaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hostza elementor core-feature section widget.
 *
 * @since 1.0
 */
class Hostza_Core_Features extends Widget_Base {

	public function get_name() {
		return 'hostza-core-features';
	}

	public function get_title() {
		return __( 'Core Features', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Core Feature content ------------------------------
		$this->start_controls_section(
			'core_feature_content',
			[
				'label' => __( 'Core Features content', 'hostza-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Core Features', 'hostza-companion' )
            ]
        );

        $this->add_control(
            'tab_content_seperator',
            [
                'label' => esc_html__( 'Tab Header Items', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'tab_content', [
                'label' => __( 'Create New', 'hostza-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ tab_title }}}',
                'fields' => [
                    [
                        'name' => 'tab_title',
                        'label' => __( 'Tab Title', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Features', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'template_id',
                        'label' => __( 'Select Elementor Template', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'options' => get_elementor_templates(),
                    ],
                ],
                'default'   => [
                    [      
                        'tab_title' => __( 'Features', 'hostza-companion' ),
                    ],
                    [      
                        'tab_title' => __( 'Advanced Features', 'hostza-companion' ),
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
            'label' => __( 'Style Core Features Section', 'hostza-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'first_icon_col', [
            'label' => __( 'First Icon Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:first-child .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'first_icon_bg_col', [
            'label' => __( 'First Icon Bg Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:first-child .icon' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'second_icon_col', [
            'label' => __( 'Second Icon Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(2) .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'second_icon_bg_col', [
            'label' => __( 'Second Icon Bg Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(2) .icon' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'third_icon_col', [
            'label' => __( 'Third Icon Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(3) .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'third_icon_bg_col', [
            'label' => __( 'Third Icon Bg Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:nth-child(3) .icon' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'fourth_icon_col', [
            'label' => __( 'Fourth Icon Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:last-child .icon' => 'color: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'fourth_icon_bg_col', [
            'label' => __( 'Fourth Icon Bg Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .core_features .tab-pane .row .col-xl-6:last-child .icon' => 'background: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $tab_items = !empty( $settings['tab_content'] ) ? $settings['tab_content'] : '';
    ?>

    <!-- core_features_start -->
    <div class="core_features">
        <div class="container">
            <div class="border-bottm">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="featuures_heading">
                            <?php
                                if ( $sec_title ) { 
                                    echo "<h3>{$sec_title}</h3>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="featurest_tabs ">
                            <nav>
                                <div class="nav" id="nav-tab" role="tablist">
                                    <?php
                                    $i=1;
                                    foreach( $tab_items as $item ) {
                                        $tab_id       = esc_attr( $item['_id'] );
                                        $tab_title    = esc_html( $item['tab_title'] );
                                        $active_class = esc_attr($i == 1 ? ' active' : '');
                                        $selected_val = esc_attr($i == 1 ? 'true' : 'false');
                                        ?>
                                        <a 
                                            class="nav-item nav-link<?=$active_class?>" 
                                            id="<?=$tab_id?>-tab" data-toggle="tab"
                                            href="#<?=$tab_id?>" role="tab" aria-controls="<?=$tab_id?>"
                                            aria-selected="<?=$selected_val?>">
                                            <?=$tab_title?>
                                        </a>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content" id="nav-tabContent">
                        <?php
                        $i=1;
                        foreach( $tab_items as $item ) {
                            $tab_id       = esc_attr( $item['_id'] );
                            $template_id  = absint( $item['template_id'] );
                            $active_class = esc_attr($i == 1 ? ' show active' : '');
                            ?>
                            <div class="tab-pane fade<?=$active_class?>" id="<?=$tab_id?>" role="tabpanel" aria-labelledby="<?=$tab_id?>-tab">
                                <?php
                                    echo Plugin::$instance->frontend->get_builder_content( $template_id, false );
                                ?>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
}