<?php
/**
 *
 * Template Name: Pods Single
 *
 * Use this as a page template for Pods Pages single item, to show a Pods template of the same name as the pod
 */
get_header();
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
	<?php
			//setup Pod object presuming permalink structure of example.com/pod-name/item-name
			//get current item name
			$slug = pods_v( 'last', 'url' );

			//get current pod name
			$pod_name = pods_( 0, 'url');

			//get pods object
			$pods = pods( $pod_name, $slug );

		?>
			<article>
				<?php
					//Output template of the same name as Pod, if such a template exists.
					$temp = $pods->template($pod_name);
					if ( isset($temp)  ) {
						echo $temp;
					}
				?>
			</article><!-- #post -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
