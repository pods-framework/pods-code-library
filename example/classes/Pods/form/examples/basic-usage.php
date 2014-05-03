<?php
$mypod = pods( 'mypod' );

// Output a form with all fields 
echo $mypod->form();


// Only show the 'name', 'description', and 'other' fields. 
$fields = array( 'name', 'description', 'other' );

// Override the options of a specific field 
$fields = array( 'name', 'description' => array( 'type' => 'paragraph', 'label' => 'Special Label' ), 'other' );

//set default value for fields 
$params = array( 'lightsaber_color' => array( 'default' => 'green' ) , array( 'sith_or_jedi'=> array( 'default' => 'jedi' )  )  );
echo $mypod->form( $params );

// Output a form with specific fields 
echo $mypod->form( $fields );


// Edit an item (shorthand) 
$mypod = pods( 'mypod', $id );

// Output an edit form with all fields 
echo $mypod->form();


// Edit an item (shorthand) 
echo pods( 'mypod', $id )->form();


// Output a form with specific fields, custom label, and thank you URL  
// (with ID passed into it) 
echo $mypod->form( $fields, 'Submit', '/thank-you-for-submitting/?new_id=X_ID_X' );