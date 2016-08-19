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
		'post_status' => 'publish'
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
		            'titre' => get_the_title(),
		            'date' => get_field('date_event'),
		            'description' => get_field('descriptif_event'),
		            'adresse' => get_field('adresse'),
		            'cp' => get_field('code_postal'),
		            'ville' => get_field('ville'),
		            'depart' => get_field('departement'),
		            'lien' => get_field('link_event'),
		            'permalink' => '<a class="button" href="'.get_the_permalink().'">En savoir plus</a>'
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

