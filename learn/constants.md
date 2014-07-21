Pods Constants
All defaults are as of 2.4.3

* PODS_VERSION - The version number of the current version of Pods.
* PODS_DB_VERSION - The version of the Pods database configuration. Currently '2.3.5', if is less than current version, will trigger databse update.
* PODS_DIR - Default is 'plugin_dir_path( __FILE__ )'. The directory path of the directory Pods is installed in.
* PODS_URL - Default is 'plugin_dir_url( __FILE__ )'. The URL of the directory Pods is installed in.
* PODS_GITHUB_UPDATE - Default is false. When true, Pods can be updated to the latest commit on the branch specified in PODS_GITHUB_BRANCH, from the Pods admin.
* PODS_GITHUB_BRANCH - Default is '2.x'. The branch to update from when using the Github updated.
* PODS_WP_VERSION_MINIMUM - Default is '3.4'. The minimum version of WordPress that can be used with Pods. Redefining this is strongly discouraged.
* PODS_PHP_VERSION_MINIMUM - Default is '5.2.4'. The minimum version of PHP that can be used with Pods. Redefining this is strongly discouraged.
* PODS_MYSQL_VERSION_MINIMUM - Default is '5.0'. The minimum version of MySQL that can be used with Pods. Redefining this is strongly discouraged.
* PODS_SLUG - Default is 'plugin_basename( __FILE__ )'. The slug for the plugin.
* PODS_MEDIA - If false, Pods media functions will not be included.
* PODS_GLOBAL_POD_PAGINATION - If false, globally disables pagination from Pods class. Can be overridden in Pods::find() params.
* PODS_GLOBAL_POD_SEARCH - If false,  globally disables search in Pods class. Can be overridden in Pods::find() params.
* PODS_DISABLE_CONTENT_MENU
* PODS_DISABLE_ADMIN_MENU - Hides the Pods admin menu for users of any role. Note: You can set access to the Pods admin menu by user level using the Admin Access Role setting.
* PODS_FIELD_STRICT - If false names for Pods or fields reserved for internal can be used for new Pods or fields. Use with caution.
* PODS_DISABLE_EVAL - If true, Pods will not allow PHP code added in the admin interface, for example, the Pods Template editor, to be executed.
* PODS_LIGHT - Disables all Pods components.
* PODS_TABLELESS - If true, enables tableless mode. If table-based storage is turned off, no additional database tables, such as wp_podsrel will be utilized (or even created if tableless mode is on during activation
* PODS_ALLOW_FULL_META
* PODS_REMOTE_VIEWS
* PODS_DISABLE_FILE_UPLOAD - Disables the ability to upload any files via Pods.
* PODS_UPLOAD_REQUIRE_LOGIN
* PODS_DISABLE_FILE_BROWSER - Disables access to the file browser when uploading files via Pods file fields.
* PODS_FILES_REQUIRE_LOGIN - Defaults to true. When false, users who are NOT logged in may upload files via Pods file fields. Use this with caution.
* PODS_DISABLE_POD_PAGE_CHECK - Disables the check that is run before a page loads to see if Pods Pages is being used.
* PODS_DISABLE_VERSION_OUTPUT - Enables outputting the current Pods version in head of Pods Pages.
* PODS_DISABLE_META
* PODS_DISABLE_BODY_CLASSES
* PODS_DISABLE_DYNAMIC_TEMPLATE
* PODS_DEVELOPER
* PODS_STRICT
* PODS_API_CACHE
* PODS_SHORTCODE_ALLOW_EVALUATE_TAGS
* PODS_SHORTCODE_ALLOW_SUB_SHORTCODES
* PODS_DISABLE_SHORTCODE_SQL - Prevents shortcodes from passing SQL that could potentially be used to used to compromise site security. When enabled, Pods shortcodes will ignore its "orderby", "where", "having", "groupby" and "select" arguments. Setting this constant to true is recommended if you are allowing untrusted users to create or edit posts.
* PODS_SESSION_AUTO_START - Disables Session Auto Start.
* PODS_PRELOAD_CONFIG_AFTER_FLUSH


