<?php
/**
 * The template for displaying the footer.
 *
 */
?>
    <div id="push"></div>
    </div>
	<?php
    if (   is_active_sidebar( 'first-footer-widget-area'  ))    : 
        dynamic_sidebar( 'first-footer-widget-area' );
    //end of all sidebar checks.
    endif;?>


<?php wp_footer(); ?>

</body>
</html>