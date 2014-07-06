It's simple to create Custom Post Types with Pods. This guide will walk you through the process. If you're already confused, <a title="What are Custom Post Types?" href="http://pods.io/docs/learn/what-are-custom-post-types/">check out our guide to WordPress Custom Post Types</a>.
<h3>1. Create Your Custom Post Type</h3>
Navigate to <strong>Pods Admin &gt; Add New</strong> and click on the <strong>Create New</strong> button.

<img title="create custom post type" src="http://pods.io/files/2013/02/cpt1.png" alt="a screenshot of the Create New button. The mouse pointer hovers over it" />

From the Content Type drop-down menu, ensure that <strong>Custom Post Type (like Posts or Pages) is selected</strong>.

Give your Custom Post Type a <strong>Plural Label</strong>. Let's use the example of a book review website - the plural label is books.

Enter a <strong>Singular Label</strong>. In this example, the singular is book.

<img title="make custom post type" src="http://pods.io/files/2013/02/cpt2.png" alt="a screenshot of the custom post type creation box. the fields are filled in with " />

Clicking on the <strong>Advanced link</strong> provides you with some advanced options. In most situations the defaults will suffice. The options are:
<ul>
	<li><strong>Identifier</strong> - this is the name that you will use when referring to your Custom Post Type in your code and shortcodes</li>
	<li><strong>Storage Type</strong> - the options here are Meta Based or Table Based. Unless you have a specific need for Table Based storage, you should stick to the WordPress default, Meta Based. We've outlined the difference between Table and Meta based storage in our FAQ.</li>
</ul>
When you're happy <strong>click Next Step</strong>.

<a name="add_fields"></a>
<h3>Add Fields</h3>
The next step is to add some fields to your Custom Post Type. These fields are used to append data to your content. If you're confused, <a title="What are Custom Fields?" href="http://pods.io/docs/learn/what-are-custom-fields/">check out our guide to WordPress Custom Fields</a>.

To add a field, <strong>click on the Add Field<strong> button.</strong></strong>

<img title="manage fields" src="http://pods.io/files/2013/02/addfield1.png" alt="a screenshot manage fields options. A mouse cursor hovers over the Add Field button " />

There are three tabs:
<ul>
	<li>Basic</li>
	<li>Advanced Field Options</li>
	<li>Advanced</li>
</ul>
Let's take a look at each of them.
<h4>Basic</h4>
This tab has the basic information that is required to create your field. Your options are:
<ul>
	<li><strong>Label</strong>: the field label that will appear in your user interface</li>
	<li><strong>Name</strong>: the name of the field that you will use in your code and shortcodes</li>
	<li><strong>Description</strong>: a description of the field. This could be an instruction for the user or just a description. It is not required.</li>
	<li><strong>Field type</strong>: this is where you determine the type of field. There are a number of options, including email, website, color picker, and even a Visual editor</li>
	<li><strong>Options - Required</strong>: if a field is required the user cannot save the post until it is completed</li>
	<li><strong>Options - Unique</strong>: a unique field must have a unique value inserted into it.</li>
</ul>
Below is an example of the form completed for a Number of Pages field for the Book Custom Post Type:

<img title="input field data" src="http://pods.io/files/2013/02/addfield2.png" alt="a screenshot manage fields options - the options have been completed with the label number of pages, and a field type of plain number " />
<h4>Additional Field Options</h4>
The additional field options tab gives you <strong>options that are contextual to the field type you have selected. </strong>Let's take a look at some examples.

For the plain number field in the above example, options are provided for format, decimals, and maximum length.

<img src="http://pods.io/files/2013/02/plain_number.png" alt="a screenshot of the plain number advanced options " />

The currency field has options for currency sign, currency placement, format, decimals, and maximum length.

<img src="http://pods.io/files/2013/02/currency.png" alt="a screenshot of the currency advanced options " />

