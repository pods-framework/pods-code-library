<?php
/*
Plugin Name: Pets Template
PluginURI: https://gist.github.com/Shelob9/7540721
Author: Josh Pollock
AuthorURI: http://JoshPress.net
*/
//Be sure to change 'pets' on line 6 and 9 to your cpt and template names.
function slug_pets_content_filter($content) {
	if ( get_post_type() == 'pets' ) {
		$obj = pods('pets', get_the_id() );
		return $obj->template('pets').$content;
	}
	return $content;
}
add_filter( 'the_content', 'slug_pets_content_filter' );

?>
