<?php
/**
 * Override which file is used to create admin page for settings Pod.
 */
add_filter( 'pods_view_alt_view', 'slug_settings_view_redirect', 10, 2 );
function slug_settings_view_redirect( $filter_check, $view ) {

	//check if view path being loaded is for settings Pod admin
	if ( $view === PODS_DIR . 'ui/admin/form-settings.php' ) {

		//if so, return a file, in this example one in current plugin
		return plugins_url( 'settings-pod-admin.php', __FILE__ );

	}

}