The WYSIWYG Visual Editor field has options for different editors, output options, allowed HTML tags, and maximum length

<img src="http://pods.io/files/2013/02/wysiwyg.png" alt="a screenshot of the wysiwyg advanced options " />

Whatever field you choose, it's <strong>worth checking out the additional field options</strong> to see how you can customize the field.
<h4>Advanced</h4>
The Advanced tab gives you even more options that you may wish to use to <strong>control design and defaults</strong> and to <strong>control who sees the field</strong>.
<ul>
	<li>Visual
<ul>
	<li><strong>Additional CSS Classes</strong> - use to style your fields</li>
</ul>
</li>
	<li>Values
<ul>
	<li><strong>Default value</strong> - set a default value for your field</li>
	<li><strong>Set Default Value via Parameter</strong> - if you wish to use a parameter to set your default value, set it here</li>
</ul>
</li>
	<li>Visibility
<ul>
	<li><strong>Show to Admins Only?</strong> to restrict the field visibility to your site admins</li>
	<li><strong>Restrict access by Capability</strong> to select which capabilities have access to the field</li>
</ul>
</li>
</ul>
When you're happy with your field <strong>click Update Field.</strong>

This is how the Number of Pages example looks in the post editing screen:

<img title="number of pages" src="http://pods.io/files/2013/02/addfield3.png" alt="a screenshot of the number of pages field on the post editing screen " />

Add as many fields as you need for your Custom Post Type.
<h3 id="label-options">Labels</h3>
<img class="alignnone size-full wp-image-1511" src="http://pods.io/files/2013/05/admin-tabs-labels.png" alt="Admin tabs: Labels" width="562" height="48" />

Click the "Labels" tab to adjust the Custom Post Type labels across your admin. These are pre-populated with the name of your Custom Post Type. However, you can adjust them if you want to. Adding a new label to the first two fields will update all of your labels, or you can adjust each label individually.
<h3 id="admin-ui-options">Admin UI Options</h3>
<img class="alignnone size-full wp-image-1509" src="http://pods.io/files/2013/05/admin-tabs-admin.png" alt="Admin tabs: Admin UI" width="562" height="48" />
The "Admin UI" tab gives you fine-tuning options for your Custom Post Type's admin menu:
<ul>
	<li>Show or hide the Custom Post Type from the Admin UI, Dashboard, Nav Menus, and Admin Bar</li>
	<li>Set the name and position of the post type's menu item</li>
	<li><a href="http://pods.io/tutorials/setting-pods-custom-menu-items/" target="_blank">Specify a custom menu icon using an image file or Dashicon.</a></li>
</ul>
<em>Note: Specifying the location for a custom menu icon can be aided by the use of <a title="Using Special Magic Tags" href="http://pods.io/docs/build/special-magic-tags/">special magic tags</a>.</em>
<h3 id="advanced-options">Advanced Options</h3>
<img class="alignnone size-full wp-image-1510" src="http://pods.io/files/2013/05/admin-tabs-advanced.png" alt="Admin tabs: Advanced Options" width="562" height="48" />

The "Advanced Options" tab provides fine-tuning for how your Custom Post Type acts.
<ul>
	<li>Make your Custom Post Type public or private, exclude it from search, and determine whether it's publicly queryable</li>
	<li>Choose which functionality the Post Type supports, like title, excerpt, and revisions</li>
	<li>Associate taxonomies with your Custom Post Type</li>
</ul>
<a title="register_post_type" href="http://codex.wordpress.org/Function_Reference/register_post_type" target="_blank">The WordPress Codex for register_post_type</a> has more information about the options available on the "Admin UI" and "Advanced Options" tabs.
<h3>Save</h3>
Whenever you're finished with your fields and your options <strong>click Save Pod</strong>.

Your Custom Post Type will be available in your menu:

<img title="books" src="http://pods.io/files/2013/02/books.png" alt="a screenshot of the books custom post type on the WordPress menu " />
