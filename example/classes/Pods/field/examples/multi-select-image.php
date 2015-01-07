<?php
/**
* Output alll images in a multi-select image field
*/

	//build Pods object for item 42
	$pods = pods( 'cpt_name', 42 );

		//get image field
	$images = $pods->field( 'images' );

	foreach ( $images as $image ) {
		//get image ID
		$id = $image[ 'ID' ];

		//get image source and trributes
		$img = wp_get_attachment_image_src( $id, 'large' );

		//output image
		echo '<img src="'.esc_url( $img[0] ).'" width="'.esc_attr( $img[1] ).'" width="'.esc_attr( $img[2] ).'" />';

	}
	
