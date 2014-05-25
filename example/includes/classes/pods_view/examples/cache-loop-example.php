<?php
/**
 * Caching individual parts of a WordPress loop template, a step-by-step example.
 */
/**
 * Most Commented On Posts Loop WITHOUT caching
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

/**
 * Template with parts cached individually.
 */
pods_view( 'header.php', null, DAY_IN_SECONDS);
//loop itself moved to a tempalte part
pods_view( 'loop-main.php', null, HOUR_IN_SECONDS );

//cache sidebar and footer as well
pods_view( 'sidebar.php', null, HOUR_IN_SECONDS);
pods_view( 'footer.php', null, DAY_IN_SECONDS);
