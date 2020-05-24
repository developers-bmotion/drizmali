<?php

if ( ! class_exists( 'ohio_widget_logo' ) ) {

	class ohio_widget_logo extends SB_WP_Widget {
		
		protected $options;
		
		public function __construct() {

			$this->options = array(
				array(
					'custom_css', 'text', '', 
					'label' => esc_html__( 'Custom CSS classes', 'ohio-extra' ), 
					'input' => 'text'
				)
			);
			
			parent::__construct(
				'ohio_widget_logo',
				'Ohio: ' . esc_html__( 'Logo', 'ohio-extra' ),
				array( 'description' => esc_html__( 'Display site logo', 'ohio-extra' ) )
			);
		}
		
		function widget( $args, $instance ) {
			extract( $args );
			$this->setInstances( $instance, 'filter' );

			$allowed_tags = array(
				'section' => array(
					'id' => array(),
					'class' => array()
				),
				'li' => array(
					'id' => array(),
					'class' => array()
				),
				'div' => array(
					'id' => array(),
					'class' => array()
				),
				'h3' => array(
					'class' => array()
				)
			);

			$css_classes = $this->getInstance( 'custom_css' );
			$logo = OhioSettings::footer_widget_logo();

			echo wp_kses( $before_widget, $allowed_tags );
			?>
				<div class="theme-logo <?php if ( $css_classes ) { echo esc_attr( $css_classes ); } ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php if ( is_array( $logo ) && $logo['default'] ) : ?>
						<img src="<?php echo esc_url( ( $logo['default'] ) ? $logo['default'] : $logo['retina'] ); ?>" <?php if ( $logo['have_vector'] ) { echo ' class="svg-logo"'; } ?><?php if ( $logo['retina'] ) { echo ' srcset="' . $logo['retina'] . ' 2x"'; } ?> alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					<?php else : ?>
						<h3 class="title text-left"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h3>
					<?php endif; ?>
					</a>
				</div>
			<?php

			echo wp_kses( $after_widget, $allowed_tags );
		}
	}

	register_widget( 'ohio_widget_logo' );
}