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
            initMap();
            initMapMobil();

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




