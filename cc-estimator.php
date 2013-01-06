<?php
/*
Plugin Name: CloudCandle Savings Estimator
Description: Estimates the potential savings of moving IT into the cloud
Version: 0.1
Author: Martin Danner
Author URI: http://arrowrock.com
Plugin URI: http://arrowrock.com/cc-estimator
License: c2013 Arrowrock Ltd All Rights Reserved
*/

/**
 * Define some useful constants
 **/
define('CC_ESTIMATOR_VERSION', '1.0');
define('CC_ESTIMATOR_DIR', plugin_dir_path(__FILE__));
define('CC_ESTIMATOR_URL', plugin_dir_url(__FILE__));

/**
 * Load files
 * 
 **/
function cc_estimator_load(){
		
    if(is_admin()) //load admin files only in admin
        require_once(CC_ESTIMATOR_DIR.'includes/admin.php');
        
    require_once(CC_ESTIMATOR_DIR.'includes/core.php');
}

function cc_estimator_activation() {
    
	//actions to perform once on plugin activation go here    
    
	
    //register uninstaller
    register_uninstall_hook(__FILE__, 'cc_estimator_uninstall');
}

function cc_estimator_deactivation() {
    
	// actions to perform once on plugin deactivation go here
	    
}

function cc_estimator_uninstall(){
    
    //actions to perform once on plugin uninstall go here
	    
}

//function cc_run_estimator($atts) {
//    // Implements shortcode: 'wp-estimator'
//    extract(shortcode_atts(array('name' => null,), $atts));
//    if ($name == null)
//        $return_string = 'Hello World!<br />';        
//    else
//        $return_string = 'Hello '.$name.'!<br />';
//    
//    return $return_string;
//}

function cc_run_estimator($atts) {
    
//    // Implements shortcode: 'wp-estimator'
//    extract(shortcode_atts(array('name' => null,), $atts));

    if (cc_isPostBack())
    {
        $return_string = cc_process_form();
    }
    else
    {
        $return_string = cc_display_form();
    }
    
    return $return_string;
}

function register_shortcodes(){
    // Create a shortcode to say Hello World!
   add_shortcode('cc-estimator', 'cc_run_estimator');
}

// Main 
cc_estimator_load();

// Activation, Deactivation and Uninstall Functions
register_activation_hook(__FILE__, 'cc_estimator_activation');
register_deactivation_hook(__FILE__, 'cc_estimator_deactivation');

// Add actions
add_action( 'init', 'register_shortcodes');

?>
