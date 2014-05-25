<?php
<?php
// Set expiration differently based on user logged in status or capability

// Basic Format
$expires_basic_format = array(
	$expiration_1, // Anyone logged out or logged in (without access to $capability)
	$expiration_2, // Anyone logged in, or anyone with access to $capability
	$capability
);

// Example 1: Don't cache for logged in users, but cache for anonymous visitors
$expires = array(
	DAY_IN_SECONDS, // anonymous - cache for a day
	false // logged-in user - no caching
);

pods_view( 'menu.php', null, $expires );

// Example 2: Don't cache for non-admins
$expires = array(
	false, // anyone - no caching - used by anonymous visitors or users without the capability enabled for their role
	DAY_IN_SECONDS, // admins - cache for a day - used by users with the below capability set
	'manage_option' // capability to check against
);

pods_view( 'menu.php', null, $expires );

// Example 3: Different Expirations for Different Folks
$expires = array(
	DAY_IN_SECONDS, // anonymous - cache for a day
	HOUR_IN_SECONDS, // logged-in user - cache for an hour
);

pods_view( 'menu.php', null, $expires );

// Example 4: Anonymous, any user, user with access
$expires = array(
	DAY_IN_SECONDS, // anonymous - cache for a day
	HOUR_IN_SECONDS, // any logged-in user - cache for an hour
	MINUTE_IN_SECONDS * 10, // logged-in user - cache for an hour
	'edit_post' // capability to check against
);

pods_view( 'menu.php', null, $expires );

// Example 5: Same as Example 4, but with an associated array
$expires = array(
	'anonymous' => DAY_IN_SECONDS, // anonymous - cache for a day
	'user' => HOUR_IN_SECONDS, // any logged-in user - cache for an hour
	'user_with_access' => MINUTE_IN_SECONDS * 10, // logged-in user - cache for an hour
	'capability' => 'edit_post' // capability to check against
);

pods_view( 'menu.php', null, $expires );

// Example 6: Same as Example 2, but with an associated array
$expires = array(
	'anonymous' => false, // anyone - no caching - used by anonymous visitors or users without the capability enabled for their role
	'user' => DAY_IN_SECONDS, // admins - cache for a day - used by users with the below capability set
	'capability' => 'manage_option' // capability to check against
);

pods_view( 'menu.php', null, $expires );
