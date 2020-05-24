<?php

/**
* WPBakery Page Builder Ohio Social Networks shortcode params
*/

vc_lean_map( 'ohio_social_networks', 'ohio_social_networks_sc_map' );

function ohio_social_networks_sc_map() {
	return array(
		'name' => __( 'Social Networks', 'ohio-extra' ),
		'description' => __( 'Social sharing buttons block', 'ohio-extra' ),
		'base' => 'ohio_social_networks',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => plugin_dir_url( __FILE__ ) . 'images/icon.svg',
		'params' => array(

			// General
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Social networks layout', 'ohio-extra' ),
				'param_name' => 'icon_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_052.svg',
						'key' => 'outline',
						'title' => __( 'Outline', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_053.svg',
						'key' => 'fill',
						'title' => __( 'Fill', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_054.svg',
						'key' => 'flat',
						'title' => __( 'Flat', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_055.svg',
						'key' => 'inline',
						'title' => __( 'Inline', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_056.svg',
						'key' => 'text',
						'title' => __( 'Text', 'ohio-extra' ),
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/wpb_params_057.svg',
						'key' => 'boxed',
						'title' => __( 'Boxed', 'ohio-extra' ),
					),
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Social networks alignment', 'ohio-extra' ),
				'param_name' => 'alignment',
				'std' => 'center',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'dependency' => array(
					'element' => 'icon_layout',
					'value' => array(
						'outline',
						'fill',
						'flat',
						'inline',
						'text'
					),
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Use small shapes', 'ohio-extra' ),
				'param_name' => 'small_shapes',
				'std' => '0',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'icon_layout',
					'value' => array(
						'outline',
						'fill',
						'flat',
						'inline',
						'text'
					),
				),
			),

			// Links
			array(
				'type' => 'dropdown',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => __( 'Type links', 'ohio-extra' ),
				'param_name' => 'type_links',
				'value' => array(
					__( 'Share', 'ohio-extra' ) => 'share',
					__( 'Custom', 'ohio-extra' ) => 'custom',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-facebook"></em>' . __( 'Facebook share', 'ohio-extra' ),
				'param_name' => 'facebook',
				'value' => array(
					__( 'Add', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-twitter"></em>' . __( 'Twitter share', 'ohio-extra' ),
				'param_name' => 'twitter',
				'value' => array(
					__( 'Add', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-googleplus-outline"></em>' . __( 'Google+ share', 'ohio-extra' ),
				'param_name' => 'googleplus',
				'value' => array(
					__( 'Add', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-linkedin-outline"></em>' . __( 'LinkedIn share', 'ohio-extra' ),
				'param_name' => 'linkedin',
				'value' => array(
					__( 'Add', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-pinterest-outline"></em>' . __( 'Pinterest share', 'ohio-extra' ),
				'param_name' => 'pinterest',
				'value' => array(
					__( 'Add', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-vk"></em>' . __( 'Vkontakte share', 'ohio-extra' ),
				'param_name' => 'vk',
				'value' => array(
					__( 'Add', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'share',
				),
			),
			/* Custom */
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-facebook"></em>' . __( 'Facebook link', 'ohio-extra' ),
				'param_name' => 'facebook_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-twitter"></em>' . __( 'Twitter link', 'ohio-extra' ),
				'param_name' => 'twitter_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-instagram-outline"></em>' . __( 'Instagram link', 'ohio-extra' ),
				'param_name' => 'instagram_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-dribbble"></em>' . __( 'Dribbble link', 'ohio-extra' ),
				'param_name' => 'dribbble_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-linkedin-outline"></em>' . __( 'LinkedIn link', 'ohio-extra' ),
				'param_name' => 'linkedin_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-pinterest-outline"></em>' . __( 'Pinterest link', 'ohio-extra' ),
				'param_name' => 'pinterest_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is ion-social-github"></em>' . __( 'GitHub link', 'ohio-extra' ),
				'param_name' => 'github_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-dropbox"></em>' . __( 'Dropbox link', 'ohio-extra' ),
				'param_name' => 'dropbox_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-vk"></em>' . __( 'Vkontakte link', 'ohio-extra' ),
				'param_name' => 'vk_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-youtube"></em>' . __( 'Youtube link', 'ohio-extra' ),
				'param_name' => 'youtube_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-vimeo"></em>' . __( 'Vimeo link', 'ohio-extra' ),
				'param_name' => 'vimeo_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-behance"></em>' . __( 'Behance link', 'ohio-extra' ),
				'param_name' => 'behance_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-tumblr"></em>' . __( 'Tumblr link', 'ohio-extra' ),
				'param_name' => 'tumblr_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-flickr"></em>' . __( 'flickr link', 'ohio-extra' ),
				'param_name' => 'flickr_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-reddit-alien"></em>' . __( 'reddit link', 'ohio-extra' ),
				'param_name' => 'reddit_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-snapchat-ghost"></em>' . __( 'Snapchat link', 'ohio-extra' ),
				'param_name' => 'snapchat_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-whatsapp"></em>' . __( 'Whatsapp link', 'ohio-extra' ),
				'param_name' => 'whatsapp_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-quora"></em>' . __( 'Quora link', 'ohio-extra' ),
				'param_name' => 'quora_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-vine"></em>' . __( 'Vine link', 'ohio-extra' ),
				'param_name' => 'vine_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-digg"></em>' . __( 'Digg link', 'ohio-extra' ),
				'param_name' => 'digg_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Links', 'ohio-extra' ),
				'heading' => '<em class="ohio_is fa fa-foursquare"></em>' . __( 'Foursquare link', 'ohio-extra' ),
				'param_name' => 'foursquare_link_custom',
				'dependency' => array(
					'element' => 'type_links',
					'value' => 'custom',
				),
			),
			
			// Color settings
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'color_settings_title',
				'value' => __( 'Color settings', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Outline hover', 'ohio-extra' ),
				'param_name' => 'outline_hover',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'icon_layout',
					'value' => 'flat',
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Default colors', 'ohio-extra' ),
				'param_name' => 'default_colors',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Hover default colors', 'ohio-extra' ),
				'param_name' => 'hover_default_colors',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				),
				'dependency' => array(
					'element' => 'default_colors',
					'value' => '0',
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Shape color', 'ohio-extra' ),
				'param_name' => 'color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => '0',
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Icon color', 'ohio-extra' ),
				'param_name' => 'icon_color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => '0',
				),
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'heading' => __( 'Icon hover color', 'ohio-extra' ),
				'param_name' => 'icon_hover_color',
				'dependency' => array(
					'element' => 'default_colors',
					'value' => '0',
				),
			),
			
			// Custom CSS Class
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Styles & Colors', 'ohio-extra' ),
				'param_name' => 'other_settings_title',
				'value' => __( 'Other', 'ohio-extra' ),
			),
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