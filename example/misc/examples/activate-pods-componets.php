<?php
/**
 * Ensure certain Pods components are active.
 *
 * NOTE: This must get hooked to an action in order to run. 'init' works, but then it will run on every page load.
 * This is probably best run in an activation hook for a Pods-dependent plugin/ theme.
 */

function slug_enable_pods_componets() {
	$component_settings = PodsInit::$components->settings;
	$component_settings['components']['table-storage'] = array();
	$component_settings['components']['advanced-relationships'] = array();
	$component_settings['components']['migrate-packages'] = array();
	$component_settings['components']['advanced-content-types'] = array();

	update_option( 'pods_component_settings', json_encode($component_settings));

}