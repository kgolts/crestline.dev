<?php

// Registers Sidebars
// http://codex.wordpress.org/Function_Reference/register_sidebars

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id'   => 'page_sidebar',
		'description'   => 'Add widgets to the Page Sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	}

function widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Footer Widget', 'crestline' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The Footer widget area', 'crestline' ),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

         
}
 
// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'widgets_init' );

?>


