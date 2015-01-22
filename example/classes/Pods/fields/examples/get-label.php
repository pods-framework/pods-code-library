<?php
/**
* Get a field's label
*/
$pods = pods( 'sandwiches' );

echo $pod->fields( 'toppings', 'label' ).": ".$pod->display('toppings');
