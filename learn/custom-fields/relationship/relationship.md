A relationship field is essentially a select list containing items from the related type. If you create a field in a "venue" pod that relates to another pod, "event", then in the edit form for venues you'll see a select list with all event items.

[caption id="attachment_1912" align="alignnone" width="515"]<img class="size-full wp-image-1912" title="Relationship: single-select with a drop-down" src="http://pods.io/files/2013/04/relationship-single.png" alt="Relationship: single-select with a drop-down" width="515" height="43" /> Relationship: single-select with a drop-down[/caption]

[caption id="attachment_1914" align="alignnone" width="515"]<img class="size-full wp-image-1914" title="Relationship: multi-select with checkboxes" src="http://pods.io/files/2013/04/relationship-multi-checkboxes1.png" alt="Relationship: multi-select with checkboxes" width="515" height="115" /> Relationship: multi-select with checkboxes[/caption]

[caption id="attachment_1913" align="alignnone" width="515"]<img class="size-full wp-image-1913" title="Relationship: multi-select with autocomplete" src="http://pods.io/files/2013/04/relationship-multi-autocomplete.png" alt="Relationship: multi-select with autocomplete" width="515" height="85" /> Relationship: multi-select with autocomplete[/caption]

&nbsp;
<h3>Built-in relationship types</h3>
<ul>
	<li>Custom defined list</li>
	<li>Post Types and Taxonomies</li>
	<li>Users, User Roles, User Capabilities</li>
	<li>Media</li>
	<li>Comments</li>
	<li>Image Sizes</li>
	<li>Navigation Menus</li>
	<li>Post Formats</li>
	<li>Post Status</li>
	<li>Countries (predefined)</li>
	<li>US States (predefined)</li>
</ul>
<h3 id="bi-directional-relationships">Bi-directional relationships</h3>
Bi-directional Relationships, as the name suggests, allows you to make "double sided" relationships. With bi-directional Relationships it's possible assign a pick column to a pod and, for the pod picked, a "reverse pick" to that first pod.  For example, you have 2 pods: "author" and "book". To create a bi-directional Relationship, you'd add a "related_books" PICK column in your "author" pod, and a "related_author" PICK column in your "book" pod.

Then, let's say that you add 10 new books. For each book, you select an author from the dropdown list. With a bi-directional relationship you won't have to go back into the author pod and manually select the related books from the dropdown. So every time each item is updated, the relationships on both sides will be updated.

To create a bi-directional relationship:
<ol>
	<li><span style="line-height: 13px;">Edit one of the Pods that will have the bi-directional relationship</span></li>
	<li>Add the relationship field to the second Pod</li>
	<li>Select single or multi-select in the "Advanced Field Options" tab, appropriately for this side of the relationship</li>
	<li>Update the field  and save the Pod</li>
	<li>Edit the related Pod</li>
	<li>Add a relationship field to the first Pod</li>
	<li>Select single or multi-select in the "Advanced Field Options" tab, appropriately for this side of the relationship</li>
	<li>Select the bi-directional field from the first Pod</li>
</ol>
<h3 id="additional-field-options">Additional Field Options</h3>
<ul>
	<li>Selection Type: Single/Multiple Select
<ul>
	<li>Format single: Drop Down, Radio Buttons, Autocomplete</li>
	<li>Format multi: Checkboxes, Multi Select, Autocomplete</li>
</ul>
</li>
	<li>Selection Limit (multi-select only)</li>
	<li>Display Field in Selection List: Provide the name of a field on the related object to reference, example: {@post_title} (note: only a single field is currently supported, more functionality is planned)</li>
	<li>Customized <em>WHERE</em>. With the ability to use <a title="Using Special Magic Tags" href="http://pods.io/docs/build/special-magic-tags/">special magic tags</a> in the field editor.</li>
	<li>Customized <em>ORDER BY</em></li>
	<li>Customized <em>GROUP BY</em></li>
</ul>
<h3>Advanced Relationships (optional)</h3>
The "Advanced Relationships" component offers more relationship options, when enabled:
<ul>
	<li>Database Tables</li>
	<li>Multisite Networks</li>
	<li>Multisite Sites</li>
	<li>Themes</li>
	<li>Page Templates</li>
	<li>Sidebars</li>
	<li>Post Type Objects</li>
	<li>Taxonomy Objects</li>
</ul>
<h3>Getting Values From Relationship Fields</h3>
<a href="http://pods.io/tutorials/get-values-from-a-custom-relationship-field/">See this tutorial.</a>
