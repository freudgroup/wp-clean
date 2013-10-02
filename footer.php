        </main>
        <div id="secondary-content">
            <?php get_sidebar(); ?>
        </div>
        <footer role="contentinfo">
            <?php wp_footer(); ?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?><?php endif; ?>
        </footer>
    </div>
    <?php 
        $templateUrl = bloginfo('template_url'); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?php echo $templateUrl; ?>/js/libs/jquery-1.10.2.min.js"><\/script>')
    </script>
    <script src="<?php echo $templateUrl; ?>/js/global.min.js"></script>
  </body>
</html>