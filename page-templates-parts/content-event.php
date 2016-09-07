<?php
/**
 * The template part for displaying the content
 */
?>

<div class="section">
	<div class="zigouigouis">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-1.svg" class="zigouigoui--1">
		<img src="<?php bloginfo('template_url'); ?>/app/img/zigouigoui-2.svg" class="zigouigoui--2">
	</div>
	<article class="wrap-content">

		<?php
			
			$date_start = get_field('date_event');
			$date_end = get_field('date_event_end');
			$hour_start = get_field('hour_event');
			$hour_end = get_field('hour_event_end');

			if ($date_end && $date_end != $date_start) {
				$date_output = $date_start.' au '.$date_end;
			} else {
				$date_output = $date_start;
			}

			if ($hour_end) {
				$hour_output = $hour_start.' à '.$hour_end;
			} else {
				$hour_output = $hour_start;
			}

			$adresse = get_field('adresse');
			$code_postal = get_field('code_postal');
			$ville = get_field('ville');
			$cpt_adresse = get_field('adresse_complement');

			
			if($cpt_adresse) $adresse = $cpt_adresse.', '.$adresse;
			if($adresse) $adresse = $adresse . ', ';
			if($code_postal) $code_postal = $code_postal . ' ';			

			$adresse_full = $adresse . $code_postal . $ville;

			$contact_name = get_field('prenom_contact').' '.get_field('nom_contact');
			if ($tel_is_visible === 1) {
				$tel = get_field('tel_contact');
			}
			$email_contact = get_field('email_contact_public');
			$link_event = get_field('link_event');
			$page_facebook = get_field('page_facebook');

			$nom_structure = get_field('nom_structure');
		?>

		<header><?php the_title( '<h1 class="single-title">', '</h1>' ); ?></header>
		
		<div class="infos">
			<div class="infos__ville"><?php echo $ville;?></div>
			<div class="infos__details">
				<div><?php echo '<span class="icon-calendar"></span>'.$date_output; ?></div>
				<?php if($hour_output): ?>
					<div><?php echo '<span class="icon-clock"></span>'.$hour_output; ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="infos--adresse"><?php echo '<span class="icon-map-marker"></span>'.$adresse_full; ?></div>

		<p class="description"><?php echo acf_field_no_p('descriptif_event'); ?></p>

		<p class="ta--l"><strong>Organisé par :</strong> <?php echo $nom_structure; ?></p>

		<p class="h2 section"><span class="icon--round icon-bubble"></span>Contact</p>
		<div class="contact">
			<div class="contact__name"><?php echo $contact_name; ?></div>

			<?php if ($tel || $email_contact) : ?>
				<div class="contact__infos">
				<?php 
					if ($tel) {
						echo '<p class="tel"><span class="icon-bubbles"></span>'.$email_contact.'</p>';
					}
					if ($tel) {
						echo '<p class="email"><span class="icon-envelope"></span>'.$email_contact.'</p>';
					}
				?>
				</div>
			<?php endif; ?>

			<?php if ($link_event || $page_facebook) : ?>
				<div class="contact__links">
					<?php 
						if ($link_event) : echo '<a href="'.$link_event.'" class="tel link p" target="_blank">Site de l\'évènement</a>'; endif;
						if ($page_facebook) : echo '<a href=".$email_contact." class="email link p" target="_blank">Page facebook</a>'; endif;
					?>
				</div>
			<?php endif; ?>
		</div>

	</article>
	
	<img src="<?php bloginfo('template_url'); ?>/app/img/bus.png" class="bus">
</div>


