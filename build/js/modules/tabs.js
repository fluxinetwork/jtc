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


