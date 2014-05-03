<?php
//create Pods object for single item using variable $id
$pod = pods( 'pod_name', $id );

//duplicate it
$duplicated = $pods->duplicate();

//new Pods object for new item
$pod = pods( 'pod_name', $duplicated );