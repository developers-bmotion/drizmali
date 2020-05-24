<?php
$have_wpml = function_exists('icl_get_languages');
$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
$header_have_social = have_rows( 'global_header_menu_social_links', 'option' );
$fullscreen_have_social = OhioOptions::get_global( 'page_hamburger_social_networks_visibility', true );
$header_overlay_footer_has_left = have_rows( 'global_page_overlay_menu_footer_items_left', 'option' );
$menu_position = OhioOptions::get_global( 'page_header_menu_position', 'left', true );
?>

<div class="clb-popup clb-hamburger-nav">
    <div class="close-bar text-<?php echo esc_attr($menu_position) ?>">
        <div class="btn-round clb-close" tabindex="0">
            <i class="ion ion-md-close"></i>
        </div>
    </div>
    <div class="clb-hamburger-nav-holder">
        <?php
            $menu = OhioOptions::get_global( 'page_hamburger_menu' );

            if ( $menu ) {
                wp_nav_menu( array( 'menu' => $menu, 'menu_id' => 'secondary-menu' ) );
            } else {
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'secondary-menu' ) );
                } else {
                    echo '<span class="menu-blank">' . sprintf(esc_html__('Please, %1$sassign a menu%2$s', 'ohio'), '<a target="_blank" href="' . esc_url(home_url('/')) . 'wp-admin/nav-menus.php">', '</a>') . '</span>';
                }
            }
        ?>
    </div>
    <div class="clb-hamburger-nav-details">
        <?php if ($header_overlay_footer_has_left): ?>
            <div class="hamburger-nav-info">
                <?php while ( have_rows( 'global_page_overlay_menu_footer_items_left', 'option' ) ): the_row(); ?>
                    <div class="hamburger-nav-info-item">
                        <?php echo wp_kses(get_sub_field('items'), 'post'); ?>
                    </div>
                <?php endwhile; ?>  
            </div>
        <?php endif; ?>
        <div class="hamburger-nav-info">
            <?php if ( $header_have_social && $fullscreen_have_social) : ?>
                <div class="hamburger-nav-info-item">
                    <div class="socialbar small outline inverse">
                        <?php
                            while ( have_rows( 'global_header_menu_social_links', 'option' ) ) :
                                the_row();

                                $_network_field = get_sub_field( 'social_network' );
                                printf( '<a href="%s" class="%s">', esc_url( get_sub_field( 'url' ) ), esc_attr( $_network_field ) );

                                switch ( $_network_field ) {
                                    case 'facebook':    echo '<i class="icon fa fa-facebook-f"></i>';   break;
                                    case 'twitter':     echo '<i class="icon fa fa-twitter"></i>';      break;
                                    case 'instagram':   echo '<i class="icon fa fa-instagram"></i>';    break;
                                    case 'dribbble':    echo '<i class="icon fa fa-dribbble"></i>';     break;
                                    case 'github':      echo '<i class="icon fa fa-github-alt"></i>';   break;
                                    case 'linkedin':    echo '<i class="icon fa fa-linkedin"></i>';     break;
                                    case 'vimeo':       echo '<i class="icon fa fa-vimeo"></i>';        break;
                                    case 'youtube':     echo '<i class="icon fa fa-youtube"></i>';      break;
                                    case 'vk':          echo '<i class="icon fa fa-vk"></i>';           break;
                                    case 'behance':     echo '<i class="icon fa fa-behance"></i>';      break;
                                    case 'flickr':      echo '<i class="icon fa fa-flickr"></i>';       break;
                                    case 'reddit':      echo '<i class="icon fa fa-reddit-alien"></i>'; break;
                                    case 'snapchat':    echo '<i class="icon fa fa-snapchat"></i>';     break;
                                    case 'whatsapp':    echo '<i class="icon fa fa-whatsapp"></i>';     break;
                                    case 'quora':       echo '<i class="icon fa fa-quora"></i>';        break;
                                    case 'vine':        echo '<i class="icon fa fa-vine"></i>';         break;
                                    case 'periscope':   echo '<i class="icon fa fa-periscope"></i>';    break;
                                    case 'digg':        echo '<i class="icon fa fa-digg"></i>';         break;
                                    case 'viber':       echo '<i class="icon fa fa-viber"></i>';        break;
                                    case 'foursqure':   echo '<i class="icon fa fa-foursquare"></i>';   break;
                                }

                                echo '</a>';
                            endwhile;
                        ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if ($have_wpml && $wpml_show_in_header): ?>
                <div class="hamburger-nav-info-item">
                    <?php get_template_part('parts/elements/lang_dropdown'); ?>    
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>