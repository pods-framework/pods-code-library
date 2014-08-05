<?php
/**
 * Function, with caching, to export all items of a Pod as a serialized php array or JSON object
 *
 * @param string     $pod_name
 * @param bool 		$json
 *
 * @return bool|mixed|null|string|void
 */
function export_pod( $pod_name, $json = true ) { //be sure to set your Pod's name here

	//name the transient we are caching in for the Pod.
	$transient_name = "all_{$pod_name}_export";

	//check if we already have this data cached, if not continue
	if ( false === ( $export = pods_transient_get( $transient_name ) ) ) {

		//build Pods object, get all items
		$pods = pods( $pod_name, array ( 'limit' => -1 ), true  );


		//if we have items, loop through them, adding each item's complete row to the array
		if ( $pods && $pods->total() > 0 ) {
			while ( $pods->fetch() ) {
				$export[ $pods->id() ] = $pods->row();

			}

		}

		if ( $json ) {
			$export = json_encode( $export );
		}
		else {
			$export = serialize( $export );
		}
		//cache for next time
		pods_transient_set( $transient_name, $export );
	}

	return $export;

}
