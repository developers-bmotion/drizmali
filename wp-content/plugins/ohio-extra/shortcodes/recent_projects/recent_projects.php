<?php

/**
* WPBakery Page Builder Ohio Recent Portfolio Projects shortcode
*/

add_shortcode( 'ohio_recent_projects', 'ohio_recent_projects_func' );

function ohio_recent_projects_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

	$fullscreen_mode = isset( $fullscreen_mode ) ? NorExtraFilter::boolean( $fullscreen_mode, true ) : true;

	// Default values, parsing and filtering
	$projects_solid = isset( $projects_solid ) ? NorExtraFilter::boolean( $projects_solid ) : false;
	$projects_category = isset( $projects_category ) ? NorExtraFilter::string( $projects_category, 'attr', 'all' ) : 'all';

	$show_projects_filter = isset( $show_projects_filter ) ? NorExtraFilter::boolean( $show_projects_filter ) : true;
	$filter_align = isset( $filter_align ) ? NorExtraFilter::string( $filter_align, 'attr', 'center' ) : 'center';

	$columns_in_row = isset( $columns_in_row ) ? NorExtraFilter::string( $columns_in_row, 'attr', '2-2-1' ) : '2-2-1';

	$card_layout = isset( $card_layout ) ? NorExtraFilter::string( $card_layout, 'string', 'grid_1' ) : 'grid_1';

	if ( $card_layout == 'grid_1' || $card_layout == 'grid_2' || $card_layout == 'grid_11' ) {
		$hover_effect = isset( $hover_effect ) ? NorExtraFilter::string( $hover_effect, 'string', 'type1' ) : 'type1';
	}
	$portfolio_images_size = isset( $portfolio_images_size ) ? NorExtraFilter::string( $portfolio_images_size, 'string', 'medium_large' ) : 'inherit';
	if(!$portfolio_images_size || $portfolio_images_size == 'inherit') {
        $portfolio_images_size = OhioOptions::get_global( 'portfolio_images_size' );
    }


	$metro_style = isset( $metro_style ) ? NorExtraFilter::boolean( $metro_style ) : false;
	$grid_items_gap = isset( $grid_items_gap ) ? NorExtraFilter::string( $grid_items_gap, 'string', '20px' ) : '20px';

	$use_pagination = isset( $use_pagination ) ? NorExtraFilter::boolean( $use_pagination ) : false;

	if ($use_pagination) {
		$projects_in_block = isset( $projects_in_block_pagination ) ? NorExtraFilter::string( $projects_in_block_pagination, 'attr', 4 ) : 4;
	} else {
		$projects_in_block = isset( $projects_in_block ) ? NorExtraFilter::string( $projects_in_block, 'attr', 4 ) : 4;
	}

	$pagination_type = isset( $pagination_type ) ? NorExtraFilter::string( $pagination_type, 'attr', 'simple' ) : 'simple';
    $pagination_position = isset( $pagination_position ) ? NorExtraFilter::string( $pagination_position, 'attr', 'left' ) : 'left';

	$pagination_items_per_page = isset( $pagination_items_per_page ) ? NorExtraFilter::string( $pagination_items_per_page, 'string', '6' ) : '6';

	$animation_type = isset( $animation_type ) ? NorExtraFilter::string( $animation_type, 'string', 'default' ) : 'default';
	$animation_effect = isset( $animation_effect ) ? NorExtraFilter::string( $animation_effect, 'string', 'fade-up' ) : 'fade-up';

	if ( $projects_category != 'all' ) {
		$_projects_category = $projects_category;
		$projects_category = array();
		foreach ( explode( ',', $_projects_category) as $category) {
			$category = trim( $category );
			if ( is_numeric( $category ) ) {
				$category = intval( $category );
			}
			$projects_category[] = $category;
		}

		if ( empty( $projects_category ) ) $projects_category = 'all';
	}

	$appearance_effect = isset( $appearance_effect ) ? NorExtraFilter::string( $appearance_effect, 'attr', 'none' ) : 'none';
	$appearance_duration = isset( $appearance_duration ) ? NorExtraFilter::string( $appearance_duration, 'attr', false ) : false;
	$appearance_delay = isset( $appearance_delay ) ? NorExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	$appearance_delay = intval( str_replace( 'ms', '', $appearance_delay ) );
	if ( $appearance_duration ) $appearance_duration = intval( str_replace( 'ms', '', $appearance_duration ) );

	$css_class = isset( $css_class ) ? NorExtraFilter::string( $css_class, 'attr', '' )  : '';

	$item_desktop = isset( $item_desktop ) ? NorExtraFilter::string( $item_desktop, 'attr', '5' ) : '5';
	$item_tablet = isset( $item_tablet ) ? NorExtraFilter::string( $item_tablet, 'attr', '3' ) : '3';
	$item_mobile = isset( $item_mobile ) ? NorExtraFilter::string( $item_mobile, 'attr', '1' ) : '1';

	$overlay_color = isset( $overlay_color ) ? NorExtraFilter::string( $overlay_color ) : false;
	$description_overlay_color = isset( $description_overlay_color ) ? NorExtraFilter::string( $description_overlay_color ) : false;
	$category_bg_color = isset( $category_bg_color ) ? NorExtraFilter::string( $category_bg_color ) : false;
	$background_color = isset( $background_color ) ? NorExtraFilter::string( $background_color ) : false;
	$item_spacing = isset( $item_spacing ) ? NorExtraFilter::boolean( $item_spacing ) : true;
	$asymmetric_parallax = isset( $asymmetric_parallax ) ? NorExtraFilter::boolean( $asymmetric_parallax ) : true;
	$asymmetric_parallax_speed = isset( $asymmetric_parallax_speed ) ? NorExtraFilter::string( $asymmetric_parallax_speed, 'int', 20 ) :20;
	$card_boxed_layout = isset( $card_boxed_layout ) ? NorExtraFilter::boolean ( $card_boxed_layout ) : false;
	$boxed_classes = '';

	$navigation_visibility = isset( $navigation_visibility ) ? NorExtraFilter::boolean( $navigation_visibility ) : false;
	$loop_mode = isset( $loop_mode ) ? NorExtraFilter::boolean( $loop_mode ) : false;
	$autoplay_mode = isset( $autoplay_mode ) ? NorExtraFilter::boolean( $autoplay_mode ) : false;
	$autoplay_interval = isset( $autoplay_interval ) ? NorExtraFilter::string( $autoplay_interval ) : '';
	$mousewheel_mode = isset( $mousewheel_scroll) ? NorExtraFilter::boolean( $mousewheel_scroll ) : false;
	$bullets_visibility = isset( $bullets_visibility ) ? NorExtraFilter::boolean( $bullets_visibility ) : false;
	$lightbox_visibility = isset( $lightbox_visibility ) ? NorExtraFilter::boolean( $lightbox_visibility ) : true;

	$title_typo = isset( $title_typo ) ? NorExtraFilter::string( $title_typo, 'string', false ) : false;
	$category_typo = isset( $category_typo ) ? NorExtraFilter::string( $category_typo, 'string', false ) : false;
	$link_typo = isset( $link_typo ) ? NorExtraFilter::string( $link_typo, 'string', false ) : false;
	$date_typo = isset( $date_typo ) ? NorExtraFilter::string( $date_typo, 'string', false ) : false;
	$short_description_typo = isset( $short_description_typo ) ? NorExtraFilter::string( $short_description_typo, 'string', false ) : false;

	$brand_classes = [
		'background_class' => '',
		'overlay_class' => '',
		'category_class' => '',
		'title_class' => '',
		'more_class' => '',
		'short_description_class' => '',
		'date_class' => ''
	];

	if( $card_boxed_layout ) $boxed_classes = 'boxed';

	if ( $show_projects_filter ) {
		$wrap_classes[] = 'with-sorting';
	}

	if ( $fullscreen_mode ) {
		$fullscreen_classes = 'full-vh';
	}

	$_tax_query = array();
	
	if ( $projects_category != 'all' ) {
		$_tax_query = array(
			array(
				'taxonomy' => 'ohio_portfolio_category',
				'terms'    => $projects_category
			)
		);
	}

	if (is_front_page()) {
		$paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}

	$args = array(
	  'posts_per_page' 	=> intval( $projects_in_block ),
	  'orderby' 		=> 'date',
	  'order' 			=> 'DESC',
	  'post_type' 		=> 'ohio_portfolio',
	  'tax_query' 		=> $_tax_query,
	  'post_status' 	=> 'publish',
	  'paged'			=> $paged
	);
	$query = new WP_Query( $args );

	$projects_data = $query->posts;

	$column_class = NorExtraParser::VC_columns_to_CSS( $columns_in_row );
	$column_double_class = NorExtraParser::VC_columns_to_CSS( $columns_in_row, true );

	$column_asymmetric_grid = $columns_in_row;

	$columns_in_row = explode( '-', $columns_in_row );
	if ( is_array( $columns_in_row ) ) {
		$columns_in_row = intval( $columns_in_row[0] );
	}

	$is_slider = false;

	switch ( $card_layout ) {
		case 'grid_3':
		case 'grid_4':
		case 'grid_5':
		case 'grid_6':
		case 'grid_7':
		case 'grid_9':
		case 'grid_10':
			$is_slider = true;
			break;
	}

	// Styling
	$recent_projects_uniqid = uniqid( 'ohio-custom-' );
	$wrap_classes = [];
	$GLOBALS['ohio_icon_fonts'][] = 'my-icon-arr-out';
	$grid_items_gap_css = '';

	if( $item_spacing ) {
		$grid_items_gap_css = "padding: $grid_items_gap ;  ";
	}

	switch ( $filter_align ) {
		case 'left':
			$filter_align_class = ' text-left';
			break;
		case 'right':
			$filter_align_class = ' text-right';
			break;
		default:
			$filter_align_class = '';
			break;
	}

	$more_css = '';
	$more_css_before = '';
	$more_class = '';
	$category_css = '';
	$category_class = '';
	
	if ( $is_slider ) {

		$navBtn = $navigation_visibility;
		$loop = $loop_mode;
		if( $autoplay_mode ) {
			$autoplay = $autoplay_mode;
			$autoplayTimeout = $autoplay_interval;
		}
		$mousewheel = $mousewheel_mode;
		$pagination = $bullets_visibility;

		$date_css = NorExtraParser::VC_typo_to_CSS( $date_typo );
		$short_description_css = NorExtraParser::VC_typo_to_CSS( $short_description_typo );
		$link_css = NorExtraParser::VC_typo_to_CSS( $link_typo );

	}

	$background_css = '';
	$overlay_css = '';
	$description_overlay_color_css = '';

	if ( $overlay_color == 'brand' ) {
		$brand_classes['overlay_class'] = 'brand-bg-color-i';
	} else if ( $overlay_color ) {
		$overlay_css = 'background-color:' . $overlay_color . ';';
	}
	if ( $description_overlay_color == 'brand' ) {
		$brand_classes['overlay_class'] = 'brand-bg-color-i';
	} else if ( $description_overlay_color ) {
		$description_overlay_color_css = 'background-color:' . $description_overlay_color . ';';
	}
	if( $background_color == 'brand' ) {
		$brand_classes['background_class'] = 'brand-bg-color-i';
	} else if ( $background_color ) {
		$background_css = 'background-color:' . $background_color . ';';
	}

	$title_css = NorExtraParser::VC_typo_to_CSS( $title_typo );
	$category_css = NorExtraParser::VC_typo_to_CSS( $category_typo );

	$pagination_class = $pagination_css = $pagination_hover_css = '';
	$wrap_classes[] = $css_class;
	$wrap_classes[] = $card_layout;

	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}

	// Assembling
	include( plugin_dir_path( __FILE__ ) . 'recent_projects__style.php' );
	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'recent_projects__view.php' );
	return ob_get_clean();
}