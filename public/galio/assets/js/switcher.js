(function ($) {
    "use strict";

    // Switcher Panel 
    $('.switcher-icon').on('click', function () {
        $('.color-switcher').toggleClass('switcher-toggle');
    });

    $('.colors li').on('click', function () {
        var $this = $(this);
        var styleLinker = $('#galio-skin'),
            colorName = $this.data('color');
        styleLinker.attr('href', 'assets/css/skin-' + colorName + '.css');
        $(".colors li").removeClass('active');
        $this.addClass('active');
    });

    // Switcher Layout 
    $('.btn-layout-changer').on('click', function () {
        var $this = $(this),
            layoutStyle = $this.data('layout');

        $(".btn-layout-changer").removeClass('active');
        $this.addClass('active');
        $("body").removeClass('layout-wide layout-boxed');
        $("body").addClass('layout-' + layoutStyle);
    });

    // Background Pattern
    $(".bg-pattern li img").on('click', function () {
        var $this = $(this),
            bgPattern = $this.attr('src');

        $("body").removeClass('image-bg');
        $("body").addClass('pattern-bg');
        $("body").css('background-image', 'url(' + bgPattern + ')');

        $(".bg-pattern li img").removeClass('active');
        $this.addClass('active');
    });

    // Background Image
    $(".bg-img li img").on('click', function () {
        var $this = $(this),
            bgPattern = $this.attr('src');


        $("body").removeClass('pattern-bg');
        $("body").addClass('image-bg');
        $("body").css('background-image', 'url(' + bgPattern + ')');

        $(".bg-pattern li img").removeClass('active');
        $this.addClass('active');
    });

    $(".layout-changer button[data-layout='wide']").on('click', function () {
        $("body").removeClass('pattern-bg image-bg');
        $("body").removeAttr('style');
        $(".bg-pattern img").removeClass('active');
    });
})(jQuery);