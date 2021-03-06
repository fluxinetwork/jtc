/*------------------------------*\

    #CONFIG

\*------------------------------*/

var siteURL = '';
var themeURL = '/wp-content/themes/jtc/';
var isHome = false;

// Activate resize events
var resizeEvent = true;
var resizeDebouncer = true;

// Store window sizes
var windowH; 
var windowW; 
calc_window();
var docH;

// Breakpoint
var bpSmall;
var bpMedium;
var bpLarge;
var bpXlarge;




/*------------------------------*\

    #LOAD

\*------------------------------*/


$(window).load(function() {
	// Manage label animation
	 //$('.form__row .js-input-effect').val('');
	
});


/*------------------------------*\

    #READY

\*------------------------------*/

var FOO = {
    common: {
        init: function() {   
            // Parallax the zigouigouis       
            parazigouigoui();

            // Animation 
            $('.has-anim').waypoint(function(){
                $(this.element).toggleClass('anim');
            }, {offset: '90%'});

            // Warning flexbox
            if ($('html').hasClass('detect_no-flexbox')) {
                $('.warning-flexbox').addClass('show-me');
            }
        }
    },
    home: {
        init: function() {
            isHome = true;

            // Init events map
            //initMap();
            //initMapMobil();

            // Slider
            $('.flexslider').waypoint(function(){
                $('.flexslider img').each(function(){
                    var src = $(this).attr('data-src');
                    $(this).attr('src', src).removeAttr('data-src');
                });
                $('.flexslider').flexslider({
                    animation: 'slide',
                    slideshow: false, 
                });
            }, {offset: '130%'});


            // fitVids
            $('.video').fitVids();
            // Tabs
            initTabs();
        }
    }
    
};

var UTIL = {
    fire: function(func, funcname, args) {
        var namespace = FOO;
        funcname = (funcname === undefined) ? 'init' : funcname;
        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
          namespace[func][funcname](args);
        }
    },
    loadEvents: function() {
        UTIL.fire('common');
        $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
          UTIL.fire(classnm);
        });
    }
};

$(document).ready(UTIL.loadEvents);





/*------------------------------*\

    #RESIZE

    Is activated by vars in config.js

\*------------------------------*/

/**
 * Get window sizes
 * Store results in windowW and windowH vars
 */

// Get width and height
function calc_window() {
    calc_windowW();
    calc_windowH();
}
// Get width
function calc_windowW() {
    windowW = $(window).width();
}
// Get height
function calc_windowH() {
    windowH = $(window).height();
    docH = $(document).height();
}


/**
 * MAIN RESIZE EVENT
 *
 */

function resize_handler() {
    calc_windowH();
}
if ( resizeEvent ) { $( window ).bind( "resize", resize_handler() ); }


/**
 * DEBOUNCER
 * Fire event when stop resizing
 */

function debouncer( func , timeout ) {
    var timeoutID;
    var timeoutVAR;

    if (timeout) {
        timeoutVAR = timeout;
    } else {
        timeoutVAR = 200;
    }

    return function() {
        var scope = this , args = arguments;
        clearTimeout( timeoutID );
        timeoutID = setTimeout( function () {
            func.apply( scope , Array.prototype.slice.call( args ) );
        }, timeoutVAR );
    };

}

function debouncer_handler() {
    calc_window();
}
if ( resizeDebouncer ) { $( window ).bind( "resize", debouncer(debouncer_handler) ); }





/*------------------------------*\

    #DISABLE

\*------------------------------*/

function disable_links() {
	$('.js-disabled').click(function(e){
		e.preventDefault();
	});
}

function disable_titles() {
	$('.js-disable-title').hover(
		function(){
			var cible = $(this);
			cible.data( 'title', cible.attr('title') ).attr('title','');
		},
		function() {
			var cible = $(this);
			cible.attr( 'title', cible.data('title') );
		}		
	);
}

/*------------------------------*\

    #IMAG-LOADING

    Using Images Loaded : http://imagesloaded.desandro.com

\*------------------------------*/

function loading_img(container, loader) {
	var nbImg = container.find('img').length-1;
	var hasLoadBar;
	var loadBar;
	var hasLoadNum;
	var loadNum;
	if (loader.find('.js-load-bar')) {
		hasLoadBar = true;
		loadBar = loader.find('.js-load-bar');
	}
	if (loader.find('.js-load-num')) {
		hasLoadNum = true;
		loadNum = loader.find('.js-load-num');
	}

	container.addClass('is-loading').imagesLoaded().progress(onProgress).always(onAlways);

	function onProgress(imgLoad, image) {
		var percent = Math.round(stepLoad*(100/nbImg));
		if (hasLoadBar) {
			loadBar.css('width', percent+'%');
		}
		if (hasLoadNum) {
			loadNum.html(percent+'%');
		}
	}

	function onAlways() {
		container.removeClass('is-loading');
		loader.remove();
	}
}


/*------------------------------*\

    #SCROLL-TO

\*------------------------------*/

function scroll_to(position, duration, relative) {
	var coef;
	var top;
	var bottom;

	if (position === 'top') {
		position = 0;
		top = true;
	} else if (position === 'bottom') {
		position = $(document).height()-$('.footer').height();
		bottom = true;
	} else {
		position = position.offset().top;
	}

	if (duration === 'fast') {
		coef = 0.1;
		duration = 200;
	} else if (duration === 'normal') {
		coef = 0.25;
		duration = 350;
	} else if (duration === 'slow') {
		coef = 0.4;
		duration = 500;
	} else {
		coef = duration/1000;
	}

	if (relative === true) {
		calc_windowH();
		if (top) {
			duration = $(document).height()*coef;
		} else if (bottom) {
			duration = ($(document).height()-$(document).scrollTop())*coef;
		}
	}

	$('html, body').animate({scrollTop: position}, duration);
}

