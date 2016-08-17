<?php
/**
 * The template part for displaying the content
 */

$count_events = wp_count_posts('evenements');

?>

<article>

	<header><h1>Les <?php echo $count_events->publish; ?> événements</h1></header>

	 <div id="map-events"></div>
	

</article>


