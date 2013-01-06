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
 * Actions to perform every time the plugin is loaded
 */
function cc_estimator_load(){
		
    if(is_admin()) //load admin files only in admin
        require_once(CC_ESTIMATOR_DIR.'includes/admin.php');
        
    require_once(CC_ESTIMATOR_DIR.'includes/core.php');
}

/**
 * Actions to perform once on plugin activation
 */
function cc_estimator_activation() {
	
    //register uninstaller
    register_uninstall_hook(__FILE__, 'cc_estimator_uninstall');
}

/**
 * Actions to perform once on plugin deactivation
 */
function cc_estimator_deactivation() {
    
	// actions to perform once on plugin deactivation go here
	    
}

/**
 * Actions to perform once on plugin uninstall
 */
function cc_estimator_uninstall(){
    
    // actions to perform once on plugin uninstall go here
    // This routine should remove all traces of the plugin from the
    // database and file system.
	    
}

/**
 * Implements shortcode: [cc-estimator]
 * @param type $atts An array of parameters included with the shortcode, e.g., [cc-estimator foo="5"]
 * @return type string The HTML to be inserted where the shortcode is specified on a page or post
 */
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

/**
 * Registers with WordPress any shortcodes associated with this plugin
 */
function register_shortcodes(){
    
    // This is the shortcode used to insert the estimator on a WordPress page or post
    add_shortcode('cc-estimator', 'cc_run_estimator');
}

/**
 * This is the main routine call by WordPress
 */
cc_estimator_load();

// Register with WordPress the activation and deactivation hooks for this plugin
register_activation_hook(__FILE__, 'cc_estimator_activation');
register_deactivation_hook(__FILE__, 'cc_estimator_deactivation');

// Register with WordPress the shortcodes implemented by this plugin
add_action( 'init', 'register_shortcodes');

?>
