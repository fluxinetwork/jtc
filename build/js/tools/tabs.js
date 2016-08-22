/*------------------------------*\

    #TABS

\*------------------------------*/

function initTabs() {

	$('.tabs .tab:eq(0)').addClass('is-open');

	$('.js-tab-btn').click(function(e){
		e.preventDefault();
		var index = $(this).index();

		$('.tabs .tab').removeClass('is-open');
		$('.tabs .tab:eq('+index+')').addClass('is-open');

	});
}


