// Mobile device detection
var ismobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));

function viewport() {
    var e = window, a = 'inner';
    if (!('innerWidth' in window )) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}

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
     var mywindow = $(window);
     var myTopNav = $('body');
    
	// Window Scroll functions
	$(window).on('scroll', _throttle(function(){
		/* do your normal scroll stuff here, but it'll be
		 * more-reasonably controlled, so as to not peg
		 * the host machine's processor */
        
        winPosition = mywindow.scrollTop();
            if(winPosition > 0) {
                if(! myTopNav.hasClass('scrollnav')){
                    myTopNav.addClass('scrollnav');
                }
            }else{
                 myTopNav.removeClass('scrollnav');
            }
        
        
	}, throttleTimeOut));

	// Window Resize functions
	$(window).on('resize', _throttle(function(){
		/* do your normal resize stuff here, but it'll be
		 * more-reasonably controlled, so as to not peg
		 * the host machine's processor */
           fixNavDropDowns();
     mobileFixes();
         // fixNavDropDowns();
         //  mobileFixes(viewport().width);
	}, throttleTimeOut));


})(jQuery);




$(document).ready(function() {

    $('.close-btn-mobile').on('click', function(){
        $('.navbar-toggle').click() //bootstrap 3.x by Richard
        
         setTimeout(function(){
            // $('.navbar-fixed-top').css('position','fixed');
          },200);
    });
    
    $('.navbar-toggle').on('click',function(){
      // $('.navbar-fixed-top').css('position','static');
    })
    
  
    
    $('body:not(.mobile) .dropdown .dropdown-menu').hover(function(){
        $(this).parent().toggleClass('hover');
    })
    
    fixNavDropDowns();
     mobileFixes();
});


fixNavDropDowns = function(){
    if ($('body').hasClass('mobile')) {
          $(".dropdown-toggle").attr('data-toggle', 'dropdown');
        } else {
          $(".dropdown-toggle").removeAttr('data-toggle dropdown');
        }
}



mobileFixes = function(thiswidth){
    if (isMobile()){
    $('li.project-updates').insertAfter( $('li.first-nav-item'));
     $(".order-content-b").insertBefore($(".order-content-a"));
    } else{
        $( "#menu-main-menu" ).append( $( "li.project-updates" ) );
         $(".order-content-a").insertBefore($(".order-content-b"));

        }
}


//Function to the css rule
function isMobile(){
    if ($(".visible-xs").css("display") == "none" ){
        // your code here
         return false;
    }else{
        return true;
    }
}






