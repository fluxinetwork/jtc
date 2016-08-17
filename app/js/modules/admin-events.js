/*------------------------------*\

    #  Admin Evénements

\*------------------------------*/

jQuery( document ).ready(function() {
	initAdminEvents();
});

function initAdminEvents(){
	console.log('admin events active');

	jQuery('.js-export-events').click(function(e){
		e.preventDefault();
		jQuery.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: 'action=fluxi_csv_export&security='+ajax_object.nonce,
            success: function(data){

                /*if(data[0].validation == 'error'){
                	jQuery('<p class="f-error-mess">'+data[0].message+'</p>').insertAfter($button);
                    $button.html('Envoyer le reçu '+the_year);
                }else{
                    jQuery('<p class="f-success-mess">'+data[0].message+'</p>').insertAfter($button);
                   	//$button.html('Envoyer le reçu');
                    $button.hide();
                }*/

                console.log(data);

            },
            error : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);
                
            }

        });
        return false;
	});
}