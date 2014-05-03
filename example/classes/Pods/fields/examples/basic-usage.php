<?php
/**
 * Get field arrays for a Pod item
 *
 */
//Set up Pods object for one item (set $id to specific item id)
$pods = pods( 'pod_name', $id );

//put whole field array in a variable
$fields = $pods->fields();

//put specific field in a variable
$field = $pods->fields( 'field_name' );

//put label for a field into a variable
$label = $pods->fields( 'field_name', 'label' );