<?php
/**
 * Template Name: Pods List
 *
 * This page template is designed for displaying list view of a Pods Advanced Content Type.
 * It requires a Pods Page set up for each Advanced Content type with the name "name_of_Pod/"
 *
 * @see http://pods.io/tutorials/choosing-pods-advanced-content-types-and-pods-pages/
 * @see http://pods.io/tutorials/using-pods-pages-advanced-content-types/
 *
 * @package pods_s
 */
get_header();
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
			//setup Pod object presuming permalink structure of example.com/pod-name/item-name

			//get current pod name
			$pod_name = pods_( 0, 'url');

			//set up parameters for Pods object
			$params = array(
			//use WordPress setting for posts per page
			'limit' => get_option( 'posts_per_page', 10 ),

			//add additional parameters here if needed

			);

			//get pods object
			$pods = pods( $pod_name, $params );

			?>
			<article>
				<?php
				if ( $pods->total() > 0 ) {
					while ( $pods->fetch() ) {
						//reset id
						$pods->id = $pods->id();

						//Output template of the same name as Pod, if such a template exists.
						$temp = $pods->template( $pod_name) ;
						if ( isset($temp)  ) {
							echo $temp;
						}

					}
				}

				?>
			</article><!-- #post -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
