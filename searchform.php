<nav class="navbar navbar-expand-lg navbar-light">
    <form class="container-fluid" role="search" method="get" action="<?php echo home_url('/'); ?>">
        <input class="form-control me-2" type="search" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" aria-label="Search" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>">
        <button class="btn btn-primary me-2" type="submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>"><i class="fa fa-search"></i></button>
        <a href=""><span class="btn btn-outline-primary"><i class="fas fa-search-plus"></i></span></a>
    </form>
</nav>