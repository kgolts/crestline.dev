<?php
// Template Name: Contact
?>
<?php get_header(); ?>

<div id="primary" class="content-area page project contact">

    <div class="container-fluid">            
        <div class="row">
       
            <div class="full-width col-sm-8  header-txt">
                <div class="txt">
                <h4 class="top"><?php
    echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
    ?></h4>
                 <?php the_content(); ?>
                </div>
            </div>
        </div>
        
       
        
     
        
        <?php 
        $location = get_field('map');

        if( !empty($location) ):
        ?>
        
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
        </div>
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
                </div></a>
                </div>
                <?php endforeach; ?>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
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

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {
    

    var url = '/wp-content/themes/crestline/public/images/icon-map-marker-latest.png';
    var size = new google.maps.Size(46, 53);
 
    if(window.devicePixelRatio > 1.5){
        url = '/wp-content/themes/crestline/public/images/icon-map-marker-latest@2x.png';
        size = new google.maps.Size(92, 106);
    }
 
    var image = {
        url: url,
        size: size,
        scaledSize: new google.maps.Size(46, 53),
        origin: new google.maps.Point(0,0),
        anchor: new google.maps.Point(23, 37)
    }

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
        icon        : image
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>

<?php get_footer(); ?>