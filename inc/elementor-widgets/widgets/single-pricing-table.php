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
 * Hostza elementor core feature tab items section widget.
 *
 * @since 1.0
 */
class Hostza_Single_Pricing_Item extends Widget_Base {

	public function get_name() {
		return 'hostza-single-pricing-item';
	}

	public function get_title() {
		return __( 'Single Pricing Item', 'hostza-companion' );
	}

	public function get_icon() {
		return 'eicon-bag-light';
	}

	public function get_categories() {
		return [ 'hostza-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Single Pricing Item content ------------------------------
		$this->start_controls_section(
			'single_pricing_item_content',
			[
				'label' => __( 'Single Pricing Item', 'hostza-companion' ),
			]
        );
        $this->add_control(
            'sites',
            [
                'label' => __( 'Sites', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( '1 Site', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'visits',
            [
                'label' => __( 'Visits Per Month', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( '100k Visits Per Month', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'storage',
            [
                'label' => __( 'Storage', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( '1GB Backups', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'ssl',
            [
                'label' => __( 'SSL Certificate', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
				'default' => __( 'Free SSL Certificate', 'your-plugin' ),
            ]
        );
        $this->add_control(
            'support',
            [
                'label' => __( 'Support', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Quick support', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( '$2.5/m', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' => __( 'Button Label', 'hostza-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => __( 'Start Now', 'hostza-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => __( 'Button URL', 'hostza-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->end_controls_section(); // End service content

	}

	protected function render() {
    $settings      = $this->get_settings();
    $sites = !empty( $settings['sites'] ) ? $settings['sites'] : '';
    $visits = !empty( $settings['visits'] ) ? $settings['visits'] : '';
    $storage = !empty( $settings['storage'] ) ? $settings['storage'] : '';
    $ssl = !empty( $settings['ssl'] ) ? $settings['ssl'] : '';
    $support = !empty( $settings['support'] ) ? $settings['support'] : '';
    $price = !empty( $settings['price'] ) ? $settings['price'] : '';
    $btn_label = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>
    
    <div class="middle_content">
        <div class="list">
            <ul>
                <?php
                    if ( $sites ) { 
                        echo "<li>{$sites}</li>";
                    }
                    if ( $visits ) { 
                        echo "<li>{$visits}</li>";
                    }
                    if ( $storage ) { 
                        echo "<li>{$storage}</li>";
                    }
                    if ( $ssl ) { 
                        echo "<li>{$ssl}</li>";
                    }
                    if ( $support ) { 
                        echo "<li>{$support}</li>";
                    }
                ?>
            </ul>
        </div>
        <?php
            if ( $price ) { 
                echo "<p class='prise'>Start from <span>{$price}</span></p>";
            }
            if ( $btn_label ) { 
                echo "
                <div class='start_btn text-center'>
                    <a class='boxed_btn_green' href='{$btn_url}'>
                        {$btn_label}
                    </a>
                </div>
                ";
            }
        ?>
    </div>
    <?php
    }
}