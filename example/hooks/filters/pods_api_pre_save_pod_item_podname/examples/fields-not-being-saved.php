<?php
/**
 * If updating Pod via the API, only the fields being saved will be available in the pre_save action's $pieces[ 'fields' ] index.
 *
 * This example shows you how to set the value of a second field, when only one is set via the API, using this code:
		$params = array( 'bipedal' => '1' );
		pods( 'aliens' )->add( $params );
 *
 * First we add the second field to the 'fields_active' array, and then we set its value. The second step would not work without the first, as $pieces[ 'fields' ][ 'number_of_legs' ] would not exist.
 */
add_filter( 'pods_api_pre_save_pod_aliens', 'pre_save_alien_legs' );
function pre_save_alien_legs( $pieces) {


		if ( 1 === $pieces[ 'fields' ][ 'bipedal' ][ 'value' ] ) {
			array_push ($pieces[ 'fields_active' ], 'number_of_legs' );
			$pieces[ 'fields' ][ 'number_of_legs' ][ 'value' ] = 2;
		}


	return $pieces;

}


