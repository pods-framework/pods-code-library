<?php
/**
 * Will output form fields without the rest of the form markup.
 */
$pods = pods( 'jedi' );
$params = array( 'fields_only' => true, 'fields' => 'side_of_force', 'lightsaber_color' );
echo $pods->form( $params );