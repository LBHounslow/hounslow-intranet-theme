<?php

/**

 * The home template file



* TEMPLATE NAME: Topics

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



?>



<body>

    <div class="wrapper">

        <!-- Sidebar  -->

        <nav id="sidebar" data-swiftype-index="false">

<?php get_template_part('templates/navigation', 'menu'); ?>



        </nav>



        <!-- Page Content  -->

        <div id="content">





            <?php get_template_part('templates/topic-inner', 'topic inner'); ?>





        </div>





    </div>

</body>







<?php

get_sidebar();

get_footer();

