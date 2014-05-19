<?php
/**
 * You can add custom relationship objects quickly and easily. Add predefined lists, integrate with other plugins and their data, or do whatever you want just about! The custom relationships will appear in the 'Relate to' options for a Relationship Field. This is a simple example meant for basic key/value data.
 */
add_action( 'init', 'slug_add_my_related_objects' );

function slug_add_my_related_objects () {
	$options = array(
		'data' => array(
			1 => 'Option 1',
			2 => 'Option 2'
		)
	);

	pods_register_related_object( 'my-custom-relationship', 'My Custom Relationship', $options );

	$options = array(
		'data' => array(
			'male' => 'Male',
			'female' => 'Female',
			'not-specified' => 'Not Specified'
		)
	);

	pods_register_related_object( 'gender', 'Gender', $options );
}
