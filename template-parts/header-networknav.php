<?php
if (has_nav_menu('network') && function_exists('hounslow_intranet_network_nav_menu')) :
    $network_menu_args = array(
        'theme_location'    => 'network',
        'depth'             => 2,
        'container'         => '',
        'container_class'   => '',
        'container_id'      => '',
        'menu_class'        => 'nav nav-fill',
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker()
    );
?>
    <nav id="network-navigation" class="mt-3 pt-3 pb-3 border-top" role="navigation">
        <?php hounslow_intranet_network_nav_menu($network_menu_args); ?>
    </nav>
<?php endif; ?>