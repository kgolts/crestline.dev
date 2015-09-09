// Mobile device detection
var ismobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));



(function($) {

	/* MODULES SET UP
	-----------------*/

	// Set up Sliders
	 Slider.init();


	if(ismobile == true){
		$('body').addClass('mobile');
	} else {
		// non mobile actions
		// new WOW().init();
	}

	// DOC Ready
	$(function() {

		/* SMOTH SCROLL TO ANCHOR TAGS */
		/*
		$('a[href*=#]:not([href=#])').on('click','', function( e ){
		      e.preventDefault();
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
		        || location.hostname == this.hostname) {

		        var target = $(this.hash);
		        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		           if (target.length) {
		             $('html,body').animate(
		                {scrollTop: target.offset().top},
		                {duration: 600, easing:'easeOutCubic'});
		            return false;
		        }
		    }
		});
		*/


	}); // END Doc Ready

	/* load === all images, scripts, etc. complete before function runs */
	$(window).on('load', function() {
	  // Fade in page content and animation
	  // $("#site-wrapper").animate({"opacity": "1"}, 1000);

	}); // END window .load


	var throttleTimeOut = 50; //milliseconds before triggering function again
	// Window Scroll functions
	$(window).on('scroll', _throttle(function(){
		/* do your normal scroll stuff here, but it'll be
		 * more-reasonably controlled, so as to not peg
		 * the host machine's processor */
	}, throttleTimeOut));

	// Window Resize functions
	$(window).on('resize', _throttle(function(){
		/* do your normal resize stuff here, but it'll be
		 * more-reasonably controlled, so as to not peg
		 * the host machine's processor */
        
          fixNavDropDowns();
        
	}, throttleTimeOut));


})(jQuery);

$(document).ready(function() {
//  $('[data-toggle=offcanvas]').click(function() {
//    $('.row-offcanvas').toggleClass('active');
//    $('.showhide').toggle();
//  });
    $('.close-btn-mobile').on('click', function(){
        $('.navbar-toggle').click() //bootstrap 3.x by Richard
        
         setTimeout(function(){
             $('.navbar-fixed-top').css('position','fixed');
          },250);
    });
    
    $('.navbar-toggle').on('click',function(){
       $('.navbar-fixed-top').css('position','static');
    })
    
    fixNavDropDowns();
    
});

fixNavDropDowns = function(){
    if ($(window).width() > 769 || $('body').hasClass('mobile')) {
          $(".dropdown-toggle").attr('data-toggle', 'dropdown');
        } else {
          $(".dropdown-toggle").removeAttr('data-toggle dropdown');
        }
}

