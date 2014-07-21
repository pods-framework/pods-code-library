Pods Constants
All defaults are as of 2.4.3

* PODS_VERSION - The version number of the current version of Pods
* PODS_DIR - Default is 'plugin_dir_path( __FILE__ )'. The directory path of the directory Pods is installed in.
* PODS_URL - Default is 'plugin_dir_url( __FILE__ )'. The URL of the directory Pods is installed in.
* PODS_GITHUB_UPDATE - Default is false. When true, Pods can be updated to the latest commit on the branch specified in PODS_GITHUB_BRANCH, from the Pods admin.
* PODS_GITHUB_BRANCH - Default is '2.x'. The branch to update from when using the Github updated.
* PODS_WP_VERSION_MINIMUM - Default is '3.4'. The minimum version of WordPress that can be used with Pods. Redefining this is strongly discouraged.
* PODS_PHP_VERSION_MINIMUM - Default is '5.2.4'. The minimum version of PHP that can be used with Pods. Redefining this is strongly discouraged.
* PODS_MYSQL_VERSION_MINIMUM - Default is '5.0'. The minimum version of MySQL that can be used with Pods. Redefining this is strongly discouraged.
* PODS_SLUG
* POD_MEDIA
* PODS_GLOBAL_POD_PAGINATION
* PODS_GLOBAL_POD_SEARCH
* PODS_DISABLE_CONTENT_MENU
* PODS_DISABLE_ADMIN_MENU - Hides the Pods admin menu for users of any role. Note: You can set access to the Pods admin menu by user level using the Admin Access Role setting.
* PODS_SEARCH_STRICT
* PODS_FIELD_STRICT
* PODS_DISABLE_EVAL
* PODS_LIGHT - Disables all components.
* PODS_TABLELESS
* PODS_DB_VERSION
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
* PODS_TABLELESS
* PODS_STRICT
* PODS_API_CACHE
* PODS_SHORTCODE_ALLOW_EVALUATE_TAGS
* PODS_SHORTCODE_ALLOW_SUB_SHORTCODES
* PODS_DISABLE_SHORTCODE_SQL - Prevents shortcodes from passing SQL that could potentially be used to used to compromise site security. When enabled, Pods shortcodes will ignore its "orderby", "where", "having", "groupby" and "select" arguments. Setting this constant to true is recommended if you are allowing untrusted users to create or edit posts.
* PODS_SESSION_AUTO_START - Disables Session Auto Start.
* PODS_PRELOAD_CONFIG_AFTER_FLUSH


