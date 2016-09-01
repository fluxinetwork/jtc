<?php
/**
 * Load JSON for Google map
 * Must active admin-ajax.php in scripts.php
 */
function get_json_map(){

	$county = 0;

	// Build GeoJSON feature collection array
	$geojson = array(
	   'type'      => 'FeatureCollection',
	   'features'  => array()
	);

	// Request
	$args = array(
		'post_type' => 'evenements',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			// Index
			$county++;
			// Location
			$location = get_field('localisation');
			if( !empty($location) ){
				$latitude = $location['lat'];
				$longitude = $location['lng'];
			}

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

			// Json structure
			$feature = array(
		        'id' => $county,
		        'type' => 'Feature', 
		        'geometry' => array(
		            'type' => 'Point',
		            'coordinates' => array($longitude, $latitude)
		        ),
		        // Other attribute columns
		        'properties' => array(
		            'titre' => '<h2 class="bub__title">' . get_the_title() . '</h2>',
		            'date' => '<p class="bub__date">' . $date_output . '</p>',		            
		            'permalink' => '<a class="bub__button" href="'.get_the_permalink().'">En savoir plus</a>'
		        )
		    );
		    // Add feature arrays to feature collection array
		    array_push($geojson['features'], $feature);

		endwhile;
	endif;
	
	// Output JSON
	wp_send_json($geojson);

    wp_reset_postdata();
}

add_action('wp_ajax_nopriv_get_json_map', 'get_json_map');
add_action('wp_ajax_get_json_map', 'get_json_map');

