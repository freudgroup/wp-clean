<?php

/**
* Wordpress WP-Clean, a base theme to start a new wordpress theme.
*
* 
* Project URL https://github.com/freudgroup/wp-clean
*/

/**
* @desc make the site's heading & tagline an h1 on the homepage and an h4 on internal pages
* Naked's default CSS should make the two different states look identical
*/
function do_heading() {
    $output = "";

    if (is_home()) {
        $output .= "<h1>";
    } else {
        $output .= "<h4>";
    }

    $output .= "<a href='"  . get_bloginfo('url') . "'>" . get_bloginfo('name') . "</a> <span>" . get_bloginfo('description') . "</span>";

    if (is_home()) {
        $output .= "</h1>";
    } else {
        $output .= "</h4>";
    }

    return $output;
}

/**
* register_sidebar()
*
*@desc Registers the markup to display in and around a widget
*/
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));

    // Register the footer widget area.
    register_sidebar(array(
        'name' => 'Footer Widgets',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>'
    ));
}

/**
* Check to see if this page will paginate
* 
* @return boolean
*/
function will_paginate() {
    global $wp_query;

    if (!is_singular()) {
        $max_num_pages = $wp_query->max_num_pages;

        if ($max_num_pages > 1) {
            return true;
        }
    }
    return false;
}

// Add Custom Menu
add_action('init', 'register_my_menus');

function register_my_menus() {
    if (function_exists('register_nav_menus')) {
        register_nav_menus(array(
            'menu-1' => __( 'Menu 1' ),
            'menu-2' => __( 'Menu 2' )
        ));
    }
}

// Adding support for thumbnails on posts
add_theme_support('post-thumbnails');

?>
