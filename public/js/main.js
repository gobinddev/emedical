(function ($) {
    "use strict";
    
// JS Index
//----------------------------------------
// 1. Countdown
// 2. preloader active
// 3.sticky menu
// 4. Animate the scroll to top
// 5. mobile-menu(mean-menu)
// 6. mobile-menu-sidebar
// 7. accordion(sidebar)
// 8. background image
// 9 quantity input arrow
// 10. header-shopping-cart
// 11. header-shopping-cart
//  12. header-setting
// 13. header-language
// 14. header-currency
// 15. header-search
// 16. slider - active
// 17. Range Slider Js (shop sidebar)
// 18. product-active
// 19.most-purchased-item-active
// 20. news-post-active
// 21. handpick-items-active
// 22. home2 handpick-items-active
// 23. best-deal-product-active
// 24. home2-best-product-left-active
// 25. h3-purchased-product-active
// 26. h3-weekly-deal-active
// 27. testimonial-active
// 28. brand-active
// 29. shop-product-slider-active
// 30. home2-product-active
// 31. product-carousal-active
// 32. blog-post-active
// 33. nice selection
// 34. news-like-post-active
// 35. shop-page-product-active
// 36. shop-page-product-active
// 37. blog-details-img-active
// 38. accordion(sidebar) 
// 39. showlogin toggle function
// 40. showcoupon toggle function
// 41. Create an account toggle function
// 42. Create an account toggle function
// 43. product-zoom


//-------------------------------------------------



// 1. Countdown
//---------------------------------------------------------------------------
$('[data-countdown]').each(function() {
    var $this = $(this), finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<span class="cdown days"><span class="time-count">%-D</span> <p>Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>HRS</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>Sec</p></span>'));
    });
});


// 2. preloader active
// --------------------------------------------------------------------------
var win = $(window);
win.on("load", function () {
    $("#loading").fadeOut(0)
});





// 4. Animate the scroll to top
// --------------------------------------------------------------------------
// Show or hide the sticky footer button
win.on('scroll', function(event) {
    if($(this).scrollTop() > 600){
        $('#scroll').fadeIn(1000)
    } else{
        $('#scroll').fadeOut(1000)
    }
});

$('#scroll').on('click', function(event) {
    event.preventDefault();
    
    $('html, body').animate({
        scrollTop: 0,
    }, 1500);
});



// 5. mobile-menu(mean-menu)
//---------------------------------------------------------------------------
$("#mobile-menu").meanmenu({
    meanMenuContainer: ".mobile-menu",
    meanScreenWidth: "991",
});


// 6. mobile-menu-sidebar
//---------------------------------------------------------------------------
$(".mobile-menubar").on("click", function(){
    $(".side-mobile-menu").addClass('open-menubar');
    $(".body-overlay").addClass("opened");
});
$(".close-menu").on("click", function(){
    $(".side-mobile-menu").removeClass('open-menubar');
    $(".body-overlay").removeClass("opened");
});

$(".body-overlay").on("click", function () {
    $(".side-mobile-menu").removeClass('open-menubar');
    $(".body-overlay").removeClass("opened");
});



// 7. accordion(sidebar) 
//---------------------------------------------------------------------------
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}



// 8. background image
//---------------------------------------------------------------------------
$("[data-background]").each(function (){
    $(this).css("background-image","url(" + $(this).attr("data-background") + ")");
});


// 9 quantity input arrow
//---------------------------------------------------------------------------      
$('.quantity-input').inputarrow({
    renderPrev: function(input) {
        return $('<span class="custom-next"><i class="icon-minus"></i></span>').insertAfter(input);
    },
    renderNext: function(input) {
        return $('<span class="custom-prev"><i class="icon-plus"></i></span>').insertBefore(input);
    },
    disabledClassName: 'enable'
});



// 10. header-shopping-cart
//---------------------------------------------------------------------------
$(".cart-item").on('click',function(){
    $(".header-shopping-cart-details").toggle();
});




// 11. header-shopping-cart
//---------------------------------------------------------------------------
$(".newsletter-tootle").on('click',function(){
    $(".subscribe-form-area").toggle();
});



// 12. header-setting
//---------------------------------------------------------------------------
$(".header-setting").on('click',function(){
    $(".header-setting-content").toggle();
});



// 13. header-language
//---------------------------------------------------------------------------
$(".language").on('click',function(){
    $(".show-language").toggle();
});



// 14. header-currency
//---------------------------------------------------------------------------
$(".currency").on('click',function(){
    $(".show-currency").toggle();
});

// 15. header-search
//---------------------------------------------------------------------------
$(".header-search").on("click", function(){
    $(".header-search-details").addClass('open-search-info');
});
$(".close-icon").on("click", function(){
    $(".header-search-details").removeClass('open-search-info');

});




// 16. slider - active
//---------------------------------------------------------------------------
function mainSlider() {
    var BasicSlider = $('.slider-active');

    BasicSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
    });

    BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
    });

    BasicSlider.slick({
        dots: false,
        fade: true,
        autoplay: false,
        autoplaySpeed: 5000,
        arrows: true,
        prevArrow:'<i class="prevarows fas fs-30 fa-chevron-left"></i>',
        nextArrow:'<i class="nextarows fas fs-30 fa-chevron-right"></i>',
        responsive: [
            { breakpoint: 767, settings: {arrows: false,} }
        ]
    });

    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }
}
mainSlider();



// 17. Range Slider Js (shop sidebar)
//---------------------------------------------------------------------------
if ($("#slider-range").length) {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [90, 400.00],
        slide: function (event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));

}



