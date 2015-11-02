<?php
/**
 * The template for displaying all single posts.
 *
 */
?>
<?php get_header(); ?>

<div id="primary" class="content-area page project">

    <div class="container-fluid">            
        <div class="row col-padding">
       
            <div class="full-width col-sm-8 top-txt header-txt max-lg">
                <div class="txt">
                <h4 class="top"> NEWS &gt;
                   
                    <?php echo get_the_category_list( '&nbsp&nbsp', '' , get_the_ID() ); ?>
                </h4>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <h3><?php echo get_the_date( 'F j, Y' ); ?></h3>
                    
                </div>
             
                
                 <div class="txt top-txt">
                <?php the_content(); ?>
                </div>
            </div>
            
        </div>
        
        
  
<?php if( have_rows('content_blocks') ):   // loop through the rows of data ?>
    
     <?php  while ( have_rows('content_blocks') ) : the_row();  // loop through the rows of data ?>

        <?php  if( get_row_layout() == 'text_block' ): ?>
             <div class="row col-padding">
       
                    <div class="col-sm-8">
                    <div class="txt top-txt">
                    <?php 	echo the_sub_field('text_block'); ?>
                    </div>
                         </div>
                </div>
           <?php  elseif( get_row_layout() == 'pull_quote' ): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="txt-block">
                        <div class="center txt">

                           <p class="quote"><?php  echo get_sub_field('pull_quote'); ?></p>
                        </div>
                    </div>
                    </div>
                </div>
         
       
         <?php  elseif( get_row_layout() == 'features_list' ): ?>
                <div class="row capabilities">
                     <div class="col-sm-12">
                         <div class="txt">
                         <?php  echo get_sub_field('features_list'); ?>

                         </div>
                    </div>
                </div>
         <?php    endif; ?>
        
<!--    image rows    -->
        <?php if( have_rows('image_layout') ): // check if the flexible content field has rows of data ?>
    
   <?php  while ( have_rows('image_layout') ) : the_row();  // loop through the rows of data ?>
  <div class="container-fluid mobile-row-padding">
     <?php  if( get_row_layout() == 'layout_1' ): ?>

        <div class="row bottom-pad">
          <div class="col-lg-4  col-sm-5 marquee-margin right">
                     <div class="row">
                      <div class="col-sm-12">
                            <div class="bg-img home-2-img" style="background-image: url('<?php the_sub_field('small_image_1'); ?>')"></div>
                    </div>
                     <div class="col-sm-12"> 
                         <div class="bg-img about-3-img" style="background-image: url('<?php the_sub_field('small_image_2'); ?>')"></div>

                    </div>
                    </div>
                </div>
               <div class="col-lg-8 col-sm-7">
                    <div class="bg-img about-1-img" style="background-image: url('<?php the_sub_field('big_image_3'); ?>')">
                    </div>
                </div>

    </div>

      <?php  elseif( get_row_layout() == 'layout_2' ): ?>

        <div class="row bottom-pad">
           <div class="col-lg-8 col-sm-7">
                    <div class="bg-img about-1-img" style="background-image: url('<?php the_sub_field('big_image_1'); ?>')">
                    </div>
                </div>
          <div class="col-lg-4  col-sm-5 marquee-margin">
                     <div class="row">
                      <div class="col-sm-12">
                            <div class="bg-img home-2-img" style="background-image: url('<?php the_sub_field('small_image_2'); ?>')"></div>
                    </div>
                     <div class="col-sm-12"> 
                         <div class="bg-img about-3-img" style="background-image: url('<?php the_sub_field('small_image_3'); ?>')"></div>

                    </div>
                    </div>
                </div>
        </div>
      
      
      <?php  elseif( get_row_layout() == 'layout_3' ): ?>

        <div class="row text-center center-block  col-padding">
            <div class="related-projects col-sm-4">
                <div class="bg-img  relatedprojects" style="background-image: url('<?php the_sub_field('image_1'); ?>')">
                </div>

            </div>
             <div class="related-projects col-sm-4">
                <div class="bg-img  relatedprojects" style="background-image: url('<?php the_sub_field('image_2'); ?>')">
                </div>

            </div>
             <div class="related-projects col-sm-4">
                <div class="bg-img  relatedprojects" style="background-image: url('<?php the_sub_field('image_3'); ?>')">
                </div>

            </div>
        </div>
      
    <?php  elseif( get_row_layout() == 'layout_4' ): ?>

        <div class="row bottom-pad">
            <div class="col-sm-12">
                <div class="bg-img promo-img no-margin" style="background-image: url('<?php the_sub_field('image'); ?>')">
            </div>
        </div>
      </div>
    
      
      <?php    endif; ?>
      
    </div>
     <?php    endwhile; ?>

 <?php else :

    // no layouts found

endif;
?>

 
    <?php    endwhile; ?>

 <?php else :

    // no layouts found

endif;
?>
        
        
        
         <div class="row col-padding">
       
            <div class="full-width col-sm-8 top-txt header-txt max-lg">
                <div class="txt links">
      <?php previous_post_link('%link', '&lt; Previous Article', false ); ?>  <?php next_post_link('%link', 'Next Article &gt;', false ); ?>
        </div>   
        </div>
        </div>
        
    
        <hr class="hr">
        
           
        
        
  
       <div class="row text-center center-block  col-padding row-related">
            <?php $posts = get_field('related_articles');
           
            if( $posts ): ?>
                 <h2 class="txt-left">Related Articles</h2>
                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <div class="related-projects col-sm-4">
                <?php setup_postdata($post); ?>
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <a href="<?php the_permalink(); ?>"><div class="bg-img  relatedprojects" style="background-image: url('<?php echo $url ?>')">
                <div class="title"><?php the_title(); ?></div>
                    <div class="title date"> <?php echo get_the_date( 'F j, Y' ); ?></div>
                    <div class="img-overlay"></div>
                </div></a>
                </div>
                <?php endforeach; ?>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
        </div> 
       
        

        
    </div>
		
</div><!-- #primary -->




<?php get_footer(); ?>