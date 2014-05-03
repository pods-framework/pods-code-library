<?php
/**
 * See: http://pods.io/tutorials/partial-page-caching-smart-template-parts-pods/
 */
/**
 * Most Commented On Posts Loop with caching
 */
$args = array(
	'date_query'          => array(
		//set date ranges with strings!
		'after' => '1 week ago',
		'before' => 'today',
		//allow exact matches to be returned
		'inclusive'         => true,
	),
	'orderby' 		=> 'comment_count',
	'order'	 		=> 'DESC',
	'posts_per_page'        => '5',
	'paged'			=> '1',
);
$query = new WP_Query($args);
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		get_template_part( 'content', 'hot' );
	endwhile;
endif;
wp_reset_postdata();

/**Standard WP Loop Cached**/
//loop itself moved to a tempalte part
pods_view( 'loop-main.php', null, HOUR_IN_SECONDS );

//cache sidebar and footer as well
pods_view( 'sidebar.php', null, HOUR_IN_SECONDS);
pods_view( 'footer.php', null, DAY_IN_SECONDS);

/**
 * Create current user specific view and cache it.
 */
//check if user is logged in
if ( is_user_logged_in() ) {
	//get current user ID
	$current_user = wp_get_current_user();
	$id = $current_user->ID;
	//get favorite categories
	//Presumes users is extended with 'favorite_category_1' and 'favorite_category_2' fields
	$cat1 = get_user_meta($id, 'favorite_category_1' true);
	$cat2 = get_user_meta($id, 'favorite_category_2' true);
		//skip if both fields are empty
		if ( !empty($cat1) && !empty($cat2) {
			$args = array (
				'relation' => 'OR',
				array(
					'category_name'   => $cat1,
				),
				array(
					'category_name'  	=> $cat2,
				)
			);
			$query = new WP_Query($args);
			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'content' get_post_format() );
				endwhile;
			endif;
			wp_reset_postdata();
		} //endif fields !empty
} //endif user is logged in


/**Standard WP Loop Cached**/
//loop itself moved to a tempalte part
pods_view( 'loop-main.php', null, HOUR_IN_SECONDS );

//cache sidebar and footer as well
pods_view( 'sidebar.php', null, HOUR_IN_SECONDS);
pods_view( 'footer.php', null, DAY_IN_SECONDS);

/**
 * Different Pods loop if current user is logged in.
 */
//create pods object without find, for now
$pods = pods('pod_name');

//check if user is logged in
if ( is_user_logged_in() ) {
	//get current user ID

	$current_user = wp_get_current_user();
	$id = $current_user->ID;

	//run find to get posts that have value of field related to users equal to current user
	$data = $pods->find(
		'WHERE' => "'related_user.id' = $id ",
			'LIMIT' => 5,
		);

		//Pass $data to a loop in a template without caching, since this is user specific
		pods_view('loop.php', $data, false, false);

		//reset pods object for saftey's sake
		$pods->reset();
} //endif user is logged in

//run find again, with no concern for related user field
$data = $pods->find( 'LIMIT' => 5 );

//pass $data to loop template again, this time with caching
pods_view('loop.php', $data, HOUR_IN_SECONDS, 'transient');