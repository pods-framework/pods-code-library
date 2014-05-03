<?php
/**
 * Output Pods object for current item as json array
 */
//This is based on a tutorial by Markus Stefanko: http://blog.stefanxo.com/2013/08/output-json-with-pods/

//get current url
$slug = pods_var( 'last', 'url' );
//get pods object for current item
$pods = pods( 'pod_name', $slug );

//use pods::export to prepare data ($output_data)
$single_data = $pods->export();
//do the json encode or output error in event $output_data is empty.
if ( $pods->exists() ) {
	die(json_encode($single_data));
}
else {
	die(json_encode(array('error' => 'Sorry, no item exists.')));
}


/**This time encode all items in the pod**/
//set up pods::find parameters to get all items in Pod in ascending order of name field.
$params = array(
	'orderby' => 't.name asc',
	'limit' => -1
);
$pods = pods( 'pod_name' , $params );

$all_data = $pods->export_data();

if ( !empty( $all_data ) ) {
	die(json_encode($all_data));
}
else {
	die(json_encode(array('error' => 'No cars found.')));
}
?>