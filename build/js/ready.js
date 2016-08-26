/*------------------------------*\

    #READY

\*------------------------------*/

var FOO = {
    common: {
        init: function() {          
           
        }
    },
    home: {
        init: function() {
            isHome = true;
            // Init events map
            initMap();
            initMapMobil();
            // Slider
            $('.flexslider').flexslider({
                animation: 'slide',
                slideshow: false, 
            });
            // fitVids
            $('.video').fitVids();
            // Tabs
            initTabs();
            // Accordion
            $('.js-accordion').click(function(e){
                e.preventDefault();
                $(this).next('.accordion-content').slideToggle();
            });
            // Animation 
            $('.solutions__header, .wrap-slider').waypoint(function(){
                $(this.element).toggleClass('anim');
            }, {offset: '90%'});
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




