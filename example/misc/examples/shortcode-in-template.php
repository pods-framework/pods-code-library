<?php
/**
* Allow shortcodes in a Pods Template
*/
add_filter( 'pods_templates_post_template', 'do_shortcode', 10, 1 );
