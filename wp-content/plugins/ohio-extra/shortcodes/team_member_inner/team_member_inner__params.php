<?php

/**
* WPBakery Page Builder Ohio Team Members Group Inner shortcode params
*/

vc_lean_map( 'ohio_team_member_inner', 'ohio_team_member_inner_sc_map' );

function ohio_team_member_inner_sc_map() {
	return array(
		'name' => __( 'Team Member', 'ohio-extra' ),
		'description' => __( 'Team member module', 'ohio-extra' ),
		'base' => 'ohio_team_member_inner',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => plugin_dir_url( __FILE__ ) . 'images/icon.svg',
		'content_element' => true,
		'as_child' => array(
			'only' => 'ohio_team_member_group'
		),
		'js_view' => 'VcOhioTeamMemberInnerView',
		'custom_markup' => '{{title}}<div class="vc_ohio_team_member_inner-container">
				<div class="_contain">
					<div class="photo" style="background-image: url(\'' . plugin_dir_url( __FILE__ ) . 'images/view_user_gap.png\');"></div>
					<div class="right">
						<div class="name">%%name%%</div>
						<div class="position"></div>
						<div class="lines"><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div></div>
					</div>
				</div>
			</div>',
		'params' => array(
			// General
			array(
				'type' => 'attach_image',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Photo', 'ohio-extra' ),
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
				'description' => __( 'E.g. <strong>Product manager</strong>.', 'ohio-extra' ),
			),
			array(
				'type' => 'textarea',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Description', 'ohio-extra' ),
				'param_name' => 'description',
				'description' => __( 'Tell what this remarkable team member in your team.', 'ohio-extra' ),
			),

			// Soc links
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-facebook-f"></em>' . __( 'Facebook link', 'ohio-extra' ),
				'param_name' => 'facebook_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-twitter"></em>' . __( 'Twitter link', 'ohio-extra' ),
				'param_name' => 'twitter_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-dribbble"></em>' . __( 'Dribbble link', 'ohio-extra' ),
				'param_name' => 'dribbble_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-pinterest-p"></em>' . __( 'Pinterest link', 'ohio-extra' ),
				'param_name' => 'pinterest_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-github"></em>' . __( 'Github link', 'ohio-extra' ),
				'param_name' => 'github_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-instagram"></em>' . __( 'Instagram link', 'ohio-extra' ),
				'param_name' => 'instagram_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-linkedin"></em>' . __( 'LinkedIn link', 'ohio-extra' ),
				'param_name' => 'linkedin_link'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Social links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-vk"></em>' . __( 'Vkontakte link', 'ohio-extra' ),
				'param_name' => 'vk_link'
			),

			/* Typography */
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
				'heading' => __( 'Name color', 'ohio-extra' ),
				'param_name' => 'name_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Position text color', 'ohio-extra' ),
				'param_name' => 'position_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Description color', 'ohio-extra' ),
				'param_name' => 'description_color',
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
			array(
				'type' => 'textfield',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Custom CSS class', 'ohio-extra' ),
				'param_name' => 'css_class',
				'description' => __( 'If you want to add own styles to a specific unit, use this field to add custom CSS class.', 'ohio-extra' )
			),
		)
	);
}