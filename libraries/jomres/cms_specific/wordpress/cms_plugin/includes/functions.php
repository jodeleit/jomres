<?php

/**
 * The Jomres public-facing functionality.
 *
 * Defines the plugin name, version.
 *
 * @package Jomres\Core\CMS_Specific
 *
 * @author	 Vince Wooll <support@jomres.net>
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/jomres-activator.php
 */
function activate_jomres() {
	require_once plugin_dir_path( __FILE__ ) . 'jomres-activator.php';
	Jomres_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/jomres-deactivator.php
 */
function deactivate_jomres() {
	require_once plugin_dir_path( __FILE__ ) . 'jomres-deactivator.php';
	Jomres_Deactivator::deactivate();
}

/**
 * Begins Jomres execution.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since	9.9.19
 */
function run_jomres() {

	$wp_jomres = WP_Jomres::getInstance();
	$wp_jomres->run();

	if ( isset( $_GET['page'] ) && $_GET['page'] == 'jomres/jomres.php' ) {
		echo $wp_jomres->get_content();
	}
}

/**
 * Check if Jomres is installed and updated.
 *
 * Checks if Jomres is installed and updated. If it`s not, 
 * install or update it.
 *
 * @since	9.9.19
 */
function jomres_is_installed_and_updated() {

	global $wpdb;

	$jomres_wp_plugin_version = get_option( 'jomres_wp_plugin_version', '0' );

	if( version_compare( $jomres_wp_plugin_version, JOMRES_WP_PLUGIN_VERSION, '!=' ) ) {

		$result = $wpdb->query( 
			"SELECT `table_name` FROM information_schema.tables WHERE 
			`table_schema` = '".$wpdb->dbname."'
			AND (`table_name` LIKE '".$wpdb->prefix."jomres_%' 
			OR `table_name` LIKE '".$wpdb->prefix."jomcomp_%' 
			OR `table_name` LIKE '".$wpdb->prefix."jomresportal_%') " 
		);

		if ( empty( $result ) ) {
			if ( ! run_jomres_installer( 'install' ) ) {
				return false;
			}
		} else {
			if ( ! run_jomres_installer( 'update' ) ) {
				return false;
			}
		}
	}
	
	return true;
	
}

/**
 * Trigger Jomres.
 *
 * Triggers Jomres frontend or admin
 *
 * @since	9.9.19
 */
function trigger_jomres() {
	
	if ( isset( $_REQUEST[ 'jr_wp_source' ] ) ) {
		if ( $_REQUEST[ 'jr_wp_source' ] == 'admin' ) {
			jr_wp_trigger_admin();
		} else {
			jr_wp_trigger_frontend();
		}
	} else {
		if ( strpos( $_SERVER[ 'SCRIPT_FILENAME' ], 'wp-admin' ) > 0 ) {
			jr_wp_trigger_admin();
		} else {
			jr_wp_trigger_frontend();
		}
	}

}

/**
 * Trigger Jomres frontend.
 *
 * Triggers Jomres frontend
 *
 * @since	9.9.19
 */
function jr_wp_trigger_frontend() {
	
	require_once ABSPATH . JOMRES_ROOT_DIRECTORY . '/jomres.php';
	
	// If it's an ajax call, we need to die when Jomres has done it's stuff
	if ( isset( $_REQUEST[ 'jrajax' ] ) && (int) $_REQUEST[ 'jrajax' ] == 1 ) {
		die();
	}

}

/**
 * Trigger Jomres admin.
 *
 * Triggers Jomres admin and installs or update Jomres if needed
 *
 * @since	9.9.19
 */
function jr_wp_trigger_admin() {
	
	global $current_user;
	
	$user_roles = $current_user->roles;
	$user_role = array_shift( $user_roles );
	$role = trim( $user_role );
	
	if ( $role == 'administrator' && jomres_is_installed_and_updated() ) {
		require_once ABSPATH . JOMRES_ROOT_DIRECTORY . '/admin.php';
	}
	
	// If it's an ajax call, we need to die when Jomres has done it's stuff
	if ( isset( $_REQUEST[ 'jrajax' ] ) && (int) $_REQUEST[ 'jrajax' ] == 1 ) {
		die();
	}
}


/**
 * Show error messages.
 *
 * Utility function to display error messages
 *
 * @since	9.9.19
 */
function jomres_notice( $notice ) {
	printf(
		'<div class="notice notice-error is-dismissible"><p><strong>%s</strong></p></div>',
		esc_html( $notice )
	);
}


