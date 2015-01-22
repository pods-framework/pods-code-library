<?php
/**
* Get a field's label and value.
*/
$pods = pods( 'sandwiches' );

echo $pod->fields( 'toppings', 'label' ).": ".$pod->display('toppings');
