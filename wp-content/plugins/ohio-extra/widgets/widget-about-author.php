<?php

if ( ! class_exists( 'ohio_widget_about_author' ) ) {

	class ohio_widget_about_author extends SB_WP_Widget {

		protected $options;

		public function __construct() {		
			$this->options = array(
				array(
					'title', 'text', '', 
					'label' => esc_html__( 'Title', 'ohio-extra' ), 
					'input' => 'text', 
					'filters' => 'widget_title',
					'on_update' => 'esc_attr'
				),
			);
			
			parent::__construct(
				'ohio_widget_about_author',
				'Ohio: ' . esc_html__( 'About author', 'ohio-extra' ),
				array( 'description' => esc_html__( 'About author', 'ohio-extra' ) )
			);
		}

		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) {
				$title = $instance[ 'title' ];
			} else {
				$title = '';
			}
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'ohio-extra' ); ?>:</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {

			$instance = array();
			$instance['title'] = strip_tags( $new_instance['title'] );

			return $instance;
		}

		public function widget( $args, $instance ) {
			extract( $args );
			$this->setInstances( $instance, 'filter' );

			$allowed_tags = array(
				'div' => array(
					'id' => array(),
					'class' => array()
				),
				'li' => array(
					'id' => array(),
					'class' => array()
				),
				'section' => array(
					'id' => array(),
					'class' => array()
				),
				'h3' => array(
					'class' => array()
				)
			);

			$admin = false;
			$author = get_the_author_meta( 'ID' );
			if ( ! $author ) {
				$admin = get_users( array( 'role' => 'administrator' ) );
				$admin = $admin[0];
				$author = get_the_author_meta( 'ID', $admin->ID );// set admin
			}
			$authors_setting = get_field( 'global_author_social_links', 'option' );

			echo wp_kses( $before_widget, $allowed_tags );
			$title = $this->getInstance( 'title' );
			if ( ! empty( $title ) ) {
				echo wp_kses( $before_title . esc_html( $title ) . $after_title, $allowed_tags );
			}
			printf( '<img src="%s" alt="' . esc_html__( 'Author avatar', 'ohio-extra' ) . '" />', get_avatar_url( $author ) );
			?>
				<div class="content">
					<div class="info">
						<div class="info-wrap">
							<?php
								if ( ! $admin ) {
									printf( '<h6>%s</h6>', esc_html( get_the_author() ) );
									printf( '<span class="site">%s</span>', get_the_author_meta( 'url', $author ) );
								} else {
									printf( '<h4>%s</h4>', esc_html( $admin->display_name ) );
									printf( '<span class="site">%s</span>', get_the_author_meta( 'url', $admin->ID ) );
								}
							?>
						</div>
					</div>
					<?php
						if ( ! $admin ) {
							echo get_the_author_meta( 'description', $author );
						} else {
							echo get_the_author_meta( 'description', $admin->ID );
						}
					?>
					<div class="socialbar outline small">
						<?php
						if ( $authors_setting && is_array( $authors_setting ) ) {
							foreach ( $authors_setting as $author_setting ) {
								if ( isset( $author_setting['author'] ) && $author == $author_setting['author']['ID'] ) {
									foreach ( $author_setting['links'] as $author_link ) {
										echo '<a href="' . esc_url( $author_link['url'] ) . '" class="social brand-color-hover">';
										switch ($author_link['social_networks']) {
											case 'facebook':
												echo '<i class="icon fa fa-facebook-f"></i>';
												break;
											case 'twitter':
												echo '<i class="icon fa fa-twitter"></i>';
												break;
											case 'instagram':
												echo '<i class="icon fa fa-instagram"></i>';
												break;
											case 'youtube':
												echo '<i class="icon fa fa-youtube"></i>';
												break;
											case 'google_plus':
												echo '<i class="icon fa fa-google"></i>';
												break;
											case 'linkedin':
												echo '<i class="icon fa fa-linkedin"></i>';
												break;
											case 'pinterest':
												echo '<i class="icon fa fa-pinterest"></i>';
												break;
											case 'vimeo':
												echo '<i class="icon fa fa-vimeo"></i>';
												break;
											case 'github':
												echo '<i class="icon fa fa-github"></i>';
												break;
										}
										echo '</a>';
									}
									break;
								}
							}
						}
						?>
					</div>
				</div>
			<?php
			echo wp_kses( $after_widget, $allowed_tags );
		}

	}

}

register_widget( 'ohio_widget_about_author' );