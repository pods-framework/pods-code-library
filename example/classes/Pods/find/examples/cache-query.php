<?php
/**
 * Pods find will automatically cache any pods::find() query, if a value is set in  $params['expires'].
 *
 * Once cached, any future queries, with the same parameters, will return cached value. The caching itself occurs in PodsData::select() using the PodsView class.
 *
 * Default cache type is 'object' for object cache, alternatively you may set $params['cache_mode'] to 'transient' or 'site_transient'. Object caching is not persistent by default in WordPress, consider using Pods Alternative Cache and/or a persistent object cache plugin
 *
 * @see PodsData::select()
 * @see http://wordpress.org/plugins/pods-alternative-cache/
 * @see http://codex.wordpress.org/Class_Reference/WP_Object_Cache#Persistent_Caching
 */


$params = array(
	//Use all normal pods::find() params
	'where' 	=> 'home_planet.meta_value = "Corellia" ',
	'limit' 	=> 20,

	//set expire time in seconds or using a time constant
	//http://codex.wordpress.org/Transients_API#Using_Time_Constants
	'expires' 	=> DAY_IN_SECONDS,
);

//build and use Pods object the same way as you always would
$pods = pods( 'jedi', $params );

