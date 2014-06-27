Taxonomy is the <strong>practice and science of classification</strong>. The original meaning of the term was in biology, in which it described the practice of classifying organisms with similar properties into groups. However, the use of the terms is much more widespread now and is very much part of the WordPress terminology.

In WordPress,<strong> a taxonomy is a means of classifying content</strong>. Taxonomies enable you to group things together in specific ways. This makes them extremely useful for <strong>organising your content and creating your site's navigation</strong>.

Each item within a taxonomy is a term. This means that:
<ul>
	<li>The taxonomy name is the way you are classifying content</li>
	<li>The individual terms are properties belonging to the content being classified</li>
</ul>
<h4>The Default Taxonomies</h4>
The taxonomies that you'll be most familiar with are categories and tags:
<ul>
	<li>The Category taxonomy lets you group things together in a <strong>hierarchical manner.</strong> This lets you create hierarchical content structures and navigation across your website. A useful analogy is to think of it as <strong>creating your table of contents</strong>.</li>
	<li>Tags is a <strong>non-hierarchical taxonomy</strong>. It's often used to tag the content with specific topics that are being discussed. A useful analogy is to think of it as creating your <strong>index</strong>.</li>
</ul>
<h4>Custom Taxonomies</h4>
Custom Taxonomies are <strong>custom ways of organising your content</strong>. They break you free from the restriction of using categories and tags for organisation. If you are using a theme or plugin that makes use of Custom Post Types, it's very likely that you'll see a Custom Taxonomy accompanying it.
<h4>Using Custom Taxonomies</h4>
To make this clearer, let's look at an example.

Imagine that you want to create a recipe website. You create a Recipes Custom Post Type for storing all of your recipes. Now you need to classify this information. You do this in two ways:

<strong>Hierarchical Taxonomy: Cuisine</strong>

This hierarchical taxonomy lets you <strong>organize your recipes by cuisine</strong>, grouped together under regions.
<ul>
	<li>European
<ul>
	<li>French</li>
	<li>English</li>
	<li>Italian</li>
	<li>Spanish</li>
</ul>
</li>
	<li>Asian
<ul>
	<li>Japanese</li>
	<li>Chinese</li>
	<li>Vietnamese</li>
</ul>
</li>
</ul>
<strong>Non-hierarchical Taxonomy: ingredient</strong>

This non-hierarchical taxonomy lets you <strong>create an index of recipes</strong> with the same ingredients; e.g. potatoes, cumin, pasta, beef, turkey, etc etc.

Other examples of uses for custom taxonomies are:
<ul>
	<li><strong>Brands</strong> to organise Products</li>
	<li><strong>Vehicle </strong>to organise Automobiles</li>
	<li><strong>Job Type</strong> to organise Testimonials</li>
	<li><strong>Event Type</strong> to organise Events</li>
</ul>
<h4>Creating Custom Taxonomies</h4>
As with Custom Post Types, Custom Taxonomies are registered either in the <code>functions.php</code> file of your theme, or using a plugin. There is <a href="http://codex.wordpress.org/Taxonomies">information in the WordPress Codex on how to do this</a>.

With Pods, you can easily make Custom Taxonomies and associate them with any post type in WordPress. This increases the flexibility of the navigation and organizational structure of your website.
