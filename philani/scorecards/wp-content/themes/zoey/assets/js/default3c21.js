(function ($) {

    "use strict";

    /*============================*/
    /* VARIABLES */
    /*============================*/
    var swipers = [], winW, winH, winScr, _isresponsive, smPoint = 768, mdPoint = 992, lgPoint = 1200, addPoint = 1600, _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);


    /*========================*/
    /* PAGE CALCULATIONS */
    /*========================*/
    function pageCalculations() {
        winW = $(window).width();
        winH = $(window).height();
    }

    function contentWithSidebar() {
        var w = $(window).width();
        if($('#tertiary').length && w > 1200 && w < 1700){
            $('.post-content-wrap').addClass('sidecss');
        }else{
            $('.post-content-wrap').removeClass('sidecss');
        }
    }
    /*=================================*/
    /* FUNCTION ON DOCUMENT READY */
    /*=================================*/
    pageCalculations();

    $('.section-wrapper').fitVids();

    /*============================*/
    /* FUNCTION ON PAGE LOAD */
    /*============================*/

    $(window).on('load', function () {
        initSwiper();
        counterPagination();
        upFullWidthVideo();
        set_pos_menu();
        gallerySize();
        contentWithSidebar();
        if ($('.team-wrap').length) {
            $('.team-wrap').each(function () {
                var ch = +$(this).find('.content .title').outerHeight() + 10;
                $(this).find('.content-wrap').css('height', ch + 'px');
            });
        }

    });

    /***********************************/
    /* BACKGROUND*/
    /**********************************/

    //sets child image as a background
    function wpc_add_img_bg(img_sel, parent_sel) {

        if (!img_sel) {
            console.info('no img selector');
            return false;
        }

        var $parent, $imgDataHidden, _this;

        $(img_sel).each(function () {
            _this = $(this);
            $imgDataHidden = _this.data('s-hidden');
            $parent = _this.closest(parent_sel);
            $parent = $parent.length ? $parent : _this.parent();
            $parent.css('background-image', 'url(' + this.src + ')').addClass('s-back-switch');
            if ($imgDataHidden) {
                _this.css('visibility', 'hidden');
            } else {
                _this.hide();
            }
        });

    }

    wpc_add_img_bg('.s-img-switch');

    /*============================*/
    /* ANIMATE BANNER */
    /*============================*/

    function animateBanner() {
        if ($('.simple-banner-wrap.wrapper_el_video').length) {
            $('.simple-banner-wrap.wrapper_el_video').each(function () {
                var th = $(this);
                th.find('iframe').on('load', function (index) {
                    th.find('.content').addClass('active');
                })
            })
        } else {
            $('.simple-banner-wrap .content').addClass('active');
        }
    }

    animateBanner();

    /*============================*/
    /* WIDGET SEARCH BUTTON */
    /*============================*/


    if ($(".widget_search input[type='submit']").length) {
        $(".widget_search input[type='submit']").each(function () {
            $(this).attr('value', '').wrap('<div class="sub-wrap"></div>');
            $(this).parent().append('<i class="fa fa-search" aria-hidden="true"></i>')
        })
    }

    /*============================*/
    /* FIX MENUFOR IOS */
    /*============================*/

    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {

        $('.menu-item:not(.menu-item-has-children) > a').each(function () {

            $(this).on('click touch touchend', function (e) {
                var el = $(this);
                var link = el.attr('href');

                function tolocation() {
                    window.location = link;
                }

                setTimeout(tolocation, 600);
            });

        });
    }

    /*============================*/
    /* FUNCTION ON ORIENTATION CHANGE */
    /*============================*/

    window.addEventListener("orientationchange", function () {
        counterPagination();
        set_pos_menu();
    });

    /*==============================*/
    /* FUNCTION ON PAGE RESIZE */
    /*==============================*/
    function resizeCall() {
        pageCalculations();
        $('.swiper-container.initialized[data-slides-per-view="responsive"]').each(function () {
            var thisSwiper = swipers['swiper-' + $(this).attr('id')], $t = $(this), slidesPerViewVar = updateSlidesPerView($t), centerVar = thisSwiper.params.centeredSlides;
            thisSwiper.params.slidesPerView = slidesPerViewVar;
            thisSwiper.reInit();
            if (!centerVar) {
                var paginationSpan = $t.find('.pagination span');
                var paginationSlice = paginationSpan.hide().slice(0, (paginationSpan.length + 1 - slidesPerViewVar));
                if (paginationSlice.length <= 1 || slidesPerViewVar >= $t.find('.swiper-slide').length) $t.addClass('pagination-hidden');
                else $t.removeClass('pagination-hidden');
                paginationSlice.show();
            }
        });
    }

    if (!_ismobile) {
        $(window).resize(function () {
            resizeCall();
        });
    } else {
        window.addEventListener("orientationchange", function () {
            resizeCall();
        }, false);
    }


    /*=====================*/
    /* FULL WIDTH VIDEO */
    /*=====================*/

    function upFullWidthVideo() {

        function is_touch_device() {
            return 'ontouchstart' in window || navigator.maxTouchPoints;
        }

        // for video uploaded
        $('.wrapper_el_video').each(function () {
            var $video = $(this).find('video'),
                w = $video.width(),
                h = $video.outerHeight(),
                videoRatio = (w / h).toFixed(2),
                minW = parseInt($(this).width()),
                minH = parseInt($(this).outerHeight()),
                widthRatio = minW / w,
                heightRatio = minH / h,
                newWidth, newHeight;

            if (widthRatio > heightRatio) {
                newWidth = minW;
                newHeight = Math.ceil(newWidth / videoRatio);
            } else {
                newHeight = minH;
                newWidth = Math.ceil(newHeight * videoRatio);
            }


            $video.width(newWidth + 'px').height(newHeight + 'px');

            if (is_touch_device() && winW >= '768') {
                $video.hide();
            } else {
                $video.show();
            }

            if (newHeight > minH) {
                $video.css('top', -(newHeight - minH) / 2);
            } else {
                $video.css('top', '0');
            }

            if (newWidth > minW) {
                $video.css('left', -(newWidth - minW) / 2);
            } else {
                $video.css('left', '0');
            }

        });
    }


    upFullWidthVideo();


    /*=====================*/
    /* PLAY BUTTON FOR POSTS */
    /*=====================*/


    $('.button-play').on('click', function () {
        var iframeVideo = $(this).parent().parent().find('iframe');
        var srcIframe = iframeVideo.attr('src');
        iframeVideo.attr('src', srcIframe + '&autoplay=1');
        setTimeout($(this).parent().hide(), 2000);
    });


    /***********************************/
    /* COUNTER PAGINATION*/
    /**********************************/

    function counterPagination() {
        if ($('.pagination.numbers').length) {
            $('.pagination.numbers').each(function (index) {
                $(this).find('span').each(function (index) {
                    if ((index + 1) < 10) {
                        $(this).html('0' + (index + 1));
                    } else {
                        $(this).html((index + 1));
                    }
                });
            });
        }
    }

    /*=====================*/
    /* GALLERY MASONRY */
    /*=====================*/


    if ($('.gallery-wrap').length) {
        var $container = $('.gallery-wrap');
        $container.isotope({
            itemSelector: '.item-gallery',
            layoutMode: 'masonry',
            masonry: {
                columnWidth: '.item-gallery',
                percentPosition: true
            }
        });

        $('.filter ul li').on('click', function () {
            $('.filter ul li').removeClass('active');
            $(this).addClass('active');
            var filterValue = $(this).attr('data-filter');
            $container.isotope({filter: filterValue});
        });
    }


    $(window).load(function () {
        "use strict";
        $('.loading').fadeOut();
        wpc_add_img_bg('.s-img-switch');
        heightGalleryPost();

        if ($('.gallery-wrap').length) {
            var $container = $('.gallery-wrap');
            $container.isotope({
                itemSelector: '.item-gallery',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.item-gallery',
                    percentPosition: true
                }
            });
        }

        // Blog Masonry
        if ($('.news-item.masonry').length) {
            var $container = $('.container-masonry');
            $container.isotope({
                itemSelector: '.news-item.masonry',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: '.news-item.masonry',
                    percentPosition: true,
                    'gutter': 30
                }
            });
        }


    });


    /*=====================*/
    /* HEIGHT GALLERY BLOG POST */
    /*=====================*/

    function heightGalleryPost() {
        if ($(window).width() > 767) {
            if ($('.news-item.classic .post-media-wrap.gallery').length) {
                $('.news-item.classic').each(function (index) {
                    $(this).find('.post-media-wrap.gallery').height($(this).find('.bloc-content-wrapper.gallery').outerHeight());
                })
            }
        }
    }

    heightGalleryPost();

    /*=====================*/
    /* MENU */
    /*=====================*/

    $('.menu-item-has-children').each(function () {
        $(this).find(' > a ').after('<i class="fa fa-angle-down" aria-hidden="true"></i>');
    });

    function menuArrow() {
        $('.menu > .menu-item-has-children').each(function () {
            var level1 = $(this);
            var posRight = (level1.width() - level1.find('i').siblings("a").outerWidth())/2 + 38;
            var posTop = level1.find('i').siblings("a").outerHeight()/2;
            level1.find('.menu-item-has-children').each(function () {
                var posRight2 = ($(this).width() - $(this).find('i').siblings("a").outerWidth())/2 + 5;
                var posTop2 = $(this).find('i').siblings("a").outerHeight()/2 + 2;
            });
        });
    }

    menuArrow();

    $('.menu-item-has-children > i').on('click', function (e) {
        $(this).next().slideToggle('slow');
        $(this).parent().toggleClass('hover');
    });
    $('.menu-item-has-children.yes > a').on('click', function (e) {
        $(this).next().next().slideToggle('slow');
        $(this).parent().toggleClass('hover');
    });

    /*=====================*/
    /* MAP */
    /*=====================*/

    $(window).on('load', function () {

        if ($('#google-map').length) {
            $('#google-map').each(function () {
                zoey_initialize_map(this);
            });
        }
    });


    window.zoey_initialize_map = function (_this) {
        var latitude = $('#google-map').attr("data-lat"),
            longitude = $('#google-map').attr("data-lng"),
            map_zoom = parseInt($('#google-map').attr("data-zoom"), 10);
        //google map custom marker icon
        var marker_url = $('#google-map').attr("data-marker");


        var style;
        var styleMap = $(_this).attr("data-style");

        // default style map
        if (styleMap == 'style-1') {
            style = [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#ffffff"}, {"lightness": 17}]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{"color": "#ffffff"}, {"lightness": 18}]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{"color": "#ffffff"}, {"lightness": 16}]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{"color": "#dedede"}, {"lightness": 21}]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]
            }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{"color": "#fefefe"}, {"lightness": 20}]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]
            }];
        }

        // custom style map
        if (typeof zoey_style_map != 'undefined' && styleMap == 'custom') {
            style = zoey_style_map;
        }
        //set google map options
        var map_options = {
            center: new google.maps.LatLng(latitude, longitude),
            zoom: map_zoom,
            panControl: false,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            styles: style
        };
        //inizialize the map
        var map = new google.maps.Map(document.getElementById('google-map'), map_options);
        //add a custom marker to the map
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(latitude, longitude),
            map: map,
            visible: true,
            icon: marker_url
        });
    };

    /*=====================*/
    /* SHARE POPUP */
    /*=====================*/

    $('[data-share]').on('click', function () {

        var w = window,
            url = $(this).attr('data-share'),
            title = '',
            w_pop = 600,
            h_pop = 600,
            scren_left = w.screenLeft != undefined ? w.screenLeft : screen.left,
            scren_top = w.screenTop != undefined ? w.screenTop : screen.top,
            width = $(w).width(),
            height = $(w).height(),
            left = ((width / 2) - (w_pop / 2)) + scren_left,
            top = ((height / 2) - (h_pop / 2)) + scren_top,
            newWindow = w.open(url, title, 'scrollbars=yes, width=' + w_pop + ', height=' + h_pop + ', top=' + top + ', left=' + left);

        if (w.focus) {
            newWindow.focus();
        }

        return false;
    });


    /*=====================*/
    /* SET HEIGHT BLOCK */
    /*=====================*/

    function setHeightBlock(selector) {
        if ($(selector).length) {
            $(selector).each(function (index, el) {

                var _height = 0;
                if ($(el).closest('.wpb_column').siblings('.wpb_column').length) {
                    _height = $(el).closest('.wpb_column').siblings('.wpb_column').height();
                    if (_height > $(el).closest('.wpb_column').height()) {
                        $(el).css('height', _height - 33);
                    } else {
                        _height = $(el).closest('.section').height();
                        $(el).closest('.wpb_column').siblings('.wpb_column').css('height', _height);
                    }
                }
            });
        }
    }


    /*=====================*/
    /* FUNCTION ON SCROLL */
    /*=====================*/

    $(window).on('scroll', function () {
        if ($('.skills').length) {
            $('.skills').not('.active').each(function () {

                if ($(window).scrollTop() >= $(this).offset().top - $(window).height() * 1) {
                    $(this).addClass('active');
                    $(this).find('.skill').each(function () {
                        var procent = $(this).attr('data-value');
                        procent = procent >= 100 ? 100 : procent;
                        $(this).find('.active-line').css('width', procent + '%');
                        $(this).find('.counter').countTo();
                    });
                }
            });
        }

        /*=====================*/
        /* COUNTERS */
        /*=====================*/

        if ($('.counters-wrapper.show').length) {
            $('.counters-wrapper.show').not('.active').each(function () {

                if ($(window).scrollTop() >= $(this).offset().top - $(window).height() * 1) {
                    $(this).addClass('active');
                    $(this).find('.number').countTo();
                }
            });
        }

        /*=====================*/
        /* SCROLL FOR MENU */
        /*=====================*/

        if ($(window).scrollTop() >= 1 && $(window).width() < 992) {
            $('.responsive-nav').addClass('scroll');
        } else {
            $('.responsive-nav').removeClass('scroll');
        }


    });

    /*=====================*/
    /* SWIPER */
    /*=====================*/

    var swipers = [];

    var initIterator = 0;

    function initSwiper() {
        $('.swiper-container').each(function () {
            var $t = $(this);

            var index = 'swiper-unique-id-' + initIterator;

            $t.addClass('swiper-' + index + ' initialized').attr('id', index);
            $t.find('.pagination').addClass('pagination-' + index);

            var autoPlayVar = parseInt($t.attr('data-autoplay'), 10);
            var centerVar = parseInt($t.attr('data-center'), 10);
            var simVar = ($t.closest('.circle-description-slide-box').length) ? false : true;

            var slidesPerViewVar = $t.attr('data-slides-per-view');
            if (slidesPerViewVar == 'responsive') {
                slidesPerViewVar = updateSlidesPerView($t);
            }
            else if (slidesPerViewVar != 'auto') slidesPerViewVar = parseInt(slidesPerViewVar, 10);

            var loopVar = parseInt($t.attr('data-loop'), 10);
            var speedVar = parseInt($t.attr('data-speed'), 10);

            var slidesPerGroup = parseInt($t.attr('data-slides-per-group'), 10);
            if (!slidesPerGroup) {
                slidesPerGroup = 1;
            }

            swipers['swiper-' + index] = new Swiper('.swiper-' + index, {
                speed: speedVar,
                pagination: '.pagination-' + index,
                loop: loopVar,
                paginationClickable: true,
                autoplay: autoPlayVar,
                slidesPerView: slidesPerViewVar,
                slidesPerGroup: slidesPerGroup,
                keyboardControl: true,
                calculateHeight: true,
                simulateTouch: simVar,
                centeredSlides: centerVar,
                roundLengths: true,
                onInit: function (swiper) {
                    var browserWidthResize = $(window).width();
                    if (browserWidthResize < 750) {
                        swiper.params.slidesPerGroup = 1;
                    } else {
                        swiper.params.slidesPerGroup = slidesPerGroup;
                    }
                    if ($t.hasClass('thumbnails-preview')) {
                        $t.parent().next().find('.current').removeClass('current');
                        $t.parent().next().find('.swiper-slide[data-val="0"]').addClass('current');
                    }
                    $t.find('img').on('load', function () {
                        wpc_add_img_bg('.s-img-switch');
                    });
                },
                onResize: function (swiper) {
                    var browserWidthResize2 = $(window).width();
                    if (browserWidthResize2 < 750) {
                        swiper.params.slidesPerGroup = 1;
                    } else {
                        swiper.params.slidesPerGroup = slidesPerGroup;
                        swiper.resizeFix(true);
                    }
                },
                onSlideChangeEnd: function (swiper) {
                    var activeIndex = (loopVar === true) ? swiper.activeLoopIndex : swiper.activeIndex;
                    var qVal = $t.find('.swiper-slide-active').attr('data-val');
                    $t.find('.swiper-slide[data-val="' + qVal + '"]').addClass('active');

                    if ($t.find('.swiper-slide.active .slider-content.type-1').length) {
                        $t.find('.swiper-slide.active').find('.slider-content.type-1').css('opacity', '1').end();
                    }
                    if ($t.find('.swiper-slide.active .creative-content').length) {
                        $t.find('.pagination').fadeIn(200).end();
                    }
                },
                onSlideChangeStart: function (swiper) {
                    $t.find('.swiper-slide.active').removeClass('active');
                    if ($t.hasClass('thumbnails-preview')) {
                        var activeIndex = (loopVar === 1) ? swiper.activeLoopIndex : swiper.activeIndex;

                        $t.parent().next().find('.current').removeClass('current');
                        $t.parent().next().find('.swiper-slide[data-val="' + activeIndex + '"]').addClass('current');

                        if ($t.parent().next().attr('id')) {
                            swipers['swiper-' + $t.parent().next().attr('id')].swipeTo(activeIndex);
                        }
                    }


                    if ($t.find('.swiper-slide.active .slider-content.type-1').length) {
                        $t.find('.swiper-slide.active').find('.slider-content.type-1').css('opacity', '0').end();
                    }
                    if ($t.find('.swiper-slide.active .creative-content').length) {
                        $t.find('.pagination').fadeOut(0).end();
                    }


                },
                onSlideClick: function (swiper) {
                    var thisSlide = $(swiper.clickedSlide);
                    if (thisSlide.hasClass('open-modal-popup')) openModalPopup(thisSlide);
                    if ($t.hasClass('thumbnails')) {
                        swipers['swiper-' + $t.prev('.large-sliders').find('.swiper-container').attr('id')].swipeTo(swiper.clickedSlideIndex);
                    }
                }
            });
            swipers['swiper-' + index].reInit();
            if ($t.attr('data-slides-per-view') == 'responsive') {
                var paginationSpan = $t.find('.pagination span');
                var paginationSlice = paginationSpan.hide().slice(0, (paginationSpan.length + 1 - slidesPerViewVar));
                if (paginationSlice.length <= 1 || slidesPerViewVar >= $t.find('.swiper-slide').length) $t.addClass('pagination-hidden');
                else $t.removeClass('pagination-hidden');
                paginationSlice.show();
            }

            $(this).parent().find('.popup-arrow-left').on('click', function (e) {
                e.preventDefault();
                swipers['swiper-' + index].swipePrev();
            });

            $(this).parent().find('.popup-arrow-right').on('click', function (e) {
                e.preventDefault();
                swipers['swiper-' + index].swipeNext();
            });

            initIterator++;
        });

    }

    var smPoint = 768, mdPoint = 992, lgPoint = 1200, addPoint = 1600;

    function updateSlidesPerView(swiperContainer) {
        var winW = $(window).width();
        if (winW >= addPoint) return parseInt(swiperContainer.attr('data-add-slides'), 10);
        else if (winW >= lgPoint) return parseInt(swiperContainer.attr('data-lg-slides'), 10);
        else if (winW >= mdPoint) return parseInt(swiperContainer.attr('data-md-slides'), 10);
        else if (winW >= smPoint) return parseInt(swiperContainer.attr('data-sm-slides'), 10);
        else return parseInt(swiperContainer.attr('data-xs-slides'), 10);
    }

    function swiper_arrow() {
        //swiper arrows
        $('.swiper-arrow-left').on('click', function () {
            swipers['swiper-' + $(this).parent().attr('id')].swipePrev();
        });

        $('.swiper-arrow-right').on('click', function () {
            swipers['swiper-' + $(this).parent().attr('id')].swipeNext();
        });

        $('.swiper-outer-left').on('click', function () {
            swipers['swiper-' + $(this).parent().find('.swiper-container').attr('id')].swipePrev();
        });

        $('.swiper-outer-right').on('click', function () {
            swipers['swiper-' + $(this).parent().find('.swiper-container').attr('id')].swipeNext();
        });

        $('.swiper-outer-left-2').on('click', function () {
            swipers['swiper-' + $(this).parent().parent().find('.swiper-container').attr('id')].swipePrev();
        });

        $('.swiper-outer-right-2').on('click', function () {
            swipers['swiper-' + $(this).parent().parent().find('.swiper-container').attr('id')].swipeNext();
        });
    }

    swiper_arrow();


    /*=====================*/
    /* MOBILE MENU */
    /*=====================*/

    $(document).on('tachstart click', '.nav-open-submenu', function (event) {
        var that = $(this);
        that.toggleClass('open').closest('.menu-item').toggleClass('open');
        event.preventDefault();
    });

    $(window).on('load', function () {
        if ($(window).scrollTop() >= 1 && $(window).width() < 992) {
            $('.responsive-nav').addClass('scroll');
        } else {
            $('.responsive-nav').removeClass('scroll');
        }

        setTimeout(function () {
            setHeightBlock('.about-block');
        }, 500);

        if ($('.single').length) {
            initSwiper();
        }

        /*=====================*/
        /* SKILLS */
        /*=====================*/


        if ($('.skills').length) {
            $('.skills').not('.active').each(function () {

                if ($(window).scrollTop() >= $(this).offset().top - $(window).height() * 1) {
                    $(this).addClass('active');
                    $(this).find('.skill').each(function () {
                        var procent = $(this).attr('data-value');
                        procent = procent >= 100 ? 100 : procent;
                        $(this).find('.active-line').css('width', procent + '%');
                        $(this).find('.counter').countTo();
                    });
                }
            });
        }
    });

    $(window).on('resize', function () {
        setHeightBlock('.about-block');
        bodyPaddingTopforMobile();
        contentWithSidebar();
        menuArrow();
    });


    /*=====================*/
    /* AJAX POPUP */
    /*=====================*/
    function get_pagination( href ) {

    }

    var links = [];
    function ajax_popup() {

        $('a.popup.disable').on('click', function (event) {
            return false
        });
        $('a.popup:not(.disable)').on('click', function (event) {
            var href = this.href,
                $this = $(this),
                pagination = '';

            if ( $this.closest('div').hasClass('izotope-container') ) {

                $this.closest('div').find('a').each(function(){
                    links.push($(this).attr('href'));
                });
            }

            var current_index = links.indexOf( $this.attr('href') );

            if ( links[ current_index - 1 ] !== undefined ) {
                pagination += '<a href="' + links[ current_index - 1 ] + '" class="a-btn-prev popup"><i></i></a>';
            } else {
                pagination += '<a href="' + links[ links.length - 1 ] + '" class="a-btn-prev popup"><i></i></a>';
            }

            if ( links[ current_index + 1 ] !== undefined ) {
                pagination += '<a href="' + links[ current_index + 1 ] + '" class="a-btn-next popup"><i></i></a>';
            } else {
                pagination += '<a href="' + links[0] + '" class="a-btn-next popup"><i></i></a>';
            }

            $.ajax({
                url: href,
                type: 'POST',
                dataType: 'html',
                beforeSend: function () {
                    $('.portfolio-top-nav').hide();
                    $('.close-popup').hide();
                    $(".loading-popup .loading").show();
                }
            }).done(function (data) {

                    $(".loading-popup .loading").hide();
                    $('.portfolio-top-nav').show('slow');
                    $('.close-popup').show('slow');

                    $(".popup-box").html($(data).find('.popup-item-portfolio').html()).closest('.popup-wrapper').addClass('active').find('.portfolio-top-nav').html(pagination);
                    if ($('.popup-wrapper').hasClass('active')) {
                        $('.popup-wrapper').css('height', 'auto');

                        $('.portfolio-popup-hidden').css({
                            'height': '0',
                            'overflow': 'hidden'
                        });
                    }

                    $(data).find('img').on('load', function () {
                        initSwiper();
                        wpc_add_img_bg('.s-img-switch');
                        gallerySize();
                        swiper_arrow();
                    });

                    ajax_popup();
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

            event.preventDefault();
        });
    }

    ajax_popup();


    $('.popup-wrapper').on('click', '.close-popup', function (event) {
        $(this).closest('.popup-wrapper').removeClass('active');

        $('.portfolio-popup-hidden').css({
            'height': 'auto',
            'overflow': 'hidden'
        });
        $('.popup-wrapper').css({
            'height': '0'
        });

        event.preventDefault();
    });


    /*=====================*/
    /* SET POSITION FOR MENU */
    /*=====================*/

    function set_pos_menu() {
        if ($(window).width() > 991) {
            var heightFooter = $('.fixed-sidebar-footer').outerHeight();
            var heightMenu = $('.left-navigation').height();
            var brandLogo = $('.brand.logo').outerHeight();

            $('.left-navigation').css('padding-bottom', heightFooter + 'px');
            $('.menu-wrapper').css('height', (heightMenu - brandLogo) + 'px');

            if($('.add_scroll').length){
                $('.navigation').jScrollPane();
            }
            $('body').removeClass('overflow');

        } else {

            $('.left-navigation').css('padding-bottom', 'auto');
            if($('.add_scroll').length) {
                if ($('.navigation .menu, .navigation .no-menu').parent().hasClass('jspPane')) {
                    $('.navigation .menu, .navigation .no-menu').parent().unwrap();
                    $('.navigation .menu, .navigation .no-menu').unwrap();

                }
            }
            $('.res-menu').css({
                'top': $('.responsive-nav').height() + 'px',
                'height': ($(window).height() - $('.responsive-nav').height()) + 'px'

            });

            if ($('.menu-button').hasClass('active')) {
                $('body').addClass('overflow');
            } else {
                $('body').removeClass('overflow');
            }

        }
    }

    set_pos_menu();


    $(window).on('resize', function () {
        menuHeight();
        set_pos_menu();
    });
    $(window).on("orientationchange", function () {
        menuHeight();
        gallerySize();
        heightGalleryPost();
        bodyPaddingTopforMobile();
        contentWithSidebar();
        menuArrow();
        if ($('.team-wrap').length) {
            $('.team-wrap').each(function () {
                var ch = +$(this).find('.content .title').outerHeight() + 10;
                $(this).find('.content-wrap').css('height', ch + 'px');
            });
        }
    });


    $('.menu-button').on('click', function () {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('.res-menu').slideToggle('slow');
            $('body').addClass('overflow');
        } else {
            $('.res-menu').slideToggle('slow');
            $('body').removeClass('overflow');
        }
        menuArrow();
    });


    /***********************************/
    /* MENU HEIGHT*/
    /**********************************/


    function menuHeight() {
        if ($(window).width() < 992) {
            $('.responsive-nav').css('width', $('body').width() + 'px');
        }
    }


    /***********************************/
    /* FORM SUBSCRIBE STYLE */
    /**********************************/
    if ($('.form-subscribe').length) {
        $('.form-subscribe input[type="submit"]').each(function () {
            $(this).attr('value', '').wrap('<div class="submit-wrap"></div>');
            $(this).parent().append('<i></i>')
        });
    }

    if ($('.wpcf7[role="form"]').length) {
        $('.wpcf7[role="form"] input[type="submit"]:not(.forjs)').each(function () {
            $(this).wrap('<div class="submit-wrap"></div>');
            $(this).parent().append('<i class="isubmit"></i>');
        });
    }

    if ($('.single-post-wrap .form-submit').length) {
        $('.single-post-wrap .form-submit input[type="submit"]').each(function () {
            $(this).wrap('<div class="submit-wrap"></div>');
            $(this).parent().append('<i class="isubmit"></i>');
        });
    }

    $('.isubmit').each(function () {
        $(this).click(function () {
            $(this).parent().find('input[type="submit"]').click();
        });
    });

    /*=====================*/
    /* TEAM WRAP ANIMATION */
    /*=====================*/

    if ($('.team-wrap').length) {
        var all = $('.team-wrap ');
        $('.team-wrap').each(function () {

            $(this).on('mouseover touch', function () {

                all.removeClass('hover');
                $(this).addClass('hover');
            });
            $(this).on('mouseout ', function () {
                $(this).removeClass('hover');
            });
        });
    }

    /*=====================*/
    /* BODY PADDING FOR MOBILE */
    /*=====================*/

    function bodyPaddingTopforMobile() {
        if ($(window).width() < 992) {
            var padTop = $('.responsive-nav').height();
            $('body').css('padding-top', padTop + 'px');
        } else {
            $('body').css('padding-top', '0px');
        }
    }

    bodyPaddingTopforMobile();


    /*=====================*/
    /* GALLERY POPUP */
    /*=====================*/

    $('.gallery.gallery-wrap').magnificPopup({
        delegate: 'a',
        type: 'image',
        removalDelay: 500, //delay removal by X to allow out-animation
        gallery: {
            enabled: true
        },
        mainClass: 'mfp-fade',
        callbacks: {
            beforeOpen: function () {
                // just a hack that adds mfp-anim class to markup
                this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                this.st.mainClass = this.st.el.attr('data-effect');
            }
        },
        closeOnContentClick: true,
        midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.


    });


    /*=====================*/
    /* GALLERY ITEM SIZE */
    /*=====================*/

    function gallerySize() {
        if ($('.gallery-wrap').length && $(window).width() > 600) {
            $('.gallery-wrap').each(function () {
                var gallery = $(this);
                gallery.find('.item-gallery').each(function () {
                    $(this).height($(this).width());
                });
                gallery.find('.item-gallery.long').each(function () {
                    $(this).height(($(this).width() * 2 + 10));
                });
                gallery.find('.item-gallery.big').each(function () {
                    $(this).height(($(this).width() + 10));
                });
                gallery.find('.item-gallery.longer').each(function () {
                    $(this).height(($(this).width() / 2));
                });
            })
        }
        if ($('.single-portfolio-section').length) {
            $('.single-portfolio-section').each(function () {
                var portfolio = $(this);
                portfolio.find('.thumbnails .image-wrap').each(function () {
                    $(this).height($(this).width());
                });
            })
        }
    }

    gallerySize();


    $(window).on('resize', function () {
        counterPagination();
        upFullWidthVideo();
        gallerySize();
        heightGalleryPost();

        if ($('.team-wrap').length) {
            $('.team-wrap').each(function () {
                var ch = +$(this).find('.content .title').outerHeight() + 10;
                $(this).find('.content-wrap').css('height', ch + 'px');
            });
        }
    });


    $(window).on('load', function () {
        upFullWidthVideo();
        bodyPaddingTopforMobile();
        load_more_portfolio();
        menuHeight();
    });

    /*=====================*/
    /* ANIMATION PAGE*/
    /*=====================*/


    if ($(".animsition").length) {
        $(".animsition").animsition({
            inClass: 'fade-in',
            outClass: 'fade-out',
            inDuration: 700,
            outDuration: 700,
            linkElement: 'a[href]:not([target="_blank"]):not([href^="#"]):not(.comment-reply-link):not(#cancel-comment-reply-link):not(.img-wrap):not(.item-gallery):not(.disable):not(.a-btn-next):not(.a-btn-prev):not(.animsition-link)',
            loading: false,
            loadingParentElement: 'body',
            loadingClass: 'animsition-loading',
            unSupportCss: ['animation-duration', '-webkit-animation-duration', '-o-animation-duration'],
            overlay: false,
            overlayClass: 'animsition-overlay-slide',
            overlayParentElement: 'body'
        });
    }

    /*=====================*/
    /* LOAD MORE PORTFOLIO */
    /*=====================*/

    function load_more_portfolio() {
        // Load More Portfolio
        if (window.load_more_post) {

            var pageNum = parseInt(load_more_post.startPage) + 1;

            // The maximum number of pages the current query can return.
            var max = parseInt(load_more_post.maxPage);

            // The link of the next page of posts.
            var nextLink = load_more_post.nextLink;

            // wrapper selector
            var wrap_selector = '.gallery-wrap';

            //button click
            $('.load-more').on('click', function (e) {

                var $btn = $(this),
                    $btnText = $btn.html();
                    $btn.html('loading...');

                if (pageNum <= max) {

                    var $container = $(wrap_selector);
                    $.ajax({
                        url: nextLink,
                        type: "get",
                        success: function (data) {

                            var newElements = $(data).find('.gallery-wrap .item-gallery');
                            var elems = [];

                            newElements.each(function (i) {
                                elems.push(this);
                            });

                            $container.isotope('insert', elems);
                            $container.find('img').on('load', function () {
                                wpc_add_img_bg('.s-img-switch');
                                gallerySize();
                                $container.isotope();
                            });

                            pageNum++;
                            nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/' + pageNum);

                            $btn.html($btnText);

                            if (pageNum == ( max + 1 )) {
                                $btn.hide('fast');
                            }
                        }
                    });
                }
                return false;
            });

        }

    }

    wpc_add_img_bg('.s-img-switch');


    /*=====================*/
    /* FIX FORM FOR IOS */
    /*=====================*/

    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
        $('form').submit(function () {

            var required = $('[required]'); // change to [required] if not using true option as part of the attribute as it is not really needed.
            var error = false;

            for (var i = 0; i <= (required.length - 1); i++) {
                if (required[i].value == '' || !required[i].validity.valid) // tests that each required value does not equal blank, you could put in more stringent checks here if you wish.
                {
                    required[i].style.backgroundColor = 'rgb(255,155,155)';
                    error = true; // if any inputs fail validation then the error variable will be set to true;
                }
            }

            if (error) // if error is true;
            {
                return false; // stop the form from being submitted.
            }
        });
    }


    /*=====================*/
    /* POPUP HOVER PORTFOLIO */
    /*=====================*/
    $('.img-wrap').mousemove(function(e){
        // var X = e.pageX;
        // var Y = e.pageY;
        var block = this.getBoundingClientRect(),
            top = block.top,
            left = block.left;

        var cursorX = e.clientX,
            cursorY = e.clientY;

        var tooltipTop = cursorY - top  + 15 + 'px';
        var tooltipLeft = cursorX - left + 15 + 'px';
        var id = $(this).data('tooltip');
        $('#tip-'+id).css({
            display:"block",
            top: tooltipTop,
            left: tooltipLeft
        });
    });
    $('.img-wrap').mouseout (function(){
        var id = $(this).data('tooltip');
        $('#tip-'+id).css({
            display:"none"
        });
    });



})(jQuery);