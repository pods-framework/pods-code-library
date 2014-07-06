Custom Taxonomies are ways to organize and classify your content. When you have Pods installed they're simple to create through the WordPress Admin Screens. If you're not sure what a Custom Taxonomy is, or how to make best use of it, <a title="What are Custom Taxonomies?" href="http://pods.io/docs/learn/what-are-custom-taxonomies/">check out our guide to WordPress Custom Taxonomies</a>.
<h3>Create Your Custom Taxonomy</h3>
Navigate to <strong>Pods Admin &gt; Add New</strong> and click on the <strong>Create New</strong> button.

<img title="create custom taxonomy" src="http://pods.io/files/2013/02/cpt1.png" alt="a screenshot of the Create New button. The mouse pointer hovers over it" />

From the Content Type drop-down menu, ensure that <strong>Custom Taxonomy (like Categories or Tags) is selected</strong>.

The Enable Extra Fields drop-down lets you choose whether you wish to add Custom Fields to your taxonomy. This isn't functionality that is native to WordPress, so if you do wish to add Custom Fields they will be created in a different table in your database.

Give your Custom Taxonomy a <strong>Plural Label</strong>. Let's use the example of a book review website in which the books are organized by genre. The plural is genres.

Enter a <strong>Singular Label</strong>. In this example, the singular is genre.

<img title="make custom taxonomy" src="http://pods.io/files/2013/02/custom_tax2.jpg" alt="a screenshot of the custom taxonomy creation box. the fields are filled in with genre and genres" />

Clicking on the <strong>Advanced link</strong> provides you with an advanced option. In most situations the defaults will suffice. The option is:
<ul>
	<li><strong>Identifier</strong> - this is the name that you will use when referring to your Custom Post Type in your code and shortcodes</li>
</ul>
When you're happy <strong>click Next Step</strong>.
<h3>Labels</h3>
<img class="alignnone size-full wp-image-1516" src="http://pods.io/files/2013/05/tax-tabs-labels.png" alt="Tax tabs: Labels" width="537" height="48" />

The "Labels" tab lets you adjust the Taxonomy labels across your admin. These are pre-populated with the name of your Taxonomy. However, you can adjust them if you want to. Adding a new label to the first two fields will update all of your labels, or you can adjust each label individually.
<h3>Admin UI</h3>
<img class="alignnone size-full wp-image-1512" src="http://pods.io/files/2013/05/tax-tabs-admin.png" alt="Tax tabs: Admin UI" width="537" height="48" />

The "Admin UI" tab allows you to customize the admin menu appearance, including:
<ul>
	<li>Whether to show the taxonomy in the admin menus and the default taxonomy UI</li>
	<li>Menu name and location (associated Post Type(s) menus (default), Settings menu, Appearances menu, a new menu item, a sub-menu to another menu)</li>
</ul>
<h3>Advanced Options</h3>
<img class="alignnone size-full wp-image-1513" src="http://pods.io/files/2013/05/tax-tabs-advanced.png" alt="Tax tabs: Advanced Options" width="537" height="48" />
You may wish to adjust your advanced options. These provide you with fine-tuning capabilities to alter how your Taxonomy behaves.<span style="font-size: 13px;"> </span>
<ul>
	<li><strong>Hierarchical</strong> - this determines whether your taxonomy is hierarchical, like categories, or flat, like tags.</li>
	<li><strong>Associated Post Types</strong> - this is where you associate a taxonomy with a Post Type. The genre taxonomy, for example, would be associated with the Books post type.</li>
</ul>
<img title="associated post types" src="http://pods.io/files/2013/02/custom_tax3.jpg" alt="a screenshot of the associated post types options. Books is selected." />

<a title="WordPress register_taxonomy() function" href="http://codex.wordpress.org/Function_Reference/register_taxonomy" target="_blank">See the WordPress codex for the register_taxonomy() function</a> for more information about the options available in the "Advanced Options" and "Admin UI" tabs.
<h3>Extra Fields</h3>
The "Extra Fields" tab is available if you did not choose to enable custom fields when you created the custom taxonomy:

<img class="alignnone size-full wp-image-1514" src="http://pods.io/files/2013/05/tax-tabs-extra-fields.png" alt="Tax tabs: Extra Fields" width="554" height="252" />

Once custom fields are enabled, the taxonomy will have a "Manage Fields" tab to setup the extra fields:

<img class="alignnone size-full wp-image-1515" src="http://pods.io/files/2013/05/tax-tabs-extra-manage.png" alt="Tax tabs: Manage Fields" width="562" height="48" />
<h3>Save</h3>
When you're happy with adjusting your options, click Save Pod.
