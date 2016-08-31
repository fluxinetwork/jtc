<?php
/**
* Process "Offres d'emploi"
* ----------------------------------------------------
*/

/**
 * Add or modify "Offres d'emploi"
 */

function fluxi_manage_event(){
	// Global array
    $results = array();
    global $reg_errors;
	$reg_errors = new WP_Error;
	// vars
	$redirect_slug = get_home_url();
	$toky_toky = $_POST['toky_toky'];

	$message_response = 'Erreur dans l\'envoie du formulaire. Essayez de l\'envoyer à nouveau. Contacter-nous si le problème persiste.';

	// Verify nonce
	if ( isset( $_POST['fluxi_manage_event_nonce_field'] ) && wp_verify_nonce( $_POST['fluxi_manage_event_nonce_field'], 'fluxi_manage_event' )) :
		// Verify email & token
		if ( is_numeric($toky_toky) && $toky_toky == 3621759654 ):

			if ( !empty($_POST['title']) && !empty($_POST['date_event_submit']) && !empty($_POST['hour_event_submit']) && !empty($_POST['descriptif_event']) && !empty($_POST['nom_structure']) && !empty($_POST['nom_contact']) && !empty($_POST['prenom_contact']) && !empty($_POST['email_contact']) && !empty($_POST['adresse']) && !empty($_POST['ville']) && !empty($_POST['code_postal']) && !empty($_POST['accept_terms']) ):

					$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
					$content = '';

					$date_event = filter_var( $_POST['date_event_submit'], FILTER_SANITIZE_NUMBER_INT);

					$email_contact = filter_var( $_POST['email_contact'], FILTER_SANITIZE_EMAIL);
					$nom_contact = filter_var( $_POST['nom_contact'], FILTER_SANITIZE_STRING);
					$prenom_contact = filter_var( $_POST['prenom_contact'], FILTER_SANITIZE_STRING);

					$metas_tab = array(
						'date_event'	=> $date_event,
						'date_event_end' => filter_var( $_POST['date_event_submit'], FILTER_SANITIZE_NUMBER_INT),
						'hour_event'	=> filter_var( $_POST['hour_event_submit'], FILTER_SANITIZE_STRING),
						'hour_event_end' => filter_var( $_POST['hour_event_end_submit'], FILTER_SANITIZE_STRING),
						'nom_structure' => filter_var( $_POST['nom_structure'], FILTER_SANITIZE_STRING),
						'structure_organisatrice' => filter_var( $_POST['structure_organisatrice'], FILTER_SANITIZE_STRING),
						'nom_contact'	=> $nom_contact,
						'prenom_contact'=> $prenom_contact,
						'email_contact' => $email_contact,
						'email_contact_public' => filter_var( $_POST['email_contact_public'], FILTER_SANITIZE_EMAIL),
						'tel_contact' => filter_var( $_POST['tel_contact'], FILTER_SANITIZE_NUMBER_INT),
						'adresse'		=> filter_var( $_POST['adresse'], FILTER_SANITIZE_STRING),
						'ville'			=> filter_var( $_POST['ville'], FILTER_SANITIZE_STRING),
						'code_postal'	=> filter_var( $_POST['code_postal'], FILTER_SANITIZE_STRING),
						'descriptif_event'	=> filter_var( $_POST['descriptif_event'], FILTER_SANITIZE_STRING),
						'link_event'		=> filter_var( $_POST['link_event'], FILTER_SANITIZE_URL),
						'page_facebook' => filter_var( $_POST['page_facebook'], FILTER_SANITIZE_URL),
						'accept_terms' => filter_var( $_POST['accept_terms'], FILTER_SANITIZE_NUMBER_INT)

					);

					$content = $metas_tab['descriptif_event'];

					// Insert post
					$new_post = array(
					  'post_title'    => $title,
					  'post_content'  => $content,
					  'post_status'   => 'pending',
					  'post_type' 	  => 'evenements'
					);

					$the_post_id = wp_insert_post( $new_post );

					// Insert meta
					foreach( $metas_tab as $key => $value ){
						add_post_meta($the_post_id, $key, $value, true);
						// insert tags
						if($key == 'ville'){
							wp_set_post_tags($the_post_id, $value, true );
						}
					}

					// Notification mail admin
					//notify_by_mail (array(CONTACT_GENERAL),'Les JTC 2016 <' . CONTACT_GENERAL . '>','Événement en attente de validation',false,'<h2>Nouvel événement ajouté</h2><p>' . $prenom_contact . ' ' . $nom_contact . ' vient d\'ajouter l\'événement <strong>"' . $title . '"</strong>.<br>Vous devez le publier pour le rendre accessible à tous les utilisateurs du site.<br><br><a style="background-color:#005d8c; display:inline-block; padding:10px 20px; color:#fff; text-decoration:none;" href="' .home_url() . '/wp-admin/post.php?post=' . $the_post_id . '&action=edit">Accéder à l\'événement</a></p>');

					// Notification mail user
					$mail_new_event = array(get_footer_mail(), $redirect_slug);
					notify_by_mail (array($email_contact),'Collectif pour une Transition Citoyenne <' . CONTACT_GENERAL . '>', 'Votre événement est enregistré', true, get_template_directory() . '/app/inc/mails/new-event.php', $mail_new_event);

					$message_response = 'Votre événement a été ajouté. Il sera publié sur le site après avoir été validé par nos soins.';

			else:
				// Empty required field
				$reg_errors->add( 'emptyfield', 'Veuillez renseigner tous les champs obligatoires.' );
			endif;

		else:
			// If invalid mail
			$reg_errors->add( 'toky', $message_response );

		endif;

	else :
		// If invalid nonce
		$reg_errors->add( 'nonce', $message_response );
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

add_action('wp_ajax_nopriv_fluxi_manage_event', 'fluxi_manage_event');
add_action('wp_ajax_fluxi_manage_event', 'fluxi_manage_event');





/**
* Admin controles
* --------------------------------------------- *
*/

/**
 * Add metabox
 *
 */
function add_events_export_dashboard() {
	wp_add_dashboard_widget('dashboard_widget', 'Exporter Au format CSV', 'events_export_dashboard');
}
add_action('wp_dashboard_setup', 'add_events_export_dashboard' );

function events_export_dashboard( $post, $callback_args ) {
	echo '<div class="fluxi-metabox">';
		echo '<a href="#" class="f-button js-export-events">Exporter les événements </a>';
	echo '</div>';
}


/**
* Generate CSV
*
* @param n/a
* @return Csv file
*/

function fluxi_csv_export() {

	check_ajax_referer( 'admin_events_nonce','security');

	$results = array();

	// WP_Query arguments
	$args = array (
		'post_type' => 'evenements',
		//'post_status' => array( 'publish' ),
		'order' => 'DESC',
		'posts_per_page' => '-1'
	);

	// The Post Query
	$post_query = new WP_Query( $args );

	// User Loop
	if ( $post_query->have_posts() ) :

		
        //$date = date('m.j.Y-His');        
        $filename = 'jtc-events.csv';       

		header("Content-Type: text/csv; charset=utf-8");
		header("Content-Disposition: attachment; filename={$filename}");

		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/wp-content/uploads/csv/{$filename}","wb");

		fputcsv($fp, array('CONTACT', 'MAIL', 'TEL', 'STRUCTURE', 'DATE EVENT', 'TITRE', 'STATUT'));

		while ( $post_query->have_posts() ) : $post_query->the_post();

			$post_id = get_the_ID();			
			$post_status = get_post_status();
			if( $post_status != 'publish'):
				$post_status = 'Refusé';
			else:
				$post_status = 'Publié';
			endif;

			$titre_event = get_the_title();
			$date_event = get_field('date_event', false, false);
			$date_obj = new DateTime($date_event);
			$date_event = $date_obj->format('j-m-y');

			$mail_contact = get_field('email_contact');
			$nom_contact = get_field('nom_contact');
			$prenom_contact = get_field('prenom_contact');
			$tel_contact = get_field('tel_contact');
			$nom_strucure = get_field('nom_strucure');

			$nom_prenom = $nom_contact . ' ' . $prenom_contact;

			fputcsv($fp, array($nom_prenom, $mail_contact, $tel_contact, $nom_strucure, $date_event, $titre_event, $post_status));

		endwhile;

		fclose($fp);
		exit;

	else :
		// No data
	endif;

    // Handle the ajax request
    wp_die();
}


add_action( 'wp_ajax_fluxi_csv_export', 'fluxi_csv_export' );


/**
* Send an email when an event is published
*
* @param $new_status, $old_status, $post
* @return n/a
*/

function send_mails_on_publish( $new_status, $old_status, $post )
{
    if ( 'publish' !== $new_status or 'publish' === $old_status
        or 'evenements' !== get_post_type( $post ) )
        return;

    $the_idp = $post->ID;
    $email_contact = get_field('email_contact', $the_idp);

    // Notification mail current user
	$mail_published_event = array(get_footer_mail(), get_home_url(), get_permalink($the_idp));
	notify_by_mail (array($email_contact),'Collectif pour une Transition Citoyenne <' . CONTACT_GENERAL . '>', 'Votre événement est visible sur notre site', true, get_template_directory() . '/app/inc/mails/new-event-publish.php', $mail_published_event);
}

add_action( 'transition_post_status', 'send_mails_on_publish', 10, 3 );



