/*------------------------------*\

    #  Evénements

\*------------------------------*/

$( document ).ready(function() {
	if($('.page-template-page-manage-event').length){
        initManageEventForm();
    }
});
$(window).load(function(){
    // Label's animation on init page
    $( '.js-input-effect' ).each(function( i ) {
        if($(this).val() != ''){
            $(this).addClass('has-content');
        }else{
            $(this).removeClass('has-content');
        }
    });
    // Label's animation on focus
    $('.js-input-effect').focusout(function(){
        if($(this).val() != ''){
            $(this).addClass('has-content');
        }else{
            $(this).removeClass('has-content');
        }
    });
    // Select label
    $( '.form__select select' ).each(function( i ) {
        if($(this).val() != null)
            $(this).parent().addClass('has-content');
    });
    $('.form__select select').change(function(){
        if($(this).val() != '')
            $(this).parent().addClass('has-content');
    });

});
// Add offer

function initManageEventForm(){

    var formID = '#form-manage-event';

    $(formID+' button[type=submit]').prop('disabled', false);
    $formObj = $('#form-manage-event');

    fluxiAjaxTry( formID, $formObj, 'fluxi_manage_event', false, true );

    
	$('#date_event').pickadate({
		monthsFull: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
		weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
		today: 'Aujourd\'hui',
		clear: 'Effacer',
		close: 'Fermer',
		format: 'dd/mm/yyyy',
		formatSubmit: 'yyyymmdd'
	});

	$('#date_event').on('change', function(){
	    $(this).focus();
	})
   
}

/*
 * Launch validation & ajax resquest
 *
 * @param formID : form ID
 * @param $formObj : jQuery object
 * @param ajaxAction
 * return nothing, display results
 *
 */
function fluxiAjaxTry (formID, $formObj, ajaxAction, redirect, button ) {

    $.validate({
        form : formID,
        scrollToTopOnError : true,
        lang : 'fr',
        validateOnBlur : true,
        onError : function($form) {
            $form.find('button[type=submit]').prop('disabled', false).find('.spinner').remove();
        },
        onSuccess : function($form) {

            var params = $formObj.serialize();

            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: ajax_object.ajax_url,
                data: 'action='+ajaxAction+'&'+params,
                success: function(data){
                    $formObj.find('button[type=submit] .spinner').remove();

                    if(data[0].validation == 'error'){
                        $formObj.find('button[type=submit]').prop('disabled', false);
                    }else{

                        if (redirect == true) {
                            setTimeout(function() {
                                $(location).attr( 'href', data[0].redirect );
                            }, 500);
                        }

                        if (button == true) {
                            $formObj.find('.form__buttons').html('<a href="'+data[0].redirect+'" class="button">Retour</a>');
                        }

                        //$formObj.find('button[type=submit]').hide();
                    }
                    $formObj.find('.notify').html('<span class="'+data[0].validation+'">'+data[0].message+'</span>');

                },
                error : function(jqXHR, textStatus, errorThrown) {
                    //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
                    $formObj.find('button[type=submit]').prop('disabled', false).find('.spinner').remove();
                }

            });
            return false;
        },
        onValidate : function($form) {
            $formObj.find('.notify').html('');
            $formObj.find('button[type=submit]').prop('disabled', true).prepend('<i class="spinner"></i>');
        }
    });
}