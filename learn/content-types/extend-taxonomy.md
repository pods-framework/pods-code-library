It's possible to use Pods to extend your taxonomies. This means that you can add Custom Fields to your Taxonomies. There are two ways to do this:
<ul>
	<li>When you <strong>create a Custom Taxonomy</strong> select Enable extra fields for this Taxonomy from the Enable Extra Fields drop-down</li>
	<li>You can <strong>extend an existing Taxonomy</strong>, such as the WordPress defaults or those that have come with other plugins and themes</li>
</ul>
If you wish to use Custom Fields with a Taxonomy created with Pods you <strong>must select Enable extra fields</strong> whenever you create that Taxonomy. It's not currently possible to extend a Pods-created Custom Taxonomy with Custom Fields after it has been created.
<h4>Custom Fields with Taxonomies</h4>
WordPress comprises two things: <strong>PHP</strong> and a <strong>MySQL database</strong>. The database contains all of your content while the PHP delivers that content to your browser. The database comes with a pre-existing structure within which Pods can create Post Types, Custom Fields and other different content types.

However, WordPress's database does not natively support Custom Fields associated with Taxonomies. There's nowhere for them to be added to the Taxonomies table in the database. This means that Pods needs to create a separate database table to store the Custom Fields associated with your Taxonomies.
<h4>Uses for Custom Fields with Taxonomies</h4>
Using Custom Fields with Taxonomies lets you associate data with your Taxonomy. This can be used to increase the flexibility of your website, and this data can be output by your theme. Let's take a look at an example.

For a <strong>book review</strong> website, you would have the Books Custom Post Type, and the Authors Taxonomy. However, you may want to associate data with each of the authors within the taxonomy. This data could be:
<ul>
	<li>Date of birth</li>
	<li>Nationality</li>
	<li>Occupation</li>
	<li>Photograph</li>
</ul>
<img title="custom taxonomy fields" src="http://pods.io/files/2013/02/extend_taxonomy.jpg" alt="a screenshot of the fields table for a custom taxonomy" />

When you add an author to your Author taxonomy at Books &gt; Authors, you'll have additional fields to which you can add data about the author.

<img title="custom taxonomy interface" src="http://pods.io/files/2013/02/custom_taxonomies1.jpg" alt="a screenshot of the fields input area in the Authors admin screen" />
<h3>Adding Custom Fields to Taxonomies</h3>
The following methods can be used for adding Custom Fields to Taxonomies.
<h4>For New Custom Taxonomies</h4>
Navigate to <strong>Pods Admin &gt; Add New</strong>.

<strong>Click Create New</strong>.

From the Content Type drop down <strong>select Custom Taxonomy</strong>.

From the Enable Extra Fields drop-down <strong>select Enable extra fields for this Taxonomy</strong>.

Give your Custom Taxonomy a Plural and Singular Label.

<img title="make custom taxonomy" src="http://pods.io/files/2013/02/extend_tax.jpg" alt="a screenshot of the custom taxonomy creation box. The enable extra fields option is selected. The plural label is authors and the singular label is authors" />

When you're happy, <strong>click Next Step</strong>. You'll see a table which you can use to add Custom Fields to your Taxonomy.
<h3>For Existing Taxonomies</h3>
Navigate to <strong>Pods Admin &gt; Add New</strong>.

<strong>Click Extend Existing</strong>.

From the Content Type drop-down <strong>select Custom Taxonomy</strong>.

<strong>Select the Taxonomy</strong> which you wish to extend.

From the Enable Extra Fields drop-down <strong>select Enable extra fields for this Taxonomy</strong>.

<img title="make custom taxonomy" src="http://pods.io/files/2013/02/extend_tax2.jpg" alt="a screenshot of the custom taxonomy extension box. The categories taxonomy is selected. The enable extra fields option is selected" />

When you're happy, <strong>click Next Step</strong>. You'll see a table which you can use to add Custom Fields to your Taxonomy.
