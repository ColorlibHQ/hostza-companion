<?php
namespace Hostzaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;
use Elementor\Plugin;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hostza elementor faq section section widget.
 *
 * @since 1.0
 */
class Hostza_Faq_Section extends Widget_Base {

	public function get_name() {
		return 'hostza-faq-section';
	}

	public function get_title() {
		return __( 'Faq Section', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-help';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Faq content ------------------------------
		$this->start_controls_section(
			'faq_contents',
			[
				'label' => __( 'Faq content', 'hostza-companion' ),
			]
        );
        $this->add_control(
            'style_type',
            [
                'label' => esc_html__( 'Select a Style', 'hostza-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'style_1',
                'options' => [
                    'style_1' => esc_html__( 'Style 1', 'hostza-companion' ),
                    'style_2' => esc_html__( 'Style 2', 'hostza-companion' ),
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'style_type' => 'style_1'
                ],
                'label_block' => true,
                'default' => esc_html__( 'Frequently Ask Question', 'hostza-companion' )
            ]
        );

        $this->add_control(
            'faq_settings_seperator',
            [
                'label' => esc_html__( 'Faq Contents', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'faq_template_id',
            [
                'label' => esc_html__( 'Select a Template', 'hostza-companion' ),
                'type' => Controls_Manager::SELECT,
                'condition' => [
                    'style_type' => 'style_1'
                ],
                'label_block' => true,
                'options' => get_elementor_templates(),
            ]
        );

		$this->add_control(
            'faq_items', [
                'label' => __( 'Create New', 'hostza-companion' ),
                'type' => Controls_Manager::REPEATER,
                'condition' => [
                    'style_type' => 'style_2'
                ],
                'title_field' => '{{{ faq_title }}}',
                'fields' => [
                    [
                        'name' => 'faq_title',
                        'label' => __( 'Faq Tab Title', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'General Ask', 'hostza-companion' ),
                    ],
                    [
                        'name' => 'faq_template_id',
                        'label' => __( 'Select a Template', 'hostza-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'options' => get_elementor_templates(),
                    ],
                ],
                'default'   => [
                    [      
                        'faq_title' => __( 'General Ask', 'hostza-companion' ),
                    ],
                    [      
                        'faq_title' => __( 'Technical Support', 'hostza-companion' ),
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
            'big_title_col', [
                'label' => __( 'Big Title Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq_area .accordion_heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_styles_seperator',
            [
                'label' => esc_html__( 'Inner Item Styles', 'hostza-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'item_icon_col', [
                'label' => __( 'Icon Color', 'hostza-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq_area #accordion .card h5 button i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}
    
	protected function render() {
    $settings  = $this->get_settings();
    $style_type = !empty( $settings['style_type'] ) ? $settings['style_type'] : '';
    $sec_title = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';

    if ( $style_type == 'style_1' ) {
        $template_id  = $settings['faq_template_id'] ? absint( $settings['faq_template_id'] ) : '';
        ?>
        <!-- faq_section_start -->
        <div class="faq_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <?php
                            if ($sec_title) {
                                echo "
                                <div class='accordion_heading'>
                                    <h3>{$sec_title}</h3>
                                </div>
                                ";
                            }
                        ?>
                        <div id="accordion">
                            <?php
                                if( $template_id !== '' ) {
                                    echo Plugin::$instance->frontend->get_builder_content( $template_id, false );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        $faq_items = !empty( $settings['faq_items'] ) ? $settings['faq_items'] : '';
        ?>
        <div class="core_features2 faq_area">
            <div class="container">
                <div class="border-bottm">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="featurest_tabs ">
                                <nav>
                                    <div class="nav" id="nav-tab" role="tablist">
                                        <?php
                                        if( is_array( $faq_items ) && count( $faq_items ) > 0 ) {
                                            $i = 0;
                                            foreach( $faq_items as $item ) {
                                                $i++;
                                                $faq_id    = ( !empty( $item['_id'] ) ) ? esc_attr($item['_id']) : '';
                                                $faq_title = ( !empty( $item['faq_title'] ) ) ? esc_html( $item['faq_title'] ) : '';
                                                $active_class = esc_attr($i == 1 ? ' active show' : '');
                                                $selected_val = esc_attr($i == 1 ? 'true' : 'false');
                                                ?>
                                                <a class="nav-item nav-link<?php echo esc_attr( $active_class )?>" id="nav-<?php echo esc_attr( $faq_id )?>-tab" data-toggle="tab" href="#nav-<?php echo esc_attr( $faq_id )?>" role="tab" aria-controls="nav-<?php echo esc_attr( $faq_id )?>" aria-selected="<?php echo esc_attr( $selected_val )?>"><?php echo esc_html( $faq_title )?></a>
                                                <?php
                                            }
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
                                if( is_array( $faq_items ) && count( $faq_items ) > 0 ) {
                                    $i = 0;
                                    foreach( $faq_items as $item ) {
                                        $i++;
                                        $faq_id       = esc_attr( $item['_id'] );
                                        $active_class = esc_attr($i == 1 ? ' active show' : '');
                                        $template_id  = $item['faq_template_id'] ? absint( $item['faq_template_id'] ) : '';
                                        ?>
                                        <div class="tab-pane fade<?php echo esc_attr( $active_class )?>" id="nav-<?php echo esc_attr( $faq_id )?>" role="tabpanel" aria-labelledby="nav-<?php echo esc_attr( $faq_id )?>-tab">
                                            <div id="accordion">
                                                <?php
                                                    if( $template_id !== '' ) {
                                                        echo Plugin::$instance->frontend->get_builder_content( $template_id, false );
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
            </div>
        </div>
        <!-- faq_section_end -->
        <?php
    }
    }
}