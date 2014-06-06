<?php
//Output a twitter follow button for post author. Must be used in loop
//See https://twitter.com/about/resources/buttons#follow for more info
function pods_twitter_follow() {
	$twitter = get_the_author_meta('twitter');
	$name = get_author_meta('user_firstname');
	?>
	<a class="twitter-follow-button" data-show-count="false" href="<?php echo $twitter; ?>">Follow <?php echo $name; ?></a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<?php
}

//Output a link to a user's twitter page
function pods_show_twitter_link($id) {
	$twitter = get_user_meta($id, 'twitter', true);
	echo esc_html($twitter);
}
?>
