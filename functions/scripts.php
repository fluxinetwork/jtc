<?php

/**
 * 01. STYLES
 * 02. SCRIPTS
 * 03. Google Analytics
 */


/**
 * 01 STYLES
 */

function enqueue_styles() {

    /* REGISTER */

    wp_register_style( 'css', THEME_DIR_PATH . '/app/css/main.css', array(), null );
    wp_register_style( 'css-min', THEME_DIR_PATH . '/app/css/main.min.css', array(), null );

    /* ENQUEUE */

    if ( DEV ) {
        wp_enqueue_style('css');
    } else {
        wp_enqueue_style('css-min');
    }

}
add_action('wp_enqueue_scripts', 'enqueue_styles', 100);


/**
 * Ajoute une feuille de style à l'admin
 */

function load_admin_style() {
	wp_enqueue_style( 'admin_css', THEME_DIR_PATH .'/app/css/admin-style.css', false, '1.0.0' );
}
if ( ADMIN_STYLE ) {
    add_action( 'admin_enqueue_scripts', 'load_admin_style' );
}

/**
 * Events Admin JS
 */

function script_admin_events( $hook ) {
    $screen = get_current_screen();
    
    if ( $screen->id != 'dashboard' ) {
        return;
    }
    
    wp_enqueue_script( 'admin-events', THEME_DIR_PATH . '/app/js/modules/admin-events.js', array( 'jquery' ) );

    $admin_events_nonce = wp_create_nonce( 'admin_events_nonce' );

    wp_localize_script( 'admin-events', 'ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => $admin_events_nonce ) );
}
add_action( 'admin_enqueue_scripts', 'script_admin_events' );


/**
 * Ajoute une feuille de style au MCE pour une mise en page équivalente au Front


function theme_add_editor_styles() {
    add_editor_style( THEME_DIRECTORY_PATH.'/app/css/editor-style.css' );
}
if ( EDITOR_STYLE ) {
    add_action( 'admin_init', 'theme_add_editor_styles' );
}
*/

/**
 * 02 SCRIPTS
 */

function enqueue_scripts() {

    /* REGISTER */

    wp_register_script( 'jQuery', THEME_DIR_PATH . '/app/js/vendors/jquery-1.11.3.min.js', array(), null, false );
    wp_register_script( 'imagesLoaded', THEME_DIR_PATH . '/app/js/vendors/imagesloaded.min.js', array(), null, true );
    wp_register_script( 'waypoint', THEME_DIR_PATH . '/app/js/vendors/base/waypoints.min.js', array(), null, true );
    wp_register_script( 'mousewheel', THEME_DIR_PATH . '/app/js/vendors/jquery.mousewheel.min.js', array(), null, true );
    wp_register_script( 'fitvids', THEME_DIR_PATH . '/app/js/vendors/base/jquery.fitvids.min.js', array(), null, true );
    wp_register_script( 'flexslider', THEME_DIR_PATH . '/app/js/vendors/jquery.flexslider.min.js', array(), null, true );

    // FORMS
    wp_register_script( 'form-validator', THEME_DIR_PATH . '/app/js/vendors/form-validator/jquery.form-validator.min.js', array(), null, true );
    wp_register_script( 'datetimepicker', THEME_DIR_PATH . '/app/js/vendors/datetimepicker/datetimepicker.js', array(), null, true );

    // EVENT
    wp_register_script( 'form-event', THEME_DIR_PATH . '/app/js/modules/form-event.js', array('jQuery', 'form-validator', 'datetimepicker', 'waypoint'), null, true );
    if( is_page_template( 'page-templates/page-manage-event.php' ) ){
        wp_localize_script( 'form-event', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) ); 
        wp_enqueue_script('form-event');      
    }
    
    // MAP
    wp_register_script( 'leaflet', THEME_DIR_PATH . '/app/js/vendors/leaflet/leaflet.js', array(), null, true );   
   

    // Main
    if( is_home() || is_page_template( 'page-templates/page-home.php' ) ):
        wp_register_script( 'main', THEME_DIR_PATH . '/app/js/main.js', array('jQuery', 'imagesLoaded', 'waypoint', 'mousewheel', 'fitvids', 'leaflet', 'flexslider'), null, true );
    else:
        wp_register_script( 'main', THEME_DIR_PATH . '/app/js/main.js', array('jQuery', 'mousewheel', 'waypoint'), null, true );
    endif;

    wp_register_script( 'full', THEME_DIR_PATH . '/app/js/full.min.js', array('jQuery'), null, true );


    /* ENQUEUE */

    if ( DEV ) {
        wp_localize_script( 'main', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_script('main');
    } else {
        wp_localize_script( 'full', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_script('full');
    }

}
add_action('wp_enqueue_scripts', 'enqueue_scripts', 100);


/**
 * 03 Google Analytics
 * UA-code is set in config.php
 */

function google_analytics() { ?>

    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>');ga('send','pageview');
    </script>

<?php }

if (GOOGLE_ANALYTICS_ID && GOOGLE_ANALYTICS_ID != '') {
  add_action('wp_footer', 'google_analytics', 20);
}
