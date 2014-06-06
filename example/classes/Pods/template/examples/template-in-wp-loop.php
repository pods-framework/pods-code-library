<?php
/**
 * Single CPT template showing a Pods Template instead of Post Content
 *
 * Template Combines TwentyFourteen's single.php and content.php.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php twentyfourteen_post_thumbnail(); ?>

					<header class="entry-header">
						<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
							<div class="entry-meta">
								<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
							</div>
						<?php
						endif;

						the_title( '<h1 class="entry-title">', '</h1>' );
						?>
						<div class="entry-meta">
							<?php
							if ( 'post' == get_post_type() )
								twentyfourteen_posted_on();

							if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
								?>
								<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
							<?php
							endif;

							edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
							?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
						<div class="entry-content">
							<?php
							/**
							 * Output Pods Template for current item
							 */

							//get post type name
							$post_type = get_post_type();

							//create Pods object for current item
							$pods = pods( $post_type, get_the_id() );

							//get the template {post-type}-single
							$temp = $pods->template( "{$post_type}-single" );

							//output template if it exists
							if ( isset($temp)  ) {
								echo $temp;
							}

							?>
						</div><!-- .entry-content -->
					<?php endif; ?>

					<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
				</article><!-- #post-## -->
<?php

						  // Previous/next post navigation.
				twentyfourteen_post_nav();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
