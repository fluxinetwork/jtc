<?php
/**
 * load_departements_fields()
 * get_footer_mail()
 */



/**
 * Get select dropdown values
 *
 * @param   N/A
 *
 * @return	array - All departements
 */

function load_departements_fields() {

    $dataString = get_field('departements', 'option', false);

	$fields = array();

	foreach (explode(";", $dataString) as $cLine) {

		if($cLine != ''){

		  	list ($cKey, $cValue) = explode('=', $cLine, 2);

		  	$itemarray[$cKey] = $cValue;

		  	foreach($itemarray as $key => $value) {

			    $fields[$key] = $value;

		 	}
		}
	}

    // return the field
    return $fields;

}



/**
 * Get email footer
 *
 * @param   N/A
 *
 * @return	string - The generic mail footer
 */

function get_footer_mail(){
	$footer_mail = 'Bien cordialement,<br><br>

	Le Collectif pour une Transition Citoyenne<br>
	10 avenue des Canuts<br> 
	69 120 Vaulx-en-Velin<br>
	Tél : 04 82 90 54 84<br>
	<a href="http://www.journeetransition.org/">www.journeetransition.org</a>
	';

	 // return footer mail
    return $footer_mail;
}

