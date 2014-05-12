<?php
/**
 * Get diffrent URL segment if in a local environment with a diffrent directory structure.
 *
 * In local wp-config set: define( 'LOCAL_ENV', true );
 */

$pod_name = pods_v( 0, 'url' );
$slug = pods_v( 1, 'url' );
if ( defined( 'LOCAL_ENV' )  && LOCAL_ENV ) {
	$pod_name = pods_v( 1, 'url');
	$slug = pods_v( 2, 'url' );
}

$pods = pods( $pod_name, $slug );
