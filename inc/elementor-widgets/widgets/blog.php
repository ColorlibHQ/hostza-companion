<?php
namespace Hostzaelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Hostza elementor blog section widget.
 *
 * @since 1.0
 */

class Hostza_Blog extends Widget_Base {

	public function get_name() {
		return 'hostza-blog';
	}

	public function get_title() {
		return __( 'Blog', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Latest Blog Header Setting', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label'         => __( 'Section Title', 'hostza-companion' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'Latest News', 'hostza-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label'         => __( 'Sub Title', 'hostza-companion' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       => 'Your domain control panel is designed for ease-of-use and <br>allows for all aspects of your domains.'
            ]
        );

        $this->end_controls_section(); // End few words content

        // Blog post settings
        $this->start_controls_section(
            'blog_post_sec',
            [
                'label' => __( 'Blog Post Settings', 'hostza-companion' ),
            ]
        );
		$this->add_control(
			'post_num',
			[
				'label'         => esc_html__( 'Post Item', 'hostza-companion' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => false,
                'default'       => absint(3),
                'min'           => 1,
                'max'           => 6,
			]
		);
		$this->add_control(
			'post_exc',
			[
				'label'         => esc_html__( 'Post Excerpt Length', 'hostza-companion' ),
				'type'          => Controls_Manager::NUMBER,
				'label_block'   => false,
                'default'       => absint(13),
                'min'           => 5,
                'max'           => 20
			]
		);
		$this->add_control(
			'post_order',
			[
				'label'         => esc_html__( 'Post Order', 'hostza-companion' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_block'   => false,
				'label_on'      => 'ASC',
				'label_off'     => 'DESC',
                'default'       => 'yes',
                'options'       => [
                    'no'        => 'ASC',
                    'yes'       => 'DESC'
                ]
			]
		);

        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'hostza-companion' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'hostza-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_new_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_sec_sub_title', [
                'label'     => __( 'Sub Title Color', 'hostza-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_new_area .section_title p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blog_cat', [
                'label'     => __( 'Blog Category Color', 'hostza-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_new_area .single_news .news_content .news_meta a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blog_title', [
                'label'     => __( 'Blog Title Color', 'hostza-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_new_area .single_news .news_content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blog_title_hover', [
                'label'     => __( 'Blog Title Hover Color', 'hostza-companion' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .latest_new_area .single_news .news_content h3 a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings   = $this->get_settings();
    $sec_title  = !empty( $settings['sec_title'] ) ? esc_html($settings['sec_title']) : '';
    $sub_title  = !empty( $settings['sub_title'] ) ? wp_kses_post(nl2br($settings['sub_title'])) : '';
    $post_num   = !empty( $settings['post_num'] ) ? $settings['post_num'] : '';
    $post_exc   = !empty( $settings['post_exc'] ) ? $settings['post_exc'] : '';
    $post_order = !empty( $settings['post_order'] ) ? $settings['post_order'] : '';
    $post_order = $post_order == 'yes' ? 'DESC' : 'ASC';
    ?>

    <!-- latest_news_area_start -->
    <div class="latest_new_area">
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
                    if( function_exists( 'hostza_latest_blog' ) ) {
                        hostza_latest_blog( $post_num, $post_exc, $post_order );
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- latest_news_area_end -->
    <?php
	}
}
