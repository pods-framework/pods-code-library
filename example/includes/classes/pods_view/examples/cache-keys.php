<?php
// Include with Cache Key using Current URL
// Loop content on a page cached based on Current URL
pods_view( 'loop-content.php?url=' . pods_current_url(), null, DAY_IN_SECONDS );

// Include with Cache Key using User Role
// Restricted content cached based on current role of User
global $current_user;

$user_roles = $current_user->roles;
$user_role = array_shift( $user_roles );

pods_view( 'restricted-content.php?role=' . $user_role, null, DAY_IN_SECONDS );

// Include with Cache Key using Special Magic Tag
// See: http://pods.io/docs/build/special-magic-tags/
// Show related posts cached based on current post ID
pods_view( 'related-posts.php?ID={globals.post_ID}', null, DAY_IN_SECONDS );
