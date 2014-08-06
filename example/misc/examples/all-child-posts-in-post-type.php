<?php
/**
 * Get and output all posts in a post type that are children of another post in that post type
 */
$all = get_posts(array('post_type'=> 'sermon', 'posts_per_page' => -1));
$parents = array();
foreach ($all as $single)
{
	$kids = get_children($single->ID);
	if(isset($kids) && !empty($kids) && count($kids) >= 1)
	{
		$parents[] = $single->ID;
	}
}

$args = array('post_type' => 'sermon', 'posts_per_page' => 3, 'post_parent__in' => $parents );

$sermon = new WP_Query($args);
while ($sermon->have_posts() ) : $sermon->the_post();
	get_template_part( 'content', 'sermons' );
endwhile;
wp_reset_postdata();
