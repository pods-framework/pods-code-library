<?php
/**
 * Require all components to be on.
 *
 * Note: pods_require_component() overrides component options saved in database.
 *
 */
$components = array(
	'advanced-content-types',
	'advanced-relationships',
	'builder-integration',
	'helpers',
	'markdown-syntax',
	'migrate-import-from-the-custom-post-type-ui-plugin',
	'migrate-packages',
	'pages',
	'roles-and-capabilities',
	'table-storage',
	'templates'
);
foreach ( $components as $component ) {
	pods_require_component( $component );
}
