<?php
/*
 * Customizing the fields on various content management screens Programmatically exclude or customize the fields listed on the add, edit, and manage ui screens
 *
 * See: http://lowgravity.pl/blog/introduction-to-podscms-2-0-part-2-pods_ui-parameters/
 */
$object = pods('name_of_pod');
$fields = array();

// iterate through the fields in this pod 
foreach($object->fields as $field => $data) {
	$fields[$field] = array('label' => $data['label']);
}

// exclude a specific field by field name 
unset($fields['field_name']);

// customize the label for a particular field 
$fields['field_name'] = array( 'label' => 'some_different_label');

// hide some fields on edit screen but still have them on the add screen 
$edit_fields = $fields;
unset($edit_fields['field_name']);

// fields visible on manage screens 
$manage_fields = array('few', 'manage', 'fields');

$object->ui = array(
	'fields' => array(
		'add' => $fields,
		'edit' => $edit_fields,
		'manage' => $manage_fields,
	),
	//other parameters
);

pods_ui($object);