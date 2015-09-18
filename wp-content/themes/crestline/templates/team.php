<?php
// Template Name: Team
?>
<?php get_header(); ?>

<?php
//custom fields
$rows = get_field('team_images'); // get all the rows

$first_row = $rows[0]; // get the first row
$first_row_image = $first_row['image' ]; // get the sub field value 

$second_row = $rows[1]; // get the first row
$second_row_image = $second_row['image' ]; // get the sub field value 

$third_row = $rows[2]; // get the first row
$third_row_image = $third_row['image' ]; // get the sub field value 


$promo_rows = get_field('promos');
$first_promo_row = $promo_rows[0];
$first_promo_image =  $first_promo_row['image' ]; 
$first_promo_title =  $first_promo_row['title' ]; 
$first_promo_button_link =  $first_promo_row['button_link' ]; 
$first_promo_button_text =  $first_promo_row['button_text' ]; 

$second_promo_row = $promo_rows[1];
$second_promo_image =  $second_promo_row['image' ]; 
$second_promo_title =  $second_promo_row['title' ]; 
$second_promo_button_link =  $second_promo_row['button_link' ]; 
$second_promo_button_text =  $second_promo_row['button_text' ]; 

?>


<div id="primary" class="content-area about team">
    
    <div class="container-fluid">
        <div class="row">
       
            <div class="txt  col-sm-8 header-txt">
               <h4 class="top"><?php
    echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
    ?></h4>
                <h2><?php echo get_the_title( $post->ID ) ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
        
    </div>
    
    <div class="container-fluid">
		<div class="row">
                <div class="col-sm-12">
                    <div class="bg-img promo-img" style="background-image: url('<?php echo $first_row_image ?>')">
                    </div>
                </div>
               
            </div>
        
        <div class="row col-padding-2">
             <div class="col-sm-4">
                  <div class="bg-img relatedprojects" style="background-image: url('<?php echo $second_row_image ?>')">
            </div>
            </div>
            <div class="col-sm-8">
                 <div class="bg-img relatedprojects" style="background-image: url('<?php echo $third_row_image ?>')">
            </div>
        </div>
               
        </div>
    
  
  

    </div>
    
    <?php if( have_rows('team_bios') ): ?>
      <div class="container-fluid three-col team-bios">
		                  
                              <div class="row col-padding bottom-border">
                            <?php
                              $rows = get_field('team_bios');
                                //col vars
                                $colnum = 3;
                                $counter = 0;
                                
                                foreach($rows as $row) {
                               
                                    //$content = $page->post_content;
                                   // if ( ! $content ) // Check for empty page
                                        // continue;

                                  //  $content = apply_filters( 'the_content', $content );
                                    // $url = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
                                  
                                ?>
                                   
                                    <div class="col-sm-4">
                                       
                                       <div class="txt"> 
                                             <h3><?php echo $row['name'] ?></h3>
                                             <h5><?php echo $row['job_title'] ?></h5>
                                            <?php echo $row['body'] ?>
                                        </div>
                                    </div>
                                <?php
                                    $counter++;
                  if ($counter % $colnum == 0) {
                  echo '</div><div class="row col-padding bottom-border">';
                }
            
                                }	
                            ?>
                                 
                        </div>
                    </div>
   
       <?php endif; ?> 

    
<!--  field staff  -->
    <div class="container-fluid staff-content">
        <div class="row">
       
            <div class="txt  col-sm-6">
               <h4><?php
    echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
    ?></h4>
               <?php the_field ('staff_content' ); ?>
            </div>
        </div>
        


        
    </div>
    
    
    


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


    
   
	
</div><!-- #primary -->

<?php get_footer();?>
