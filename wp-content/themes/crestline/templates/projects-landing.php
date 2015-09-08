<?php
// Template Name: Projects Landing
?>
<?php get_header(); ?>

<div id="primary" class="content-area page">
	<div class="container">
		<div class="row">
			<main id="main" class="site-main" role="main">
				<div class="col-sm-8">

					<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/loops/page-loop' ); ?>
                            
                          <div class="container">
		                  
                            <div class="row">
                            <?php
                                $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
                                //col vars
                                $colnum = 3;
                                $counter = 0;
                            

                                foreach( $mypages as $page ) {	
                                   
                                    $content = $page->post_content;
                                    if ( ! $content ) // Check for empty page
                                        // continue;

                                    $content = apply_filters( 'the_content', $content );
                                    
                                  
                                ?>
                                    
                                    <div class="col-sm-3">
                                        <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
                                        <?php echo get_the_post_thumbnail( $page->ID, 'thumbnail' ); ?> 
                                        <div class="entry"><?php echo $content; ?></div>
                                    </div>
                                <?php
                                    $counter++;
                  if ($counter % $colnum == 0) {
                  echo '</div><div class="row">';
                }
            
                                }	
                            ?>
                        </div>
                    </div>
                    
					<?php endwhile; // end of the loop. ?>

				</div><!-- /col -->
			</main>

			<?php get_sidebar(); ?>

		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- #primary -->

<?php get_footer(); ?>