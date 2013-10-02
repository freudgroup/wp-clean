<?php

/**
* Wordpress WP-Clean, a base theme to start a new wordpress theme.
*
* 
* Project URL https://github.com/freudgroup/wp-clean
*/

/**
* naked_nav()
*
* @desc a wrapper for the wordpress wp_list_pages() function that
* will display one or two unordered lists:
* 1) primary nav, a <nav with css id #main-nav - always shown even if empty.
* 2) Optional secondary nav, a ul with css id #sub-nav
*
* @todo default css provided to allow space for both nav 'bars' one below the other to stop the page jig
*
* @param obj post
* @return string (html)
*/
function naked_nav($post = 0) {
    $output = "";
    $subNav = "";
    $params = "title_li=&depth=1&echo=0";

    // always show top level
    $output .= '<nav id="main-nav"><ul>';
    $output .= wp_list_pages($params);
    $output .= '</ul>';

    // second level?
    if($post->post_parent) {
        $params .= "&child_of=" . $post->post_parent;
    } else {
        $params .= "&child_of=" . $post->ID;
    }
    $subNav = wp_list_pages($params);

    if ($subNav) {
        $output .= '<ul id="sub-nav">';
        $output .= $subNav;
        $output .= '</ul>';
    }
    return $output;
}

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

?>