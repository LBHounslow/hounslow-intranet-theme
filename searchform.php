<?php global $blog_id; ?>
<div class="container my-3">
    <div class="row">
        <form id="networkSearchForm" class="col d-inline-flex" role="search" method="get" action="<?php echo home_url('/'); ?>">
            <input class="me-2" type="search" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" aria-label="Search" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>">
            <button class="btn btn-primary me-2" type="submit" value="<?php echo esc_attr_x('Search', 'submit button') ?>"><i class="fa fa-search"></i></button>
            <?php if (1 == $blog_id) { ?>
                <a href="<?php echo network_home_url(); ?>/search/"><span class="btn btn-outline-primary"><i class="fas fa-search-plus"></i></span></a>
            <?php } ?>
        </form>
    </div>
</div>