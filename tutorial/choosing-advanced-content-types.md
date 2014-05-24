<script>{
    "title": "Choosing Pods Advanced Content Types and Pods Pages",
    "excerpt": "Information about when to use, and when not to use Pods Advanced Content Types.",
    "author": "Josh Pollock",
    "tutorial_type": "Choosing Content Types", "Getting Started", "Using Pods Pages",
    }
</script>

Pods <strong>Advanced Content Types</strong> (or ACT) are a special content type that stores its data outside of the regular WordPress post and meta tables. There are specific cases where this is important functionality to have, but for most applications, custom post types are a better choice than using an ACT. There are a few situations where ACTs do make sense to use. For example:
<ol>
	<li><strong>You need your data to be separate from your WordPress database tables</strong>. This might be necessary, for example, if you are using another piece of software with which you wish to share the database. Advanced Content Types means that you can interface between WordPress and that software.</li>
	<li>You are <strong>querying many fields at once</strong> from the same table (typically, you'll know when this becomes an issue when everything slow down with meta-based content types). This could be used for on-demand reporting and statistics.</li>
	<li>You have data that gets <strong>reset periodically</strong>.</li>
</ol>
Before choosing to use an ACT please keep in mind that most WordPress functions for handling posts, such as <code>the_post()</code> and <code>get_post_meta()</code> will not be available to you since they rely on the global <code>$post</code> object which is populated from the wp_posts table. Also their is no automatic rewriting system for displaying an item in an ACT like there are with posts, ACT requires the use of Pods Pages for detail pages. You may also have issues integrating many popular WordPress plugins that only support Post Types. This includes WordPress SEO by Yoast (see <a href="http://wordpress.org/plugins/pods-seo/" target="_blank">Pods SEO</a> for integration) or any other SEO plugins that are built for use with regular WordPress content types. ACTs are also not searched by the built in WordPress search system.

Pods Advanced Content Types are a powerful feature that can be enormously helpful for some users. If you are unsure if using this feature, we strongly encourage you to describe your needs in a post in our forums or ask one of our developers in our chat to get feedback whether or not an ACT makes sense for you. We will also be happy to explain the potential drawbacks of choosing ACTs and if the advantages to you out weigh these drawbacks.

### Resources
In order to help you decide if Pods Advanced Content Types are right for you, and implement them if you do choose, we have a variety of information on this site to assist you:
<ul>
	<li><a href="http://pods.io/docs/learn/what-are-advanced-content-types/" target="_blank">What Are Advanced Content Types?</a></li>
	<li><a href="http://pods.io/docs/comparisons/compare-content-types/" target="_blank">Comparing Content Types</a></li>
	<li><a href="http://pods.io/docs/comparisons/compare-storage-types/" target="_blank">Comparing Storage Methods</a> - Table-based vs Meta-based</li>
	<li><a href="http://pods.io/?p=179774" target="_blank">Tutorial: Using Pods Pages With Advanced Content Types</a></li>
	<li><a href="http://pods.io/?p=179974" target="_blank">Screencast: Using Pods Pages With Advanced Content Types</a></li>
	<li><a title="Using Pods Pages With Advanced Content Types" href="http://pods.io/?p=179842" target="_blank">Tutorial: SEO For Advanced Content Types</a></li>
	<li><a href="http://pods.io/?p=179974" target="_blank">Screencast: SEO For Advanced Content Types</a></li>
</ul>
