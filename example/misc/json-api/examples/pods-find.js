/**
 * Get items from a Pod, with a `Pods::find()` query.
 *
 * Requires https://github.com/WP-API/client-js and that the root URL for the WP REST API, and client-js' nonce be localize into the script.
 */
(function($){

    //root JSON URL
    var root_URL = WP_API_Settings.root;

    //API nonce
    var api_NONCE = WP_API_Settings.nonce;

    //Pods endpoint URL
    var pods_URL = WP_API_Settings + 'pods';

    //example params array
    var params = new Array(
        'where=serves.meta_value= "four or more"',
        'limit=7',
        'orderby="t.post_title ASC"'
    );


    function getItem( params, pod ) {

        var URL = pods_URL + '/' + pod;
        URL = '?' + params.join('&');

        $.ajax({
            type:"GET",
            url: url,
            dataType : 'json',
            beforeSend : function( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', api_Nonce );
            },
            success: function(posts) {
                //do something
            }
        });
    }
})(jQuery);
