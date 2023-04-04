(function( $ ){

	//Comming Soon Sections Fullscreen     
	 $(function(){"use strict";
		$('.main-content-soon').css({'height':($(window).height())+'px'});
		$(window).resize(function(){
			$('.main-content-soon').css({'height':($(window).height())+'px'});
		});
	 });	

	$.fn.magnisSort = function( options ) {
		
		var $this = $(this),
			$filters = $this.find('.sorting-filters a'),
			$toSort = $this.find('.sort-item'),
			showAll = options['showAll'];
			
		if (showAll) {
			$toSort.show();
		} else {
			$toSort.each(function() {
				if ($(this).hasClass($filters.eq(0).attr('data-filter'))) {
					$(this).show();
				}
			});
		}
		
		$filters.click(function(e) {
			e.preventDefault();
			$filters.removeClass('active');
			$(this).addClass('active');
			var value = $(this).attr('data-filter'),
				qty = $toSort.length;
			$toSort.hide();
			for (var $i = 0; $i < qty; $i++) {
				if ($toSort.eq($i).hasClass(value)) {
					$toSort.eq($i).show();
				} else if (value == '*') {
					$toSort.show();
				}
			}
		});
	};		
	

	$('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').each(function() {
		$(this).height($(this).width());
	});
	$('.latest-projects-wrapper li').each(function() {
		var $this = $(this),
			w = $this.width(),
			$img = $this.find('> img').eq(0),
			h = $img.height(),
			temp = new Image(),
			index = $(this).index(),
			imgW;
			$img.show(),
		temp.src = $img.attr('src');
		imgW = Math.round(temp.width * (h/temp.height));
		$img.attr('width', imgW).css('margin-left', '-' + ($img.width() - w)/2 + 'px');
		$('.fa-search', $(this)).parent().colorbox();
	});
	
	if ($('body').width() < 768) {
		$('.magnis-shopping-cart-details-table-wrapper').css('overflow','scroll');
	} else {
		$('.magnis-shopping-cart-details-table-wrapper').css('overflow','visible');
	}
	if ($('body').width() < 768) {
		$('.pr-table-3-wrapper').css('overflow','scroll');
	} else {
		$('.pr-table-3-wrapper').css('overflow','visible');
	}
	$('.latest-blog-posts-2 .jcarousel-skin-tango .jcarousel-item-horizontal').css('width', ($('.latest-blog-posts-2').width()/2 - 10) + 'px');
	$('.carousel-navi', '.latest-blog-posts-2').css('left', ($('.latest-blog-posts-2').width()/2 - 27) + 'px');
	$('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-clip-horizontal').height($('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').width());
	
	$('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-prev-horizontal, .latest-projects-wrapper .jcarousel-skin-tango .jcarousel-next-horizontal').css('top',($('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').width() - 32)/2)
	$('.carousel-navi', '.footer-latest-tweets').css('left', $('h2', '.footer-latest-tweets').width() + 20 + 'px');
	$('.carousel-navi', '.testimonials-1').css('left', $('h2', '.testimonials-1').width() + 20 + 'px');
	

})( jQuery );

