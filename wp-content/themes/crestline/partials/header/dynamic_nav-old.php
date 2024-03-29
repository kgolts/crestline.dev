<nav class="navbar navbar-default navbar-fixed-top navmenu navmenu-default navmenu-fixed-left offcanvas" id="myNavmenu" role="navigation">
     Brand and toggle get grouped for better mobile display 
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                <?php bloginfo('name'); ?>
            </a>
        </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'nested-pages',
                'theme_location'    => 'crestline',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
       
    </div>
</nav>
 