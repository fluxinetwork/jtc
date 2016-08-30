/*------------------------------*\

    #PARALLAX

\*------------------------------*/

function parazigouigoui() {
	$('img[class*="zigouigoui"]').waypoint(function(){
	    $(this.element).toggleClass('parallax');
	}, {offset: '100%'});
	
	$('body').mousewheel(function(event) {
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
