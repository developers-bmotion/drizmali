<?php

if ( ! class_exists( 'OhioExtraOwnFonts' ) ) {
    require_once plugin_dir_path( __FILE__ ) . '../helpers/custom_fonts.php';
}

$ohio_custom_fonts = OhioExtraOwnFonts::get_custom_fonts_array();
$ohio_gf_list = [
    'items' => []
];

if ( ! empty( $ohio_custom_fonts ) ) {
    foreach ($ohio_custom_fonts as $ohio_custom_font) {
        $ohio_gf_list['items'][$ohio_custom_font->font_family] = (object)[
            'family' => $ohio_custom_font->font_family,
            'variants' => explode(',', $ohio_custom_font->font_styles),
            'subsets' => ['latin']
        ];
    }
}

$ohio_gf_object = (object)$ohio_gf_list;
