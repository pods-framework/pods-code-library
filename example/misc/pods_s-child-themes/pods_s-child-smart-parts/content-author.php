<?php
/**
 * Template part for author post type Pod. $pods is created in main template and scoped into this file for current item.
 *
 * The post type Pod 'author' has two fields, 'books' a multi-select, bi-directional relationship to the 'book' post type Pod and 'photo' a single select image field.
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
		/* Author Photo */
		?>
			<div class="author-photo">
				<?php echo pods_image( $pods->field( 'photo' ) ); ?>
			</div>
		<?php
		/*Get Books by Author*/
		$books = $pods->field( 'books' );

		//put all books in an array and sort by post title
		if ( $books ) {
			//create array of the info to output about each field
			foreach ( $books as $book ) {

				//get the needed fields from each book and store in
				$title = $book[ 'post_title' ];
				$id = $book[ 'ID' ];
				$link = get_permalink( $id );

				//get all cover images (a multi-select field) get ID of first image
				$cover_image =  get_post_meta( $id, 'cover_images' );
				if ( isset ( $cover_image[0] ) && ! empty( $cover_image[0] ) ) {
					$cover_image = $cover_image[0][ 'ID' ];
				}
				else {
					//if we don't have a cover image set false to avoid errors.
					$cover_image = false;
				}

				//get url for cover image if we have one
				if ( $cover_image ) {
					$cover_image = wp_get_attachment_url( $cover_image );
				}

				//add to array
				$author_books[ $title ] = array(
					'ID' 			=> $id,
					'cover_image' 	=> $cover_image,
					'link' 			=> $link,
				);

			}

			//sort books by title
			ksort( $author_books );

			//output the books in order
			if ( is_array( $author_books )  && ! empty( $author_books ) ) {
				echo '<div class="books">';
				foreach ( $author_books as $title => $book ) {
					echo '<div class="book">';
					echo '<a href="' . $book[ 'link' ] . '">';
					if ( $book[ 'cover_image' ] ) {
						echo '<span class="book-cover"><img src="' . $book[ 'cover_image' ] . ' "/></span>';
					}

					echo '<span class="book-title>' . $title . '</div>';
					echo '</div><!--.books-->';
				}
				echo '</div><!--.books-->';
			}

		}

		?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'pods_s' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'pods_s' ), __( '1 Comment', 'pods_s' ), __( '% Comments', 'pods_s' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'pods_s' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
