 <?php
/**
 * The template part for displaying the form "événements" (add)
 */
?>

<div class="form wrap-content">
	<div class="zigouigouis">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-1.svg" class="zigouigoui--1">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-2.svg" class="zigouigoui--2">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-3.svg" class="zigouigoui--3">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-4.svg" class="zigouigoui--4">
	</div>
	<form id="form-manage-event" role="form">

		<fieldset>
    		<legend><span class="icon--round icon-store"></span>Détails</legend>
			<div class="form__row">	      
		      	<input class="js-input-effect input-effect--2" type="text" name="title" id="title" value="" placeholder="" data-validation="required">
		      	<label for="title">Intitulé de l’événement<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      	<input type="text" data-validation="date" data-validation-format="dd/mm/yyyy" class="js-input-effect input-effect--2" value="" name="date_event" id="date_event">
		      	<label for="date_event">Date de début d'événement<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__group ajout">
				<label for="add_date" class="form__control form__control--checkbox">Ajouter une date de fin d'événement
					<input type="checkbox" name="add_date" id="add_date" value="1">
					<div class="form__control__indicator"></div> 
				</label>
		    </div>

			<div class="form__row is-none js-add-date ajout">	      
		      	<input type="text" data-validation="date" data-validation-format="dd/mm/yyyy" data-validation-depends-on="add_date" class="js-input-effect input-effect--2" value="" name="date_event_end" id="date_event_end">
		      	<label for="date_event_end">Date de fin d'événement<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>
			
			<div class="form__row">	      
		      	<input type="text" data-validation="required" class="js-input-effect input-effect--2" value="" name="hour_event" id="hour_event">
		      	<label for="hour_event">Heure de début d'événement<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__group ajout">
				<label for="add_hour" class="form__control form__control--checkbox">Ajouter une heure de fin d'événement
					<input type="checkbox" name="add_hour" id="add_hour" value="1">
					<div class="form__control__indicator"></div> 
				</label>
		    </div>

			<div class="form__row is-none js-add-hour ajout">	      
		      	<input type="text" data-validation="required" data-validation-depends-on="add_hour" class="js-input-effect input-effect--2" value="" name="hour_event_end" id="hour_event_end">
		      	<label for="hour_event_end">Heure de fin d'événement<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>


		    <div class="form__row">	      
		     	<textarea rows="6" class="js-input-effect input-effect--2" placeholder="" name="descriptif_event" id="descriptif_event" data-validation="required"></textarea>
		      	<label for="descriptif_event">Description de votre événement<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      	<input type="text" name="nom_structure" id="nom_structure" value="" placeholder="" data-validation="required" class="js-input-effect input-effect--2">
		      	<label for="nom_structure">Structure(s) organisatrice(s)<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__group">
				<label for="structure_organisatrice" class="form__control form__control--checkbox">
					J'ai organisé une Journée de la transition en 2014 et/ou 2015
					<input type="checkbox" name="structure_organisatrice" id="structure_organisatrice" value="1">
					<div class="form__control__indicator"></div>
				</label>
		    </div>		    
		    
		</fieldset>

	    <fieldset>
    		<legend><span class="icon--round icon-map-marker"></span>Adresse et liens</legend>    		  

		    <div class="form__row">	      
		      	<input type="text" class="js-input-effect input-effect--2" placeholder="" value="" name="adresse" id="adresse" data-validation="required">
		      	<label for="adresse">Adresse<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      	<input type="text" class="js-input-effect input-effect--2" placeholder="" value="" name="adresse_complement" id="adresse_complement">
		      	<label for="adresse_complement">Complément d'adresse</label>
		      	<span class="focus-bg"></span>
		    </div>

			<div class="form__row">	     
		      	<input type="text" class="js-input-effect input-effect--2" maxlength="5" placeholder="" value="" name="code_postal" id="code_postal" data-validation="number">
		      	<label for="code_postal">Code postal<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      	<input type="text" class="js-input-effect input-effect--2" placeholder="" value="" name="ville" id="ville" data-validation="required">
		      	<label for="ville">Ville<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      	<input type="url" class="js-input-effect input-effect--2" placeholder="" value="" name="link_event" id="link_event">
		      	<label for="link_event">Lien internet</label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      	<input type="url" class="js-input-effect input-effect--2" placeholder="" value="" name="page_facebook" id="page_facebook">
		      	<label for="page_facebook">Page facebook</label>
		      	<span class="focus-bg"></span>
		    </div>

	    </fieldset>

	    <fieldset>
	    	<legend><span class="icon--round icon-bubble"></span>Contact</legend>
			
			<div class="form__row">
		      	<input type="text" placeholder="" value="" name="nom_contact" id="nom_contact" data-validation="required" class="js-input-effect input-effect--2">
		      	<label for="nom_contact">Nom<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      	<input type="text" placeholder="" value="" name="prenom_contact" id="prenom_contact" data-validation="required" class="js-input-effect input-effect--2">
		      	<label for="prenom_contact">Prénom<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

    		<div class="form__row">
		      	<input type="text" placeholder="" value="" name="email_contact" id="email_contact" data-validation="email" class="js-input-effect input-effect--2">
		      	<label for="email_contact">Email<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>

		    <div class="form__group ajout">
				<label for="add_contact" class="form__control form__control--checkbox">Ajouter un contact email public
					<input type="checkbox" name="add_contact" id="add_contact" value="1">
					<div class="form__control__indicator"></div> 
				</label>
		    </div>

		    <div class="form__row is-none js-add-contact ajout">
		      	<input type="text" placeholder="" value="" name="email_contact_public" id="email_contact_public" data-validation="email" data-validation-depends-on="add_date" class="js-input-effect input-effect--2">
		      	<label for="email_contact_public">Email public<i class="i-required">*</i></label>
		      	<span class="focus-bg"></span>
		    </div>	

		    <div class="form__row">
		      	<input type="text" maxlength="10" placeholder="" value="" name="tel_contact" id="tel_contact" data-validation="number" class="js-input-effect input-effect--2">
		      	<label for="tel_contact">Téléphone
		      	<span class="focus-bg"></span>
		    </div>

	    </fieldset>

	    <fieldset>
    		<legend><span class="icon--round icon-cog"></span>Principes d’organisation</legend>

			<div class="form__group">
				<label for="accept_terms" class="form__control form__control--checkbox">
					Je m’engage à respecter les principes d’organisation d’une Journée de la transition<i class="i-required">*</i>
					<input type="checkbox" name="accept_terms" id="accept_terms" value="1" data-validation="required">
					<div class="form__control__indicator"></div>
				</label>
		    </div>

    	</fieldset>

	    <input type="hidden" value="3621759654" name="toky_toky">
	    <?php wp_nonce_field( 'fluxi_manage_event', 'fluxi_manage_event_nonce_field' ); ?>

	    <div class="notify"></div>

	    <div class="form__buttons">	    		
	    	<button type="submit" id="submit-manage-event" class="button--cta">Ajouter</button>
	    </div>

	</form>

</div>


