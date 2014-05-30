<?php
/**
 * Assuming a permalink structure of /{@pod_name}/{@permalink} pods_v() can be used to populate Pods objects for diffrent Pods.
 */

//get current item name
$slug = pods_v( 'last', 'url' );

//get current pod name
$pod_name = pods_v( 0, 'url');

//get pods object
$pods = pods( $pod_name, $slug );
