<?php
/**
 * 'vpg_slider' Shortcode
 * 
 * @package Video gallery and Player Pro
 * @since 1.0.0
 */
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Function to handle the `vpg_slider` shortcode
 * 
 * @package Video Player gallery 
 * @since 1.0.0
 */
function vpg_slider_shortcode( $atts, $content = null ) {
	// Shortcode Parameters
	$atts = shortcode_atts(array(
		'template'        		=> 'template-1',//gsp
		'video_limit'    		=> 20,//gsp
		'video_cat' 			=> '',//gsp
		'video_cell' 		    => '3',//gs 
		'post'     				=> array(),	//gsp	
		'exclude_post'			=> array(),//gsp
		'query_offset'			=> '',//gsp
		'order'					=> 'DESC',//gsp
		'orderby'		    	=> 'date',//gsp
		'show_title'    		=> 'true',//gsp
		'show_content'  		=> 'true',//gsp
		'popup_fix'				=> 'true',//gsp
		'popup_gallery'        => 'false',//gs
        'autoplay' 				=> 'false',//sp
        'autoplay_interval' 		=> 2000,//sp
		'speed' 				=> 1000, //sp
        'arrows' 				=> 'true',//sp
		'pagination_dots' 		=> 'true',//sp
        'loop' 					=> 'true',//sp
        'center_mode' 			=> 'false',//sp
        'auto_height'           => 'false',//sp
		'slides_scroll' 		=> '',//s
		'extra_class'			=> '',//gsp
	), $atts, 'vpg_slider');
    $vpgdesign	= vpg_templates();
    $design_temp = $atts['template'];
	$design = array_key_exists( trim($design_temp)  , $vpgdesign ) ? $design_temp : 'template-1';
	$design_file_url 	= WP_VPG_DIR . '/vpg-templates/slider/' .'template-1.php';
	$design_template 				= (file_exists($design_file_url)) ? $design_file_url : '';
	$atts['popup_fix'] 			    = ($atts['popup_fix'] == 'false') 			? 'false' 									: 'true';
	$atts['video_limit']			= !empty($atts['video_limit']) 					? $atts['video_limit'] 					: 20;
	$atts['cat']			        = (!empty($atts['video_cat']))				? explode(',', $atts['video_cat']) 			: '';
	$atts['video_cell'] 			= !empty($atts['video_cell']) 				? $atts['video_cell'] 						: 3;
	$atts['show_title'] 		    = ($atts['show_title'] == 'true' )			? 'true'									: 'false';
	$atts['show_content'] 		    = ($atts['show_content'] == 'true' )		? 'true'									: 'false';
	$atts['order'] 				    = (strtolower($atts['order']) == 'asc' ) 	? 'ASC' 									: 'DESC';
	$atts['orderby']			    = !empty($atts['orderby']) 					? $atts['orderby'] 							: 'date';
	$atts['posts'] 				    = !empty($atts['post'])						? explode(',', $atts['post']) 				: array();
	$atts['exclude_post']		    = !empty($atts['exclude_post'])				? explode(',', $atts['exclude_post']) 		: array();
	$atts['slides_scroll'] 	        = !empty($atts['slides_scroll']) 			? $atts['slides_scroll'] 					: 1;
	$atts['autoplay_speed'] 	    = ($atts['autoplay_interval'] !== '') 		? $atts['autoplay_interval'] 				: 3000;
	$atts['speed'] 				    = (!empty($atts['speed'])) 					? $atts['speed'] 							: 300;
	$atts['arrows'] 			    = ($atts['arrows'] == 'false') 				? 'false' 									: 'true';
    $atts['dots'] 			    = ($atts['pagination_dots'] == 'false') 	? 'false' 						                : 'true';
	$atts['autoplay'] 			    = ($atts['autoplay'] == 'false') 			? 'false' 									: 'true';
	$atts['auto_height'] 		    = ($atts['auto_height'] == 'false' )			? 'false'								: 'true';
	$atts['loop'] 				    = ($atts['loop'] == 'false') 				? 'false' 									: 'true';
	$atts['center_mode'] 			= ($atts['center_mode'] == 'false') 				? 'false' 							: 'true';
	$atts['query_offset']		    = !empty($atts['query_offset'])				? $atts['query_offset'] 					: null;
	$atts['extra_class']		= vpg_sanitize_html_classes($atts['extra_class']);
	
	$atts['popup_gallery'] 			= ($atts['popup_gallery'] == 'false') 		? 'false'       							: 'true';
	extract( $atts );     	
     wp_enqueue_script( 'wpoh-magnific-js' );
	 wp_enqueue_script( 'wpoh-slick-js' );
	 wp_enqueue_script( 'vpg-custom-js' );	 	
	// Taking some globals
	global $post;
	// Taking defoult variables
	$i = 1;
	$popup_html 	= '';	
	$fix 		= vpg_get_static();
	// WP Query Parameters
	$args = array ( 
					'post_type'				=> WP_VPG_POST_TYPE,
					'post_status' 			=> array( 'publish' ),
					'posts_per_page' 		=> $video_limit,
					'order' 				=> $order,
					'orderby' 				=> $orderby,
					'post__in' 				=> $posts,
					'post__not_in'			=> $exclude_post,
					'ignore_sticky_posts'	=> true,
					'offset'				=> $query_offset,
				);
	if($cat != ""){
            	$args['tax_query'] = array( array( 'taxonomy' => WP_VPG_CAT, 'field' => 'tearm_id', 'terms' => $cat) );
            } 	
	// WP Query
	$video_query = new WP_Query($args);
	// Taking some variables template
	$post_count = $video_query->post_count;
	// Slider and Popup Configuration	
       $slides_column 		= (!empty($video_cell) && $video_cell <= $post_count) ? $video_cell : $post_count;
	   $center_mode		= ($center_mode == 'true' && $video_cell % 2 != 0 && $video_cell != $post_count) ? 'true' : 'false';
	   $slider_center_cls	= ($center_mode == 'true') ? 'slider_center' : '';		
		$slider_conf = compact('slides_column', 'slides_scroll', 'dots', 'arrows', 'rows',  'autoplay', 'auto_height', 'autoplay_interval', 'loop', 'speed', 'center_mode');
		$popup_conf = compact('popup_gallery','popup_fix');		
	ob_start();
	// If post is there
	?>
	<?php if($extra_class!="") { ?>
	<div class="<?php echo $extra_class; ?>">
	<?php } ?>	
	<div class="vpg-video-outer vpg-slider-outer  wp-vgp-clearfix vpg-video-<?php echo $design_temp;?> <?php echo ' '. $slider_center_cls;?> " id="vpg-popup-slider-<?php echo $fix; ?>" >
	<div class="vpg-video-slider  video-outer-row vpg-outer-fix" id="vpg-video-slider-<?php echo $fix; ?>">
	<?php
	if( $video_query->have_posts() ) {
	while ($video_query->have_posts()) : $video_query->the_post();		
		$video_image = wp_get_attachment_url( get_post_thumbnail_id() );
		$mp4_video = get_post_meta($post->ID, '_prevpg_vpg_mp4', true);
		$wbbm_video = get_post_meta($post->ID, '_prevpg_vpg_wbbm', true);
		$ogg_video = get_post_meta($post->ID, '_prevpg_vpg_ogg', true);
		$youtube_url = get_post_meta($post->ID, '_prevpg_vpg_youtube', true);
		$vimeo_url = get_post_meta($post->ID, '_prevpg_vpg_vm', true);
		$video_url	= !empty( $youtube_url)	? $youtube_url : $vimeo_url;
?>
                 <?php 
		           if( $design_template ) {
					include($design_template);
					}
                ?>
<?php	$i++;		
		endwhile; ?>		
<?php				
	} 
?>
</div>
<div class="vpg-video-slider-js-call" data-conf="<?php echo htmlspecialchars(json_encode($slider_conf)); ?>"></div>
<div class="wp-vpg-popup-conf" style="display: none;" ><?php echo json_encode( $popup_conf ); ?></div><!-- end of-popup-conf -->
</div>
<?php if($extra_class!="") { ?>
 </div>
<?php } ?>
<?php
	wp_reset_query(); // Reset WP Query
	$content .= ob_get_clean();
	return $content;
}
// `vpg_slider` slider shortcode
add_shortcode('vpg_slider', 'vpg_slider_shortcode');