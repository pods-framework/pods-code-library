<?php
/**
 * Output all images from a multi-select image field
 */
//If using in a Pods template skip this line, which presumes this is being used inside the main WordPress loop in a theme template file.
$obj = pods( 'POD_NAME', get_the_id() );

$photos = $obj->field( 'photos' );

foreach ( $photos as $photo ) {
	echo '<img src="'.pods_image( $photo ).'" /><br />';
}
