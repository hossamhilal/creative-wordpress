

/*global $ */
(function($) {
    'use strict';

    $(window).on('load', function () {
        $('.loader').fadeOut(500, function () {
            $(this).remove();
        });
    });

    // $('.nav-menu .nav-item a').addClass('nav-link');

    // Open navbarSide when button is clicked
    $('.site-header .nav-btn').on('click', function () {
        $(this).toggleClass('open');
        $('.nav-menu ul').toggleClass('show-sidemenu');
        $('.site-header .over-lay').toggle();
    });

    // Close navbarSide when the outside of menu is clicked
    $('.site-header .over-lay').on('click', function () {
        $('.site-header .nav-btn').removeClass('open');
        $('.nav-menu ul').removeClass('show-sidemenu');
        $('.site-header .over-lay').hide();
    });

    // STICKY NAV  FIXED
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.header-nav').addClass("navbar-fixed-top");
        }
        else {
            $('.header-nav').removeClass("navbar-fixed-top");
        }
    });


    $('.btn-animate')
    .on('mouseenter', function(e) {
			var parentOffset = $(this).offset(),
      		relX = e.pageX - parentOffset.left,
      		relY = e.pageY - parentOffset.top;
			$(this).find('span').css({top:relY, left:relX})
    })
    .on('mouseout', function(e) {
			var parentOffset = $(this).offset(),
      		relX = e.pageX - parentOffset.left,
      		relY = e.pageY - parentOffset.top;
    	$(this).find('span').css({top:relY, left:relX})
    });

    
    // PHOTO GALLERY BIG SHOW PHOTO
    $('.service-owl').owlCarousel({
        rtl: true,
        items:30,
        margin: 10,
        autoplay: true,
        loop: true,
        nav: false,
        dots:true,
        navText: ["<i class='icofont-thin-right'></i>", "<i class='icofont-thin-left'></i>"],
        responsive: {
            0: {
                items: 1,
                dotsEach: 1
            },
            600: {
                items: 2,
                dotsEach: 1
            },
            1000: {
                items: 3,
                dotsEach: 2
            }
        }
    });


    //PHOTO GALLERY BIG SHOW PHOTO
    $('.packages-owl').owlCarousel({
        rtl: true,
        margin: 10,
        // autoplay: true,
        loop: true,
        nav: true,
        dots:true,
        navText: ["<i class='icofont-thin-right'></i>", "<i class='icofont-thin-left'></i>"],
        responsive: {
            0: {
                items: 1,
                dotsEach: 1
            },
            600: {
                items: 2,
                dotsEach: 1
            },
            1000: {
                center:true,
                items: 3,
                dotsEach: 1
            }
        }
    });


    $('.team-owl').owlCarousel({
        rtl: true,
        margin: 20,
        // autoplay: true,
        loop: true,
        nav: true,
        center:true,
        mouseDrag:false,
        touchDrag:false,
        pullDrag:false,
        dots:true,
        navText: ["<i class='icofont-thin-right'></i>", "<i class='icofont-thin-left'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    $('.team-fixed-data .text h3').text($('.team-owl .owl-item.active.center .text h3').text());
    $('.team-fixed-data .text p').text($('.team-owl .owl-item.active.center .text p').text());
    $('.team-fixed-data .text ul').html($('.team-owl .owl-item.active.center .text .social').html());

    $(document).on('click','.team-owl .owl-prev , .team-owl .owl-next',function(){
        var oldTit = $('.team-owl .owl-item.active.center .text h3').text(),
            oldTxt = $('.team-owl .owl-item.active.center .text p').text() ,
            oldSocial = $('.team-owl .owl-item.active.center .text .social').html();
        $('.team-fixed-data .text h3').text(oldTit);
        $('.team-fixed-data .text p').text(oldTxt);
        $('.team-fixed-data .text ul').html(oldSocial);
    });


    $('.blog-owl').owlCarousel({
        rtl: true,
        margin: 20,
        // autoplay: true,
        loop: true,
        nav: false,       
        dots:true,
        navText: ["<i class='icofont-thin-right'></i>", "<i class='icofont-thin-left'></i>"],
        responsive: {
            0: {
                items: 1,
                dotsEach: 1
            },
            600: {
                items: 2,
                dotsEach: 1
            },
            1000: {
                center:true,
                items: 3,
                dotsEach: 1
            }
        }
    });

    $('.form-control').each(function() { 
        if ($(this).val() != "") {
            $(this).parent('.field').addClass('animation');
            
        }
    });

    $('.form-control').focus(function(){
        $(this).parent('.field').addClass('animation');
    });
    
    $('.form-control').focusout(function(){
        if($(this).val() === "")
        $(this).parent('.field').removeClass('animation');
    });

    $('.input-field>button').addClass('btn-animate');
    $('.input-field>button').append('<span></span>');
    // $('.single-comment').removeClass('comment');

})(jQuery);

