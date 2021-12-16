<?php
/**
 * The home template file

* TEMPLATE NAME: Homepage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LBH_Intranet
 */

get_header();
get_sidebar();
?>


        <!-- Page Content  -->
        <div id="content">


            <?php get_template_part('templates/homepage-template', 'homepage'); ?>


        </div>


    </div>
</body><?php
get_footer();
