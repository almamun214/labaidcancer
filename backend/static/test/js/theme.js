(function ($) {
    "use strict";

    if ($(".wow").length) {
        var wow = new WOW({
            boxClass: "wow",
            animateClass: "animated",
            offset: 250,
            mobile: true,
            live: true,
        });
        wow.init();
    }
    if ($(".accrodion-grp").length) {
        var accrodionGrp = $(".accrodion-grp");
        accrodionGrp.each(function () {
            var accrodionName = $(this).data("grp-name");
            var Self = $(this);
            var accordion = Self.find(".accrodion");
            Self.addClass(accrodionName);
            Self.find(".accrodion .accrodion-content").hide();
            Self.find(".accrodion.active").find(".accrodion-content").show();
            accordion.each(function () {
                $(this)
                    .find(".accrodion-title")
                    .on("click", function () {
                        if ($(this).parent().hasClass("active") === false) {
                            $(".accrodion-grp." + accrodionName)
                                .find(".accrodion")
                                .removeClass("active");
                            $(".accrodion-grp." + accrodionName)
                                .find(".accrodion")
                                .find(".accrodion-content")
                                .slideUp();
                            $(this).parent().addClass("active");
                            $(this).parent().find(".accrodion-content").slideDown();
                        }
                    });
            });
        });
    }
    if ($(".main-navigation .navigation-box .submenu").length) {
        var subMenu = $(".main-navigation .submenu");
        subMenu
            .parent("li")
            .children("a")
            .append(function () {
                return '<button class="sub-nav-toggler"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>';
            });
        var mainNavToggler = $(".header-navigation .menu-toggler");
        var subNavToggler = $(".main-navigation .sub-nav-toggler");
        mainNavToggler.on("click", function () {
            var Self = $(this);
            var menu = Self.closest(".header-navigation").find(Self.data("target"));
            $(menu).slideToggle();
            $(menu).toggleClass("showen");
            return false;
        });
        subNavToggler.on("click", function () {
            var Self = $(this);
            Self.parent().parent().children(".submenu").slideToggle();
            return false;
        });
    }
    if ($(".stricky").length) {
        $(".stricky")
            .addClass("original")
            .clone(true)
            .insertAfter(".stricky")
            .addClass("stricked-menu")
            .removeClass("original");
    }
    function isotopeActivator() {
        if ($(".masonary-layout").length) {
            $(".masonary-layout").isotope({
                layoutMode: "masonry",
                itemSelector: ".masonary-item",
            });
        }
        if ($(".masonary-layout-no-grid-width").length) {
            $(".masonary-layout-no-grid-width").isotope({
                layoutMode: "masonry",
                itemSelector: ".masonary-item",
            });
        }

        if ($(".post-filter").length) {
            var postFilterList = $(".post-filter li");
            postFilterList.children("span").on("click", function () {
                var Self = $(this);
                var selector = Self.parent().attr("data-filter");
                postFilterList.children("span").parent().removeClass("active");
                Self.parent().addClass("active");

                $(".filter-layout").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 500,
                        easing: "linear",
                        queue: false,
                    },
                });
                return false;
            });
        }
    }
        if ($('.counter').length) {
        $('.counter').counterUp({
            delay: 10,
            time: 3000
        });
    }
    if ($(".banner-carousel__one").length) {
        $(".banner-carousel__one").owlCarousel({
            loop: true,
            items: 1,
            margin: 0,
            dots: true,
            nav: false,
            animateOut: "slideOutDown",
            animateIn: "fadeIn",
            active: true,
            smartSpeed: 1000,
            autoplay: 5000,
        });
        $(".banner-carousel-btn .left-btn").on("click", function () {
            $(".banner-carousel__one").trigger("next.owl.carousel");
            return false;
        });
        $(".banner-carousel-btn .right-btn").on("click", function () {
            $(".banner-carousel__one").trigger("prev.owl.carousel");
            return false;
        });
    }
    if ($(".scroll-to-target").length) {
        $(".scroll-to-target").on("click", function () {
            var target = $(this).attr("data-target");
            var offset = $(this).attr("data-target-offset");

            $("html, body").animate(
                {
                    scrollTop: $(target).offset().top - offset,
                },
                1000
            );

            return false;
        });
    }    if ($(".cancer-doctors").length) {
        $(".cancer-doctors").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            navText: [
                '<i class="material-icons">keyboard_arrow_left</i>',
                '<i class="material-icons">keyboard_arrow_right</i>',
            ],
            dots: false,
            autoWidth: false,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                991: {
                    items: 3,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 3,
                },
            },
        });
    }
    if ($(".specialists__carousel").length) {
        $(".specialists__carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            navText: [
                '<i class="material-icons">keyboard_arrow_left</i>',
                '<i class="material-icons">keyboard_arrow_right</i>',
            ],
            dots: false,
            autoWidth: false,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                991: {
                    items: 3,
                },
                1000: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    }

    $('.technology-carousel').carousel({
        indicators: true,
        autoplay: true,
        duration: 200
    });
    autoplay();
    function autoplay() {
        $('.technology-carousel').carousel('next');
         setTimeout(autoplay, 3000);
    }
    if ($(".awards__carousel").length) {
        if ($(".awards__carousel").data("carousel-margin") !== undefined) {
            var testicarouselMargin = $(".awards__carousel").data("carousel-margin");
        } else {
            var testicarouselMargin = 80;
        }
        $(".awards__carousel").owlCarousel({
            loop: true,
            margin: testicarouselMargin,
            nav: false,
            navText: [
                '<i class="fa fa-long-arrow-left"></i>',
                '<i class="fa fa-long-arrow-right"></i>',
            ],
            dots: true,
            autoWidth: false,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 1,
                },
                600: {
                    items: 1,
                },
                991: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
                1200: {
                    items: 1,
                },
            },
        });
    }
    if ($(".testimonials-three__carousel").length) {
        $(".testimonials-three__carousel").owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            navText: [
                '<i class="material-icons">keyboard_arrow_left</i>',
                '<i class="material-icons">keyboard_arrow_right</i>',
            ],
            dots: false,
            autoWidth: false,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 1,
                },
                600: {
                    items: 2,
                },
                991: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1200: {
                    items: 4,
                },
            },
        });
    }
    if ($(".partners__carousel").length) {
        $(".partners__carousel").owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            dots: false,
            autoWidth: false,
            autoplay: true,
            smartSpeed: 700,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                },
                480: {
                    items: 2,
                },
                600: {
                    items: 4,
                },
                991: {
                    items: 4,
                },
                1000: {
                    items: 5,
                },
                1200: {
                    items: 5,
                },
            },
        });
    }
    $('.test-details-slider').owlCarousel({
        items:1,
        autoplay:false,
        autoplayTimeout:5000,
        smartSpeed: 400,
        autoplayHoverPause:true,
        loop:true,
        merge:true,
        nav:true,
        dots:false,
        navText: ['<i class="fa fa-arrow-left"></i>', '<i class="fa fa-arrow-right"></i>'],
    });
    $(window).on("scroll", function () {
        if ($(".scroll-to-top").length) {
            var strickyScrollPos = 100;
            if ($(window).scrollTop() > strickyScrollPos) {
                $(".scroll-to-top").fadeIn(500);
            } else if ($(this).scrollTop() <= strickyScrollPos) {
                $(".scroll-to-top").fadeOut(500);
            }
        }
        if ($(".stricked-menu").length) {
            var headerScrollPos = 100;
            var stricky = $(".stricked-menu");
            if ($(window).scrollTop() > headerScrollPos) {
                stricky.addClass("stricky-fixed");
            } else if ($(this).scrollTop() <= headerScrollPos) {
                stricky.removeClass("stricky-fixed");
            }
        }
    });
    $(window).on("load", function () {
        isotopeActivator();
        if ($(".preloader").length) {
            $(".preloader").fadeOut("slow");
        }
        if ($(".team-three__slider").length) {
            $(".team-three__slider").bxSlider({
                auto: true,
                controls: true,
                nextText: " ",
                prevText: " ",
                pause: 5000,
                speed: 500,
                pager: true,
                pagerCustom: ".team-three__pager",
            });
        }
    });
    $(window).scroll(function() {
        var header = $(document).scrollTop();
        var firstSection = $(".topbar-one").outerHeight();
        var secondSection = $(".site-header").outerHeight();
        var thirdSection = $(".cancer-banner").outerHeight();
        var cancerContent = $(".cancer-details").outerHeight() - 250;
        var headerHeight = firstSection + secondSection + thirdSection;
        if (header > headerHeight) {
            $(".sidebar-fixed-menu").addClass("fixed-menu");
        }
        else {
            $(".sidebar-fixed-menu").removeClass("fixed-menu");
        }
        if (header > cancerContent) {
            $(".sidebar-fixed-menu").removeClass("fixed-menu");
        }
    });
    $(document).ready(function(){
  // Add smooth scrolling to all links
  $(".scroll-link").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
})(jQuery);
