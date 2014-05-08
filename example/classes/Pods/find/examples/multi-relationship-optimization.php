<?php
/**
 * Select specific fields from Pod with multiple relationships to avoid a large number of unnecessary queries.
 *
 * @see https://github.com/pods-framework/pods/issues/1911
 */
$fields = array(
	'author.display_name AS author_name',
	'teacher.display_name AS teacher_name',
	'mandator.name AS m_name',
	'school_type.name AS st_name',
	'subject.name AS subj_name',
	't.*'
);
$fields = implode( ', ', $fields );
$args = array(
	'select' => $fields,
	'limit' => -1
);
$pods = pods( 'aretesurvey_response_group', $args );
if ( $pods->total_found() ) {
	while( $pods->fetch() ) {
		echo $pods->id() . '<br/>';
		echo $pods->field( 'name' ) . '<br/>';
		echo $pods->display( 'author_name' ) . '<br/>';
		echo $pods->display( 'teacher_name' ) . '<br/>';
		echo $pods->display( 'm_name' ) . '<br/>';
		echo $pods->display( 'st_name' ) . '<br/>';
		echo $pods->field( 'school' ) . '<br/>';
		echo $pods->field( 'grade' ) . '<br/>';
		echo $pods->display( 'subj_name' ) . '<br/>';
		echo $pods->field( 'notes' ) . '<br/>';
		echo '<hr/>';
	}
}