<?php

/**
* WPBakery Page Builder Ohio Team Members Group shortcode params
*/

vc_lean_map( 'ohio_team_members_group', 'ohio_team_members_group_sc_map' );

function ohio_team_members_group_sc_map() {
	return array(
		'name' => __( 'Team Group', 'ohio-extra' ), 
		'description' => __( 'Team members group module', 'ohio-extra' ), 
		'base' => 'ohio_team_members_group',
		'category' => __( 'Ohio', 'ohio-extra' ), 
		'icon' => plugin_dir_url( __FILE__ ) . 'images/icon.svg',
		'js_view' => 'VcOhioGroupColumnView',
		'show_settings_on_create' => false,
		'as_parent' => array(
			'only' => 'ohio_team_member_inner',
		),
		'default_content' => '[ohio_team_member_inner][/ohio_team_member_inner][ohio_team_member_inner][/ohio_team_member_inner][ohio_team_member_inner][/ohio_team_member_inner]',
		'params' => array(
			// Style
			array(
				'type' => 'colorpicker',
				'group' => __( 'Styles & Colors', 'argenta_extra' ),
				'heading' => __( 'Content block background', 'argenta_extra' ),
				'param_name' => 'content_bg',
			),
			
			// Custom CSS Class
			array(
				'type' => 'textfield',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Custom CSS class', 'ohio-extra' ),
				'param_name' => 'css_class',
				'description' => __( 'If you want to add own styles to a specific unit, use this field to add custom CSS class.', 'ohio-extra' )
			),

			// Appear Effect
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade right', 'ohio-extra' ) => 'fade-right',
					__( 'Slide up', 'ohio-extra' ) => 'slide-up',
					__( 'Flip up', 'ohio-extra' ) => 'flip-up',
					__( 'Zoom in', 'ohio-extra' ) => 'zoom-in'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
		)
	);
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Ohio_Team_Members_Group extends WPBakeryShortCodesContainer { }
}