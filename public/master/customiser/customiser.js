var nav = $('#nav'),
    body = $('body'),
    customiser = $('.customiser'),
    toggle = $('.open-toggle');

$('.exp').on("click", function() {
    customiser.addClass('move');
    toggle.addClass('open');
});
toggle.on("click", function() {
    customiser.removeClass('move');
    toggle.removeClass('open');
})

$('li').on("click", function() {
    $(this).addClass('active').siblings().removeClass('active');
});

$('.boxed-page').on("click", function() {
    body.addClass('boxed');
});

$('.fullwidth').on("click", function() {
    body.removeClass('boxed');
});

$('.sticky-nav').on("click", function() {
    nav.addClass('stick primary')
        .removeClass('light')
        .removeClass('dark');
    body.scrollTop(0);
});

$('.sticky-white').on("click", function() {
    nav.addClass('stick light')
        .removeClass('primary')
        .removeClass('dark');
    body.scrollTop(0);
});

$('.sticky-dark').on("click", function() {
    nav.addClass('stick dark')
        .removeClass('light')
        .removeClass('primary');
    body.scrollTop(0);
});

$('.static-nav').on("click", function() {
    nav.removeClass('stick')
        .removeClass('primary')
        .removeClass('light')
        .removeClass('dark');
});

$('.full-nav').on("click", function() {
    $('#nav .container, header .container').addClass('container-fluid');
    $('#nav .container, header .container').removeClass('container');
});

$('.contained-nav').on("click", function() {
    $('#nav .container-fluid, header .container-fluid').addClass('container');
    $('#nav .container-fluid, header .container-fluid').removeClass('container-fluid');
});

$("li[data-theme]").on("click", function() {
    $("link#theme").attr("href", $(this).data("theme"));
});
