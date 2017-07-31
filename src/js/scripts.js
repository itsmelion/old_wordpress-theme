(function ($) {
	/* $(window).on('load', function() { // makes sure the whole site is loaded 
		$('#loader').fadeOut(); // will first fade out the loading animation 
		$('#preloader').delay(150).fadeOut('slow'); // will fade out the white DIV that covers the website. 
		$('body').delay(150).css({'overflow':'auto'});
	}) */
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




/* ## COLOR PICKER */

var bikeImages = $(".bike-color");
var colorButtons = $(".color-picker ol > li");
bikeImages.hide().first().show();
colorButtons.first().addClass("active");
var activeBike = bikeImages.find(".active");

colorButtons.on("click", function () {
	var el = $(this);
	var clickedIndex = el.index();
	var activeBtn = colorButtons.closest(".active").index();
	if (clickedIndex == activeBtn){
		return;
	}else{
		bikeImages.fadeOut(150, function(){
			bikeImages.eq(clickedIndex).delay(170).fadeIn(200);
		});
		colorButtons.removeClass("active");
		el.addClass("active");
	}
});


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

	$('#header-carroussel').slick({
		dots: true,
		infinite: true,
		speed: 2000,
		fade: true,
		cssEase: 'linear',
		variableWidth: false,
		adaptiveHeight: false,
		lazyLoad: 'ondemand',
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		centerMode: true,
		mobileFirst: true
	});
	$('#GALERIA').slick({	
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		adaptiveHeight: false,
		variableWidth: true,
		arrows: false,
		dots: true,
		responsive: [
			{
				breakpoint: 840,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	$('#GALERIA').photoSwipe();


	/* var vid = $("#bgvid");
	var pauseButton = $("#polina button");
	
	if (window.matchMedia('(prefers-reduced-motion)').matches) {
			vid.removeAttribute("autoplay");
			vid.pause();
			pauseButton.innerHTML = "Paused";
	}
	
	function vidFade() {
		vid.addClass("stopfade");
	}
	
	vid.addEventListener('ended', function()
	{
	// only functional if "loop" is removed 
	vid.pause();
	// to capture IE10
	vidFade();
	}); 
	
	
	pauseButton.addEventListener("click", function() {
		vid.classList.toggle("stopfade");
		if (vid.paused) {
			vid.play();
			pauseButton.innerHTML = "Pause";
		} else {
			vid.pause();
			pauseButton.innerHTML = "Paused";
		}
	}) */

})(jQuery);	