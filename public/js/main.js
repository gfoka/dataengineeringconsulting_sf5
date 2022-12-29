$(function() {
    "use strict";

    // Global elements reused throughout
    var nav = $("#nav"),
        stick = $(".stick"),
        navIcon = $(".nav-icon"),
        mobileNav = $(".mobile-nav"),
        workWithUs = $("#workwithus"),
        vMidEle = $(".v-mid");

    var body = $("body");

    // ------------
    // All Functions to initialize on document ready
    // ------------
    function arrowDown() {
        $(".arrow-down").on("click", function() {
            var banner = $(this).parent().height();
            $("html, body").animate({
                scrollTop: banner
            }, 250);
            return false;
        });
    }
    arrowDown(); // Initialize arrowDown on document ready

    function mobileStick() {
        var scrollPosition = $(window).scrollTop();
        if (scrollPosition > 10) {
            nav.addClass("mobile-stick").addClass("stuck");
            navIcon.addClass("scrolled");
        } else {
            nav.removeClass("mobile-stick").removeClass("stuck");
            navIcon.removeClass("scrolled");
        }
    }
    mobileStick(); // Initialize mobileStick on document ready

    function navController() {
        navIcon.on("click", function() {
            body.toggleClass("open");
            if (body.hasClass("open")) {
                mobileNav.css("opacity", 1);
            } else {
                mobileNav.css("opacity", 0);
            }
            return false;
        });
        $("nav").clone().appendTo(mobileNav);
        $(".mobile-nav nav ul").removeClass("flipInX").removeClass(
            "fadeInLeft");
        mobileNav.find("i").removeClass(
            "ion-ios-arrow-right").addClass(
            "ion-ios-arrow-down");
    }
    navController(); // Initialize navController on document ready

    function mobileMenuAlts() {
        $(".mobile-nav nav ul > li.parent_1 > a").on("click",
            function() {
                $(this).next().toggleClass(
                    "menu-open fadeInDown");
                $(this).find("i").toggleClass(
                    "ion-ios-arrow-down").toggleClass(
                    "ion-ios-arrow-up");
                return false;
            });
        $(".mobile-nav nav ul li.parent_2 > a").on("click",
            function() {
                $(this).next().toggleClass(
                    "menu-open fadeInDown");
                $(this).find("i").toggleClass(
                    "ion-ios-arrow-down").toggleClass(
                    "ion-ios-arrow-up");
                return false;
            });
    }
    mobileMenuAlts(); // Initialize mobileMenuAlts on document ready & Always after navController()


    $("nav .nav-btn").on("click", function() {
        workWithUs.fadeIn();
        return false;
    });

    // ------------
    // Functions to be called in window.load / window.resize
    // ------------
    function imageLarge() {
        $(".imageLarge").each(function() {
            var $this = $(this),
                imageheight = $this.find("img").height();
            $this.css("height", imageheight);
        });
    }

    function vMid() {
        var windowWidth = $(window).width();
        if (windowWidth > 977) {
            vMidEle.each(function() {
                var $this = $(this),
                    parentheight = $this.parent().height(),
                    ownheight = $this.height(),
                    margincalc = parentheight - ownheight;
                $this.css("margin-top", margincalc / 2 - 5);
            });
        } else if (windowWidth < 977) {
            vMidEle.css("margin-top", 0);
        }
    }

    // ------------
    // .matchHeight() - Initialize Same Height Script : vendor/jquery.matchHeight-min.js
    // ------------
    $(".e_h").matchHeight();

    // ------------
    // $(window) scroll - Actions to take on scroll
    // ------------
    $(window).on("scroll", function() {
        mobileStick(); // Initialize mobilestick function
    });

    // ------------
    // $(window) load - Actions to take as soon as page has loaded
    // ------------
    $(window).on("load", function() {
        imageLarge(); // Initialize imageLarge function
        vMid(); // Initialize vMid function
        $(".loader").fadeOut(450); // FadeOut Preloader once page has loaded

        // Customiser for Preview Purposes Only
        $("#customiser").load("customiser/customiser.html");

        // Load Work With Us
        workWithUs.load("workwithus.html");
    });

    // ------------
    // $(window).resize - Actions to take upon resizing your browser
    // ------------
    $(window).on("resize", function() {
        imageLarge(); // Re-init imageLarge function
        vMid(); // Re-init vMid function

        var windowWidth = $(window).width();
        if (windowWidth > 992) {
            body.removeClass("open");
            mobileNav.css("opacity", 0);
        }
    });


    // ------------
    // SVG Handler
    // ------------
    jQuery(".logo img").each(function() {
        var $img = jQuery(this),
            imgID = $img.attr("id"),
            imgClass = $img.attr("class"),
            imgURL = $img.attr("src");
        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find("svg");
            // Add replaced image"s ID to the new SVG
            if (typeof imgID !== "undefined") {
                $svg = $svg.attr("id", imgID);
            }
            // Add replaced image"s classes to the new SVG
            if (typeof imgClass !== "undefined") {
                $svg = $svg.attr("class", imgClass +
                    " replaced-svg");
            }
            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr("xmlns:a");
            // Replace image with new SVG
            $img.replaceWith($svg);
        }, "xml");
    });


}); // Last Exit Bracket
