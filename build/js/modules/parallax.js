/*------------------------------*\

    #PARALLAX

\*------------------------------*/

function parazigouigoui() {
	$('body').mousewheel(function(event) {
		//console.log('deltaX:'+event.deltaX, 'deltaY:'+event.deltaY, 'factor:'+event.deltaFactor);
		var offset = $(this).scrollTop();
		var deltaY = event.deltaY; 
		$('.parallax').each(function(){
			var zigouigoui = $(this);
			var top = parseInt(zigouigoui.css('top'), 10);
			if (offset>0 && $(document).height()>offset+$(window).height()) {
				//console.log(offset+ ' - '+$(document).height()>offset + $(window).height());
				if (deltaY<0) {
					zigouigoui.css('top', top-1+'px');
				} else {
					zigouigoui.css('top', top+1+'px');
				}
			}
		})
	});
}
