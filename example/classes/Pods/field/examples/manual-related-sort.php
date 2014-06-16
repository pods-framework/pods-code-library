<?php
/**
 * Get items related to current custom post type, sort by post title, then output as title linking to post.
 */
while ( have_posts() ) : the_post();
	//get Pods object for current post
	$pod = pods( 'author', get_the_id() );
		//get the value for the relationship field
		$related = $pod->field( 'books' );

		//loop through related field, building array of [post_title] => [ID] to sort
		if ( ! empty( $related ) ) {
			foreach ( $related as $rel ) {
				//get id for related post and put in ID
				$id = $rel[ 'ID' ];
				//get title
				$post_title = get_the_title( $id );
				//add to $related_items array
				$related_items[ $post_title ] = $id;

			} //end of foreach


			//sort results by post_title
			$related_items = ksort( $related_items );

			//output titles as links
			foreach ( $related_items as $title => $id ){
				echo '<a href="'.get_permalink( $id ).'">'.$title.'</a><br />';
				//BTW You can use $id here with get_post_meta() to show custom fields
			}

		} //endif ! empty ( $related )
endwhile;
