<?php
/**
 * Register the required plugins for this theme.
 * @package   mishie
 * @copyright Copyright (c) 2014 Mignon Style
 * @license   GNU General Public License v2.0
 * @since     mishie 1.1.7
 */

/**
 * ------------------------------------------------------------
 * 1.0 - TGM Plugin Activation
 * ------------------------------------------------------------
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

get_template_part( 'admin/inc/class-tgm-plugin-activation' );
add_action( 'tgmpa_register', 'mishie_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */

function mishie_register_required_plugins() {
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin pre-packaged with a theme.
		array(
			'name'     => 'MS Custom Login',
			'slug'     => 'ms-custom-login',
			'required' => false,
		),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */

	$message_strings = '<div class="wrap tgm-message"><p></p><p>'. esc_html__('"MS Custom Login" is the plugin to customize the login page of WordPress.', 'mishie' ). '<br />';
	$message_strings .= esc_html__('This plugin includes a special edition that can the login page of the same design as WordPress Theme "mishie".', 'mishie' ).'</p><p></p></div>';

	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => $message_strings,                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Recommend Plugins', 'mishie' ),
			'menu_title'                      => __( 'Recommend Plugins', 'mishie' ),
			'installing'                      => __( 'Installing Plugin: %s', 'mishie' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'mishie' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'mishie' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'mishie' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'mishie' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'mishie' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'mishie' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'mishie' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'mishie' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'mishie' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'mishie' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'mishie' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'mishie' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'mishie' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'mishie' ), // %s = dashboard link.
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}