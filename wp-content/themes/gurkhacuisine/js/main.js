/*

Template:  Resta resturant template
Template URI: http://hastech.company/
Description: This is html5 template
Author: Hastech
Author URI: http://hastech.company/
Version: 1.0

*/
/*================================================
[  Table of contents  ]
================================================
	01. jQuery MeanMenu
	02. Searchbar active
    03. stickey menu
    04. Nivo slider activation
    05. Isotope activation
    0.6 MagnificPopup activation
    08.  Counter Up
    0.9 Accordion
    10. slick carousel 
    11. You tube video active
    12. Parallax active
    13. wow js active
    14. scrollUp jquery active
    15. Preloader
======================================
[ End table content ]
======================================*/


(function($) {
    "use strict";

   /*-------------------------------------------
    	01. jQuery MeanMenu
    --------------------------------------------- */
    jQuery('nav#dropdown').meanmenu();
	
	/* ------------------
       02. Searchbar active
    ---------------- */
	$('.search-inner a').on('click', function(){
		$('.search-inside').fadeIn();
	});
	$('.search-close').on('click', function(){
		$('.search-inside').fadeOut();
	});	
	
    /*----------------------------
       03. stickey menu
    ----------------------------*/
    $(window).on('scroll',function() {    
	   var scroll = $(window).scrollTop();
	   if (scroll < 265) {
		$(".sticky-header").removeClass("sticky");
	   }else{
		$(".sticky-header").addClass("sticky");
	   }
	});
    
	
	/*----------------------
		04. Nivo slider activation
	----------------------*/
	$('#mainSlider').nivoSlider({
        animSpeed: 500,
        pauseTime: 10000,
        pauseOnHover: true,
        controlNav: true,
        directionNav: false,
        controlNavThumbs: false,   
        manualAdvance: false,
        prevText: '<i class="fa fa-chevron-left nivo-prev-icon"></i>',
        nextText: '<i class="fa fa-chevron-right nivo-next-icon"></i>'
    });

	/*----------------------
		05. Isotope activation
	----------------------*/
    $(window).on('load',function(){

        // Activate isotope in container
        $(".gallery-item-box").isotope({
           itemSelector:'.gallery-item'
        });

        //add isotope click function
        $('.gallery-menu li').on('click',function(){
           $(".gallery-menu li").removeClass("active");
           $(this).addClass("active");

           var selector = $(this).attr("data-filter");
         $(".gallery-item-box").isotope({
             filter: selector,
             animationOptions:{
                 duration:750,
                 easing:'linear',
                 queue: false
             }
         });
         return false;
        });

    });

    /*---------------
        0.6 MagnificPopup activation
     -------------------*/
    $('.single-item-gallery a,.member-overlay').magnificPopup({
            type: 'image',
            gallery:{enabled:true}
    });	
	
    $('.single-gallery-img a').magnificPopup({
            type: 'image',
            gallery:{enabled:true},
            zoom: {
                 enabled: true,
                 duration: 300,
            }
    });	
	$('.blog-hover a, .viedo--play a,.widget-video-overlay a').magnificPopup({
            disableOn: 0,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: true,

            fixedContentPos: false
    });
    
    /*--------------------------
      08.  Counter Up
    ---------------------------- */	
    $('.counter').counterUp({
        delay: 70,
        time: 5000
    }); 
    /*--------------------
      0.9 Accordion
    -------------------------*/
    $(".widget-categories").collapse({
		accordion:true,
	  open: function() {
		this.slideDown(550);
	  },
	  close: function() {
		this.slideUp(550);
	  }		
	});	
    $(".accordion-active").collapse({
		accordion:true,
	  open: function() {
		this.slideDown(550);
	  },
	  close: function() {
		this.slideUp(550);
	  }		
	});	
    
	/*-------------------------------------------
    	10. slick carousel 
    --------------------------------------------- */
    $('.dises-list').slick({
	  dots: true,
      infinite: false,
      speed: 300,
	  arrows: false,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            // infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
});
   $('.testimonial-text-slider').slick({
        slidesToShow: 1,
        arrows: false,
        dots: true,
        // customPaging: function(slider, i) {
        //     return '<a href="javascript:void(0)">' + (i + 1) + '</a>';
        // },
        draggable: false,
        fade: true,
        autoplay: false,
        asNavFor: '.testimonial-image-slider'
    });
    $('.testimonial-image-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.testimonial-text-slider',
        dots: false,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '0',
        responsive: [
            
            {
              breakpoint: 767,
              settings: {
                autoplay: true,
                dots: false,
                slidesToShow: 1,
                centerMode: false,
                }
            },
            {
              breakpoint: 480,
              settings: {
                autoplay: true,
                dots: false,
                slidesToShow: 1,
                centerMode: false,
                }
            }
        ]
    });
    
    $('.team-list').slick({
      arrows: false,
      slidesToShow: 5,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
          }
        }
      ]
    });
    
  /*--------------------
       11. You tube video active
    -------------------------*/
    $(".youtube-bg").YTPlayer({
        videoURL:"https://youtu.be/fJRhdDIJqs0",
        containment:'.youtube-bg',
        mute:true,
        loop:true,
        showControls: true
        
    });
    
    /*--------------------------
		12. Parallax active
	----------------------*/
	$('.parallax').parallax("50%", 0.3);

   /*------------------
    	13. wow js active
    ---------------- */
    new WOW().init();
   /*------------
    	14. scrollUp jquery active
    ------------- */
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    /*---------
	   15. Preloader
	------------------------*/
		$(window).on('load', function() {
			$(".preloader").fadeOut("slow");;
    });
    /*------------------------------------
        DateCountdown active 1
    ------------------------------------- */
	$(".DateCountdown").TimeCircles({
		direction: "Counter-clockwise",
		fg_width: 0.009,
		bg_width: 0,
		use_background: false,
		animation: 'thick',
		time: {
			Days: {
				text: "Days",
				color: "#fff"
			},
			Hours: {
				text: "Hours",
				color: "#fff"
			},
			Minutes: {
				text: "Mins",
				color: "#fff"
			},
			Seconds: {
				text: "Secs",
				color: "#fff"
			}
		}

	});

})(jQuery);



