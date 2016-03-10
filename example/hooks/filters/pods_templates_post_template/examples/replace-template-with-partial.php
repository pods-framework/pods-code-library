<?php
/**
* Replace template content with a PHP partial
*/
add_filter( 'pods_templates_post_template', 'SLUG_after_template', 10, 4 );
function SLUG_after_template( $out, $code, $template_name, $pods ) {
	//only target a specific template or templates
	if( 'template-name' == $template_name ) {
	
	  //besure to set path -- relative to theme/child theme or absolute path in first argument
		$out = pods_view( 'path/to/partial.php', compact( array( 'pods' ), 360, 'cache', true );
	}
	
	return $out;
	
}
