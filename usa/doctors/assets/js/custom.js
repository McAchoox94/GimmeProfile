// ******************************************************************************************
// Configuration Start		
// ******************************************************************************************

//Twitter Start 
// ******************************************************************************************
//Set true or false to enable/disable
var twitter_enabled = true;

//Your twitter username
var twitter_username = 'jquery';

//Number of tweets
var twitter_count = 3;

//Patch to twitter library
var twitter_lib_path = 'assets/js/lib/twitter/index.html';


//Preloader enable/disable (Query Loader 2.0)
// ******************************************************************************************
//Set true or false to enable/disable the prelaoder
var preloader_enabled=true;


//Setting page Full width/ Boxed version 
// ******************************************************************************************
//Setting page  "Set true for full width"/ false for Boxed version

var fullwidth_enabled=true; // default full width

//Configuration END


/*****************************************************************************
		  			Latest Tweets 
*****************************************************************************/
 //Latest Tweets END


/*****************************************************************************
		  			Full Width Enabled 
*****************************************************************************/
if(fullwidth_enabled){
	jQuery('#boxed').removeClass('shadow');
} else
{
jQuery('#boxed').addClass('shadow');
}

// Full Width Enabled  end


// ******************************************************************************************
// Contact Form Start
// ******************************************************************************************
jQuery(document).ready(function($){
"use strict";	
  $('#contact_form').validate(
    {
    rules: {
    name: {
    minlength: 2,
    required: true
    },
    email: {
    required: true,
    email: true
    },
	phone: {
    required: true,
    phone: true
    },
    subject: {
    minlength: 2,
    required: true
    },
    message: {
    minlength: 2,
    required: true
    }
    },
    highlight: function(element) {
    $(element).closest('.control-group').removeClass('success').addClass('error');
    },
    success: function(element) {
    element
    .text('OK!').addClass('valid')
    .closest('.control-group').removeClass('error').addClass('success');
    },
	submitHandler: function(form) {
					// do other stuff for a valid form
					$.post('email_process.html', $("#contact_form").serialize(), function(data) { // action file is here 
						$('#post_message').html(data);
					});
				}
    });
    }); // end document.ready


//Contact Form END


/****************************************************************
		  // Query Loader 2
****************************************************************/

// Query Loader 2


jQuery(document).ready(function($){
"use strict";
    if(preloader_enabled){
		$("body").queryLoader2({
        barColor: "#8f8f8f",
        backgroundColor: "#1d1d1d",
        percentage: true,
        barHeight: 1,
        completeAnimation: "grow",
        minimumTime: 0
    });
	}
});
// Query Loader 2 END


/***************************************************
		  		swipebox
***************************************************/


	jQuery(function($) {

			/* Basic Gallery */
			$(".swipebox").swipebox();
			
			/* Video */
			$(".swipebox-video").swipebox();


			/* Isotope */
			var swipeboxInstance = $(".swipebox-isotope:not(.isotope-hidden .swipebox-isotope)").swipebox();

			var $container = $('#portfolio-list');
			var optionFilter = $('.filter'),
			optionFilterLinks = optionFilter.find('a');
			optionFilterLinks.attr('href', '#');

			onAnimationCompleted = function(){
				swipeboxInstance.refresh();
			};

			optionFilterLinks.click( function(){
				var selector = $(this).attr('data-filter');
				$container.isotope({ 
					filter : '.' + selector, 
					itemSelector : '.all',
					layoutMode : 'fitRows',
					animationEngine : 'best-available',
				}, onAnimationCompleted);

				// Highlight the correct filter
				optionFilterLinks.removeClass('current');
				$(this).addClass('current');

			
				return false;
			});
		});
	
//swipebox  END
	


/***************************************************
		  		flexslider
***************************************************/


		
		
		// Can also be used with $(document).ready()
jQuery(document).ready(function($){ 
"use strict";			

//flex slider for twitter
 $('#twit').flexslider({
    animation: "slide",
	directionNav:false,
	controlNav:true
  });
  

//flex slider for blog details
$('.flex_single').flexslider({
	animation: "fade",
	slideshow: false,
	controlNav: true
     });
//flex slider for blog
	
});

//flexslider END