(function( $ ){

	$.fn.slCarousel = function( options ) {
		
		var $this = this,
			$de = $('#debug'),
			show = options['show'],
			fixWidth = options['fix-width'],
			speed = options['speed'],
			$navi = this.find('.sl-navi'),
			$elems = this.find('.' + options['selector']),
			current = 0,
			qty = $elems.length,
			scrollW = 0;
			
		$elems.wrapAll('<div class="sl-carousel-wrapper"></div>');
		$this.find('.sl-carousel-wrapper').wrap('<div class="sl-carousel-block"></div>');
		
		var methods = {
				makeResize : function() {
					if ($('body').width() < 768) {
						var elemW = $this.find('.sl-carousel-block').width();
						$elems.each(function() {
							$(this).width(elemW).css('float','left');
						});
					} else {
						var elemW = $elems.eq(0).width();
						$elems.each(function() {
							$(this).css('width','');
						});
						if (show == 1) {
							elemW = $this.find('.sl-carousel-block').width();
						}
					}
					if (show != 1) {
						var fixMargin = parseInt($elems.eq(0).css('margin-left')) + parseInt($elems.eq(0).css('margin-right'));
					} else {
						var fixMargin = 0;
					}
					scrollW = elemW + fixMargin + fixWidth;
					$this.find('.sl-carousel-wrapper').css('left', '-' + scrollW * current + 'px');
					$this.find('.sl-carousel-block').height(methods.maxElemHeight());
				},
				goto : function(direction) {
					var steps;
					if ($('body').width() > 768) {
						steps = qty - show - 1;
					} else {
						steps = qty - 2;
					}
					if (direction > 0) {
						if (current <= steps) {
							$this.find('.sl-navi a.back').removeClass('end');
							current++;
							$this.find('.sl-carousel-wrapper').filter(':not(:animated)').animate({
								'left' : '-=' + scrollW
							}, speed);
						}
						if (current == (steps + 1)) {
							$this.find('.sl-navi a.forward').addClass('end');
						}
					} else {
						if (current > 0) {
							$this.find('.sl-navi a.forward').removeClass('end');
							$this.find('.sl-carousel-wrapper').filter(':not(:animated)').animate({
								'left' : '+=' + scrollW
							}, speed);
							current--;
						}
						if (current == 0) {
							$this.find('.sl-navi a.back').addClass('end');
						}
					}
					$de.html('current: ' + current);
				},
				maxElemHeight : function() {
					var h = 0;
					$elems.each(function() {
						if ($(this).height() > h) {
							h = $(this).height();
						}
					});
					return h + fixWidth;
				}
			};
			
		methods.makeResize();

		$navi.find('a.back').click(function(e) {
			e.preventDefault();
			methods.goto(-1);
		});
		$navi.find('a.forward').click(function(e) {
			e.preventDefault();
			methods.goto(+1);
		});
		
		$(window).resize(function() { methods.makeResize();  });
		
	};	

})( jQuery );

