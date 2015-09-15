<?php
// Template Name: Projects Detail
?>
<?php get_header(); ?>

<div id="primary" class="content-area page">
	<div class="container-fluid">
		<div class="row">
			
				<div class="col-sm-8 txt">
                    Our Projects
					<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/loops/page-loop' ); ?>
                            
					<?php endwhile; // end of the loop. ?>

				</div><!-- /col -->
			

		

		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- #primary -->

<?php get_footer(); ?>