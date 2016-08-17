<?php
/**
 * load_departements_fields()
 * get_footer_mail()
 */

<<<<<<< Updated upstream
/**
 * Filter posts
 *
 * @param   N/A
 *
 * @return	html - All filtered results
 */

function fluxi_filter_posts(){
	// Global array
    $results = array();
    global $reg_errors;
	$reg_errors = new WP_Error;
	$toky_toky = filter_var($_POST['toky_toky'], FILTER_SANITIZE_NUMBER_INT);

	$message_response = 'Aucune publication ne correspond à vos critères.';

	if ( isset( $_POST['fluxi_filter_posts_nonce_field'] ) && wp_verify_nonce( $_POST['fluxi_filter_posts_nonce_field'], 'fluxi_filter_posts' ) && is_numeric($toky_toky) && $toky_toky < 100000 && !empty($_POST['pt_slug']) ):

		$result_content = '';
		$count_post = 0;
		$all_tags = array();
		$pt_slug = filter_var($_POST['pt_slug'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

		foreach( $_POST as $index => $valeur ){

			if( $index != 'action' && $index != 'pt_slug' && $index != 'toky_toky' && $index != 'fluxi_filter_posts_nonce_field' && $index != '_wp_http_referer'):

				if( (array) $valeur === $valeur ):
					foreach($valeur as $id => $val ){
						$all_tags[]= $val;
					}
				else:
	            	$all_tags[]= $valeur;
	        	endif;

        	endif;
        }

		$args_filtered = array(
			'post_type' => $pt_slug,
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'tag' => implode('+', $all_tags)
 		);
		$query_filtered = new WP_Query( $args_filtered );

		if ( $query_filtered->have_posts() ) :

			$count_post = $query_filtered->found_posts;
		    $message_end = ($count_post > 1) ? 'publications qui correspondent à vos critères.' : 'publication qui correspond à vos critères.';
			$message_response = 'Il y a ' . $count_post .  ' ' .$message_end;

			while ( $query_filtered->have_posts() ) : $query_filtered->the_post();

				// Offres d'emploi
				if( $pt_slug == 'offres-emploi'):

					$ob_type_de_poste = get_field_object('field_574dadcc3c7b1');
					$label_type_de_poste = $ob_type_de_poste['choices'][ get_field('type_de_poste') ];

					$ob_departement = get_field_object('field_574dab093c7b0');
					$label_departement = $ob_departement['choices'][ get_field('departement') ];

					$ob_experience = get_field_object('field_5773a4bc97554');
					$label_experience = $ob_experience['choices'][ get_field('experience') ];

					$ob_niveau_detude = get_field_object('field_574dae0e3c7b2');
					$ch_niveau_detude = $ob_niveau_detude['choices'];
					$val_niveau_detude = $ob_niveau_detude['value'];
					$label_niveau_detude = '';

					if( $val_niveau_detude ):

						foreach( $val_niveau_detude as $v ):

							$label_niveau_detude .= '<span class="tag">'.$ch_niveau_detude[ $v ] .'</span>';

						endforeach;

					endif;

					$result_content .= '<a class="results-list-item" href="'.get_the_permalink().'">
						<h2>'.get_the_title ().'</h2>
						<h4>'.get_field('nom_structure').' - '.get_field('ville').' - '.$label_departement.'</h4>
						<span class="tag first">'.$label_type_de_poste.'</span><span class="tag">'.$label_experience.'</span>'.$label_niveau_detude.'
					</a>';

					/*$getslugid = wp_get_post_terms( get_the_ID(), 'post_tag' );

					foreach( $getslugid as $thisslug ) {
						$message_response .= $thisslug->slug . ',';
					}	*/

				elseif( $pt_slug == 'evenements'):


					$ob_departement = get_field_object('field_577e40ac4281f');
					$label_departement = $ob_departement['choices'][ get_field('departement') ];

					$ob_publics = get_field_object('field_577e419326394');
					$ch_publics = $ob_publics['choices'];
					$val_publics = $ob_publics['value'];
					$label_publics = '';

					if( $val_publics ):

						foreach( $val_publics as $v ):

							$label_publics .= '<span class="tag">'.$ch_publics[ $v ] .'</span>';

						endforeach;

					endif;

					$ob_themes = get_field_object('field_577e41d926395');
					$ch_themes = $ob_themes['choices'];
					$val_themes = $ob_themes['value'];
					$label_themes = '';

					if( $val_themes ):

						foreach( $val_themes as $v ):

							$label_themes .= '<span class="tag">'.$ch_themes[ $v ] .'</span>';

						endforeach;

					endif;

					$result_content .= '<a class="results-list-item" href="'.get_the_permalink().'">
						<h2>'.get_the_title ().'</h2>
						<h4>'.get_field('ville') .' - '. $label_departement .'</h4>
						<p class="description">'.get_field('descriptif_event').'</p>
						'.$label_publics.$label_themes.'
					</a>';

			 	endif;

			endwhile;


		endif;
		wp_reset_postdata();

	else :
		// If invalid toky
		$reg_errors->add( 'toky', $message_response );
	endif;

	if ( is_wp_error( $reg_errors ) && count( $reg_errors->get_error_messages() ) > 0):
 		$output_errors = '';
		foreach ( $reg_errors->get_error_messages() as $error ) {
			$output_errors .= $error . '<br>';
		}
		$data = array(
			'validation' => 'error',
			'message' => $output_errors
		);
		$results[] = $data;
	else:
		$data = array(
			'validation' => 'success',
			'content' => $result_content,
			'total' => $count_post,
			'message' => $message_response
		);
		$results[] = $data;
	endif;

	// Output JSON
	wp_send_json($results);

}

add_action('wp_ajax_nopriv_fluxi_filter_posts', 'fluxi_filter_posts');
add_action('wp_ajax_fluxi_filter_posts', 'fluxi_filter_posts');


/**
 * Delete posts
 *
 * @param   int - the post ID (by form)
 *
 * @return	string - Error or success message
 */
function fluxi_delete_post(){
	// Global array
    $results = array();
    global $reg_errors;
	$reg_errors = new WP_Error;
	// vars
	$current_user = wp_get_current_user();
	$redirect_slug = '/mon-profil/';
	$toky_toky = filter_var($_POST['toky'], FILTER_SANITIZE_NUMBER_INT);
	$message_response = 'Erreur dans la suppression de votre publication. Essayez à nouveau.';

	// Verify nonce
	if ( is_numeric($toky_toky) && $toky_toky < 10000 && !empty($_POST['idp']) && is_numeric($_POST['idp']) ):
		$the_idp = filter_var($_POST['idp'], FILTER_SANITIZE_NUMBER_INT);

		// Verify id post & token
		if( verify_post_author( $current_user->ID, $the_idp ) && current_user_can( 'delete_posts', $the_idp ) && current_user_can( 'delete_published_posts', $the_idp ) ):

			// Delete post
			wp_delete_post($the_idp ,true);

			$message_response = 'Votre publication a été supprimée.';

		else:
			// If invalid rights
			$reg_errors->add( 'rights', $message_response );

		endif;

	else :
		// If invalid toky
		$reg_errors->add( 'toky', $message_response );
	endif;

	if ( is_wp_error( $reg_errors ) && count( $reg_errors->get_error_messages() ) > 0):
 		$output_errors = '';
		foreach ( $reg_errors->get_error_messages() as $error ) {
			$output_errors .= $error . '<br>';
		}
		$data = array(
			'validation' => 'error',
			'message' => $output_errors
		);
		$results[] = $data;
	else:
		$data = array(
			'validation' => 'success',
			'redirect' => $redirect_slug,
			'message' => $message_response
		);
		$results[] = $data;
	endif;

	// Output JSON
	wp_send_json($results);
}

add_action('wp_ajax_nopriv_fluxi_delete_post', 'fluxi_delete_post');
add_action('wp_ajax_fluxi_delete_post', 'fluxi_delete_post');

=======
>>>>>>> Stashed changes


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
	$footer_mail = 'Bien cordialement,<br>
	Journée de la Transition Citoyenne 2016<br><br>

	Adresse<br><br>

	Tél : <br>
	Mail : <br>
	Fax : <br>
	link ';

	 // return footer mail
    return $footer_mail;
}

