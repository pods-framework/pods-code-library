<h4>Background</h4>
In order to understand Advanced Content Types, it helps to understand a little bit about how WordPress works. WordPress comprises <strong>PHP</strong> and <strong>MySQL</strong>. MySQL is the database that stores all of your website's information, and PHP is the code allows for interaction between the web browser and the database. PHP grabs information from the database and spits it out in the browser, and it takes data that you have entered into your browser and stores in the database.

The MySQL database is made up of tables that are related to each other. This image from the Codex <a href="http://codex.wordpress.org/Database_Description">shows the default tables that come with WordPress:</a>

<a href="http://pods.io/files/2013/02/wp_tables.png"><img class="alignnone  wp-image-60" src="http://pods.io/files/2013/02/wp_tables.png" alt="wp_tables" width="647" height="653" /></a>.

Whenever you create a Custom Post Type, this is added to the wp_posts table in your database. You can see the book Custom Post Type has been added to the wp_posts table in the below image.

<a href="http://pods.io/files/2013/02/wp_post.jpg"><img src="http://pods.io/files/2013/02/wp_post.jpg" alt="" /></a>
<h4>Enter Advanced Content Types</h4>
Rather than being stored in wp_posts, <strong>Advanced Content Types are stored in their own database table.</strong> This means that they are not WordPress objects but are independent of WordPress. If you were to create Books as an Advanced Content Type rather than as a Custom Post Type, it would appear in its own table:

<a href="http://pods.io/files/2013/02/wp_pods_books.jpg"><img class="alignnone size-full wp-image-58" src="http://pods.io/files/2013/02/wp_pods_books.jpg" alt="wp_pods_books" width="198" height="206" /></a>
<h4>When to Use Advanced Content Types</h4>
Unless you are a developer that specifically requires the functionality that comes with storing your data in another table in your database, we strongly advise that you <strong>stick to Custom Post Types</strong>. Before deciding to use an Advanced Content Type, please be sure to <a href="http://pods.io/tutorials/choosing-pods-advanced-content-types-and-pods-pages/">review our resources on their use</a>, to ensure that you are aware of their unique needs, limitations and features. If you're a developer and you're curious about the functionality that you'll get from Advanced Content Types, <a title="Compare Storage Types" href="http://pods.io/docs/comparisons/compare-storage-types/">check out our comparison table</a>.

Here are three examples of occasions when Advanced Content Types might be used:
<ol>
	<li><strong>You need your data to be separate from your WordPress database tables</strong>. This might be necessary, for example, if you are using another piece of software with which you wish to share the database. Advanced Content Types means that you can interface between WordPress and that software.</li>
	<li>You are <strong>querying many fields at once</strong> from the same table (typically, at least most than 15). This could be used for reporting and statistics.</li>
	<li>You have data that gets <strong>reset periodically</strong>.</li>
</ol>
You'll notice that Advanced Content Types act in a similar way to <a href="http://learnbythedrop.com/drop/86">Drupal CCK</a>. If you don't know what Drupal CCK is then you probably don't need to use Advanced Content Types!

&nbsp;