/***************************************************
		//  appear animated function
***************************************************/
jQuery(function ($) {
	"use strict";



//Animated Progress Bars
	$('.progress_bars li').each(function () {
		$(this).appear(function() {
		  $(this).animate({opacity:1,left:"0px"},1200);
		  var b = $(this).find("span").attr("data-width");
		  $(this).find("span").animate({
			width: b + "%"
		  }, 1700, "easeOutCirc");
		});	
	});
//Animated Progress Bars end

// appear Elements animation
	$('.element_from_top').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,top:"0px"},1000);
		});	
	});

	$('.element_from_bottom').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,bottom:"0px"},1000);
		});	
	});
	
	$('.element_from_left').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,left:"0px"},1000);
		});	
	});
	
	$('.element_from_right').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,right:"0px"},1000);
		});	
	});
	
	$('.element_fade_in').each(function () {
		$(this).appear(function() {
		  $(this).delay(150).animate({opacity:1,right:"0px"},1000);
		});	
	});
// appear Elements animation end

});


/***************************************************
			//Navigation smooth Scrolling
***************************************************/
jQuery(function($){
"use strict";
		$('.nav a, .nav li a, .arrow-link a, .arrow-link2 a, .arrow-link3 a,#cbp-spmenu-s4 a,.btn a ,.down-arrow a').bind('click',function(event){
		var $anchor = $(this);
		$('html, body').stop().animate({
		scrollTop: $($anchor.attr('href')).offset().top -90}, 1700,'easeInOutExpo');
		event.preventDefault();
});
});





/***************************************************
		  		//	(Back to Top)
***************************************************/

jQuery(function($){
"use strict";
		var settings = {
				button      : '#back_to_top',
				text        : 'Back to Top',
				min         : 200,
				fadeIn      : 400,
				fadeOut     : 400,
				scrollSpeed : 800,
				easingType  : 'easeInOutExpo'
			},
			oldiOS     = false,
			oldAndroid = false;

		// Detect if older iOS device, which doesn't support fixed position
		if( /(iPhone|iPod|iPad)\sOS\s[0-4][_\d]+/i.test(navigator.userAgent) )
			oldiOS = true;

		// Detect if older Android device, which doesn't support fixed position
		if( /Android\s+([0-2][\.\d]+)/i.test(navigator.userAgent) )
			oldAndroid = true;
	
		$('body').append('<a href="#" id="' + settings.button.substring(1) + '" title="' + settings.text + '">' + settings.text + '</a>');

		$( settings.button ).click(function( e ){
				$('html, body').animate({ scrollTop : 0 }, settings.scrollSpeed, settings.easingType );
				e.preventDefault();
			});

		$(window).scroll(function() {
			var position = $(window).scrollTop();

			if( oldiOS || oldAndroid ) {
				$( settings.button ).css({
					'position' : 'absolute',
					'top'      : position + $(window).height()
				});
			}

			if ( position > settings.min ) 
				$( settings.button ).fadeIn( settings.fadeIn );
			else 
				$( settings.button ).fadeOut( settings.fadeOut );
		});

    });

<!-- // (Back to Top) end-->


<!--call jPushMenu, required-->

jQuery(document).ready(function($) {
"use strict";
	$('.toggle-menu').jPushMenu();
});


/***************************************************
//		  		//	Parallex start
***************************************************/
	
jQuery(window).load(function() {
"use strict";

	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	
	
	jQuery('.home_bg1').parallax("40%", 0.3); // Backgrounds 	banner style1
	jQuery('.home_bg2').parallax("40%", 0.3); // Backgrounds 	banner style2
	jQuery('.home_bg3').parallax("40%", 0.3); // Backgrounds	banner style3
	
	jQuery('.twitter_bg').parallax("50%",0.40); // Backgrounds
	jQuery('.funfacts_bg').parallax("50%",0.30); // Backgrounds

		
})
<!-- Parallex end -->


/* Home sliding_title  */



$(document).ready(function(){
	"use strict";
/* function Slider  Title animated :Auto  */
	function loadSlidingTitleAnimated(){
		var myInterval;
		var counter = 1;
		var myFunc = function() {
			var cur = $('.main-title ul li').length;
			if(cur == counter) {; //if conditon for resetting counter
					$('.main-title ul li.sliding_title').removeClass('sliding_title');
					$('.main-title ul li').first().addClass('sliding_title');
					counter = 1;
				} else {
					counter++;
					$('.main-title ul li.sliding_title').removeClass('sliding_title').next().addClass('sliding_title');
				}
		};
		myInterval = setInterval(myFunc, 5000); // Set Animation Time Intervals in Miliseconds
	}
	
	loadSlidingTitleAnimated();
	
});


$(document).ready(function(){
	"use strict";
  //Portfolio filters
  $('#portfolio-grid').mixitup({
    effects: ['fade','scale'],
    easing: 'snap'
  });

});
