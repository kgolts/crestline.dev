<?php
// Template Name: About 
?>
<?php get_header(); ?>

<?php
//custom fields
$rows = get_field('images' ); // get all the rows
$first_row = $rows[0]; // get the first row
$first_row_image = $first_row['image' ]; // get the sub field value 
$first_row_text = $first_row['image_text' ]; // get the sub field value 
$first_row_button = $first_row['button' ]; // get the sub field value 


$second_row = $rows[1]; // get the first row
$second_row_image = $second_row['image' ]; // get the sub field value 

$third_row = $rows[2]; // get the first row
$third_row_image = $third_row['image' ]; // get the sub field value 
$third_row_text = $third_row['image_text' ]; // get the sub field value 

$fourth_row = $rows[3]; // get the first row
$fourth_row_image = $fourth_row['image' ]; // get the sub field value 
$fourth_row_text = $fourth_row['image_text' ]; // get the sub field value 
?>


<div id="primary" class="content-area">
    
    <div class="container-fluid home-marquee">
		<div class="row">
                <div class="col-lg-8 col-sm-7">
                    <div class="bg-img home-1-img" style="background-image: url('<?php echo $first_row_image ?>')">
                        <div class="bottom-left txt">
                            <h1><?php echo $first_row_text ?></h1>
                            <a href="/capabilities" class="btn">See our capabilities</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-sm-5 marquee-margin">

                     <div class="row">
                      <div class="order-content-a col-sm-12">


                    <div class="bg-img home-2-img" style="background-image: url('<?php echo $second_row_image ?>')"></div>

                    </div>

                     <div class="order-content-b col-sm-12"> 
                       <div class="project-updates-slider">
<!--                           <div class="cone"></div>-->
                        <?php
                    // Hero Slider
                    get_template_part( 'partials/global/slider' ); ?>
                         </div>
                    </div>
                    </div>
                </div>
            </div>
               
        </div>
    
<?php if( $third_row_image): ?>
        <div class="container-fluid">
             <div class="bg-img promo-img" style="background-image: url('<?php echo $third_row_image ?>')">
                <div class="center txt">
                 <h1><?php echo $third_row_text ?></h1>
                 </div>
            </div>
        </div>
<?php endif; ?>
    
      <div class="container-fluid">
            <div class="promo-txt">
                <div class="center txt">
                    <div class="text-logo"></div>
                   <?php the_field('text_block'); ?>
                </div>
            </div>
        </div>
    
<!--
    <div class="container-fluid three-col">
        <div class="row">
          <div class="col-sm-4">
            <img src="/wp-content/themes/crestline/public/images/home-section-3-1.jpg" class="img-responsive center-block">
              <div class="txt">
                <h3>fully equipped.</h3>
                <p>Crestline owns and maintains a large fleet of late model 
equipment to fit our clients needs. With over 150 pieces of 
rolling stock, we have the equipment needed to get the job 
done right, no matter how big or small.</p>
                  <a href="/equipment" class="link">See our equipment</a>
              </div>
          </div>
          <div class="col-sm-4">
            <img src="/wp-content/themes/crestline/public/images/home-section-3-2.jpg" class="img-responsive center-block">  
               <div class="txt">
                <h3>fully equipped.</h3>
                <p>Crestline owns and maintains a large fleet of late model 
equipment to fit our clients needs. With over 150 pieces of 
rolling stock, we have the equipment needed to get the job 
done right, no matter how big or small.</p>
                    <a href="/equipment" class="link">See our equipment</a>
              </div>
          </div>
          <div class="col-sm-4">
             <img src="/wp-content/themes/crestline/public/images/home-section-3-3.jpg" class="img-responsive center-block">    
               <div class="txt">
                <h3>fully equipped.</h3>
                <p>Crestline owns and maintains a large fleet of late model 
equipment to fit our clients needs. With over 150 pieces of 
rolling stock, we have the equipment needed to get the job 
done right, no matter how big or small.</p>
                    <a href="/equipment" class="link">See our equipment</a>
              </div>
          </div>
        </div>
    </div>
-->
    
    <?php if( have_rows('image_blocks') ): ?>

	 <div class="container-fluid three-col">
        <div class="row col-padding">

	<?php while( have_rows('image_blocks') ): the_row(); 

		// vars
		$image = get_sub_field('image');
		$content = get_sub_field('content');
        $url = get_sub_field('url');
         $button_text = get_sub_field('button_text');
		?>

		 <div class="col-sm-4">
             
             <a href="<?php echo $url ?>"><div class="bg-img  relatedprojects" style="background-image: url('<?php echo $image['url'] ?>')"></div></a>
            <div class="txt">
                <?php echo $content; ?>
                 <a href="<?php echo $url ?>" class="link"><?php echo $button_text ?></a>
            </div>

		</div>

	<?php endwhile; ?>

	</div>
    </div>

<?php endif; ?>
    
    <?php if( $fourth_row_image): ?>
    <div class="container-fluid">
             <div class="bg-img promo-img" style="background-image: url('<?php echo $fourth_row_image ?>')">
                <div class="center txt">
                 <h1><?php echo $fourth_row_text ?></h1>
                 </div>
            </div>
        </div>
    
    
     <?php endif; ?> 
        

    
    
   
	
</div><!-- #primary -->

<?php get_footer();?>
