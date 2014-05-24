<?php
/**
 * List posts, in a hierarchical CPT that have children.
 */
function pods_tutorial_series_lists() {
	if ( ! ( $parents_unique  = get_transient( 'pods_tutorials_series' ) ) ) {
		//query for all posts with parents
		$args = array(
			'post_type'           => 'tutorial',
			'post_parent__not_in' => array( 0 ),
			'posts_per_page' => -1,
		);
		$query = new WP_Query( $args );
		//loop to create IDs of post parents
		$parents = array();
		while ( $query->have_posts() ) {
			$query->the_post();
			$post = get_post($query->post->id);
			$parents[] = $post->post_parent;

		}
		//discard duplicates
		$parents_unique = array_unique($parents);
		set_transient( 'pods_tutorials_series', $parents_unique, WEEK_IN_SECONDS );
	}

	echo '<ul id="tutorial-series-list" class="tutorials-topics-list">';
	//loop though parent posts
	foreach ( $parents_unique as $series ) {
		?>
		<li><span class="dashicons dashicons-list-view tutorial-term-dashicon tutorial-series-dashicon"></span><a href="<?php echo get_permalink($series ); ?>"> <?php echo get_the_title($series); ?></a></li>
	<?php
	}
	echo '</ul>';
}
