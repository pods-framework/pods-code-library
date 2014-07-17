<?php
/**
 * The template for displaying all single posts.
 *
 * @package pods_s
 */

pods_s_get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) :
				//Build pods object for current item or return false if no Pod for this content type
				$pods = pods( null, get_the_ID(), true );

				//get name of pod
				if ( $pods ) {
					$pod_name = pods_s_get_content_type( true );
					$pod_name = pods_v( 'specific_type', $pod_name, false, true );
				}


				while ( have_posts() ) : the_post();
					//test if we have a valid Pods object.
					if ( $pods and $pod_name ) {
						//Output template of the same name as Pod, if such a template exists.
						//if it doesn't output template part
						$temp = $pods->template( $pod_name) ;
						if ( isset($temp)  ) {
							echo $temp;
						}
						else {
							pods_s_get_template_part( 'content', pods_s_part_by_post_type(), compact( array( 'pods' ) ) );
						}
					}
					else {
						pods_s_get_template_part( 'content', pods_s_part_by_post_type() );
					}

				pods_s_post_nav(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
			?>

		<?php
				endwhile; // end of the loop.
			endif; //have_posts
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php pods_s_get_sidebar(); ?>
<?php pods_s_get_footer(); ?>
