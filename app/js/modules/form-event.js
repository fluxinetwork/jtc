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

    
	$('#date_event, #date_event_end').pickadate({
		monthsFull: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
		weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
		today: 'Aujourd\'hui',
		clear: 'Effacer',
		close: 'Fermer',
		format: 'dd/mm/yyyy',
		formatSubmit: 'yyyymmdd'
	});

	$('#date_event, #date_event_end, #hour_event, #hour_event_end').on('change', function(){
	    $(this).focus();
	});
   
    $('#hour_event, #hour_event_end').pickatime({        
        format: 'HH:i',
        formatLabel: '<b>H</b>:i <!i>',
        formatSubmit: 'HH:i',
        clear: 'Effacer',
    });
    

    $('input[name=add_date]').click(function() {
        if(this.checked){
            $('.js-add-date').removeClass('is-none');
        }else{
            $('.js-add-date').addClass('is-none');
            $('input[name=date_event_end]').val('').removeClass('has-content');
        }
    });

    if($('input[name=add_date]').is(':checked')){
        $('input[name=add_date]').triggerHandler('click');
    }

    $('input[name=add_hour]').click(function() {
        if(this.checked){
            $('.js-add-hour').removeClass('is-none');
        }else{
            $('.js-add-hour').addClass('is-none');
            $('input[name=hour_event_end]').val('').removeClass('has-content');
        }
    });

    if($('input[name=add_hour]').is(':checked')){
        $('input[name=add_hour]').triggerHandler('click');
    }

    $('input[name=add_contact]').click(function() {
        if(this.checked){
            $('.js-add-contact').removeClass('is-none');
            $('input[name=email_contact_public]').val( $('input[name=email_contact]').val() );
             $('input[name=email_contact_public]').focus();
        }else{
            $('.js-add-contact').addClass('is-none');
            $('input[name=email_contact_public]').val('').removeClass('has-content');
        }
    });

    if($('input[name=add_contact]').is(':checked')){
        $('input[name=add_contact]').triggerHandler('click');
    }
    
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
                            $formObj.find('.form__buttons').html('<a href="'+data[0].redirect+'" class="button">Accueil</a>');
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