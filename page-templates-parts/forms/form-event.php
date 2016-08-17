 <?php
/**
 * The template part for displaying the form "événements" (add)
 */
?>

<div class="form">
	<form id="form-manage-event" role="form">
		<fieldset>
    		<legend>Détails de l'événement</legend>
			<div class="form__row">	      
		      <input class="js-input-effect input-effect--2" type="text" name="title" id="title" value="" placeholder="" data-validation="required">
		      <label for="title">Intitulé de l’événement<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      <input type="text" data-validation="date" data-validation-format="dd/mm/yyyy" class="js-input-effect input-effect--2" value="" name="date_event" id="date_event">
		      <label for="date_event">Date de l'événement<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">	      
		      <textarea rows="6" class="js-input-effect input-effect--2" placeholder="" name="descriptif_event" id="descriptif_event" data-validation="required"></textarea>
		      <label for="descriptif_event">Description de votre événement<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>
		</fieldset>

	    <fieldset>
    		<legend>Localisation et contacts</legend>
			
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

		     <div class="form__row">	      
		      <input type="text" class="js-input-effect input-effect--2" placeholder="" value="" name="adresse" id="adresse" data-validation="required">
		      <label for="adresse">Adresse<i class="i-required">*</i></label>
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
			
		    <div class="form__select">
		    	<label for="departement" class="label-effect--1">Département<i class="i-required">*</i></label>
				<select name="departement" id="departement" data-validation="required">
					<option disabled selected value="">Dans quel département ?<i class="i-required">*</i></option>
					<?php
						foreach ( load_departements_fields() as $key => $value ) {

			            	if( $departement == $key ):
			            		echo '<option value="'.$key.'" selected>'.$value.'</option>';
			            	else:
			            		echo '<option value="'.$key.'">'.$value.'</option>';
			            	endif;

						}

					?>
				</select>
				<div class="form__select__arrow"></div>
		    </div>	    

		    <div class="form__row">	      
		      <input type="url" class="js-input-effect input-effect--2" placeholder="" value="" name="link_event" id="link_event">
		      <label for="link_event">Lien internet</label>
		      <span class="focus-bg"></span>
		    </div>

	    </fieldset>

	    <input type="hidden" value="3621759654" name="toky_toky">
	    <?php wp_nonce_field( 'fluxi_manage_event', 'fluxi_manage_event_nonce_field' ); ?>

	    <div class="notify"></div>

	    <div class="form__buttons">			
	    	<button type="submit" id="submit-manage-event" class="form__submit">Ajouter</button>
	    </div>

	</form>

</div>


