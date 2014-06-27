Custom Fields are custom-defined fields in your database that are used to input metadata that is related to your post. When you add a new post in WordPress, you'll see these draggable boxes which are used for to store information about your post. Examples are <strong>author and excerpt</strong>. Another is<strong> custom fields</strong>. If you can't see custom fields, click on the Screen Options tab and check the Custom Fields box.

<a href="http://pods.io/files/2013/02/cf1.jpg"><img class="alignnone size-medium wp-image-63" src="http://pods.io/files/2013/02/cf1.jpg" alt="cf1" /></a>

Here you can add pieces of information to your Post which is then output by your theme. The WordPress Codex provides a useful example of <a href="http://codex.wordpress.org/Custom_Fields">Custom Fields</a> that you might want to add to your Posts:
<ul>
	<li>Mood: Happy</li>
	<li>Currently Reading: Cinderella</li>
	<li>Listening To: Rock Around the Clock</li>
	<li>Weather: Hot and humid</li>
</ul>
While a Custom Taxonomy is way to organise and classify your posts into groups, Custom Fields let you store unique information that applies to your Post, Page, or Custom Post Type.
<h4>Uses for Custom Fields</h4>
There are lots of plugins and themes around that use Custom Fields for you to add specific information to your Posts, Pages, and Custom Post Types. Examples of this are:
<ul>
	<li><strong>Price, weight,</strong> and <strong>dimensions</strong> in your eCommerce store</li>
	<li><strong>Client name</strong> and <strong>company</strong> for your testimonials</li>
	<li><strong>Number of rooms, bathrooms,</strong> and <strong>floor size</strong> to your real estate listings</li>
	<li><strong>Ratings</strong> to your gaming reviews</li>
	<li><strong>Dates, time,</strong> and <strong>ticket price</strong> for your events</li>
</ul>
<h4>Creating Custom Fields</h4>
As with Custom Post Types and Custom Taxonomies, you can <a href="http://wp.smashingmagazine.com/2011/10/04/create-custom-post-meta-boxes-wordpress/">code your Custom Fields yourself. </a>With a plugin such as Pods, however, you can create Custom Fields through the WordPress interface. Whenever you create a Custom Post Type you can add Custom Fields to that Post Type. In the example below, the number of pages is being added to the Books Custom Post Type.

<a href="http://pods.io/files/2013/02/custom_fields_table1.jpg"><img class="alignnone size-full wp-image-68" src="http://pods.io/files/2013/02/custom_fields_table1.jpg" alt="custom_fields_table" width="572" height="506" /></a>

This is then added to the post editing screen for your Books Custom Post Type. The information stored is specific to the post that is being added and can be used for querying and displaying data.

<a href="http://pods.io/files/2013/02/custom_fields_front1.jpg"><img class="alignnone size-full wp-image-67" src="http://pods.io/files/2013/02/custom_fields_front1.jpg" alt="custom_fields_front" width="434" height="98" /></a>

It's worth noting that <strong>Pods also allows you to add Post Meta to your taxonomies</strong> so you can have specific information applied to each taxonomy term. As Taxonomies don't natively support Custom Fields in WordPress, these are stored in a separate database table, in a similar fashion to <a title="What are Advanced Content Types?" href="http://pods.io/docs/learn/what-are-advanced-content-types/">Advanced Content Types.</a>
