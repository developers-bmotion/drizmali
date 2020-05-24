<?php 
    $switcher = OhioOptions::get( 'page_dark_mode_switcher', false );
?>     

<?php if ($switcher) :  ?>
    <!-- Dark mode switcher -->
    <div class="clb-mode-switcher cursor-as-pointer vc_hidden-xs vc_hidden-sm">
        <div class="clb-mode-switcher-item dark"><p class="clb-mode-switcher-item-state"><?php echo esc_html('Dark') ?></p></div>
        <div class="clb-mode-switcher-item light"><p class="clb-mode-switcher-item-state"><?php echo esc_html('Light') ?></p></div>
        <div class="clb-mode-switcher-toddler">
            <div class="clb-mode-switcher-toddler-wrap">
                <div class="clb-mode-switcher-toddler-item dark"><p class="clb-mode-switcher-item-state"><?php echo esc_html('Dark') ?></p></div>
                <div class="clb-mode-switcher-toddler-item light"><p class="clb-mode-switcher-item-state"><?php echo esc_html('Light') ?></p></div>
            </div>
        </div>
     </div>
 <?php endif; ?>