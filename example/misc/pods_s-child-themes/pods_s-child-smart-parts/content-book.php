<?php
/**
 * Template part for book post type Pod. $pods is created in main template and scoped into this file for current item.
 *
 * The 'book' post type Pod has two fields, 'book_author' a single-select relationship to the 'author' post type Pod and 'cover_images', a multi-select image field. 'book' also has one associated taxonomy 'genre'.
 *
 *
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			//main post content
			the_content( );

			/**
			 * Pods Fields
			 */
			/*cover images */
			//get the field
			$cover_images = $pods->field( 'cover_images' );

				if ( $cover_images ) {
					echo '<div class="cover-images>';
					foreach ( $cover_images as $cover_image ) {
						echo '<div class="cover-image">'. pods_image( $cover_image ).'</div>';
					}
					echo '</div>';
				}


			/* Get author name and image as link */
			//get the relationship field
			$author = $pods->field( 'book_author' );

			//store name and ID
			$author_id = $author[ 'ID' ];
			$author_name = $author[ 'post_title' ];

			//get the 'photo' field for author image
			$author_photo = get_post_meta( $author_id, 'photo' );
			//make sure we have a photo
			if ( $author_photo ) {
				//get url of photo
				$photo_url = wp_get_attachment_url( $author_photo[0][ 'ID' ] );
			}

			//output author info
		?>
			<div class="author-info">
				<div class="book-author">
					By: <a href="<?php echo get_permalink( $author_id ); ?>"><?php echo $author_name;?></a>
				</div>
				<?php if ( isset( $photo_url ) ) : ?>
					<div class="author-photo">
						<img src="<?php echo $photo_url; ?>" />
					</div>
				<?php endif; ?>
			</div>


		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'pods_s' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

			<?php
			/* List 'genre' taxonomy terms*/
			//get the terms for current post
			$genres_list = wp_get_post_terms( get_the_ID(), 'genre' );

			//only continue if we have terms
			if ( $genres_list ) : ?>
			<span class="cat-links genres-list">
				<?php
					foreach ( $genres_list as $genre ) {
						$id = $genre->term_id;
						$name = $genre->name;
						echo '<span class="genre"><a href="'.get_term_link( $id, 'genre' ).'">'.$name.'</a></span>';
					}
				?>
			</span>
			<?php endif; // End if taxonomy ?>



		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pods_s' ), __( '1 Comment', 'pods_s' ), __( '% Comments', 'pods_s' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'pods_s' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
