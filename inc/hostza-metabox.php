<?php
function hostza_page_metabox( $meta_boxes ) {

	$hostza_prefix = '_hostza_';
	$meta_boxes[] = array(
		'id'        => 'page_single_metaboxs',
		'title'     => esc_html__( 'Page Footer Options', 'hostza-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $hostza_prefix . 'footer-background',
				'type'  => 'background',
				'name'  => esc_html__( 'Set The Footer Background', 'hostza-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'hostza_page_metabox' );