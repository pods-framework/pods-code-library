<?php
/**
 * Output a file field that saves links to mp3s as and audio field
 */
$obj = pods( 'mp3', 5813 );
$attr = array(
	'src' => $obj->field( 'audio_file_url' ),
	'loop' => '',
	'autoplay => ',
	'preload' => 'none',
	'style' => 'width: 100%; visibility: visible;'
);
echo wp_audio_shortcode( $attr );
