$(document).ready(function() {
    "use strict";

    // --
    // Mosaic Portfolio 1
    // --
    $('#mosaic-portfolio').cubeportfolio({
        filters: '#js-filters-mosaic-projects1,#js-filters-mosaic-projects2',
        loadMoreAction: 'click',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1400,
            cols: 5
        }, {
            width: 1000,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 3
        }, {
            width: 320,
            cols: 2
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    });


    // --
    // Testimonials Small (1)
    // --
    $('#js-grid-testimonials').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: false,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'default',
    });


    // --
    // Testimonials Medium (2)
    // --
    $('#testimonials-2').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: true,
        showPagination: true,
        rewindNav: true,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'default',
    });


    // --
    // Testimonials Medium (2)
    // --
    $('#small-testimonial').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: true,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: true,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'default',
    });


    // --
    // Team Slider
    // --
    $('#team-slider').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: true,
        showPagination: true,
        rewindNav: true,
        scrollByPage: true,
        gapVertical: 25,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 992,
            cols: 4
        }, {
            width: 620,
            cols: 3,
            gapVertical: 15
        }, {
            width: 420,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        gapHorizontal: 0,
        caption: '',
        displayType: 'fadeIn',
        displayTypeSpeed: 400,
    });


    // --
    // JS Grid
    // --
    $('#js-grid').cubeportfolio({
        filters: '#js-filters-mosaic-flat',
        loadMore: '#js-loadMore-mosaic-flat',
        loadMoreAction: 'click',
        layoutMode: 'mosaic',
        sortToPreventGaps: true,
        mediaQueries: [{
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 2
        }],
        defaultFilter: '*',
        animationType: 'fadeOutTop',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        caption: 'fadeIn',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    });


    // --
    // Minimal Portfolio
    // --
    $('#minimal-portfolio').cubeportfolio({
        filters: '#js-filters-mosaic-projects1,#js-filters-mosaic-projects2',
        loadMoreAction: 'click',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1400,
            cols: 5
        }, {
            width: 1000,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 3
        }, {
            width: 320,
            cols: 2
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    });


    // --
    // Meet the Team
    // --
    $('#meet-the-team').cubeportfolio({
        filters: '#js-filters-meet-the-team',
        layoutMode: 'grid',
        defaultFilter: '.all',
        animationType: 'sequentially',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 992,
            cols: 4
        }, {
            width: 620,
            cols: 3
        }, {
            width: 350,
            cols: 2
        }],
        caption: 'fadeIn',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Slider Thumbnail
    // --
    $('#slider-thumbnail').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: true,
        scrollByPage: true,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'fadeIn',
        displayTypeSpeed: 400,

        plugins: {
            slider: {
                pagination: '#js-pagination-slider',
                paginationClass: 'cbp-pagination-active',
            }
        }
    });


    // --
    // One Col Grid
    // --
    $('#one-col-grid').cubeportfolio({
        filters: '#js-filters-1col',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Two Col Grid
    // --
    $('#two-col-grid').cubeportfolio({
        filters: '#js-filters-2col',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Three Col Grid
    // --
    $('#three-col-grid').cubeportfolio({
        filters: '#js-filters-3col',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });

    // --
    // Four Col Grid
    // --
    $('#four-col-grid').cubeportfolio({
        filters: '#js-filters-4col',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 992,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });



    
    // --
    // Six Col Grid
    // --
    $('#five-col-grid').cubeportfolio({
        filters: '#js-filters-5col',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 960,
            cols: 5
        }, {
            width: 850,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Full Width
    // --
    $('#full-col-grid').cubeportfolio({
        filters: '#js-filters-full',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 35,
        gapVertical: 15,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1300,
            cols: 6
        }, {
            width: 1170,
            cols: 5
        }, {
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // No Margin Grid
    // --
    $('#nomargin-col-grid').cubeportfolio({
        filters: '#js-filters-nomargin',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'slideLeft',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Mosaic 2 Column
    // --
    $('#mosaic-2').cubeportfolio({
        filters: '#mosaic-filters-2',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
    });


    // --
    // Mosaic 3 Column
    // --
    $('#mosaic-3').cubeportfolio({
        filters: '#mosaic-filters-3',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80
    });


    // --
    // Mosaic 4 Column
    // --
    $('#mosaic-4').cubeportfolio({
        filters: '#mosaic-filters-4',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80
    });


    // --
    // Mosaic Full Width
    // --
    $('#mosaic-fullwidth').cubeportfolio({
        filters: '#mosaic-filters-fullwidth',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1300,
            cols: 6
        }, {
            width: 1170,
            cols: 5
        }, {
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80
    });


    // --
    // Mosaic Full Width
    // --
    $('#mosaic-nomargin').cubeportfolio({
        filters: '#mosaic-filters-nomargin',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1300,
            cols: 6
        }, {
            width: 1170,
            cols: 5
        }, {
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80
    });


    // --
    // Masonry 2 Column
    // --
    $('#masonry-2').cubeportfolio({
        filters: '#masonry-filters-2',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Masonry 3 Column
    // --
    $('#masonry-3').cubeportfolio({
        filters: '#masonry-filters-3',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Masonry 4 Column
    // --
    $('#masonry-4').cubeportfolio({
        filters: '#masonry-filters-4',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Masonry Full Width
    // --
    $('#masonry-fullwidth').cubeportfolio({
        filters: '#masonry-filters-fullwidth',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1300,
            cols: 6
        }, {
            width: 1170,
            cols: 5
        }, {
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Masonry Full Width No Margin
    // --
    $('#masonry-nomargin').cubeportfolio({
        filters: '#masonry-filters-nomargin',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 0,
        gapVertical: 0,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1300,
            cols: 6
        }, {
            width: 1170,
            cols: 5
        }, {
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'fadeIn',
        displayTypeSpeed: 100,
    });


    // --
    // Agency HP Slider
    // --
    $('#agency-portfolio-grid').cubeportfolio({
        filters: '#js-filters-juicy-projects',
        layoutMode: 'grid',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 500,
            cols: 3
        }, {
            width: 420,
            cols: 2
        }, {
            width: 350,
            cols: 1
        }],
        caption: 'overlayBottomReveal',
        displayType: 'sequentially',
        displayTypeSpeed: 80,
    });


    // --
    // Blog Mosaic - Agency Page
    // --
    $('#blog-mosaic-1').cubeportfolio({
        filters: '#blog-mosaic-1',
        layoutMode: 'mosaic',
        defaultFilter: '*',
        animationType: 'quicksand',
        gapHorizontal: 20,
        gapVertical: 20,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 950,
            cols: 4
        }, {
            width: 700,
            cols: 3
        }, {
            width: 370,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        caption: 'zoom',
        displayType: 'sequentially',
        displayTypeSpeed: 80
    });


    // --
    // Slider Banner Header
    // --
    $('#slider-banner').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 5000,
        autoPauseOnHover: true,
        showNavigation: false,
        showPagination: true,
        rewindNav: true,
        scrollByPage: true,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 0,
        caption: '',
        displayType: 'fadeIn',
        displayTypeSpeed: 400,

        plugins: {
            slider: {
                pagination: '#js-pagination-slider',
                paginationClass: 'cbp-pagination-active',
            }
        }
    });


    // --
    // Tabs
    // --
    $('#tabs-services').cubeportfolio({
        filters: '#js-filters-tabs',
        defaultFilter: '.first',
        animationType: 'fadeOut',
        gridAdjustment: 'default',
        displayType: 'default',
        caption: '',
    });


    // --
    // FAQ
    // --
    $('#faq').cubeportfolio({
        filters: '#filters-faq',
        defaultFilter: '*',
        animationType: 'sequentially',
        gridAdjustment: 'default',
        displayType: 'default',
        caption: 'expand',
        gapHorizontal: 0,
        gapVertical: 0
    });


    // --
    // Accordeon
    // --
    $('#accordeon').cubeportfolio({
        filters: '#filters-faq',
        defaultFilter: '*',
        animationType: 'sequentially',
        gridAdjustment: 'default',
        displayType: 'default',
        caption: 'expand',
        gapHorizontal: 0,
        gapVertical: 0
    });

}); // End of document.ready