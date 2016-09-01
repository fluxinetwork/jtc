<?php

// DEV
define('THEME_DIR_NAME', 'jtc');
define('THEME_DIR_PATH', get_template_directory_uri());
define('DEV', true);
define('ADMIN_STYLE', true);
define('EDITOR_STYLE', false);

// VALUES
define('POST_EXCERPT_LENGTH', 40);
define('GOOGLE_ANALYTICS_ID', '');
define('GOOGLE_MAP_API_KEY', 'AIzaSyDWdjumGHjHMCCjx962HCWjj8lmWZ-qb3w');
/* ACF Google Maps */
function wpc_acf_init() {
	acf_update_setting('google_api_key', GOOGLE_MAP_API_KEY);
}
add_action('acf/init', 'wpc_acf_init');



// ACTIVATE
define('PAGE_EXCERPT', false);
define('ACF_OPTION_PAGE', true);
define('ADD_THUMBNAILS', false);
define('CUSTOM_POST_TYPE', true);
define('CUSTOM_TAXONOMY', true);
define('DISALLOW_FILE_EDIT', true);

// MAILS
define('CONTACT_GENERAL', 'contact@transitioncitoyenne.org');
define('CONTACT_CELINE', 'celine.provost@transitioncitoyenne.org');

/**
 * Custom post type & taxonomy
 */

if ( CUSTOM_POST_TYPE ) {
	

	// CPT : Événements
	function cpts_evenements() {
		$labels = array(
			'name' => __( 'Événements', '' ),
			'singular_name' => __( 'Événement', '' ),
			);

		$args = array(
			'label' => __( 'Événement', '' ),
			'labels' => $labels,
			'description' => '',
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => false,
			'rest_base' => '',
			'has_archive' => false,
			'show_in_menu' => true,
			'exclude_from_search' => false,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'rewrite' => array( 'slug' => 'evenements', 'with_front' => true ),
			'query_var' => true,

			'supports' => array( 'title', 'author' ),
			'taxonomies' => array( 'category', 'post_tag' ),
		);
		register_post_type( 'evenements', $args );

	}
	add_action( 'init', 'cpts_evenements' );	


}
if ( CUSTOM_TAXONOMY ) {
	//fluxi_register_custom_taxo('filtres', 'Filtres', array('offres-emploi'), false);
}


/**
 * Add excerpt to pages
 */

if ( PAGE_EXCERPT ) {
	function add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}
	add_action( 'init', 'add_excerpts_to_pages' );
}


/**
 * Add post thumbnail
 */

if ( ADD_THUMBNAILS ) {
	function add_post_thumb() {
		add_theme_support( 'post-thumbnails', array('post','page') );
	}
	add_action('after_setup_theme', 'add_post_thumb');
}


/**
 * Activate ACF option page
 */

if ( ACF_OPTION_PAGE && function_exists('acf_add_options_page') ) {
	$parent = acf_add_options_page(array(
		'page_title'    => 'Options',
		'menu_title'    => 'Options',
		'menu_slug'     => 'options-generales',
		'capability'    => 'edit_posts',
		'redirect'      => true
	));

	acf_add_options_sub_page(array(
		'page_title'    => 'Formulaires',
		'menu_title'    => 'Formulaires',
		'menu_slug'     => 'formulaires',
		'parent_slug'   => $parent['menu_slug'],
	));
}


