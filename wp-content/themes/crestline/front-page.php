<?php
// Template Name: Homepage
?>
<?php get_header(); ?>




<div id="primary" class="content-area">
    
    <div class="container-fluid home-marquee">
		<div class="row">
                <div class="col-lg-8 col-sm-7">
                    <div class="bg-img home-1-img" style="background-image: url('/wp-content/themes/crestline/public/images/home-section-1-1.jpg')">
                        <div class="bottom-left txt">
                            <h1>We go wherever the dirt is.</h1>
                            <a href="/capabilities" class="btn">See our capabilities</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-sm-5 marquee-margin">

                     <div class="row">
                      <div class="order-content-a col-sm-12">


                    <div class="bg-img home-2-img" style="background-image: url('/wp-content/themes/crestline/public/images/home-section-1-2.jpg')"></div>

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
    
    
        <div class="container-fluid">
             <div class="bg-img promo-img" style="background-image: url('/wp-content/themes/crestline/public/images/home-section-2-1.jpg')">
                <div class="center txt">
                 <h1>get the job done right.</h1>
                 </div>
            </div>
        </div>
    
      <div class="container-fluid">
            <div class="promo-txt">
                <div class="center txt">
                    <div class="text-logo"></div>
                    <h2>over 20 years of experience and hundreds of projects.</h2>
                    <p>Crestline is a general contractor specializing in complete site preparation, utilities, mass 
    excavation, highway and road construction. Established in 1994 and based in The Dalles, Oregon, our resume includes both public and private works projects throughout the Northwest. With a workforce of over 70 employees, we have the personnel and equipment to successfully complete projects of varying scope and size.
    </p>
                </div>
            </div>
        </div>
    
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
    
    
    <div class="container-fluid">
             <div class="bg-img promo-img" style="background-image: url('/wp-content/themes/crestline/public/images/home-promo-4.jpg')">
                <div class="center txt">
                 <h1>Dedicated</h1>
                 </div>
            </div>
        </div>
    
    
      
    
    <div class="container-fluid">
		<div class="row">
				<div class="col-sm-8">

					<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/loops/page-loop' ); ?>
					<?php endwhile; // end of the loop. ?>

					<!-- OUTPUT BLOG POSTS -->
					<?php
					$args = array(
						'posts_per_page' => 8,
					);
					query_posts($args);
					?>
					<div class="post-loop">
						<div class="row">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php
								// large News Item
								get_template_part( 'partials/loops/news-loop' ); ?>

							<?php  endwhile; endif; ?>
							<?php  wp_reset_query(); ?>
						</div>
					</div>

				</div><!-- /col -->
			
		

		</div><!-- /row -->
	</div><!-- /container -->
    
    
   
	
</div><!-- #primary -->

<?php get_footer();?>
