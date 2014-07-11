<?php
/**
 * Pods::templates() runs its own fetch loop. If you do not take this into account you will loose the first item from your loop.
 *
 * Here are two ways to address this
 */
$pod = pods( 'recipe' );

echo $pod->filters( array(
	'fields' => array( 'recipe_category' ),
	'label'  => 'Filter'
) );

$pod->find();

/**
 * Option #1 - Reset $pod->id manually
 */
while ( $pod->fetch() ) {
	// Set 'id' so it thinks it's a single item
	// and won't fetch() loop in template()
	$pod->id = $pod->id();

	// template() automatically runs a loop of it's own if ->id is empty
	// ->id is only set when using pods( 'pod_name', $id )
	echo $pod->template( 'recipe_list' );
}

/**
 * Option #2 Let Template loop for you.
 */
echo $pod->template( 'recipe_list' );
