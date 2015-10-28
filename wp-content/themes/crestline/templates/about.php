<?php
// Template Name: About 
?>
<?php get_header(); ?>

<?php
//custom fields
$rows = get_field('top_images'); // get all the rows

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


<div id="primary" class="content-area about">
    
    <div class="container-fluid home-marquee page-top">
		<div class="row">
                <div class="col-lg-8 col-sm-7">
                    <div class="bg-img about-1-img" style="background-image: url('<?php echo $first_row_image ?>')">
                    </div>
                </div>
                <div class="col-lg-4  col-sm-5 marquee-margin hidden-xs">

                     <div class="row">
                      <div class="order-content-a col-sm-12">


                    <div class="bg-img home-2-img" style="background-image: url('<?php echo $second_row_image ?>')"></div>

                    </div>

                     <div class="order-content-b col-sm-12"> 
                         <div class="bg-img about-3-img" style="background-image: url('<?php echo $third_row_image ?>')"></div>

                    </div>
                    </div>
                </div>
            </div>
               
        </div>
    
    <div class="container-fluid">
        <div class="row">
       
            <div class="col-sm-8 header-txt">
                <div class="txt">
               <h4><?php
    echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
    ?></h4>
                <?php the_content(); ?>
                </div>
            </div>
        </div>
        
        
        <div class="row capabilities">
             <div class="col-sm-12">
                 <div class="txt">
                <h3>Capabilities</h3>
                <?php the_field ('capabilities' ); ?>
                 </div>
            </div>
        </div>
        
        
    <?php if( $first_promo_image): ?>
        <div class="container-fluid">
                 <div class="bg-img promo-img" style="background-image: url('<?php echo $first_promo_image ?>')">
                    <div class="center txt">
                     <h1 class="no-max-width"><?php echo $first_promo_title ?></h1>
                    <?php if($first_promo_button_text != '') :?>
                        <a href="<?php echo $first_promo_button_link ?>" class="btn"><?php echo $first_promo_button_text ?></a>
                    <?php endif; ?>
                     </div>
                </div>
            </div>
     <?php endif; ?> 
        

       <div class="text-slider-full">
            <?php
        // Hero Slider
        get_template_part( 'partials/global/fullscreen_slider' ); ?>
             </div>
        
         <?php if( $second_promo_image): ?>
        <div class="container-fluid">
                 <div class="bg-img promo-img" style="background-image: url('<?php echo $second_promo_image ?>')">
                    <div class="center txt">
                     <h1><?php echo $second_promo_title ?></h1>
                    <?php if($second_promo_button_text != '') :?>
                     <a href="<?php echo $second_promo_button_link ?>" class="btn"><?php echo $second_promo_button_text ?></a>
                    <?php endif; ?>
                     </div>
                </div>
            </div>
     <?php endif; ?>
        
    
        <?php if( have_rows('promos') ): ?>
            <?php 
                $row_count = count($promo_rows);
                $current_row = 2;
            ?>    
        
            <?php for ($i = $current_row; $i < $row_count; $i++) {
                 $this_promo_row = $promo_rows[$i];
                    $this_promo_image =  $this_promo_row['image' ]; 
                    $this_promo_title =  $this_promo_row['title' ]; 
                    $this_promo_button_link =  $this_promo_row['button_link' ]; 
                    $this_promo_button_text =  $this_promo_row['button_text' ];
                ?>
             <?php if( $this_promo_image): ?>
            <div class="container-fluid">
                 <div class="bg-img promo-img" style="background-image: url('<?php echo $this_promo_image ?>')">
                    <div class="center txt">
                     <h1><?php echo $this_promo_title ?></h1>
                    <?php if($this_promo_button_text != '') :?>
                     <a href="<?php echo $this_promo_button_link ?>" class="btn"><?php echo $this_promo_button_text ?></a>
                    <?php endif; ?>
                     </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
                }
            ?>
        
            
          
           
        <?php endif; ?>
        
        
     <div class="row text-center center-block  col-padding row-related">
            <?php $posts = get_field('related_projects');

            if( $posts ): ?>

                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <div class="related-projects col-sm-4">
                <?php setup_postdata($post); ?>
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <a href="<?php the_permalink(); ?>"><div class="bg-img  relatedprojects" style="background-image: url('<?php echo $url ?>')">
                <div class="title"><?php the_title(); ?></div>
                     <div class="img-overlay"></div>
                </div></a>
                </div>
                <?php endforeach; ?>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
        </div>    
        
        
    </div>
    
    
  

    
   
        

    
    
   
	
</div><!-- #primary -->

<?php get_footer();?>
