<?php
	if ( have_posts() ) :
		/**Get all of the data about the author from the WordPress and Pods generated user profile fields.**/
		//First get the_post so WordPress knows who's author page this is
		the_post();
		//get the author's meta data and store in array $user
		$user = get_userdata( get_the_author_meta('ID') );
		//Escape all of the meta data we need into variables
		$name = esc_attr($user->user_firstname) . '&nbsp;' . esc_attr($user->user_lastname);
		$title = esc_attr($user->title);
		$email = esc_attr($user->user_email);
		$phone = esc_attr($user->phone_number);
		$street_1 = esc_attr($user->street_address_line_1);
		$street_2 = esc_attr($user->street_address_line_2);
		$city = esc_attr($user->city);
		$state = esc_attr($user->state);
		$zip = esc_attr($user->zip_code);
		$website = esc_url($user->user_url);
		$twitter = esc_url($user->twitter);
		$linkedin = esc_url($user->linkedin);
		?>
	<article>
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'User Profile', 'twentytwelve' ); ?></h1>
		</header>

		<div class="author-info">
			<h2><?php echo $name; ?></h1>
				<div class="author-avatar">
					<?php echo '<a href="' . pods_image_url( $user->picture, 'large') . '">' . pods_image ( $user->picture, 'thumbnail') . '</a>';
					?>
				</div><!-- .author-avatar -->
				<div class="author-description">
					<p><strong><?php _e('Email:', 'twentytwelve'); ?></strong> <?php echo '<a href="mailto:' . $email . '">' . $email . '</a>'; ?></p>
					<p><strong><?php _e('Phone:', 'twentytwelve'); ?></strong> <?php echo $phone; ?></p>
					<div><p><strong><?php _e('Address:', 'twentytwelve'); ?> </strong></p>
						<?php echo
							'<p>' . $street_1 . '</p>' .
							'<p>' . $street_2 . '</p>' .
							'<p>' . $city . ', ' . $state . ' ' . $zip . '</p>';
						?></div>
					<p><strong><?php _e('Website:', 'twentytwelve'); ?></strong> <?php echo '<a href="' . $website . '">' . $website . '</a>'; ?></p>
					<p><strong><?php _e('Twitter:', 'twentytwelve'); ?></strong> <?php echo '<a href="' . $twitter . '">' . $twitter . '</a>'; ?></p>
					<p><strong><?php _e('LinkedIn:', 'twentytwelve'); ?> </strong> <?php echo '<a href="' . $linkedin . '">' . $linkedin . '</a>'; ?></p>
				</div><!-- .author-description	-->
		</div><!-- .author-info -->
	</article>
<?php endif; //have_posts() ?>
