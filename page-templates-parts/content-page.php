<?php
/**
 * The template part for displaying the content
 */
?>

<div class="section">
	<article class="wrap-content">

		<?php
			$ville = get_field('ville');
			$date_start = get_field('date_event');
			$date_end = get_field('date_event_end');
			$hour_start = get_field('hour_event');
			$hour_end = get_field('hour_event_end');

			$multidate = ($date_end) ? true : false;
			$multihour = ($hour_end) ? true : false;

			if ($multidate) {
				$date_output = $date_start.' au '.$date_end;
			} else {
				$date_output = $date_start;
			}

			if ($multihour) {
				$hour_output = $hour_start.' à '.$hour_end;
			} else {
				$hour_output = $hour_start;
			}

			$adresse = get_field('adresse');
			$code_postal = get_field('code_postal');
			$adresse_full = $adresse.', '.$code_postal.' '.$ville;
		?>

		<header><?php the_title( '<h1 class="single-title">', '</h1>' ); ?></header>
		
		<div class="infos">
			<div class="infos__ville"><?php echo $ville;?></div>
			<div class="infos__details">
				<div><?php echo '<span class="icon-bookmark"></span>'.$date_output; ?></div>
				<div><?php echo '<span class="icon-clock"></span>'.$hour_output; ?></div>
			</div>
		</div>
		<div class="infos--adresse"><?php echo '<span class="icon-map-marker"></span>'.$adresse_full; ?></div>
		<p class="ta--l"></strong><?php echo acf_field_no_p('descriptif_event'); ?></p>

	</article>
</div>


