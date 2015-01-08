<?php
/**
* WordPress stores all meta fields LONGTEXT, which means that sorting by number or date fields requires casting.
*
* This example illusttrates ordering a custom post type Pod, by a date field.
*
* Note: This is <em>not</em> an issue with Pods using table storage.
*
* For an example of how to order by a number field, see:
* https://github.com/pods-framework/pods-code-library/blob/master/example/classes/Pods/find/examples/orderby-number.php
*/

$params = array(
  'orderby' => 'CAST( event_start_date.meta_value AS DATE )'
  'limit' => -1
);

$pods = pods( 'events', $params ) );

if ( $pods->total() > 0 ) {
  while( $pods->fetch() ) {
  	$start_date = $pods->display( 'event_start_date' );
  }
  
}
