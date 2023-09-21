<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <?php if (function_exists('hounslow_intranet_network_nav_menu') && is_user_logged_in()) :

            $network_menu_args = array(
                'theme_location'    => 'utility',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'col-md-6 col-lg',
                'container_id'      => 'utility-menu',
                'menu_class'        => 'nav justify-content-end',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker()
            );
            hounslow_intranet_network_nav_menu($network_menu_args);
        elseif (is_user_logged_in()) :
            $current_user_ID = get_current_user_id();
            $userdata = get_userdata($current_user_ID);
            $profile_link = '<a href="' . get_edit_user_link($current_user_ID) . '" class="nav-link" >Welcome, ' . esc_attr($userdata->user_nicename) . '</a>'; ?>
            <div id="utility-menu" class="col-md-6 col-lg">
                <ul class="nav justify-content-end">
                    <li class="nav-item username-link">
                        <?php echo $profile_link; ?>
                    </li>
                </ul>
            </div><!-- .utility-menu -->
        <?php else : ?>
            <div id="utility-menu" class="col-md-6 col-lg">
                <ul class="nav justify-content-end">
                    <li class="nav-item username-link">
                        <a href="<?php echo wp_login_url(get_permalink()); ?>" class="nav-link">Log In</a>
                    </li>
                </ul>
            </div><!-- .utility-menu -->
        <?php endif; ?>
    </div>
</nav>