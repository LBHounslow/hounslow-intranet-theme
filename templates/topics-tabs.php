<div class="row text-center">
<div class="col-lg-12">


<?php


$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (strpos($url,'working-together') !== false) { ?>

 <?php

$terms = get_terms( 'wt_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href=/working-together/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php } else if (strpos($url,'health-and-wellbeing') !== false) {?>

 <?php

$terms = get_terms( 'haw_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/health-and-wellbeing/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'new-to-lbh') !== false) {?>

  <?php

$terms = get_terms( 'nth_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/new-to-lbh/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'corporate-policies') !== false) {?>

 <?php

$terms = get_terms( 'pol_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/corporate-policies/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'how-do-i') !== false) {?>

 <?php

$terms = get_terms( 'hdi_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/how-do-i/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'get-involved') !== false) {?>
 
 <?php

$terms = get_terms( 'gi_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/get-involved/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'develop-and-learn') !== false) {?>
 
 <?php

$terms = get_terms( 'dal_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/develop-and-learn/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'world-of-work') !== false) {?>
 
 <?php

$terms = get_terms( 'wow_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/world-of-work/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php }else if (strpos($url,'one-hounslow') !== false) {?>
 
 <?php

$terms = get_terms( 'oh_category', array( 
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude'  => array(),
) );
$exclude = array("new starter");
$new_the_category = '';
foreach ( $terms as $term ) {
if (!in_array($term->name, $exclude)) {
$new_the_category .= '<button class="btn btn-dark topic-btn"><a style="color:white;" href="/one-hounslow/'.$term->slug .'">'.$term->name.'</a></button>';
}
}
echo substr($new_the_category, 0);


?>

<?php
   
}

?>
</div>
</div>



