 <?php
/**
 * The template part for displaying the form "adhèrent" (add/re-add/update)
 */
?>

<header>
	<h1><?php echo $page_title; ?></h1>
</header>

<div class="form">
	<form id="form-manage-adherent" role="form">

		<fieldset>
    		<legend>Votre structure</legend>

    		<div class="form__row">
		      <input type="text" name="nom_structure" id="nom_structure" value="<?php echo $nom_structure; ?>" placeholder="" data-validation="required" class="js-input-effect input-effect--2">
		      <label for="nom_structure">Nom de la structure<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__select">
		      <label for="type_structure" class="label-effect--1">Type de structure<i class="i-required">*</i></label>
		      <select name="type_structure" id="type_structure" data-validation="required">
		        <option disabled selected value="">Type de structure<i class="i-required">*</i></option>
		        <option value="entreprise" <?php if($type_structure=='entreprise')echo 'selected';?>>Entreprise</option>
		        <option value="association" <?php if($type_structure=='association')echo 'selected';?>>Association</option>
		        <option value="collectivite" <?php if($type_structure=='collectivite')echo 'selected';?>>Collectivité</option>
				<option value="formation" <?php if($type_structure=='formation')echo 'selected';?>>Organisme de formation</option>
		      </select>
		      <div class="form__select__arrow"></div>
		    </div>

		    <div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $adresse; ?>" name="adresse" id="adresse" data-validation="required" class="js-input-effect input-effect--2">
		      <label for="adresse">Adresse<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

			<div class="form__row">
		      <input type="text" placeholder="" maxlength="5" value="<?php echo $code_postal; ?>" name="code_postal" id="code_postal" data-validation="number" class="js-input-effect input-effect--2">
		      <label for="code_postal">Code postal<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $ville; ?>" name="ville" id="ville" data-validation="required" class="js-input-effect input-effect--2">
		      <label for="ville">Ville<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

    	</fieldset>

		<fieldset>
    		<legend>Contact</legend>
    		<div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $nom_contact1; ?>" name="nom_contact1" id="nom_contact1" data-validation="required" class="js-input-effect input-effect--2">
		      <label for="nom_contact1">Nom<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $prenom_contact1; ?>" name="prenom_contact1" id="prenom_contact1" data-validation="required" class="js-input-effect input-effect--2">
		      <label for="prenom_contact1">Prénom<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $fonction_contact1; ?>" name="fonction_contact1" id="fonction_contact1" data-validation="required" class="js-input-effect input-effect--2">
		      <label for="fonction_contact1">Fonction<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

			<div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $email_contact1; ?>" name="email_contact1" id="email_contact1" data-validation="email" class="js-input-effect input-effect--2">
		      <label for="email_contact1">Email<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" maxlength="10" placeholder="" value="<?php echo $telephone_contact1; ?>" name="telephone_contact1" id="telephone_contact1" data-validation="number" class="js-input-effect input-effect--2">
		      <label for="telephone_contact1">Téléphone<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__group">
				<label for="add_contact" class="form__control form__control--checkbox">Ajouter un contact secondaire
					<input type="checkbox" name="add_contact" id="add_contact" value="1" <?php if($add_contact=='1')echo 'checked'; ?>>
					<div class="form__control__indicator"></div> 
				</label>
		    </div>

			<div class="hide js-contact2">
				<div class="form__row">
			      <input type="text" placeholder="" value="<?php echo $nom_contact2; ?>" name="nom_contact2" id="nom_contact2" data-validation="required" data-validation-depends-on="add_contact" class="js-input-effect input-effect--2">
			      <label for="nom_contact2">Nom<i class="i-required">*</i></label>
			      <span class="focus-bg"></span>
			    </div>

			    <div class="form__row">
			      <input type="text" placeholder="" value="<?php echo $prenom_contact2; ?>" name="prenom_contact2" id="prenom_contact2" data-validation="required" data-validation-depends-on="add_contact" class="js-input-effect input-effect--2">
			      <label for="prenom_contact2">Prénom<i class="i-required">*</i></label>
			      <span class="focus-bg"></span>
			    </div>

			    <div class="form__row">
			      <input type="text" placeholder="" value="<?php echo $fonction_contact2; ?>" name="fonction_contact2" id="fonction_contact2" data-validation="required" data-validation-depends-on="add_contact" class="js-input-effect input-effect--2">
			      <label for="fonction_contact2">Fonction<i class="i-required">*</i></label>
			      <span class="focus-bg"></span>
			    </div>

				<div class="form__row">
			      <input type="text" placeholder="" value="<?php echo $email_contact2; ?>" name="email_contact2" id="email_contact2" data-validation="email" data-validation-depends-on="add_contact" class="js-input-effect input-effect--2">
			      <label for="email_contact2">Email<i class="i-required">*</i></label>
			      <span class="focus-bg"></span>
			    </div>

			    <div class="form__row">
			      <input type="text" maxlength="10" placeholder="" value="<?php echo $telephone_contact2; ?>" name="telephone_contact2" id="telephone_contact2" data-validation="number" data-validation-depends-on="add_contact" class="js-input-effect input-effect--2">
			      <label for="telephone_contact2">Téléphone<i class="i-required">*</i></label>
			      <span class="focus-bg"></span>
			    </div>
			</div>

    	</fieldset>

		<fieldset>
    		<legend>Vos actions, vos attentes et vos motivations</legend>

			<div class="form__row">
		      <textarea rows="6" placeholder="" name="activites_territoire" id="activites_territoire" data-validation="required" class="js-input-effect input-effect--2"><?php echo $activites_territoire; ?></textarea>
		      <label for="activites_territoire">Vos activités concernant l’énergie<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div><!--Les actions de votre structure ou de votre territoire.-->

		    <div class="form__row">
		      <textarea rows="6" placeholder="" name="attente_du_reseau" id="attente_du_reseau" data-validation="required" class="js-input-effect input-effect--2"><?php echo $attente_du_reseau; ?></textarea>
		      <label for="attente_du_reseau">Qu’attendez-vous du réseau ?<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

			<div class="form__row">
		      <textarea rows="6" placeholder="" name="contribuer_au_reseau" id="contribuer_au_reseau" data-validation="required" class="js-input-effect input-effect--2"><?php echo $contribuer_au_reseau; ?></textarea>
		      <label for="contribuer_au_reseau">Votre contribution au réseau<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div><!--Quelle serait-elle ?-->

		    <div class="form__row">
		      <textarea rows="6" placeholder="" name="connu_cler" id="connu_cler" data-validation="required" class="js-input-effect input-effect--2"><?php echo $connu_cler; ?></textarea>
		      <label for="connu_cler">Comment avez-vous connu le CLER ?<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__group">
		      	<label for="reseaux_cler">Souhaitez-vous participer à des réseaux spécifiques animés par le CLER ?<i class="i-required">*</i></label>
		      	<label for="reseaux_cler_0" class="form__control form__control--checkbox">
		      		RAPPEL <small>(Réseau des acteurs de la pauvreté et de la précarité énergétique dans le logement)</small>
		        	<input type="checkbox" name="reseaux_cler[]" value="rappel" id="reseaux_cler_0" <?php if(!empty($reseaux_cler) && in_array('rappel',$reseaux_cler))echo 'checked'; ?>>		        
		        	<div class="form__control__indicator"></div>
		      	</label>
		      	<label for="reseaux_cler_1" class="form__control form__control--checkbox">
		      		Réseau TEPOS <small>(Territoires à énergie positive)</small>
		        	<input type="checkbox" name="reseaux_cler[]" value="tepos" id="reseaux_cler_1" <?php if(!empty($reseaux_cler) && in_array('tepos',$reseaux_cler))echo 'checked'; ?>>
		        	<div class="form__control__indicator"></div>
		        </label>
		      	<label for="reseaux_cler_2" class="form__control form__control--checkbox">
		      		Format’eree <small>(organismes de formation énergies renouvelables et efficacité énergétique)</small>
		        	<input type="checkbox" name="reseaux_cler[]" value="formateree" id="reseaux_cler_2" <?php if(!empty($reseaux_cler) && in_array('formateree',$reseaux_cler))echo 'checked'; ?>>
		        	<div class="form__control__indicator"></div>
		        </label>
		      	<label for="reseaux_cler_3" class="form__control form__control--checkbox">
		      		Commission EIE <small>(Espaces Info Energies)</small>
		        	<input type="checkbox" name="reseaux_cler[]" value="eie" id="reseaux_cler_3" <?php if(!empty($reseaux_cler) && in_array('eie',$reseaux_cler))echo 'checked'; ?>>
		        	<div class="form__control__indicator"></div>
		        </label>
		    </div>

    	</fieldset>

    	<fieldset class="hide js-tepos">
    		<legend>Réseau Territoires à énergie positive (TEPOS)</legend>

    		<div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $nom_elu; ?>" name="nom_elu" id="nom_elu" data-validation="required" data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" class="js-input-effect input-effect--2">
		      <label for="nom_elu">Nom de l'élu référent<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $prenom_elu; ?>" name="prenom_elu" id="prenom_elu" data-validation="required" data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" class="js-input-effect input-effect--2">
		      <label for="prenom_elu">Prénom de l'élu référent<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $fonction_elu; ?>" name="fonction_elu" id="fonction_elu" data-validation="required" data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" class="js-input-effect input-effect--2">
		      <label for="fonction_elu">Fonction de l'élu référent<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

			<div class="form__row">
		      <input type="text" placeholder="" value="<?php echo $email_elu; ?>" name="email_elu" id="email_elu" data-validation="email"  data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" class="js-input-effect input-effect--2">
		      <label for="email_elu">Email de l'élu référent<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <div class="form__row">
		      <input type="text" maxlength="10" placeholder="" value="<?php echo $telephone_elu; ?>" name="telephone_elu" id="telephone_elu" data-validation="number"  data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" class="js-input-effect input-effect--2">
		      <label for="telephone_elu">Téléphone de l'élu référent<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>

		    <p class="form__detail">Votre candidature au réseau TEPOS doit être parrainé par un Territoire à énergie positive déjà membre.<br>Si vous n’avez pas de parrain, écrivez “je n’ai pas de parrain”.</p>
		    <div class="form__row">		    
		      <input type="text" placeholder="" value="<?php echo $nom_parrain; ?>" name="nom_parrain" id="nom_parrain" data-validation="required" data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" class="js-input-effect input-effect--2">
		      <label for="nom_parrain">Qui est votre parrain ?<i class="i-required">*</i></label>
		      <span class="focus-bg"></span>
		    </div>		    

		    <div class="form__group">
				<p>L'appartenance au réseau TEPOS correspond à des valeurs et un engagement particuliers qui sont résumés dans une charte.<i class="i-required">*</i></p>
				<label for="accepte_charte_energie_positive" class="form__control form__control--checkbox">
					Je déclare avoir pris connaissance de la charte du Réseau Territoires à énergie positive (<a href="#">Lire la charte</a>)
					<input type="checkbox" name="accepte_charte_energie_positive" id="accepte_charte_energie_positive" data-validation="required" value="1" data-validation-depends-on="reseaux_cler[]" data-validation-depends-on-value="tepos" <?php if($accepte_charte_energie_positive=='1')echo 'checked'; ?>>
					<div class="form__control__indicator"></div>
				</label>
		    </div>


    	</fieldset>

    	<fieldset>
    		<legend>Calculez votre cotisation</legend>
    		<p class="form__detail">Le montant de la cotisation au CLER correspond à 1/1000 du chiffre d'affaires des entreprises, du budget des associations ou des organismes de formation. <br><br>Pour les collectivités, le calcul s'effectue ainsi : pour une Région, le montant de la cotisation s'élève à 0,1 c€/habitant ; pour un Département : 0,18 c€/habitant ; pour un Syndicat départemental : 500 € +0,1 c€/habitant ; autre (cotisation=0,8 c€/habitant). <br><br>Pour tous, le montant de la cotisation est plafonné à 2500 € pour les entreprises et organismes de formation et collectivités locales, et à 1000 € pour les associations ; avec un seuil pour tous de 160 €.<br><br>Le montant de votre cotisation inclut l’abonnement au trimestriel CLER Infos. Si vous souhaitez recevoir plusieurs exemplaires de la revue à un tarif préférentiel réservé à nos adhérents, veuillez nous contacter.<br><br>Si vous souhaitez faire un don au CLER, vous pouvez le faire au moment de votre adhésion. 60 % du montant de votre adhésion / don sont déductibles de vos impôts.</p>

			<div class="form__select">
				<label for="annee_cotisation" class="label-effect--1">Année de cotisation<i class="i-required">*</i></label>
				<select name="annee_cotisation" id="annee_cotisation" data-validation="required">
			        <?php echo $fields_annees_cotisation; ?>
			    </select>
			    <div class="form__select__arrow"></div>
			</div>

			<div class="form__row">
				<input type="text" placeholder="" name="montant_cotisation" id="montant_cotisation" data-validation="number" value="<?php echo $montant_cotisation; ?>" class="js-input-effect input-effect--2">
				<label for="montant_cotisation">Montant de votre cotisation<i class="i-required">*</i></label>
				<span class="focus-bg"></span>
			</div>

			<div class="form__group">
				<label for="structure_fiscalisee" class="form__control form__control--checkbox">
					Êtes-vous une structure fiscalisée ? (obtenir un reçu d’adhésion / don)
					<input type="checkbox" name="structure_fiscalisee" id="structure_fiscalisee" value="1" <?php if($structure_fiscalisee=='1')echo 'checked'; ?>>
					<div class="form__control__indicator"></div>
				</label>
		    </div>

    	</fieldset>

    	<fieldset>
    		<legend>Réglement et charte</legend>

			<div class="form__group">
				<label for="reglement_cler" class="form__control form__control--checkbox">
					Je déclare avoir pris connaissance du règlement intérieur du CLER (<a href="#">Lire le règlement</a>)<i class="i-required">*</i>
					<input type="checkbox" name="reglement_cler" id="reglement_cler" value="1" data-validation="required" <?php if($reglement_cler=='1')echo 'checked'; ?>>
					<div class="form__control__indicator"></div>
				</label>
		    </div>

			<div class="form__group">
				<label for="charte_adherents" class="form__control form__control--checkbox">
					Je déclare avoir pris connaissance de la charte adhérent du CLER (<a href="#">Lire la charte</a>)<i class="i-required">*</i>
					<input type="checkbox" name="charte_adherents" id="charte_adherents" value="1" data-validation="required" <?php if($charte_adherents=='1')echo 'checked'; ?>>
					<div class="form__control__indicator"></div>
				</label>
		    </div>

    	</fieldset>


	    <input type="hidden" value="6348972154" name="toky_toky">
	    <input type="hidden" value="<?php echo $type_form; ?>" name="act">
	    <?php wp_nonce_field( 'fluxi_manage_adherent', 'fluxi_manage_adherent_nonce_field' ); ?>

	    <div class="notify"></div>

		<div class="form__buttons">			
	    	<button type="submit" id="submit-adherent" class="form__submit"><?php echo $type_form_name; ?></button>
	    </div>

	</form>

</div>


