var Slider = (function($) {
	var slider = {
		init : function() {

			$(document).ready(function() {

			  $('#fullscreen_slider').flexslider({
			    animation: "slide",
			    slideshow: false, // auto play on load
			    slideshowSpeed: 4000,
				animationSpeed: 600,
				pauseOnHover: true,
				controlNav: true, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
				directionNav: false, //Boolean: Create navigation for previous/next navigation? (true/false)
				prevText: "Previous",
				nextText: "Next"
			  });
                
                
                $('#fullscreen_slider_updates').flexslider({
			    animation: "slide",
			    slideshow: true, // auto play on load
			    slideshowSpeed: 4000,
				animationSpeed: 600,
                start: function(){
                     $('.match-height').matchHeight();
                },
				pauseOnHover: true,
				controlNav: true, //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
				directionNav: false, //Boolean: Create navigation for previous/next navigation? (true/false)
				prevText: "Previous",
				nextText: "Next"
			  });

			});

		}
	}
	return slider;
})(jQuery);

// Credit goes to [Underscore.js](http://underscorejs.org/)

/**
 * Returns a function, that, when invoked, will only be triggered at most
 * once during a given window of time. Normally, the throttled function will
 * run as much as it can, without ever going more than once per wait
 * duration; but if you’d like to disable the execution on the leading edge,
 * pass {leading: false}. To disable execution on the trailing edge, ditto.
 */

// throttle's dependent upon _now
_now = Date.now || function() {
  return new Date().getTime();
};

_throttle = function(func, wait, options) {
  var context, args, result;
  var timeout = null;
  var previous = 0;
  if (!options) options = {};
  var later = function() {
    previous = options.leading === false ? 0 : _now();
    timeout = null;
    result = func.apply(context, args);
    if (!timeout) context = args = null;
  };
  return function() {
    var now = _now();
    if (!previous && options.leading === false) previous = now;
    var remaining = wait - (now - previous);
    context = this;
    args = arguments;
    if (remaining <= 0 || remaining > wait) {
      if (timeout) {
        clearTimeout(timeout);
        timeout = null;
      }
      previous = now;
      result = func.apply(context, args);
      if (!timeout) context = args = null;
    } else if (!timeout && options.trailing !== false) {
      timeout = setTimeout(later, remaining);
    }
    return result;
  };
};

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
     var mywindow = $(document);
     var myTopNav = $('body');
    
	// Window Scroll functions
	$(window).on('scroll', _throttle(function(){
		/* do your normal scroll stuff here, but it'll be
		 * more-reasonably controlled, so as to not peg
		 * the host machine's processor */
        //var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
        //console.log(wintop);
        //console.log(wintop/(docheight-winheight));
        winPosition = mywindow.scrollTop();
            if(winPosition > 150) {
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
    
    
    $('#search-form .btn').on('click',function(){
      $('#search-form > div').toggleClass('search-open');
    })
      
    
    $('#search-form').submit(function( event ) {
      //alert( "Handler for .submit() called." );
       
         //$('#search-form > div').addClass('search-open');
        
      
        
        if($('input.s').val()){
          return;          
        }
        
        event.preventDefault();
       
    });

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






