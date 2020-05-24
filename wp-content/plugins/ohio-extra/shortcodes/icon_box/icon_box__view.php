<?php

/**
* WPBakery Page Builder Ohio Icon Box shortcode view
*/

?>
<div class="ohio-icon-box-sc <?php echo $icon_box_class_main . $css_class; ?> <?php if ( $content_full == 'full' ) { echo 'with-full-icon'; } ?><?php echo $icon_box_class_icon; ?>" 
	id="<?php echo esc_attr( $icon_box_uniqid ); ?>" 
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?> 
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>>

	<div class="icon-box-headline">
		<i class="icon-box-icon">
			<?php if ( $icon_type == 'font_icon' && $icon_as_icon ) : ?>
				<span class="<?php echo $icon_as_icon; ?>"></span>
			<?php elseif ( $icon_as_image ) : ?>
				<img src="<?php echo esc_url( $icon_as_image ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			<?php endif; ?>
		</i>
		<h5 class="icon-box-title heading-sm"><?php echo $title; ?></h5>
	</div>

	<p class="icon-box-details">
		<?php echo $description; ?>
	</p>

	<?php if ( $use_link ) : ?>
		<a class="btn<?php echo $button_css['classes']; ?>" href="<?php echo esc_url( $link_url['url'] ); ?>"
		<?php if ( $link_url['blank'] ) { echo ' target="_blank"'; } ?>>
			<?php echo $link_url['caption']; ?>
			<?php if( $button_settings['type'] == 'arrow_link' ) : ?>
				<i class="ion-right ion"><svg class="arrow-icon" width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 7H16M16 7L11 1M16 7L11 13" stroke-width="2"/></svg></i>
			<?php endif; ?>
		</a>
	<?php endif; ?>

</div>