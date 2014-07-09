<?php
/**
 * Loads a template from theme directory (in sub-folder called 'pods-templates') if it exists.
 *
 * For example if called via $pods->template( 'foo.php'); or [pods template="foo.php"] and "foo.php" exists in theme's "pods-templates" directory, contents of "foo.php will be used as the template.
 *
 */
add_filter( 'pods_templates_pre_template', 'SLUG_load_template', 10, 3 );
function SLUG_load_template( $out, $code, $template_name ) {
	if ( false !== ( $template = file_get_contents( file_get_contents( trailingslashit( get_stylesheet_directory() ) ."pods-templates/{$template_name}" ) ) ) ) {
		$code = $template;
	}

	return $code;

}