/** 
 * Booking and Reservation form element
 * 
 */

grecaptcha.ready(function () {
  grecaptcha.execute('6LeW8q4ZAAAAAOujCqPMuxyAR0jzqv6Ne58Kt870', { action: 'contact' }).then(function (token) {
      var recaptchaResponse = document.getElementById('recaptchaResponse');
      recaptchaResponse.value = token;
  });
});



(function() {
  'use strict';
  window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('reservation-form');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
              }

              form.classList.add('was-validated');
              /** After client side form validation */
              if (form.checkValidity() === true) {
                event.preventDefault();

                // var that = forms,
                // url = that.attr('action'),
                // type = that.attr('method');
                var name = jQuery('#name').val();
                var email = jQuery('#email').val();
                var date = jQuery('#date_calender').val();
                var time = jQuery('#time').val();
                var phone = jQuery('#phone').val();
                var person = jQuery('#person').val();
                var recaptchaResponse = jQuery('#recaptchaResponse').val();
                jQuery.ajax({
                  url: cpm_object.ajax_url,
                  type:"POST",
                  dataType:'json',
                  data: {
                      action:'set_form', 
                      name:name,                     
                      email:email,
                      date:date,
                      time:time,
                      phone:phone,
                      person:person,
                      recaptchaResponse:recaptchaResponse
                  }, success: function(data){          
                    if(data.success == 0){
                      jQuery("#error_msg").css("display","block");     
                      
                      
                      console.log(data.message);
                    }else{
                      jQuery("#success_msg").css("display","block");
                      //event.stopPropagation();
                      //form.classList.add('was-validated');
                      form.classList.remove('was-validated');
                      jQuery('.reservation-form')[0].reset();
                    }         
                  }, error: function(data){
                    console.log("Unexcepted error");
                    }
                });
              }
            

          }, false);
      });
  }, false);
})();





var dateToday = new Date();
jQuery(function () {
  jQuery("#date_calender").datepicker({ 
        autoclose: true, 
        todayHighlight: true,
        startDate:dateToday,
        setDate:null
  });


    /*-----------------------
     Cookies
     -------------------------*/
     let cookie = false;
     let cookieContent = jQuery('.alert-cookie');
 
     checkCookie();
 
     if (cookie === true) {
         cookieContent.hide();
     } else {
         setTimeout(function(){
             cookieContent.show();
         }, 3000);
     }
 
     function setCookie(cname, cvalue, exdays) {
         let d = new Date();
         d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
         let expires = "expires=" + d.toGMTString();
         document.cookie = cname + "=" + cvalue + "; " + expires;
     }
 
     function getCookie(cname) {
         let name = cname + "=";
         let ca = document.cookie.split(';');
         for (let i = 0; i < ca.length; i++) {
             let c = ca[i].trim();
             if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
         }
         return "";
     }
 
     function checkCookie() {
         let check = getCookie("acceptCookies");
         if (check !== "") {
             return cookie = true;
         } else {
             return cookie = false; //setCookie("acceptCookies", "accepted", 365);
         }
     }
 
     jQuery("#acceptcookie").on("click", function (e) {
         e.preventDefault();
         setCookie("acceptCookies", "accepted", 365);
         cookieContent.hide(500);
     });




});





  
     
