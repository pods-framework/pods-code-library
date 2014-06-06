<ul>
	<?php
		$users = new WP_User_Query(array(
			'meta_key'=>'last_name',
			'orderby'=>'meta_value',
			'fields'=>'all_with_meta'
		));

		if ( ! empty( $users->results ) ) {
			foreach ( $users->results as $user ) {
				echo '<li><a href="' . esc_url( get_author_posts_url($user->ID) ) . '">' . esc_attr( $user->last_name ) . ', ' . esc_attr( $user->first_name ) . '</a></li>';
			}
		}
		else {
			echo 'No users found.';
		}
	?>
</ul>
