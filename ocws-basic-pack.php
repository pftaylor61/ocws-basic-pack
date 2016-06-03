<?php
/*
Plugin Name: OCWS Basic Pack
Plugin URI: http://oldcastleweb.com/pws/plugins
Description: This plugin adds all the basic plugins and info required for the OCWS Basic Pack.
Version: 0.8
Author: Paul Taylor
Author URI: http://oldcastleweb.com/pws/about
License: GPL2
Text Domain: ocws-basic-pack
GitHub Plugin URI: https://github.com/pftaylor61/ocws-basic-pack
GitHub Branch:     master
*/
/*  Copyright 2016  Paul Taylor  (email : info@oldcastleweb.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Initialize */
define("OCWSBP_VNUM", "0.3.1");
$ocwsbp_base_dir = dirname( __FILE__ );
$ocwsbp_base_url = plugins_url( '', __FILE__ );
$ocwsbp_content = "<p>The OCWS Basic Package consists of Wordpress, and a variety of plugins, specially chosen to make the site work easily. Also included in the OCWS Qohelet theme.</p>\n";
$ocwsbp_img_url = $ocwsbp_base_url."/images/castlelogo80x80.png";
$ocwsbp_content .= "<div style=\"float:right;\"><img src=\"".$ocwsbp_img_url."\" width=\"80\" height=\"80\" alt=\"Castle Logo\" title=\"Castle Logo\" /></div>\n";
define("OCWSBP_HEADER", "OCWS Basic Package (Version ".OCWSBP_VNUM.")");
define("OCWSBP_CONTENT", $ocwsbp_content);

$ocwsbp_base_dir = dirname( __FILE__ );

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ocwsbp__register_required_plugins' );



function ocwsbp__register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		
		// GitHub Updater
		// on GitHub (obviously)
		array(
			'name'      => 'GitHub Updater',
			'slug'      => 'github-updater',
			'source'    => 'https://github.com/afragen/github-updater/archive/develop.zip',
		),
		
		// GitHub link
		// on GitHub
		array(
			'name'      => 'GitHub Link',
			'slug'      => 'github-link',
			'source'    => 'https://github.com/szepeviktor/github-link/archive/master.zip',
		),
		
		// OCWS Admin Bar
		// on GitHub
		array(
			'name'      => 'OCWS Admin Bar',
			'slug'      => 'ocws-admin-bar',
			'source'    => 'https://github.com/pftaylor61/ocws-admin-bar/archive/master.zip',
		),
		
		// OCWS Admin Bar Greeting
		// on GitHub
		array(
			'name'      => 'OCWS Admin Bar Greeting',
			'slug'      => 'ocws-admin-bar-greeting',
			'source'    => 'https://github.com/pftaylor61/ocws-admin-bar-greeting/archive/master.zip',
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Login Logo',
			'slug'      => 'login-logo',
			'required'  => false,
		),

		

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'ocws-basic-pack',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'ocws-basic-pack' ),
			'menu_title'                      => __( 'Install Plugins', 'ocws-basic-pack' ),
			/* translators: %s: plugin name. */
			'installing'                      => __( 'Installing Plugin: %s', 'ocws-basic-pack' ),
			/* translators: %s: plugin name. */
			'updating'                        => __( 'Updating Plugin: %s', 'ocws-basic-pack' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'ocws-basic-pack' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). */
				'The OCWS Basic Pack requires the following plugin: %1$s.',
				'The OCWS Basic Pack requires the following plugins: %1$s.',
				'ocws-basic-pack'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'The OCWS Basic Pack recommends the following plugin: %1$s.',
				'The OCWS Basic Pack recommends the following plugins: %1$s.',
				'ocws-basic-pack'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'ocws-basic-pack'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). */
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'ocws-basic-pack'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'ocws-basic-pack'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'ocws-basic-pack'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'ocws-basic-pack'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'ocws-basic-pack'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'ocws-basic-pack'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'ocws-basic-pack' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'ocws-basic-pack' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'ocws-basic-pack' ),
			/* translators: 1: plugin name. */
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'ocws-basic-pack' ),
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'ocws-basic-pack' ),
			/* translators: 1: dashboard link. */
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'ocws-basic-pack' ),
			'dismiss'                         => __( 'Dismiss this notice', 'ocws-basic-pack' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'ocws-basic-pack' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'ocws-basic-pack' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		
	);

	tgmpa( $plugins, $config );
} // end function ocwsbp__register_required_plugins
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', OCWSBP_HEADER, 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo OCWSBP_CONTENT;
}


?>