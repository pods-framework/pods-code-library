<?php
/**
 * By default Pods::form() outputs all fields of the current content type. If it is a post type Pod that includes all default fields, such as 'post_content'.
 *
 * This is a shortcut to getting just the Pods-defined fields in your form.
 */

//get Pods object
$pods = pods( 'POD_NAME' );

//get the names of all fields into an array
//$pod->fields returns array of ['field_name'] => [ 'field_definition' ]
$fields =  array_keys( $pods->fields()  );

//setup params for form, add other options as needed
$params = array(  'fields' => $fields  );

//output the form
echo $pods->form(  $params );
