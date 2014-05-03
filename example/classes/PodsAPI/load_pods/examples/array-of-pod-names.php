<?php
/**
 * Get name of pods into an array
 */
//get only taxonomy and post_type pods
//See: http://pods.io/tutorials/creating-pods-plugins/creating-automatic-template-plugin/
$the_pods = pods_api()->load_pods( array(
		'type' => array(
			'taxonomy',
			'post_type'
		),
		'names' => true )
);

//get only ACT Pods
$the_pods = pods_api()->load_pods( array(
		'type' => array(
			'pod'
		),
		'names' => true )
);