(function($) {
	"use strict";

	var multipler = 1/3;
	var projectItemsWrapperWidth = $('#portfolio-list').width();
	if ($('body').width() < 768) {
		multipler = 1;
	}else if (($('body').width() > 767) && ($('body').width() <= 979)){
		multipler = 1/3;	
	} else {
		if ($('#portfolio-list').hasClass('portfolio-3-columns')) {
			multipler = 1/3;
		}
		if ($('#portfolio-list').hasClass('portfolio-4-columns')) {
			multipler = 1/4;
		}
		if ($('#portfolio-list').hasClass('portfolio-5-columns')) {
			multipler = 1/5;
		}
	}
	$('.project-item').css('height', projectItemsWrapperWidth * multipler + 'px');
	$('.project-item').css('width', projectItemsWrapperWidth * multipler + 'px');
	
	if ($('body').width() < 768) {
		$('.buttons .fa-search').parent().colorbox({width:"80%"});
	}else{
		$('.buttons .fa-search').parent().colorbox();
	}
	
	$('<i class="fa fa-caret-right"></i>').prependTo('.cat-item');	$('.wpb_layerslider_element').addClass('home-slider');
	$('i').html('');
	$('.quick_newsletter .newsletter p').addClass('col-md-3 col-sm-3');
	$('.quick_newsletter .newsletter-submit').parent().addClass('col-md-2 col-sm-2').removeClass('col-md-3 col-sm-3');
	
	
		
	$('.sl-navi').find('a').each(function() {
		var $this = $(this);
		if ($this.hasClass('forward')) {
			$this.html('<i class="fa fa-angle-right"></i>')
		} else if ($this.hasClass('back')) {
			$this.html('<i class="fa fa-angle-left"></i>')
		}
	});

	$("body").fitVids();

	$('.flexslider').flexslider({
		animation: "slide",
		autoplay: true
	});
	$('.magnis-product-item-single-img .flexslider').flexslider({
		animation: "slide",
		autoplay: true
	});

	$('#single-projects-slides').jcarousel({
		scroll: 1,
		visible: 1,
		wrap: 'both'
    });

	$('.sidebar-posts').magnisSort({
		'showAll' : 0
	});

	$('#sort-faq').magnisSort({
		'showAll' : 1
	});

	$('#portfolio-list').magnisSort({
		'showAll' : 1
	});
	
	$('.settings-wrapper .show-settings i').click(function() {
		$(this).parent().parent().find('.settings-block').slideToggle();
	});
	$('.settings-block a').click(function(e) {
		e.preventDefault();
		var $t = $(this);
		if ($t.attr('data-color') != undefined) {
			$('#site-color').attr('href', './css/color-' + $t.attr('data-color') + '.css');
		}
		if ($(this).attr('data-pattern') != undefined) {
			$('.pattern-bg').css('background-image', 'url(images/patterns/' + $(this).attr('data-pattern') +'.png)');
		}
	});

	setTimeout(function() {
		  $('#latest-tweets').each(function() {
			$(this).find('ul > li').addClass('tweet-item').unwrap('ul');
			$('<i class="fa fa-twitter"></i>').prependTo('div.user');
			$(this).show();
		  });
		  
		  jQuery('#latest-tweets').jcarousel({
			scroll: 1,
			visible: 1,
			wrap: 'both'
	      });
		}, 2000);

/*	$('#layerslider').layerSlider({
		skinsPath : './css/layerslider/skins/',
		skin : 'borderlesslight',
		thumbnailNavigation : 'hover',
		hoverPrevNext : true,
		responsiveUnder : 960,
		sublayerContainer : 960,
		twoWaySlideshow : true,
		firstLayer: 1
	});*/
	/* carousels */

	jQuery('#testimonials-2').jcarousel({
		scroll: 1,
		visible: 1,
		wrap: 'both'
    });
	jQuery('#single-post-releated-posts').jcarousel({
		scroll: 1,
		visible: 3,
		wrap: 'both'
    });
	jQuery('#latest-projects-items', '.latest-projects').jcarousel({
		scroll: 1,
		visible: 4,
		wrap: 'both'
    });
	jQuery('#latest-projects-items', '.latest-projects-2').jcarousel({
		scroll: 1,
		visible: 5,
		wrap: 'both'
    });
    jQuery('.latest-projects-3').jcarousel({
		scroll: 1,
		visible: 5,
		wrap: 'both'
    });
    jQuery('.latest-projects-4').jcarousel({
		scroll: 1,
		visible: 3,
		wrap: 'both'
    });
    jQuery('#testimonials-1').jcarousel({
		scroll: 1,
		visible: 1,
		wrap: 'both'
    });
    
    jQuery('#latest-blog-posts').jcarousel({
		scroll: 1,
		visible: 1,
		wrap: 'both'
    });
	
	jQuery('#latest-blog-posts2').jcarousel({
		scroll: 1,
		visible: 2,
		wrap: 'both'
    });
	
	jQuery('#respective-partners', '.respective-partners').jcarousel({
		scroll: 1,
		visible: 5,
		wrap: 'both'
    });

    jQuery('#team-list').jcarousel({
		scroll: 1,
		visible: 4,
		wrap: 'both'
	});
	var bw = $('body').width();
		if (bw < 480) {
			jQuery('#latest-projects-items', '.latest-projects').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-2').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-3').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			
		    jQuery('#respective-partners', '.respective-partners').jcarousel({
				scroll: 1,
				visible: 2,
				wrap: 'both'
		    });
		    jQuery('#team-list').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			jQuery('#latest-blog-posts2').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
		} else if ((bw < 740) && (bw >= 480)) {
			jQuery('#latest-projects-items', '.latest-projects').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-2').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-3').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
			
		    jQuery('#respective-partners', '.respective-partners').jcarousel({
				scroll: 1,
				visible: 3,
				wrap: 'both'
		    });
		    jQuery('#single-post-releated-posts').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
		    });	
		    jQuery('#team-list').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});	
			jQuery('#latest-blog-posts2').jcarousel({
				scroll: 1,
				visible: 1,
				wrap: 'both'
			});
		} else if ((bw >= 740) && (bw <= 979)) {
			jQuery('#latest-projects-items', '.latest-projects').jcarousel({
				scroll: 1,
				visible: 3,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-2').jcarousel({
				scroll: 1,
				visible: 3,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-3').jcarousel({
				scroll: 1,
				visible: 3,
				wrap: 'both'
			});
			jQuery('#single-post-releated-posts').jcarousel({
				scroll: 1,
				visible: 2,
				wrap: 'both'
		    });
		    jQuery('#team-list').jcarousel({
				scroll: 1,
				visible: 2,
				wrap: 'both'
			});
		} else if ((bw > 978) && (bw <= 1200)) {
			jQuery('#latest-projects-items', '.latest-projects').jcarousel({
				scroll: 1,
				visible: 4,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-2').jcarousel({
				scroll: 1,
				visible: 5,
				wrap: 'both'
			});
			jQuery('#latest-projects-items', '.latest-projects-3').jcarousel({
				scroll: 1,
				visible: 4,
				wrap: 'both'
			});
			jQuery('.latest-projects-4').jcarousel({
				scroll: 1,
				visible: 3,
				wrap: 'both'
		    });
		}
		
	/* magnis-product-item */
	
	$('.magnis-product-item').each(function() {
		var $this = $(this),
			$fig = $this.find('figure');
		$fig.hover(function() {
			$(this).find('.magnis-product-item-hover').stop(true, true).fadeIn().parent().addClass('hovered');
		}, function() {
			$(this).find('.magnis-product-item-hover').stop(true, true).fadeOut().parent().removeClass('hovered');
		});
		$('.magnis-product-item-hover a', $this).wrapAll('<div class="magnis-product-item-a-wrapper"></div>');
		$('.fa-search', $(this)).parent().colorbox();
	});
	$('i.fa.fa-minus', '.magnis-shopping-cart').click(function() {
		$(this).toggleClass('fa fa-shopping-cart');
		$('.magnis-shopping-cart-entry', '.magnis-shopping-cart').slideToggle();
	}).css('left', $('.magnis-shopping-cart h2').width() + 20);
	$('.magnis-product-item-single-desc .price .product-qty a, .magnis-shopping-cart-details-table td .product-qty a').click(function(e) {
		e.preventDefault();
		var $i = $(this).find('i'),
			t = $(this).parent().find('input').val();
		if ($i.hasClass('fa fa-plus')) {
			t++;
			$(this).parent().find('input').val(t);
		} else {
			if (t != 1) {
				t--;
			}
			$(this).parent().find('input').val(t);
		}
	});
	$('.customers-reviews-list-item:last-child').css('margin-bottom','0px');
	$('form.magnis-product-item-review p input, form.magnis-product-item-review p textarea').bind('focus', function() {
		$(this).addClass('focused');
	});
	$('form.magnis-product-item-review p input, form.magnis-product-item-review p textarea').bind('blur', function() {
		$(this).removeClass('focused');
	});
	$('.magnis-shopping-cart-details-table').wrap('<div class="magnis-shopping-cart-details-table-wrapper"></div>');
	$('.magnis-shopping-cart-details-table tbody tr').hover(
		function() {
			$(this).find('> td').css('background-color','#eee');
		}, function() {
			$(this).find('> td').css('background-color','#fff');
	});
	if ($('body').width() < 768) {
		$('.magnis-shopping-cart-details-table-wrapper').css('overflow','scroll');
	} else {
		$('.magnis-shopping-cart-details-table-wrapper').css('overflow','visible');
	}
	$('.magnis-checkout-block #create-account').click(function() {
		if ($(this).is(':checked')) {
			$('.magnis-checkout-block .create-account').slideDown();
		} else {
			$('.magnis-checkout-block .create-account').slideUp();
		}
	});
	if ($('.magnis-checkout-block #create-account').is(':checked')) {
			$('.magnis-checkout-block .create-account').show();
	}
	$('.magnis-checkout-block #same-address').click(function() {
		if ($(this).is(':checked')) {
			$('.magnis-checkout-block .create-account').slideUp();
		} else {
			$('.magnis-checkout-block .create-account').slideDown();
		}
	});
	if ($('.magnis-checkout-block #same-address').is(':checked')) {
			$('.magnis-checkout-block .create-account').hide();
	}
	$('.magin-payment-option p input[type=radio]').each(function() {
		if ($(this).is(':checked')) {
			$(this).parent().parent().parent().find('p.desc').show();
		}
	}).on('click', function() {
		$('.magin-payment-option p.desc').slideUp();
		$('.magin-payment-option p label').css('color','#777');
		if ($(this).is(':checked')) {
			$(this).parent().css('color', '#333').parent().parent().find('p.desc').slideDown();
		}
	});
	
	/* 404 search */
	
	$('.magnis-404 #magnis-404-search input').bind('focus', function() {
		$('.magnis-404 #magnis-404-search').addClass('focused');
	});
	$('.magnis-404 #magnis-404-search input').bind('blur', function() {
		$('.magnis-404 #magnis-404-search').removeClass('focused');
	});
	
	/* main-content-soon */
	
	$('.main-content-soon').wrapInner('<div class="main-content-soon-color"></div>');

	/* home-3-features-item */
	
	$('.home-3-features-item, .feature').hover(function() {
		$(this).find('i').addClass('hover');
	},function () {
		$(this).find('i').removeClass('hover');
	});
	
	/* magnis-pagination */
	
	$('.magnis-pagination').find('a').addClass('button-border');
	$('.tagcloud').find('a').addClass('button-border button-small');
	
	$('.single-project-details:last-child').css('margin-bottom','20px');
	
	/* nav bars */

	$('nav.site-desktop-menu > ul li').hover(function() {
		$(this).find('> ul').stop(true, true).slideDown(200);
	}, function() {
		$(this).find('> ul').stop(true, true).slideUp(200);
	});
	
	$('nav.site-mobile-menu > i').click(function() { $(this).parent().find('> ul').slideToggle(); } );
	$('nav.site-mobile-menu > ul li').each(function() {
		if ($(this).find('> ul').length != 0) {
			$('<i class="fa fa-plus"></i>').prependTo($(this));
		}
	});
	$('nav.site-mobile-menu > ul li i').click(function() {
		$(this).toggleClass('fa-minus').parent().find('> ul').slideToggle();
	});
	$('nav.site-mobile-menu > ul li a, nav.site-desktop-menu > ul li a').hover(function() {
		$(this).parent().addClass('hovered');
	}, function() {
		$(this).parent().removeClass('hovered');
	});
	
	/* a.button */

	$('.button, .quick_newsletter button.btn, .add-comment-form p button').hover(function() {
		$('<span></span>').appendTo($(this));
	},function() {
		$(this).find('span').remove();
	});
	
	$('.feature:last-child').css('margin-bottom','0px');
	
	$('.jcarousel-item-undefined, .jcarousel-item-NaN', '.latest-projects-wrapper, .latest-blog-posts').detach().remove();
	
	/* testimonials-1 */
	
	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.testimonials-1').wrapAll('<div class="carousel-navi"></div>');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.testimonials-1'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.testimonials-1'));
	$('.carousel-navi', '.testimonials-1').css('left', $('h2', '.testimonials-1').width() + 20 + 'px');
	$('<i class="fa fa-quote-left"></i>').prependTo('.testimonials-1 .jcarousel-skin-tango .jcarousel-item-horizontal p');

	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.team-list').wrapAll('<div class="carousel-navi"></div>');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.team-list'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.team-list'));
	$('.carousel-navi', '.team-list').css('left', $('h2', '.team-list').width() + 35 + 'px');
	
	/* testimonials-2 */
	
	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.testimonials-2').wrapAll('<div class="carousel-navi"></div>');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.testimonials-2'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.testimonials-2'));
	
	/* project-details */
	
	$('<i class="fa fa-tag"></i>').prependTo('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal p.project-tags');
	$('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal, .project-item').hover(function() {
		$(this).find('.project-details').stop(true, true).fadeIn().find('.project-title').stop(true, true).animate({'top':20}).end().find('.project-tags').stop(true, true).animate({'bottom': 20});
	}, function() {
		$(this).find('.project-details').stop(true, true).fadeOut().find('.project-title').stop(true, true).animate({'top':-20}).end().find('.project-tags').stop(true, true).animate({'bottom': -20});
	});
	
	/* footer-latest-tweets */
	
	$('<i class="fa fa-twitter"></i>').prependTo($('.footer-latest-tweets .jcarousel-skin-tango .jcarousel-item-horizontal p.username'));
	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.footer-latest-tweets').wrapAll('<div class="carousel-navi"></div>');
	$('.carousel-navi', '.footer-latest-tweets').css('left', $('h2', '.footer-latest-tweets').width() + 20 + 'px');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.footer-latest-tweets'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.footer-latest-tweets'));
	
	/* latest-blog-posts */
	
	$('<i class="fa fa-double-angle-right"></i>').prependTo($('.latest-blog-posts .jcarousel-skin-tango .jcarousel-item-horizontal .latest-blog-post-details small span.read'));
	$('<i class="fa fa-tag"></i>').prependTo($('.latest-blog-posts .jcarousel-skin-tango .jcarousel-item-horizontal .latest-blog-post-details small span.tags'));
	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.latest-blog-posts').wrapAll('<div class="carousel-navi"></div>');
	$('.carousel-navi', '.latest-blog-posts').css('left', $('h2', '.latest-blog-posts').width() + 20 + 'px');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.latest-blog-posts'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.latest-blog-posts'));
	
	/* respective-partners */
	
	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.respective-partners').wrapAll('<div class="carousel-navi"></div>');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.respective-partners'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.respective-partners'));
	$('.carousel-navi', '.respective-partners').css('margin-left', '-32px');
	$('.respective-partners .jcarousel-skin-tango .jcarousel-item-horizontal').find('img').fadeTo(0, 0.4).hover(function() {
		$(this).fadeTo(0, 1);
	}, function() {
		$(this).fadeTo(0, 0.4);
	});
	
	/* related posts */

	$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.single-post-releated-posts').wrapAll('<div class="carousel-navi"></div>');
	$('<i class="fa fa-angle-left"></i>').appendTo($('.jcarousel-prev-horizontal', '.single-post-releated-posts'));
	$('<i class="fa fa-angle-right"></i>').appendTo($('.jcarousel-next-horizontal', '.single-post-releated-posts'));
	$('.carousel-navi', '.single-post-releated-posts').css('left', $('h2', '.single-post-releated-posts').width() + 20 + 'px');

	/* to the top */

	$(window).scroll(function () {
		if ($(this).scrollTop() > 40) {
			$('#to-the-top').fadeIn();
		} else {
			$('#to-the-top').fadeOut();
		}
	});
	$('#to-the-top').click(function() { $('body,html').animate({scrollTop: 0}, 1000); });
	
	/* latest-blog-posts-2 */
	
	//$('.latest-blog-posts-2 .jcarousel-skin-tango .jcarousel-item-horizontal').css('width', ($('.latest-blog-posts-2').width()/2 - 10) + 'px');
	$('.carousel-navi', '.latest-blog-posts-2').css('left', ($('.latest-blog-posts-2').width()/2 - 27) + 'px');

	/* magnis-toggle */
	
	$('section', '.magnis-toggle').click(function() {
		if (!$(this).hasClass('active')) {
			$('section', '.magnis-toggle').removeClass('active').find('p').slideUp();
			$(this).addClass('active').find('p').slideDown();
		} else {
			$(this).removeClass('active').find('p').slideUp();
		}
	});
	
	/* magnis skills */
	
	$('section', '.magnis-skills').each(function() {
		var $this = $(this);
		var val = $this.find('.skill-value').attr('data-skill-value');
		$('<div class="skill-value-chart"></div>').css('width', val + '%').appendTo($this.find('.skill-value'));
		$('<p>' + val + '%</p>').appendTo($this.find('.skill-value').find('.skill-value-chart'));
	});
	
	/* magnis-tabs */
	
	$('section', '.magnis-tabs').eq(0).show();
	$('header p', '.magnis-tabs').each(function() {
		$('<span></span>').appendTo($(this));
	}).eq(0).addClass('active').end().click(function() {
		$('header p', '.magnis-tabs').removeClass('active');
		$(this).addClass('active');
		$('section', '.magnis-tabs').hide().eq($(this).index()).slideDown();
	});
	
	/* price tables */
	
	$('.pr-table-3').find('thead tr th:first-child, tbody tr td:first-child').addClass('options');
	$('.pr-table-3').wrap('<div class="pr-table-3-wrapper"></div>');
	$('.pr-table-3 tbody tr').hover(
		function() {
			$(this).find('> td:not(.options)').css('background-color','#eee');
			$(this).find('> td.options').css('background-color','#444');
		}, function() {
			$(this).find('> td:not(.options)').css('background-color','#fff');
			$(this).find('> td.options').css('background-color','#333');
	});
	if ($('body').width() < 768) {
		$('.pr-table-3-wrapper').css('overflow','scroll');
	} else {
		$('.pr-table-3-wrapper').css('overflow','visible');
	}
	
	/* sidebar categories */
	
	$('<i class="fa fa-caret-right"></i>').prependTo('.sidebar-categories ul li');
	
	/* sidebar posts */
	
	$('.sidebar-posts-item').each(function() {
		var $this = $(this),
			h = $this.find('figure').height(),
			img = new Image();

		img.src = $this.find('figure img').attr('src');
		var w = Math.round(img.width * (h/img.height));
		//$this.find('figure img').attr('width', w).css('margin-left', '-' + w/2 + 'px');
	});
	
	/* projects */
	
	$('.latest-projects .latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').each(function() {
		$(this).height($(this).width());
	});
	$('.latest-projects-wrapper li', '.latest-projects').each(function() {
		var $this = $(this),
			w = $this.width(),
			$img = $this.find('> img').eq(0),
			h = $img.height(),
			temp = new Image(),
			index = $(this).index(),
			imgW;
			$img.show();
			
		temp.src = $img.attr('src');
		imgW = Math.round(temp.width * (h/temp.height));
		$img.attr('width', imgW).css('margin-left', '-' + ($img.width() - w)/2 + 'px');
		$('.fa-search', $(this)).parent().colorbox();
	});
	
	/* sidebar search */
	
	$('.sidebar-search').find('input[type=text]').bind('focus', function() {
		$(this).parent().addClass('sidebar-search-active');
	});
	$('.sidebar-search').find('input[type=text]').bind('blur', function() {
		$(this).parent().removeClass('sidebar-search-active');
	});
	
	/* header search */
	
	$('.header-search').find('input[type=text]').bind('focus', function() {
		$(this).parent().parent().addClass('header-search-focused');
	});
	$('.header-search').find('input[type=text]').bind('blur', function() {
		$(this).parent().parent().removeClass('header-search-focused');
	});
	
	$('.magnis-shipping, .magnis-promo').find('input[type=text], input[type=email], textarea, select').bind('focus', function() {
		$(this).addClass('focused');
	});
	$('.magnis-shipping, .magnis-promo').find('input[type=text], input[type=email], textarea, select').bind('blur', function() {
		$(this).removeClass('focused');
	});
	
	$('.magnis-checkout-block').find('input[type=text], input[type=email], input[type=password], textarea, select').bind('focus', function() {
		$(this).addClass('focused');
	});
	$('.magnis-checkout-block').find('input[type=text], input[type=email], input[type=password], textarea, select').bind('blur', function() {
		$(this).removeClass('focused');
	});
	

	if ($('body').width() >= 767){
		$('.latest-projects-intro').height($('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').width()-40);
		
	$('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-clip-horizontal').height($('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').width());
	$('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-prev-horizontal, .latest-projects-wrapper .jcarousel-skin-tango .jcarousel-next-horizontal').css('top',($('.latest-projects-wrapper .jcarousel-skin-tango .jcarousel-item-horizontal').width() - 32)/2)
	}

	jQuery(document).ready(function() {
		$('.jcarousel-prev-horizontal, .jcarousel-next-horizontal', '.single-project-slides').css('top', ($('.single-project-slides .jcarousel-skin-tango .jcarousel-item').height() - 32) / 2 + 'px');
	});
	
})(jQuery);

// Woocommerce Quanty
jQuery( function( $ ) {

	// Quantity buttons
	$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );

	// Target quantity inputs on product pages
	$( 'input.qty:not(.product-quantity input.qty)' ).each( function() {
		var min = parseFloat( $( this ).attr( 'min' ) );

		if ( min && min > 0 && parseFloat( $( this ).val() ) < min ) {
			$( this ).val( min );
		}
	});

	$( document ).on( 'click', '.plus, .minus', function() {

		// Get values
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}

		}

		// Trigger change event
		$qty.trigger( 'change' );
	});
});

