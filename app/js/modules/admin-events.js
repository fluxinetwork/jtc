/*------------------------------*\

    #  Admin Evénements

\*------------------------------

var pa = location.href.split( '/' );
var pc = pa[0];
var hc = pa[2];
var baseUrl = pc + '//' + hc;

jQuery( document ).ready(function() {
	initAdminEvents();
});

function initAdminEvents(){
	//console.log('admin events active');

	jQuery('.js-export-events').click(function(e){
		e.preventDefault();

		jQuery.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: 'action=fluxi_csv_export&security='+ajax_object.nonce,
            dataType: 'HTML',
            success: function(data){
                //window.location = baseUrl + '/wp-content/uploads/csv/jtc-events.csv';
                jQuery('.fluxi-metabox').append('<div>'+data+'</div>');

            },
            error : function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown);

            }

        });
        return false;
	});
}*/