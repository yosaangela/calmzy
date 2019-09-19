<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package rt-uno
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rt_uno_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'rt_uno_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rt_uno_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'rt_uno_pingback_header');

/**
 * Allow .svg upload
 */
function hl_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'hl_mime_types');

/*
 * Custom menu output
 * No <ul>, no <li>, just <a>
 * headlab_menu('location')
 **/
function headlab_menu($location)
{
    // Get our nav locations (set in our theme, usually functions.php)
    $menuLocations = get_nav_menu_locations(); // This returns an array of menu locations;
    $menuID = $menuLocations[$location]; // Get the *MENU* menu ID
    $menu_navs = wp_get_nav_menu_items($menuID);
    $queried_page_id = get_queried_object_id();
    foreach ($menu_navs as $menu_nav) {
        $object_id = intval($menu_nav->object_id);
        if ($queried_page_id == $object_id) {
            $active = " class='active' ";
        } else {
            $active = '';
        }
        //var_dump($queried_page_id);
        echo '<a href="' . esc_url($menu_nav->url) . '" ' . $active . ' title="' . esc_html($menu_nav->title) . '">' . esc_html($menu_nav->title) . '</a>';
    }
}

/**
 * Add theme options page
 * This function requires Advanced Custom Fields PRO
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'General Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false,
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Homepage settings',
        'menu_title' => 'Homepage',
        'parent_slug' => 'theme-general-settings',
    ));
}
