<?php
if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    $greeting = hounslow_intranet_get_greeting();
    $avatarDefaults = array(
        'size'          => 32,
        'class'         => array('class' => 'rounded-circle'),
    );
    $avatar = get_avatar($current_user->ID, 32, '', $greeting, $avatarDefaults);
} ?>
<div class="container d-flex justify-content-end my-3">
    <div class="row">
        <div class="col">
            <?php if (function_exists('hounslow_intranet_network_nav_menu') && is_user_logged_in()) :
                $network_menu_args = array(
                    'theme_location'    => 'utility',
                    'depth'             => 1,
                    'container'         => 'ul',
                    'container_class'   => 'dropdown-item',
                    'container_id'      => 'utility-menu',
                    'menu_class'        => 'dropdown-menu justify-content-end',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker()
                );
            ?>
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" id="utility-menu" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $avatar ?>&nbsp;&nbsp;<span class="d-none d-sm-inline"><?php echo $greeting; ?></span></button>
                    <?php hounslow_intranet_network_nav_menu($network_menu_args); ?>
                </div>
            <?php elseif (is_user_logged_in()) :
                $profile_link = get_edit_user_link($current_user->ID); ?>
                <a href="<?php echo $profile_link; ?>" type="button" class="btn btn-primary" id="utility-menu"><?php echo $avatar ?>&nbsp;&nbsp;<span class="d-none d-sm-inline"><?php echo $greeting; ?></span></a>
            <?php else : ?>
                <a href="<?php echo wp_login_url(get_permalink()); ?>" type="button" class="btn btn-dark" id="utility-menu">Log In</a>
            <?php endif; ?>
        </div>
    </div>
</div>