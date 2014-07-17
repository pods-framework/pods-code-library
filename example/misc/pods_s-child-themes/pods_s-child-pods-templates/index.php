<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pods_s
 */

pods_s_get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) :
				//Build pods object for current page or return false if no Pod for this content type
				$pods = pods( null, pods_s_current_items_params(), true );

				//get name of pod
				if ( $pods ) {
					$pod_name = pods_s_get_content_type( true );
					$pod_name = pods_v( 'specific_type', $pod_name, false, true );
				}
		?>

		<?php
			while ( have_posts() ) : the_post();
				//test if we have a valid Pods object.
				if ( $pods and $pod_name ) {
					//fetch current post in loop
					$pods = $pods->fetch( get_the_ID() );
					//reset id
					$pods->id = $pods->id();

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
			?>

			<?php endwhile; ?>

			<?php pods_s_paging_nav(); ?>

		<?php else : ?>

			<?php pods_s_get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php pods_s_get_sidebar(); ?>
<?php pods_s_get_footer(); ?>