/*------------------------------*\

    #SHARE

\*------------------------------*/

var popupCenter = function(url, title, width, height){
	var popupWidth = width || 640;
	var popupHeight = height || 320;
	var windowLeft = window.screenLeft || window.screenX;
	var windowTop = window.screenTop || window.screenY;
	var windowWidth = window.innerWidth || document.documentElement.clientWidth;
	var windowHeight = window.innerHeight || document.documentElement.clientHeight;
	var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
	var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
	var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
	popup.focus();
	return true;
};

$('.js-share').on('click', function(e){
	e.preventDefault();

	var network = $(this).attr('data-network');
	var url = $(this).attr('data-url');
	var shareUrl;

	if (network == 'facebook') {
		shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Facebook");
	} if (network == 'twitter') {
		var origin = "energiepartagee";
		shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
            "&via=" + origin + "" +
            "&url=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Twitter");
	}
});


/*------------------------------*\

    #STRING

\*------------------------------*/

/**
 * Separate numbers
 */	

function formatNumber(number){
    var numberSplit = number.toFixed(0) + '';    
    var x = numberSplit.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? ' ' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ' ' + '$2');
    }
    return x1 + x2;
}

/*------------------------------*\

    #MAP

\*------------------------------*/

var mapJTC,basicIcon;

var mapStyle = {
    "color": "#ff7800",
    "weight": 5,
    "opacity": 0.65
};

function initMap (){

    mapJTC = L.map('map-events', {
        center: [47.07, 2.21],
        zoom: 5.7,
        scrollWheelZoom: false
    });

    L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
        maxZoom: 14,
        attribution: 'Carte &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributeurs, ' +
            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        id: 'jtc2016'
    }).addTo(mapJTC);

	$.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: ajax_object.ajax_url,
        data: 'action=get_json_map',
        success: function(data){
            geojsonLayer = L.geoJson( 
                data, {
	            	style: mapStyle,
	            	onEachFeature: onEachFeature,
	        	}
	        ).addTo(mapJTC);            
        },
        error : function(jqXHR, textStatus, errorThrown) {
            //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
        }

    });
    return false;

}

/*function onEachFeature(feature, layer) {

	console.log(feature);

	var popupContent = "<p>I started out as a GeoJSON " +
			feature.geometry.type + ", but now I'm a Leaflet vector!</p>";

	if (feature.properties && feature.properties.popupContent) {
		popupContent += feature.properties.popupContent;
	}

	layer.bindPopup(popupContent);
}*/

function onEachFeature(f,l){
    var out = [];
    if (f.properties){
        for(key in f.properties){
            out.push(f.properties[key]);
        }
        l.bindPopup(out.join(""));
    }
}


function initMapMobil(){

    $('.js-open-map, .js-close-map').click(function(e){
        e.preventDefault();
        $('.map-holder').toggleClass('is-open');
    });
}


/*------------------------------*\

    #PARALLAX

\*------------------------------*/

function parazigouigoui() {
	$('img[class*="zigouigoui"]').waypoint(function(){
	    $(this.element).toggleClass('parallax');
	}, {offset: '100%'});
	
	$(document).mousewheel(function(event) {
		var offset = $(this).scrollTop();
		var deltaY = event.deltaY; 
		$('.parallax').each(function(){
			var zigouigoui = $(this);
			var top = parseInt(zigouigoui.css('top'), 10);
			if (offset>0 && docH > offset + windowH) {
				if (deltaY<0) {
					zigouigoui.css('top', top-1+'px');
				} else {
					zigouigoui.css('top', top+1+'px');
				}
			}
		})
	});
}

/**
 * Share buttons
 */	

var popupCenter = function(url, title, width, height){
	var popupWidth = width || 640;
	var popupHeight = height || 320;
	var windowLeft = window.screenLeft || window.screenX;
	var windowTop = window.screenTop || window.screenY;
	var windowWidth = window.innerWidth || document.documentElement.clientWidth;
	var windowHeight = window.innerHeight || document.documentElement.clientHeight;
	var popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2 ;
	var popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
	var popup = window.open(url, title, 'scrollbars=yes, width=' + popupWidth + ', height=' + popupHeight + ', top=' + popupTop + ', left=' + popupLeft);
	popup.focus();
	return true;
};

$('.js-share').on('click', function(e){
	e.preventDefault();

	var network = $(this).attr('data-network');
	var url = $(this).attr('data-url');
	var shareUrl;

	if (network == 'facebook') {
		shareUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Facebook");
	} if (network == 'twitter') {
		var origin = "transitioncit";
		shareUrl = "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.title) +
            "&via=" + origin + "" +
            "&url=" + encodeURIComponent(url);
		popupCenter(shareUrl, "Partager sur Twitter");
	}
});
/*------------------------------*\

    #TABS

\*------------------------------*/

function initTabs() {
	$('.tabs-controls .js-tab-btn:eq(0)').addClass('is-active');
	$('.tabs .tab:eq(0)').addClass('is-open');

	$('.js-tab-btn').click(function(e){
		e.preventDefault();
		var index = $(this).index();
		$(this).parent().find('.is-active').removeClass('is-active');
		$(this).addClass('is-active');

		$('.tabs .tab').removeClass('is-open');
		$('.tabs .tab:eq('+index+')').addClass('is-open');

	});

	$('.js-more-tabs').click(function(e){
		$(this).remove();
		$('.tabs-controls').removeClass('limit');
	})
}


