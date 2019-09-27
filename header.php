<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rt-uno
 */

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <div id="page" class="site">

        <header id="masthead" class="fixed-top site-header">
            <div class="logo">
                <?php if (has_custom_logo()) {the_custom_logo();} else {?>
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a>
                <?php }?>
            </div><!-- .site-branding -->
            <nav id="site-navigation" class="main-navigation">
                <?php (has_nav_menu('primary')) ? headlab_menu('primary') : '';?>
            </nav><!-- #site-navigation -->

        </header><!-- #masthead -->

        <?php
$templates = array(
    'template-homepage.php',
    'template-products.php',
);

(is_page_template($templates) || is_home() || is_single() || is_404()) ? $container = 'container-fluid' : $container = 'container';
?>

        <div id="content" class="site-content">
            <div class="<?php echo $container; ?>">
                <div class="row">