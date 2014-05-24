<?php
/**
 * Use get_terms() to list specific custom taxonomy terms, as links to term page. Also show term description and a dashicon.
 *
 * @see http://melchoyce.github.io/dashicons/
 *
 * @param array 	$ids 		Array of IDs to retrieve.
 * @param string 	$heading	Heading to precede list.
 * @param string	$dashicon	The class for the dashicon to use.
 */

//list tutorials by topic for first page of tutorials CPT page
function pods_tutorials_list( $ids, $heading, $dashicon ) {
	//include only terms whose ids were set in $ids param
	$args = array( 'include'   => $ids );
	//get the terms matching the args
	$terms = get_terms( 'tutorial_type', $args );
	//add underscores to $heading in separate var for ul id
	$name = str_replace(' ', '-', $heading);

	echo '<h3>'.$heading.'</h3>';
	echo '<ul id="tutorials-'.$name.'" class="tutorials-topics-list">';
	//loop through terms
	foreach ( $terms as $term ) {
		//get link, description and name for each term.
		$link = get_term_link( $term );
		$description = term_description( $term->term_id, 'tutorial_type' );
		$name = $term->name;
		//create list item
		echo '<li><div class="dashicons '.$dashicon.' tutorial-term-dashicon"></div><div class="tutorial-term"><a href="' . $link . '">' . $name . '</a>';
		if ( !empty( $description ) ) {
			echo '<br /><span class="tutorial-term-description">' . strip_tags( $description, '' ).'</span>';
		}
		echo '</div></li>';
	} //endforeach
	echo '</ul>';
}
?>
