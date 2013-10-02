<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">
    <meta charset="charset=<?php bloginfo('charset'); ?>">

    <title><?php if(is_home()) bloginfo('name'); else wp_title(''); ?></title>

    <style type="text/css" media="screen">
        @import url( <?php bloginfo('stylesheet_url'); ?> );
    </style>

    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php
        wp_get_archives('type=monthly&format=link');
        wp_head();
    ?>
</head>
<body>
  <div id="container">
    <!--ul class="skip">
      <li><a href="#nav">Skip to navigation</a></li>
      <li><a href="#primaryContent">Skip to main content</a></li>
      <li><a href="#secondaryContent">Skip to secondary content</a></li>
      <li><a href="#footer">Skip to footer</a></li>
      <?php wp_nav_menu( array( 'theme_location' => 'menu-2' ) ); ?>
    </ul-->
    <header role="banner">
        <?php print do_heading(); ?>
        <nav>
            <?php wp_nav_menu( array( 'theme_location' => 'menu-1' ) ); ?>
        </nav>
    </header>
    <main role="main">