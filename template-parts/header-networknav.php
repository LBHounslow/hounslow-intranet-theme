<?php
if (function_exists('hounslow_intranet_network_nav_menu')) :
    $network_menu_args = array(
        'theme_location'    => 'network',
        'depth'             => 2,
        'container'         => '',
        'container_class'   => '',
        'container_id'      => '',
        'menu_class'        => 'nav nav-fill',
        'fallback_cb'        => false,
        'walker'            => new WP_Bootstrap_Navwalker()
    );
?>
    <nav id="network-navigation" class="mt-1 pt-2 pb-2 border-top" role="navigation">
        <?php hounslow_intranet_network_nav_menu($network_menu_args); ?>
    </nav>
<?php endif; ?>