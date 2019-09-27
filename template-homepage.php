<?php
/**
 * @package _s
 * @subpackage RT Uno
 * Template Name: Homepage
 */
?>

<?php get_header();?>

<?php
// $option_fields = get_fields( 'options' ); //var_dump($option_fields);
// foreach ( $option_fields as $key => $value ) {
//     ${$key} = $value;
// }
?>



<?php include get_stylesheet_directory() . '/template-parts/modules/home_hero_image.php';?>

<?php include get_stylesheet_directory() . '/template-parts/modules/home_benefits_of_blanket.php';?>

<?php include get_stylesheet_directory() . '/template-parts/modules/home_choose_weight.php';?>

<?php include get_stylesheet_directory() . '/template-parts/modules/home_reviews.php';?>

<?php include get_stylesheet_directory() . '/template-parts/modules/newsletter.php';?>

<?php get_footer();?>