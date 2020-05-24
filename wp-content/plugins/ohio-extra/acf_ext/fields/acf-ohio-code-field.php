<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( ! class_exists( 'acf_field_ohio_code' ) ) :


class acf_field_ohio_code extends acf_field {

	function __construct( $settings ) {

		$this->name = 'ohio_code';
		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/
		$this->label = esc_html__( 'Ohio code', 'ohio-extra' );
		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/
		$this->category = 'basic';
		/*
		*  defaults (array) Array of default settings which are merged into the field object. These are used later in settings
		*/
		$this->defaults = array(
			'add_theme_inherited' => true
		);
		/*
		*  l10n (array) Array of strings that are used in JavaScript. This allows JS strings to be translated in PHP and loaded via:
		*  var message = acf._e('FIELD_NAME', 'error');
		*/
		
		$this->l10n = array(
			'error'	=> esc_html__( 'Error! Please enter a higher value', 'ohio-extra' ),
		);
		/*
		*  settings (array) Store plugin settings (url, path, version) as a reference for later use with assets
		*/
		$this->settings = $settings;

		// ----------------------------------------------------------------------------------------------------

		// do not delete!
    	parent::__construct();
    	
	}



	/*function render_field_settings( $field ) {
		acf_render_field_setting( $field, array(
			'label'			=> __( 'Add "Theme inherited" option?','acf' ),
			'instructions'	=> '',
			'name'			=> 'add_theme_inherited',
			'type'			=> 'true_false',
			'ui'			=> 1,
		));
	}*/
	
	
	function render_field( $field ) {

		/*
		echo '<pre>';
		print_r( $field );
		echo '</pre>';
		*/

		$text = acf_get_sub_array( $field, array('id', 'class', 'name', 'value') );
		$hidden = acf_get_sub_array( $field, array('name', 'value') );
		$uniqid = uniqid( 'ohio-code' );

		$value_array = array();

		if ( $field['value'] ) {
			$value_array = explode( '-', $field['value'] );
		}
		elseif ( $field['default_value'] ) {
			$value_array = explode( '-', $field['default_value'] );
		}

		$large = ( isset( $value_array[0] ) ) ? NorExtraFilter::string( $value_array[0], 'attr', '' ) : '4';
		$medium = ( isset( $value_array[1] ) ) ? NorExtraFilter::string( $value_array[1], 'attr', '' ) : '3';
		$small = ( isset( $value_array[2] ) ) ? NorExtraFilter::string( $value_array[2], 'attr', '' ) : '2';
		$extra_small = ( isset( $value_array[3] ) ) ? NorExtraFilter::string( $value_array[3], 'attr', '' ) : '1';
?>

		<div class="ohio-acf-code-field-content" data-uniqid="<?php echo $uniqid; ?>">

			<!-- Hidden field -->
			<?php acf_hidden_input( $hidden ); ?>
			<script>
				var editor = CodeMirror.fromTextArea( jQuery('[data-uniqid="<?php echo $uniqid; ?>"] input')[0], {
					lineNumbers: true,
					mode: '<?php echo $field['language']; ?>'
				});
			</script>

		</div>

<?php
	}
	

	
	function input_admin_enqueue_scripts() {
		global $wp_scripts, $wp_styles;

		$url = $this->settings['url'];
		$version = $this->settings['version'];

		// wp_register_style( 'acf-input-ohio', "{$url}assets/css/input.css", array( 'acf-input' ), $version );
		wp_enqueue_style( 'acf-input-ohio' );
		
		wp_register_script( 'acf-input-ohio-code', "{$url}assets/js/input.js", array( 'acf-input' ), $version );

        $fonts_type = OhioOptions::get_global( 'page_font_type', 'google_fonts' );
        $inputVariables = array(
            'typoType' => $fonts_type
        );
        switch ($fonts_type) {
            case 'adobe_fonts':
                $inputVariables['typoLink'] = 'https://use.typekit.net/' . OhioOptions::get_global( 'adobekit_url' ) . '.css';
                break;
            case 'google_fonts':
                $inputVariables['typoLink'] = 'https://fonts.googleapis.com/css?family=';
                break;
            default:
                $inputVariables['typoLink'] = 'https://fonts.googleapis.com/css?family=';
                break;
        }
        wp_localize_script('acf-input-ohio-code', 'inputVariables', $inputVariables);

		wp_enqueue_script('acf-input-ohio-code');

		wp_register_style( 'code-mirror', "{$url}assets/css/codemirror.css", array( 'acf-input' ), $version );
		wp_enqueue_style( 'code-mirror' );
		wp_register_script( 'code-mirror', "{$url}assets/js/codemirror.js", array( 'acf-input' ), $version );
		wp_enqueue_script('code-mirror');
		wp_register_script( 'code-mirror-css', "{$url}assets/mode/css/css.js", array( 'acf-input' ), $version );
		wp_enqueue_script('code-mirror-css');
		wp_register_script( 'code-mirror-javascript', "{$url}assets/mode/javascript/javascript.js", array( 'acf-input' ), $version );
		wp_enqueue_script('code-mirror-javascript');
	}
	
	
	
	function load_value( $value, $post_id, $field ) {
		return $value;
	}
}

// initialize
new acf_field_ohio_code( $this->settings );

// class_exists check
endif;

?>