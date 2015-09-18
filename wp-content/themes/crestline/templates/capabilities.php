<?php
// Template Name: Capabilities
?>
<?php get_header(); ?>


<div id="primary" class="content-area about">


 <?php if( have_rows('image_layout') ): // check if the flexible content field has rows of data ?>
    
   <?php  while ( have_rows('image_layout') ) : the_row();  // loop through the rows of data ?>
  <div class="container-fluid  page-top">
     <?php  if( get_row_layout() == 'layout_1' ): ?>

        <div class="row bottom-pad">
          <div class="col-lg-4  col-sm-5 marquee-margin right hidden-xs">
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
          <div class="col-lg-4  col-sm-5 marquee-margin hidden-xs">
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

    
 
    <div class="container-fluid">
        <div class="row spacer-bottom">
       
            <div class="txt  col-sm-8  header-txt">
               
                <h4><?php echo get_the_title( $post->ID ) ?></h4>
                <?php the_content(); ?>
            </div>
        </div>
        
        <?php if( have_rows('capabilities') ): ?>
            <?php while( have_rows('capabilities') ): the_row(); 
                $posts = get_sub_field('projects_list');
                
            ?>
            
                <div class="row caps">
                    <div class="col-sm-4 caps-max-width">
                        <img src="<?php  echo   get_sub_field('image'); ?>" class="img-responsive">
                    </div>
                    <div class="col-sm-6">
                        <h5><?php  echo   get_sub_field('top_title'); ?></h5>
                        <h2><?php  echo   get_sub_field('big_title'); ?></h2>
                        <p><?php  echo   get_sub_field('body'); ?></p>
                        <p class="project-list"><span>Projects:</span>
                        <?php if( $posts ):?>
                            <?php foreach( $posts as $post): ?>
                            <?php setup_postdata($post); ?>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <?php endforeach; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                        </p>
                    </div>

                </div>

            <?php endwhile; ?>
        <?php endif; ?>
	
</div><!-- #primary -->

<?php get_footer();?>