// 18. product-active
//---------------------------------------------------------------------------
$('.product-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    centerMargin:'50px',
    slidesToShow: 3,
    slidesToScroll: 1,
    mobileFirst:true,
    
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 0,
            settings: {
                slidesToShow: 1,
            }
        },
        
    ]
});


// 19.most-purchased-item-active
//---------------------------------------------------------------------------
$('.most-purchased-item-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow:false,
    // nextArrow:'<b><span class=" r-a">View All Products <i class="fas fa-angle-right"></i></span></b>',
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});



// 20. news-post-active
//---------------------------------------------------------------------------
$('.news-post-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 2,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },
        ,{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});


// 21. handpick-items-active
//---------------------------------------------------------------------------
$('.handpick-items-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});


// 22. home2 handpick-items-active
//---------------------------------------------------------------------------
$('.home2-handpick-items-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});



// 23. best-deal-product-active
//---------------------------------------------------------------------------
$('.best-deal-product-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:false,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 457,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});


// 24. home2-best-product-left-active
//---------------------------------------------------------------------------
$('.testimonial-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
});


// $('.h3-purchased-product-active').slick({
//     dots: false,
//     arrows: false,
//     infinite: true,
//     autoplay:true,
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     responsive: [
//         {
//             breakpoint: 1200,
//             settings: {
//                 slidesToShow: 3,
//             }
//         },
//         {
//             breakpoint: 767,
//             settings: {
//                 slidesToShow: 2,
//             }
//         },
//         {
//             breakpoint: 475,
//             settings: {
//                 slidesToShow: 1,
//             }
//         }
//     ]
// });


// 26. h3-weekly-deal-active

$('.h3-weekly-deal-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});



// 27. testimonial-active
//---------------------------------------------------------------------------
$('.home3-testimonial-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay:true,
    autoplaySpeed:3000,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});


// 28. brand-active
//---------------------------------------------------------------------------
$('.brand-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 2,
    responsive: [
        {
            breakpoint: 1320,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});



// 29. shop-product-slider-active
//---------------------------------------------------------------------------
$('.shop-product-slider-active').slick({
    dots: false,
    arrows: false,
    infinite: false,
    slidesToShow: 3,
    slidesToScroll: 2,
    responsive: [
        {
            breakpoint: 1199,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});


// 30. home2-product-active
//---------------------------------------------------------------------------
$('.home2-product-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 3,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});




// 31. product-carousal-active
//---------------------------------------------------------------------------
$('.product-carousal-active').slick({
    dots: false,
    arrows: true,
    prevArrow:'<b><i class="icon-chevron-left l-a"></i></b>',
    nextArrow:'<b><i class="icon-chevron-right r-a"></b>',
    infinite: true,
    slidesToShow: 3,
    slidesToScroll:1,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});


// 32. blog-post-active
//---------------------------------------------------------------------------
$('.blog-post-active').slick({
    dots: false,
    arrows: true,
    prevArrow:'<b><i class="icon-chevron-left l-a"></i></b>',
    nextArrow:'<b><i class="icon-chevron-right r-a"></b>',
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});



// 33. nice selection
//---------------------------------------------------------------------------
//$('select').niceSelect();



// 34. news-like-post-active
//---------------------------------------------------------------------------
$('.news-like-post-active').slick({
    dots: false,
    arrows: true,
    prevArrow:'<b><i class="icon-chevron-left l-a"></i></b>',
    nextArrow:'<b><i class="icon-chevron-right r-a"></b>',
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 400,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});




// 35. shop-page-product-active
//---------------------------------------------------------------------------
$('.shop-page-product-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    centerMargin:'50px',
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 1500,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 475,
            settings: {
                slidesToShow: 2,
            }
        }
    ]
});


// 36. shop-page-product-active
//---------------------------------------------------------------------------
$('.shop-full-page-product-active').slick({
    dots: false,
    arrows: false,
    infinite: true,
    centerMargin:'50px',
    slidesToShow: 4,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 1450,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 4,
            }
        },
        {
            breakpoint: 700,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 350,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});



// 25. wow animation  active
// ---------------------------------------------------------------------------
new WOW().init();



// 37. blog-details-img-active
//---------------------------------------------------------------------------
$('.blog-details-img-active').slick({
    dots: false,
    arrows: true,
    prevArrow:'<b><span class="l-a"><i class="fas fa-angle-right"></i></span></b>',
    nextArrow:'<b><span class="r-a"><i class="fas fa-angle-right"></i></span></b>',
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});




// 38. accordion(sidebar) 
//---------------------------------------------------------------------------
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}



// 39. showlogin toggle function
// ---------------------------------------------------------------------------
$('#login').on('click', function () {
	$('#checkout-login').slideToggle(900);
});

// 40. showcoupon toggle function
// ---------------------------------------------------------------------------
$('#couponshow').on('click', function () {
	$('#checkout-coupon').slideToggle(900);
});


// 41. Create an account toggle function
// ---------------------------------------------------------------------------
$('#cbox-account').on('click', function () {
	$('#cbox-account-info').slideToggle(900);
});


// 42. Create an account toggle function
// ---------------------------------------------------------------------------
$('#ship-box').on('click', function () {
	$('#ship-box-info').slideToggle(1000);
});
$('.clicktog').on('click', function () {
	$(this).parent('li').children('.backingfold').toggle(300);
});

// 43. product-zoom 
//---------------------------------------------------------------------------
    $(".product-zoom").elevateZoom({
        zoomType: "inner",
        cursor: "crosshair"
    });




})(jQuery);	  
