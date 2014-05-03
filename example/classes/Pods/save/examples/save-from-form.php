<?php
/**
 * You can add an image to a image field using pods::save() by passing the file path or the URL for the image.
 *
 * IMPORTANT: Always sanitize user submitted data.
 */
//get URL of image from form input
$img = $_POST[ 'image' ];
//get ID of item from form input
$id = $_POST[ 'item_id' ];

//create array of data to be added
//You can add additional fields here if you want
$data = array(
	'image_field'  => $img ,
);
//get pods object for item of ID $id
$pod = pods( 'pod_name', $id );
//update the item and return item id in $item
$item = $pod->save( $data);