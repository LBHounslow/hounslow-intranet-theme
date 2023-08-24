<div class="row text-center">

    <div class="col-lg-12 news-categories">
        <?php


        $terms = get_terms('event-categories', array(
            'orderby' => 'name',
            'order'   => 'ASC',
            'exclude'  => array(),
        ));
        $exclude = array();
        $new_the_category = '';
        foreach ($terms as $term) {
            if (!in_array($term->name, $exclude)) {
                $new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/events//category/' . $term->slug . '">' . $term->name . '</a></button>';
            }
        }
        echo substr($new_the_category, 0);
        ?>
    </div>
</div>