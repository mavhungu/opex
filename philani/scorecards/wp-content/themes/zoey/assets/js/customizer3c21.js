/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */



	( function( $, wp ) {

		if($('.wp-customizer').length && typeof wp.customize === 'function'){

			// Header text color.
			wp.customize( 'header_textcolor', function( value ) {
				value.bind( function( to ) {
					if ( to ) {
						$( '.menu > .li-nav > .sub-menu > .current-menu-parent > a, .nav-link, .nav-link:focus, .nav-link:visited, .nav-link:hover,.menu-item .sub-menu li:hover > a, .menu-item .sub-menu .nav-link, .social, .copyright-text' ).css( {
							'color': to
						} );
						$( '.menu-item .sub-menu .nav-link::before, .left-navigation:hover .jspDrag' ).css( {
							'background-color': to
						} );
					}
				} );
			} );

						// Menu bgr
			wp.customize( 'menu_bg_settings', function( value ) {

				value.bind( function( to ) {
					if ( to ) {
						var style4 = '.left-navigation,' +
							'.menu-wrapper,' +
							'.fixed-sidebar-footer{ background-color: ' + to + '}' +
							''+
							'.menu > .li-nav:hover > a,' +
							'.menu > .li-nav.current-menu-ancestor:hover > a,' +
							'.menu > .li-nav.current-menu-parent:hover > a{color  ' + to + '!important}';

						if ($('.menu_bg_settings').length) {
							$('.menu_bg_settings').html(style4);
						} else {
							$( 'head' ).append('<style class="menu_bg_settings">' + style4 + '</style>');
						}

					}
				} );

			} );

			// Footer bgr
			wp.customize( 'footer_bg_settings', function( value ) {

				value.bind( function( to ) {
					if ( to ) {
						var style6 = '.copyright{ background-color: ' + to + '}';

						if ($('.footer_bg_settings').length) {
							$('.footer_bg_settings').html(style6);
						} else {
							$( 'head' ).append('<style class="footer_bg_settings">' + style6 + '</style>');
						}

					}
				} );

			} );

			// Main color
			wp.customize( 'main_color', function( value ) {

				value.bind( function( to ) {
					if ( to ) {
						var style = ''+
							'.menu > .li-nav:hover > a::before,' +
							''+
							'.team-wrap .team-social a:hover,' +
							'.portfolio .item-gallery .category,' +
							'.portfolio-popup-hidden .filter ul li:hover,' +
							'.maps-wrapper .contact-info .info-box a:hover,' +
							'.single-portfolio-item .category-portfolio a:hover,' +
							'.single-portfolio-item .share-this span:hover,' +
							'.post-content-wrap .post-banner .meta-info-post a:hover,' +
							'.post-content-wrap .post-banner .meta-info-post a:focus,' +
							'.post-content-wrap .post-banner .meta-info-post a:active,' +
							'.post-content-wrap .post-banner .meta-info-post a:visited,' +
							'.post-content-wrap .post-banner .meta-info-post i,' +
							'.post-content-wrap .post-category a:hover,' +
							'.post-content-wrap .post-category a:focus,' +
							'.post-content-wrap .post-category a:active,' +
							'.post-content-wrap .post-category a:visited,' +
							'.post-content-wrap .share-social span:hover,' +
							'table a:hover,' +
							'.pingback a:hover,' +
							'.main-post-pagination .next-btn a:hover,' +
							'.main-post-pagination .prev-btn a:hover,' +
							'.comments-post .com-text a:hover,' +
							'.comments-post .com-reply a,' +
							'.news-item.classic .post_item.sticky .post-item-link::before,' +
							'.news-item.classic .bloc-content-wrapper .meta-data i,' +
							'.news-item.classic .bloc-content-wrapper .post-item-link:hover,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data i,' +
							'.news-item.masonry .bloc-content-wrapper .post-item-link:hover,' +
							'.sidebar-container button:hover,' +
							'.sidebar-container .widget-section ul li a:hover,' +
							'.sidebar-container .tagcloud a:hover,' +
							'.logged-in-as a:hover{ color:' + to + ' }'+
							''+
							'.menu > .li-nav.current-menu-ancestor > a,' +
							'.menu > .li-nav.current_page_item > a,' +
							'.menu > .li-nav.current-menu-parent > a,' +
							'.menu > .li-nav > .sub-menu > .current_page_item > a,' +
							'.menu > .li-nav > .sub-menu .sub-menu > .current_page_item > a,' +
							'.menu > .li-nav.current-menu-parent > a,' +
							'.social:hover i{ color:' + to + ' !important}'+
							''+
							'.wpcf7[role="form"] textarea:focus,' +
							'.wpcf7[role="form"] input:not([type="submit"]):focus,' +
							'.post-nav span:not(:first-child),' +
							'.post-nav a,' +
							'.comments-post input:not([type="submit"]):focus,' +
							'.comments-post textarea:focus,' +
							'.sidebar-container button,' +
							'.social:hover{border-color:' + to + ' }'+
							''+
							'.menu > .li-nav:hover > a,'+
							'.menu > .li-nav > .sub-menu > .current_page_item > a::before,'+
							'.a-btn,'+
							'.a-btn-left,'+
							'.step-services-wrap .img-wrap::before,'+
							'.call-to-action .form-subscribe .submit-wrap,'+
							'.team-wrap .content-wrap,'+
							'.close-popup,'+
							'.portfolio-top-nav .a-btn-prev,'+
							'.portfolio-top-nav .a-btn-next,'+
							'.wpcf7[role="form"] input[type="submit"],'+
							'.maps-wrapper .contact-info .info-box .title::after,'+
							'.single-portfolio-item .category-portfolio a:hover::before,'+
							'.post-content-wrap .post-category a:hover::before,'+
							'.post-content-wrap .post-category a:focus::before,'+
							'.post-content-wrap .post-category a:active::before,'+
							'.post-content-wrap .post-category a:visited::before,'+
							'blockquote::before,'+
							'.post-nav span:not(:first-child),'+
							'.post-nav a,'+
							'.comments-post input[type="submit"],'+
							'.button-play,'+
							'.news-item.masonry .post-media-wrap.standart,'+
							'.sidebar-container button,'+
							'.menu > .li-nav > .sub-menu > .current_page_item > a::after,'+
							'.current-portfolio-ancestor > a{ background-color:' + to + ' }'+
							''+
							'.mfp-arrow{ background-color:' + to + '!important }'+
							''+
							'.step-services-wrap .img-wrap::after,'+
							''+
							''+
							'.wpcf7[role="form"] .submit-wrap::before,'+
							''+
							'blockquote::after{ box-shadow: 0px 7px 25px 0px ' + to + ' }'+
							''+
							''+
							'.a-btn::before,'+
							'.a-btn-left::before,'+
							'.button::before,'+
							'.call-to-action .form-subscribe .submit-wrap::before,'+
							'.close-popup i,'+
							'.portfolio-top-nav .a-btn-prev::before{border-color: ' + to + '}';
						if ($('.main_color').length) {
							$('.main_color').html(style);
						} else {
							$( 'head' ).append('<style class="main_color">' + style + '</style>');
						}
					}

				} );
			} );

			// Front Color Text
			wp.customize( 'front_color_settings', function( value ) {

				value.bind( function( to ) {
					if ( to ) {
						var style2 = 'body,' +
							'h1,' +
							'h2,' +
							'h3,' +
							'h4,' +
							'h5,' +
							'.creative-slider-wrap .pagination span,' +
							'.creative-slider-wrap .wrap-arrows > div,' +
							'.creative-slider-wrap .creative-content .subtitle,' +
							'.headlines-wrap.style2 .headlines .content .headlines-subtitle,' +
							'.services-wrap .text,' +
							'.step-services-wrap .text,' +
							'.team-wrap .team-social a,' +
							'.skill-wrapper .skill .label-skill,' +
							'.skill-wrapper .skill .value,' +
							'.gallery-wrap span,' +
							'.portfolio-popup-hidden .filter ul li,' +
							'.wpcf7[role="form"] input:not([type="submit"]),' +
							'.wpcf7[role="form"] textarea,' +
							'.maps-wrapper .contact-info .info-box .title,' +
							'.maps-wrapper .contact-info .info-box h6,' +
							'.maps-wrapper .contact-info .info-box h6:hover,' +
							'.maps-wrapper .contact-info .info-box h6:focus,' +
							'.maps-wrapper .contact-info .info-box h6:visited,' +
							'.maps-wrapper .contact-info .info-box h6:active,' +
							'.maps-wrapper .contact-info .info-box a,' +
							'.maps-wrapper .contact-info .info-box a:active,' +
							'.maps-wrapper .contact-info .info-box a:focus,' +
							'.maps-wrapper .contact-info .info-box a:visited,' +
							'.single-portfolio-item .title,' +
							'.single-portfolio-item .clients,' +
							'.single-portfolio-item .category-portfolio,' +
							'.single-portfolio-item .category-portfolio a,' +
							'.single-portfolio-item .category-portfolio a:active,' +
							'.single-portfolio-item .category-portfolio a:visited,' +
							'.single-portfolio-item .category-portfolio a:focus,' +
							'.single-portfolio-item .share-this .title,' +
							'.single-portfolio-item .share-this span,' +
							'.post-content-wrap .post-banner .meta-info-post span,' +
							'.post-content-wrap .post-banner .meta-info-post a,' +
							'.post-content-wrap .post-category,' +
							'.post-content-wrap .post-category a,' +
							'.post-content-wrap .share-social span,' +
							'blockquote p,' +
							'table a,' +
							'.post-content,' +
							'.pingback,' +
							'.pingback a,' +
							'.main-post-pagination .next-btn a,' +
							'.main-post-pagination .prev-btn a,' +
							'.comments-post input:not([type="submit"]),' +
							'.comments-post textarea,' +
							'.comments-post #cancel-comment-reply-link,' +
							'.comments-post .comments_title,' +
							'.comments-post .com-name,' +
							'.comments-post .com-text p,' +
							'.comments-post .com-text a,' +
							'.comments-post .com-reply a:hover,' +
							'.sidebar-container table th,' +
							'.sidebar-container .widget_rss a.rsswidget,' +
							'.sidebar-container .tagcloud a,' +
							'.textlogo,' +
							'.news-item.classic .bloc-content-wrapper .meta-data a:hover,' +
							'.news-item.classic .bloc-content-wrapper .meta-data a:visited,' +
							'.news-item.classic .bloc-content-wrapper .meta-data a:active,' +
							'.news-item.classic .bloc-content-wrapper .meta-data a:focus,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data a:hover,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data a:focus,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data a:visited,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data a:active,' +
							'.logged-in-as a{ color:' + to + ' }'+
							''+
							'.post-nav span:not(:first-child):hover,' +
							'.post-nav a:hover{color:' + to + '!important }'+
							''+
							'.single-portfolio-item .single-portfolio-section .large-sliders .swiper-arrow-right:hover,' +
							'.single-portfolio-item .single-portfolio-section .large-sliders .swiper-arrow-left:hover,' +
							'.single-portfolio-item .category-portfolio a::before,' +
							'.post-content-wrap .post-category a:before,' +
							'.news-item.classic .post-media-wrap.gallery .swiper-arrow-left:hover,' +
							'.news-item.classic .post-media-wrap.gallery .swiper-arrow-right:hover,' +
							'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-left:hover,' +
							'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-right:hover{background-color:' + to + '!important }';

						if ($('.front_color_settings').length) {
							$('.front_color_settings').html(style2);
						} else {
							$( 'head' ).append('<style class="front_color_settings">' + style2 + '</style>');
						}
					}

				} );
			} );

			// Front Color Text 2
			wp.customize( 'front_color_settings_2', function( value ) {

				value.bind( function( to ) {
					if ( to ) {
						var style5 = 'p,' +
							'.post-content-wrap .post-content ol li,' +
							'.post-content-wrap .post-content ul li,' +
							'.post-content ul,' +
							'.post-content ol,' +
							'.post-content ul ul,' +
							'.post-content ul ol,' +
							'.post-content ol ul,' +
							'.post-content ol ol,' +
							'.comments-post .date,' +
							'.comments-post .com-text ul,' +
							'.comments-post .com-text ol,' +
							'.news-item.classic .bloc-content-wrapper .meta-data span,' +
							'.news-item.classic .bloc-content-wrapper .meta-data a,' +
							'.news-item.classic .bloc-content-wrapper .short_desc,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data span,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data a,' +
							'.news-item.masonry .bloc-content-wrapper .short_desc,' +
							'.sidebar-container .widget-section  ul li,' +
							'.sidebar-container .widget-section ul li a,' +
							'.sidebar-container .widget-section label,' +
							'.sidebar-container .widget-section select,' +
							'.sidebar-container .widget-section option,' +
							'.simple-banner-wrap .content.active .subtitle,' +
							'.banner-slider-wrap .slider-content .subtitle,' +
							'.simple-banner-wrap .content.active .subtitle,' +
							'.sidebar-container table td{color:' + to + '!important }';

						if ($('.front_color_settings_2').length) {
							$('.front_color_settings_2').html(style5);
						} else {
							$( 'head' ).append('<style class="front_color_settings_2">' + style5 + '</style>');
						}
					}

				} );
			} );


            // Main Title Color Text
            wp.customize( 'title_color_settings', function( value ) {

                value.bind( function( to ) {
                    if ( to ) {
                        var style9 = '.creative-slider-wrap .creative-content .title,' +
                            '.banner-slider-wrap .slider-content .title,' +
                            '.simple-banner-wrap .content .title,' +
                            '.services-wrap .title,' +
                            '.headlines-wrap.style2 .headlines .content .headlines-title,' +
                            '.step-services-wrap .char,' +
                            '.step-services-wrap .title,' +
                            '.skill-wrapper .main-title,' +
                            '.news-item.classic .bloc-content-wrapper .post-item-link,' +
                            '.news-item.masonry .bloc-content-wrapper .post-item-link,' +
                    		'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-left i,' +
                    		'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-right i,' +
                            '.news-item.classic .post-media-wrap.gallery .swiper-arrow-left i,' +
                            '.news-item.classic .post-media-wrap.gallery .swiper-arrow-right i,' +
                            '.counters-wrapper .counter .number,' +
                            '.call-to-action .form-subscribe input:not([type="submit"]),' +
                            '.counters-wrapper .counter .title,' +
                            '.call-to-action .content-wrap .title,' +
                            '.post-content-wrap .post-banner .post-title,' +
                            '.call-to-action .content-wrap .subtitle,' +
                            '.wpcf7[role="form"] .title,' +
                            'h6 {color:' + to + '!important }';
                        if ($('.title_color_settings').length) {
                            $('.title_color_settings').html(style9);
                        } else {
                            $( 'head' ).append('<style class="front_color_settings">' + style9 + '</style>');
                        }
                    }
                } );
            } );

			// Base Background Color
			wp.customize( 'base_bg_color_settings', function( value ) {

				value.bind( function( to ) {
					if ( to ) {
						var style3 = '.simple-banner-wrap .content,' +
							'.a-btn i::before,' +
							'.a-btn-left i::after,' +
							'.border-2::before,' +
							'.border-3::before,' +
							'.border-3::after,' +
							'.banner-slider-wrap .slider-content,' +
							'.creative-slider-wrap .wrap-arrows,' +
							'.headlines-wrap,' +
							'.call-to-action .form-subscribe .submit-wrap i::before,' +
							'.team-wrap .team-social,' +
							'.gallery-wrap .item-gallery:hover .img-wrap::before,' +
							'.mfp-arrow-right:before, .mfp-arrow-right .mfp-b,' +
							'.mfp-arrow-left:before, .mfp-arrow-left .mfp-b,' +
							'.close-popup:before,' +
							'.close-popup:after,' +
							'.popup-wrapper,' +
							'.portfolio-top-nav .a-btn-next i::before,' +
							'.maps-wrapper .contact-info,' +
							'.single-portfolio-item,' +
							'.single-portfolio-item .single-portfolio-section .large-sliders .swiper-arrow-right,' +
							'.single-portfolio-item .single-portfolio-section .large-sliders .swiper-arrow-left,' +
							'.single-portfolio-item .single-portfolio-section .thumbnails .image-wrap::before,' +
							'.post-content-wrap,' +
							'.post-content-wrap .post-banner .meta-info-post,' +
							'.comments-post,' +
							'.news-item.classic,' +
							'.news-item.classic .post-media-wrap.gallery .swiper-arrow-left,' +
							'.news-item.classic .post-media-wrap.gallery .swiper-arrow-right,' +
							'.news-item.classic .bloc-content-wrapper .meta-data,' +
							'.button-play,' +
							'.news-item.masonry,' +
							'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-left,' +
							'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-right,' +
							'.news-item.masonry .bloc-content-wrapper .meta-data,' +
							'.sidebar,' +
							'.sidebar-container{ background-color: ' + to + '}' +
							''+
							'.a-btn-left,' +
							'.button:focus,' +
							'.button:active,' +
							'.button:hover,' +
							'.headlines-wrap.style1 .headlines .content .headlines-title,' +
							'.call-to-action .content-wrap,' +
							'.call-to-action .form-subscribe input[type="submit"],' +
							'.team-wrap .content-wrap .title,' +
							'.team-wrap .content-wrap .subtitle,' +
							'.portfolio-top-nav .a-btn-prev,' +
							'.portfolio-top-nav .a-btn-next,' +
							'.wpcf7[role="form"] input[type="submit"],' +
							'.single-portfolio-item .single-portfolio-section .large-sliders .swiper-arrow-right:hover,' +
							'.single-portfolio-item .single-portfolio-section .large-sliders .swiper-arrow-left:hover,' +
							'.comments-post input[type="submit"],' +
							'.news-item.classic .post-media-wrap.gallery .swiper-arrow-left:hover,' +
							'.news-item.classic .post-media-wrap.gallery .swiper-arrow-right:hover,' +
							'.button-play,' +
							'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-left:hover,' +
							'.news-item.masonry .post-media-wrap.gallery .swiper-arrow-right:hover{ color: ' + to + '}' +
							''+
							'.call-to-action .form-subscribe form .mc4wp-response p,' +
							'.post-nav span:not(:first-child),' +
							'.post-nav a{ color: ' + to + '!important}' +
							''+
							'.a-btn i::after,' +
							'.call-to-action .form-subscribe .submit-wrap i::after,' +
							'.mfp-arrow-right:after, .mfp-arrow-right .mfp-a,' +
							'.portfolio-top-nav .a-btn-next i::after{border-left: 4px solid' + to + '}' +

                            '.left-navigation,' +
                            '.menu-wrapper,' +
                            '.fixed-sidebar-footer{ background-color: ' + to + '}' +
                            ''+

							// ''+
							'.a-btn-left i::before,' +
							'.mfp-arrow-left:after, .mfp-arrow-left .mfp-a{ border-right: 4px solid' + to + '}' +
							''+
							'.border,' +
							'.border-1 {border-color:' + to + '}';
						if ($('.base_bg_color_settings').length) {
							$('.base_bg_color_settings').html(style3);
						} else {
							$( 'head' ).append('<style class="base_bg_color_settings">' + style3 + '</style>');
						}
					}
				} );

			} );

			// Header Image
			wp.customize( 'header_image', function( value ) {
				value.bind( function( to ) {
					if ( to ) {
						$( '.brand.logo' ).css( {
							'background-image': ' url(' + to + ')',
						} );
					}
				} );
			} );

			// Background Image
			wp.customize( 'background_image', function( value ) {

				value.bind( function( to ) {

					if ( to ) {
						$( '.rm' ).css( {
							'border-color': 'transparent',
							'background-color': 'transparent',
						} );
					} else {
						$( '.rm' ).css( {
							'border-color': 'inherit',
							'background-color': 'inherit',
						} );
					}
				} );
			} );

		}

	} )( jQuery );



