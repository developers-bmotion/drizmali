<?php

/**
* WPBakery Page Builder Ohio Team Member shortcode view
*/

?>
<div class="ohio-team-member-sc team-member<?php echo $css_class; ?>"
	id="<?php echo esc_attr( $team_member_uniqid ); ?>"
	<?php if ( $appearance_effect != 'none' ) { echo ' data-aos="' . esc_attr( $appearance_effect ) . '"'; } ?>
	<?php if ( $appearance_duration ) { echo ' data-aos-duration="' . esc_attr( $appearance_duration ) . '"'; } ?>
	<?php if ( $appearance_delay ) echo ' data-aos-delay="' . $appearance_delay . '"'; ?>>
	<div class="team-member_image image-wrap hover-scale-img" data-cursor-class="cursor-link">
		<?php if ($member_link): ?>
			<a href="<?php echo $member_link ?>" class="team-member-link">
		<?php endif; ?>

			<?php if ( $photo ) : ?>
				<img src="<?php echo esc_url( $photo ); ?>" alt="<?php echo esc_attr( $name ); ?>">
			<?php endif; ?>

		<?php if ($member_link): ?>
			</a>
		<?php endif; ?>

		<div class="wrap team-member_wrap">
			<?php if ( $block_type_layout == 'inner' ) : ?>
				<h5 class="team-member_title"><?php echo $name; ?></h5>
				<p class="team-member_subtitle"><?php echo $position; ?></p>
			<?php endif; ?>

			<div class="team-member_description_wrap">
				<?php if ($description != ''): ?>
					<p class="team-member_description"><?php echo $description; ?></p>
				<?php endif; ?>
				<div class="socialbar outline small">
					<?php if ( $facebook_link ) : ?>
						<a href="<?php echo $facebook_link; ?>" class="facebook"><span class="icon fa fa-facebook-f"></span></a>
					<?php endif; ?>
					<?php if ( $twitter_link ) : ?>
						<a href="<?php echo $twitter_link; ?>" class="twitter"><span class="icon fa fa-twitter"></span></a>
					<?php endif; ?>
					<?php if ( $dribbble_link ) : ?>
						<a href="<?php echo $dribbble_link; ?>" class="dribbble"><span class="icon fa fa-dribbble"></span></a>
					<?php endif; ?>
					<?php if ( $pinterest_link ) : ?>
						<a href="<?php echo $pinterest_link; ?>" class="pinterest"><span class="icon fa fa-pinterest-p"></span></a>
					<?php endif; ?>
					<?php if ( $github_link ) : ?>
						<a href="<?php echo $github_link; ?>" class="github"><span class="icon fa fa-github"></span></a>
					<?php endif; ?>
					<?php if ( $instagram_link ) : ?>
						<a href="<?php echo $instagram_link; ?>" class="instagram"><span class="icon fa fa-instagram"></span></a>
					<?php endif; ?>
					<?php if ( $linkedin_link ) : ?>
						<a href="<?php echo $linkedin_link; ?>" class="linkedin"><span class="icon fa fa-linkedin"></span></a>
					<?php endif; ?>
					<?php if ( $vk_link ) : ?>
						<a href="<?php echo $vk_link; ?>" class="vk"><span class="icon fa fa-vk"></span></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php if ( $block_type_layout != 'inner' ) : ?>
		<h5 class="team-member_title"><?php echo $name; ?></h5>
		<p class="team-member_subtitle"><?php echo $position; ?></p>
	<?php endif; ?>
</div>