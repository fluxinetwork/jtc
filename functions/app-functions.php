<?php
/**
 * load_departements_fields()
 * get_footer_mail()
 */

/**
 * Remove the slug of the cpt
 *
 * @param   N/A
 *
 * @return	N/A
 */

function na_remove_slug( $post_link, $post, $leavename ) {

    if ( 'evenements' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {

    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'evenements', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'na_parse_request' );


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

