<?php

/**
* WPBakery Page Builder Ohio Team Member shortcode params
*/

vc_lean_map( 'ohio_team_member', 'ohio_team_member_sc_map' );

function ohio_team_member_sc_map() {
	return array(
			'name' => __( 'Team Member', 'ohio-extra' ),
			'description' => __( 'Team member block', 'ohio-extra' ),
			'base' => 'ohio_team_member',
			'category' => __( 'Ohio', 'ohio-extra' ),
			'icon' => plugin_dir_url( __FILE__ ) . 'images/icon.svg',
			'js_view' => 'VcOhioTeamMemberView',
			'custom_markup' => '{{title}}<div class="vc_ohio_team_member-container">
					<div class="_contain">
						<div class="photo" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/sc_gap_user.svg\');"></div>
						<div class="name">%%name%%</div>
						<div class="position"></div>
					</div>
					<div class="lines"><div class="line"></div><div class="line"></div></div>
				</div>',
			'params' => array(
				// General
				array(
					'type' => 'ohio_choose_box',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Team member layout', 'ohio-extra' ),
					'param_name' => 'block_type_layout',
					'value' => array(
						array(
							'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_062.svg',
							'key' => 'full',
							'title' => __( 'Card details', 'ohio-extra' ),
						),
						array(
							'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_063.svg',
							'key' => 'inner',
							'title' => __( 'Inner details', 'ohio-extra' ),
						)
					)
				),
				array(
					'type' => 'attach_image',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Team member photo', 'ohio-extra' ),
					'param_name' => 'photo',
					'description' => __( 'Choose member photo.', 'ohio-extra' ),
				),
				array(
					'type' => 'textfield',
					'holder' => 'em',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Name', 'ohio-extra' ),
					'param_name' => 'name',
					'description' => __( 'Team member name.', 'ohio-extra' ),
				),
				array(
					'type' => 'textfield',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Position', 'ohio-extra' ),
					'param_name' => 'position',
					'description' => __( 'E.g. <em>Product manager</em>.', 'ohio-extra' ),
				),
				array(
					'type' => 'textarea',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Description', 'ohio-extra' ),
					'param_name' => 'description',
					'description' => __( 'Tell what this remarkable team member in your team.', 'ohio-extra' ),
				),
				array(
					'type' => 'textfield',
					'group' => __( 'General', 'ohio-extra' ),
					'heading' => __( 'Custom link', 'norebro-extra' ),
					'param_name' => 'member_link',
					'description' => __( 'Enter link to team member profile', 'norebro-extra' ),
				),

				// Soc links 
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-facebook-f"></em>' . __( 'Facebook link', 'ohio-extra' ),
					'param_name' => 'facebook_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-twitter"></em>' . __( 'Twitter link', 'ohio-extra' ),
					'param_name' => 'twitter_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-dribbble"></em>' . __( 'Dribbble link', 'ohio-extra' ),
					'param_name' => 'dribbble_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-pinterest-p"></em>' . __( 'Pinterest link', 'ohio-extra' ),
					'param_name' => 'pinterest_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-github"></em>' . __( 'Github link', 'ohio-extra' ),
					'param_name' => 'github_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-instagram"></em>' . __( 'Instagram link', 'ohio-extra' ),
					'param_name' => 'instagram_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-linkedin"></em>' . __( 'LinkedIn link', 'ohio-extra' ),
					'param_name' => 'linkedin_link'
				),
				array(
					'type' => 'textfield',
					'group' => __( 'Social Links', 'ohio-extra' ),
					'heading' => '<em class="ohio_is fa fa-vk"></em>' . __( 'Vkontakte link', 'ohio-extra' ),
					'param_name' => 'vk_link'
				),

				// Typography
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'typo_tab_divider_name',
					'value' => __( 'Name', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_typography',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'name_typo',
				),
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'typo_tab_divider_position',
					'value' => __( 'Position', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_typography',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'position_typo',
				),
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'typo_tab_divider_description',
					'value' => __( 'Description', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_typography',
					'group' => __( 'Typography', 'ohio-extra' ),
					'param_name' => 'desription_typo',
				),

				// Color settings
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'param_name' => 'color_settings_title',
					'value' => __( 'Color settings', 'ohio-extra' ),
				),
				array(
					'type' => 'ohio_colorpicker',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'heading' => __( 'Overlay color', 'ohio-extra' ),
					'param_name' => 'overlay_color',
				),
				array(
					'type' => 'ohio_colorpicker',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'heading' => __( 'Social buttons color', 'ohio-extra' ),
					'param_name' => 'social_color',
				),
				array(
					'type' => 'ohio_colorpicker',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
					'heading' => __( 'Social buttons hover color', 'ohio-extra' ),
					'param_name' => 'social_hover_color',
				),
				array(
					'type' => 'ohio_divider',
					'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'style_tab_divider_other',
				'value' => __( 'Other', 'ohio-extra' ),
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