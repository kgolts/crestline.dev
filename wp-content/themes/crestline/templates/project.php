<?php
// Template Name: Projects Detail
?>
<?php get_header(); ?>

<div id="primary" class="content-area page project">

    <div class="container-fluid">            
        <div class="row">
       
            <div class="full-width col-sm-8 top-txt header-txt max-lg">
                <div class="txt">
                <h4 class="top"><?php
    echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
    ?></h4>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                <h3><?php the_field ('location_title' ); ?></h3>
                    </div>
            </div>
            <?php if( get_field( "alert_text" ) ): ?>
                  <div class="col-sm-3 col-md-offset-1">
                      <div class="alert-text">
                        <?php the_field('alert_text'); ?>
                      </div>
                </div>
                <?php endif; ?>
        </div>
        
         <div class="row">
            <div class="col-sm-8 max-lg">
                <div class="txt top-txt">
                <?php the_content(); ?>
                </div>
             </div>
           
            
             <div class="col-sm-3 col-md-offset-1">
                 <?php if( get_field( "features_list" ) ): ?>
                    <?php the_field('features_list'); ?>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                        <?php
                    // Hero Slider
                    get_template_part( 'partials/global/fullscreen_slider' ); ?>
            </div>           
        </div>
        
        <?php if( get_field( "text_block" ) ): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="txt-block">
                <div class="center txt">
                 
                   <?php the_field('text_block'); ?>
                </div>
            </div>
            </div>
        </div>
       <?php endif; ?>
        
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
    

    var imgurl = '/wp-content/themes/crestline/public/images/icon-map-marker.png';


    if(window.devicePixelRatio > 1.5){
       var imgurl = '/wp-content/themes/crestline/public/images/icon-map-marker@2x.png';
    }

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
        icon        : imgurl
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