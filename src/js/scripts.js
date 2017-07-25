(function ($) {
	/* var menuBike = new Tether({
		element: '#submenu-bike',
		target: '#menu-bike',
		attachment: 'top left',
		targetAttachment: 'bottom left',
		targetOffset: '0 -12pt',
		constraints: [
			{
				to: 'window',
				attachment: 'together'
			}
		]
	});
	var menuSense = new Tether({
		element: '#submenu-sense',
		target: '#menu-sense',
		attachment: 'top left',
		targetAttachment: 'bottom left',
		targetOffset: '0 -12pt',
		constraints: [
			{
				to: 'scrollParent',
				attachment: 'none together',
				pin: true
			}
		],
		optimizations: {
			moveElement: false
		}
	});
	menuBike.position();
	menuSense.position();
	$('.sub-menu').hide();
	$('#menu-bike').hover(
		function(){
			$('#submenu-bike').slideDown( "fast" );
			$('#submenu-sense').slideUp( "fast" );
		},
		function(){
			$('#submenu-bike').slideUp( "fast" );
		}
	);
	$('#menu-sense').hover(
		function(){
			$('#submenu-sense').slideDown( "fast" );
			$('#submenu-bike').slideUp( "fast" );
		},
		function(){
			$('#submenu-sense').slideUp( "fast" );
		}
	); */












		var init, isMobile, setupExamples, _Drop;
	
		_Drop = Drop.createContext({
			classPrefix: 'drop'
		});
	
		isMobile = $(window).width() < 567;		
		
		
		dropBikeMenu = function() {
			var drop;
			return drop = new _Drop({
				target: $('#menu-bike')[0],
				content: bikeMenu,
				classes: 'drop-hero',
				position: 'bottom left',
				constrainToWindow: true,
				constrainToScrollParent: false,
				openOn: 'hover focus',
				tetherOptions: {
					targetOffset: '0 -12pt',
					constraints: [
						{
							to: 'scrollParent',
							attachment: 'none together',
							pin: true
						}
					],
					optimizations: {
						moveElement: false
					}
				}
			});
		};
		dropSenseMenu = function() {
			var drop;
			return drop = new _Drop({
				target: $('#menu-sense')[0],
				content: senseMenu,
				classes: 'drop-hero',
				position: 'bottom left',
				constrainToWindow: true,
				constrainToScrollParent: false,
				openOn: 'hover focus',
				tetherOptions: {
					targetOffset: '0 -12pt',
					constraints: [
						{
							to: 'scrollParent',
							attachment: 'none together',
							pin: true
						}
					],
					optimizations: {
						moveElement: false
					}
				}
			});
		};

		init = function() {
			dropSenseMenu();
			dropBikeMenu();
			return setupExamples();
		};
	
		setupExamples = function() {
			return $('.example').each(function() {
				var $example, $target, content, drop, openOn, theme;
				$example = $(this);
				theme = $example.data('theme');
				openOn = $example.data('open-on') || 'click';
				$target = $example.find('.drop-target');
				$target.addClass(theme);
				content = $example.find('.drop-content').html();
				return drop = new _Drop({
					target: $target[0],
					classes: theme,
					position: 'bottom center',
					constrainToWindow: true,
					constrainToScrollParent: false,
					openOn: openOn,
					content: content
				});
			});
		};
	
		init();
	


















	// Variables
	var clickedTab = $(".tabs > .active");
	var tabWrapper = $(".tab__content");
	var wavebg = $(".wave-bg");
	var activeTab = tabWrapper.find(".active");
	var activewavebg = wavebg.find(".active");
	var activeTabHeight = activeTab.outerHeight();

	// Show tab on page load
	activeTab.show();

	// Set height of wrapper on page load
	tabWrapper.height(activeTabHeight);

	$(".tabs > li").on("click", function () {
		var el = $(this);
		var clickedtab = parseInt(el.attr("data-id"));
		// Remove class from active tab
		$(".tabs > li").removeClass("active");
		wavebg.removeClass("active");

		// Add class active to clicked tab
		el.addClass("active");
		wavebg.eq(clickedtab).addClass("active");

		// Update clickedTab variable
		clickedTab = $(".tabs .active");

		// fade out active tab
		activeTab.fadeOut(150, function () {

			// Remove active class all tabs
			$(".tab__content > li").removeClass("active");

			// Get index of clicked tab
			var clickedTabIndex = clickedTab.index() + 1;

			// Add class active to corresponding tab
			$(".tab__content > li").eq(clickedTabIndex).addClass("active");

			// update new active tab
			activeTab = $(".tab__content > .active");

			// Update variable
			activeTabHeight = activeTab.outerHeight();

			// Animate height of wrapper to new tab height
			tabWrapper.stop().animate({
				height: activeTabHeight
			}, 300, function () {

				// Fade in active tab
				activeTab.fadeIn(150);

			});
		});
	});

/* 	$('.carousel').carousel({
		interval: 4000,
		pause: false,
		ride: 'carousel'
	}); */

	$('.card-container').slick({
  	infinite: true,
  	slidesToShow: 4,
		slidesToScroll: 4,
		variableWidth: true,
		adaptiveHeight: false,
		lazyLoad: 'ondemand',
		centerMode: true,
		mobileFirst: true,
		prevArrow: '<button type="button" class="slick-prev"><img src="http://live8.com.br/wp-content/themes/alive8/images/icons/arrow.svg" alt="Slide"/></button>',
		nextArrow: '<button type="button" class="slick-next"><img src="http://live8.com.br/wp-content/themes/alive8/images/icons/arrow.svg" alt="Slide"/></button>',
		responsive: [
    {
      breakpoint: 1366,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
	});

	$('.card-container').photoSwipe();

  $(function () {
		$('footer').css({ bottom: '-105vh' });
		$(".arrow.up").on("click", function () {
			$("footer").animate({bottom: '0'});
		}
		);
		$(".arrow.down").on("click", function () {
			$("footer").animate({bottom: '-105vh'});
		}
		);
		
	});

})(jQuery);