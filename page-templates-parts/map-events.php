<?php
/**
 * The template part for displaying the content
 */

$count_events = wp_count_posts('evenements');

?>

<article>

	<header><h1>Les <?php echo $count_events->publish; ?> événements</h1></header>
	
	<div class="map-holder">
		<a href="#" class="close js-close-map">X</a>
	 	<div id="map-events"></div>
	</div>
	 <a href="#" class="button js-open-map">Voir la carte des événements</a>
	

</article>


