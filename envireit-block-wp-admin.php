<?php

/*
Plugin Name: Envire.it Block Access to WP Admin
Plugin URI: https://www.envire.it
Description: Envire.it Block Access to WP Admin display a warning message if a user without 'edit_posts' permissions try to access to wp-admin.
Author: Sergio de Falco
Version: 1.1
Author URI: https://www.envire.it/
Text Domain: envireit-block-wp-admin
Domain Path: /languages/
License: GPL v3
*/

/**
 * Disable the Public message button since that this theme will directly display the form.
 *
 * @since Envire.it Block Access to WP Admin 0.1
 */
function envireit_block_wp_admin_init() {
	if ( is_user_logged_in() && is_admin() && ! current_user_can( 'edit_posts' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		
		do_action('admin_page_access_denied');
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
}
add_action( 'init', 'envireit_block_wp_admin_init' );