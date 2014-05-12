<?php
/**
 * Set image with the id of 179 as the default fallback image for pods_image()
 */
add_filter( 'pods_image_default', 'slug_pods_image_default_cb' );
function slug_pods_image_default_cb( $default ) {
	//Use the image with the id of 179 as fallback, if no other default is set.
	$default = 179;

	return $default;
	
}