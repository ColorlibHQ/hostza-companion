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
 * Hostza elementor price table section widget.
 *
 * @since 1.0
 */
class Hostza_Price_Table extends Widget_Base {

	public function get_name() {
		return 'hostza-price-table';
	}

	public function get_title() {
		return __( 'Price Table', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-product-related';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  price table content ------------------------------
		$this->start_controls_section(
			'price_table_content',
			[
				'label' => __( 'Price Table content', 'hostza-companion' ),
			]
        );

		$this->add_control(
            'price_table', [
                'label' => __( 'Create New', 'hostza-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ package_title }}}',
                'fields' => [
                    [
                        'name' => 'package_title',
                        'label' => __( 'Package Title', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Starter', 'hostza-companion' ),
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
                        'package_title' => __( 'Starter', 'hostza-companion' ),
                    ],
                    [      
                        'package_title' => __( 'Premium', 'hostza-companion' ),
                    ],
                    [      
                        'package_title' => __( 'Pro', 'hostza-companion' ),
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
            'label' => __( 'Style Pricing Section', 'hostza-companion' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );
    $this->add_control(
        'first_item_bg_col', [
            'label' => __( 'All Item BG Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .package_prsing_area .single_prising .prising_header' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'second_item_bg_col', [
            'label' => __( 'Second Item Bg Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .package_prsing_area .single_prising .prising_header.deep' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'third_item_bg_col', [
            'label' => __( 'Third Item Bg Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .package_prsing_area .single_prising .prising_header.yellow' => 'background: {{VALUE}};',
            ],
        ]
    );
    $this->add_control(
        'button_pointer_col', [
            'label' => __( 'List pointer & Button Color', 'hostza-companion' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .package_prsing_area .boxed_btn_green' => 'background: {{VALUE}};',
                '{{WRAPPER}} .package_prsing_area .single_prising .list ul li::before' => 'background: {{VALUE}};',
                '{{WRAPPER}} .package_prsing_area .boxed_btn_green:hover' => 'background: transparent; color: {{VALUE}} !important; border-color: {{VALUE}};',
            ],
        ]
    );

    $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $price_table = !empty( $settings['price_table'] ) ? $settings['price_table'] : '';
    ?>
    <div class="package_prsing_area">
        <div class="container">
            <div class="row">
                <?php
                    if( is_array( $price_table ) && count( $price_table ) > 0 ){
                        $counter = 0;
                        foreach ( $price_table as $item ) {
                        $counter++;
                        $package_title = !empty( $item['package_title'] ) ? esc_html($item['package_title']) : '';
                        $template_id = !empty( $item['template_id'] ) ? $item['template_id'] : '';
                        if ($counter === 1) {
                            $dynamic_class = 'prising_header';
                        } else if ($counter === 2) {
                            $dynamic_class = 'prising_header deep';
                        } else {
                            $dynamic_class = 'prising_header yellow';
                        }
                        ?>
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="single_prising">
                                <div class="<?php echo esc_attr($dynamic_class)?>">
                                    <?php
                                        if ( $package_title ) { 
                                            echo "<h3>{$package_title}</h3>";
                                        }
                                    ?>
                                </div>
                                <?php
                                    echo Plugin::$instance->frontend->get_builder_content( $template_id, false );
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