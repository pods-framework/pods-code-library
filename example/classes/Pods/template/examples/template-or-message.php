<?php
/**
 * Output all items using a template or no content found message.
 */
$params = array( 'limit' => -1 );
$pods = pods( 'pod_name', $params );

if ( $pods->total() > 0 ) {
	while( $pods->fetch() )  {
		//get the template
		$temp = $pods->template( 'name of template' );

		//output template if it exists
		if ( isset( $temp )  ) {
			echo $temp;
		}
	}

	//pagination
	echo $pods->pagination();
}
else {
	echo 'No content found.';
}
