$(document).ready(function() {
    "use strict";

    // ------------
    // Animation Identifiers
    // These classes have their opacity reduced to 0 in CSS to avoid animation glitching.
    // ------------
    var windowwidth = $(window).width();
    if (windowwidth > 768) {
        $('.ani_.fadeindown, .pricing__item').bind('inview', function(
            event, visible) {
            if (visible) {
                $(this).addClass('animated fadeInDown');
            }
        });
        $('.ani_.fadeinright').bind('inview', function(event, visible) {
            if (visible) {
                $(this).addClass('animated fadeInRight');
            }
        });
        $('.ani_.fadeinup').bind('inview', function(event, visible) {
            if (visible) {
                $(this).addClass('animated fadeInUp');
            }
        });
        $('.ani_.fadeinleft').bind('inview', function(event, visible) {
            if (visible) {
                $(this).addClass('animated fadeInLeft');
            }
        });
    }

    // ------------
    // Count on view - Initiate counter on inView
    // ------------
    $('.count-on-view').one('inview', function(event, visible) {
        if (visible) {
            $(this).each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 7000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(
                            now));
                    }
                });
            });
        }
    });

    // ------------
    // Skill Lines
    // ------------
    $('.skill-line').bind('inview', function(event, visible) {
        if (visible) {
            $(this).find('.skill-line-inside').css('width',
                function() {
                    return $(this).data('percent') + '%';
                });
            $(this).find('.percentage').addClass('slowlyappear');
        }
    });

}); // document.ready

// ------------
// $(window).resize - Actions to take upon resizing your browser
// ------------
$(window).resize(function() {
    "use strict";
    $('.ani_, .pricing__item').css('opacity', 1);
});