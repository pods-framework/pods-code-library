<?php
/**
 * Checks if given Pods object has the correct item fetch, and if not fetch it.
 *
 * @param obj|Pod $pod A Pod object to check
 * @param int $id ID of item you want.
 *
 * @return Pods object
 */
function slug_ensure_single_pod( $pod, $id ) {

	if ( $pod->id() !== $id || $pod->id === 0 || is_null( $pod->id ) ) {
		$pod->fetch( $id  );
	}

	return $pod;

}

