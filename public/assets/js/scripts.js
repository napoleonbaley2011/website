document.addEventListener('DOMContentLoaded', function() {
    // Header Scroll Effect
    window.addEventListener('scroll', function() {
        var header = document.querySelector('header');
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Initialize LayerSlider and Swiper
    enableLayerSlider();
    enableSwiper();
});

// Function Definitions
(function ($) {

    "use strict";

    // Play Video
    if (isExists('.embed-video')) {
        $('.embed-video').embedVideo();
    }

    // Countdown Time
    countdownTime();

    // Nav Menu Toggle
    $('[data-nav-menu]').on('click', function (event) {
        var $this = $(this),
            visibleHeadArea = $this.data('nav-menu');
        $(visibleHeadArea).toggleClass('visible');
    });

    // Circular Progress Bar
    var isAnimated = false;
    $(window).on('scroll', function () {
        if (isExists($('.circliful')) && isElementInViewport($('.circliful')) && !isAnimated) {
            $('.circliful').circliful();
            isAnimated = true;
        }
    });

})(jQuery);

// Function to Check if an Element Exists
function isExists(elem) {
    return $(elem).length > 0;
}

// Function to Initialize Swiper
function enableSwiper() {
    if (isExists('.swiper-container')) {
        $('.swiper-container').each(function () {
            var swiper = new Swiper($(this)[0], {
                pagination: $(this).find('.swiper-pagination'),
                slidesPerView: $(this).data('swiper-slides-per-view') || 1,
                direction: $(this).data('swiper-direction') || 'horizontal',
                loop: $(this).data('swiper-loop') || false,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                autoplay: $(this).data('swiper-autoplay') || false,
                paginationClickable: true,
                spaceBetween: $(this).data('swiper-margin') || 0,
                mousewheelControl: $(this).data('swiper-wheel-control') || false,
                scrollbar: $(this).data('scrollbar') ? $(this).find('.swiper-scrollbar') : null,
                scrollbarHide: false,
                speed: $(this).data('swiper-speed') || 1000,
                autoHeight: $(this).data('autoheight') !== false,
                effect: $(this).data('slide-effect') || 'coverflow',
                fade: { crossFade: $(this).data('swiper-crossfade') || false },
                breakpoints: {
                    1200: { slidesPerView: $(this).data('swiper-breakpoints') ? 3 : 1 },
                    992: { slidesPerView: $(this).data('swiper-breakpoints') ? 2 : 1 },
                    580: { slidesPerView: 1 }
                },
            });
        });
    }
}

// Function to Initialize LayerSlider
function enableLayerSlider() {
    if (isExists('#slider')) {
        $('#slider').layerSlider({
            sliderVersion: '6.0.0',
            responsiveUnder: 0,
            maxRatio: 1,
            slideBGSize: 'auto',
            hideUnder: 0,
            hideOver: 100000,
            skin: 'outline',
            thumbnailNavigation: 'disabled',
        });
    }
    if (isExists('#slider2')) {
        $('#slider2').layerSlider({
            sliderVersion: '6.0.0',
            responsiveUnder: 0,
            maxRatio: 1,
            slideBGSize: 'auto',
            hideUnder: 0,
            hideOver: 100000,
            skin: 'outline',
            thumbnailNavigation: 'disabled',
        });
    }
}

// Function to Initialize Countdown
function countdownTime() {
    if (isExists('#clock')) {
        $('#clock').countdown('2018/01/01', function (event) {
            $(this).html(event.strftime(''
                + '<div class="time-sec"><h1>%D</h1> days <h1 class="semicolon">:</h1></div>'
                + '<div class="time-sec"><h1>%H</h1> hours <h1 class="semicolon">:</h1></div>'
                + '<div class="time-sec"><h1>%M</h1> minutes <h1 class="semicolon">:</h1></div>'
                + '<div class="time-sec"><h1>%S</h1> seconds </div>'));
        });
    }
}
