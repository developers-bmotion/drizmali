<?php

/**
* WPBakery Page Builder Ohio Compare shortcode view
*/

?>
<div class="ohio-compare-sc compare-shortcode <?php echo esc_attr( $css_class ); ?>" 
	id="<?php echo esc_attr( $compare_uniqid ); ?>" 
	<?php if ( $hide_overlay ) { echo ' data-compare-without-overlay="true"'; } ?> 
	<?php if ( $label_before ) { echo ' data-compare-before-label="' . $label_before . '"'; } ?> 
	<?php if ( $label_after ) { echo ' data-compare-after-label="' . $label_after . '"'; } ?> 
	<?php if ( $position ) { echo ' data-compare-position="' . $position . '"'; } ?> 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>>

	<img src="<?php echo esc_url( $first_image ); ?>" alt="Before">
	<img src="<?php echo esc_url( $second_image ); ?>" alt="After">

</div>