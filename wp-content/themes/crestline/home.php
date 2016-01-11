<?php
// Template Name: News Landing
?>
<?php get_header(); ?>

<div id="primary" class="content-area page projects news">
	<div class="container-fluid three-col header-txt">            
        <div class="row">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-8">
            <div class="txt full-width">
                <h4 class="top">News</h4>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <?php the_content(); ?>
            </div>    
            </div>
        </div>
    </div>
                          <div class="container-fluid three-col">
		                  
                              <div class="row col-padding">
                                  
                            <?php 
//if ( is_home() ) {
//                                $query = new WP_Query( 'cat=-7' );
//                                
//    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
//        
//     endwhile; 
//                                } else {
//    
//     echo there;
//    
//};


                                ?>      
                                  
                            <?php
                                $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', 'sort_order' => 'asc' ) );
                                //col vars
                                $colnum = 3;
                                $counter = 0;
                            

                                foreach( $mypages as $page ) {	
                                   
                                    $content = $page->post_content;
                                    if ( ! $content ) // Check for empty page
                                        // continue;

                                    $content = apply_filters( 'the_content', $content );
                                     $url = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
                                  
                                ?>
                                    
                                    <div class="col-sm-4">
                                        <a href="<?php echo get_page_link( $page->ID ); ?>"><div class="bg-img relatedprojects" style="background-image: url('<?php echo $url ?>')">
                                            <div class="img-overlay"><span class="link">View Full Project &gt;</span></div>
                                            </div> </a>
                                       <div class="txt"> 
                                        <h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
                                       
                                        <p><?php echo wp_trim_words( $content, 40 )  ?></p>
                                         <a href="<?php echo get_page_link( $page->ID ); ?>" class="link">View full project</a>
                                        </div>
                                    </div>
                                <?php
                                    $counter++;
                  if ($counter % $colnum == 0) {
                  echo '</div><div class="row col-padding">';
                }
            
                                }	
                            ?>
                        </div>
                    </div>
                    
					<?php endwhile; // end of the loop. ?>

				</div><!-- /col -->
			


		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- #primary -->

<?php get_footer(); ?>
