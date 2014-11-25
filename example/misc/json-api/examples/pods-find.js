/**
 * Get items from a Pod, with a `Pods::find()` query.
 *
 * Requires https://github.com/WP-API/client-js and that the root URL for the WP REST API, and client-js' nonce be localize into the script.
 */
(function($){

    //root JSON URL
    var rootUrl = WP_API_Settings.root;

    //API nonce
    var apiNonce = WP_API_Settings.nonce;

    //Pods endpoint URL
    var podsUrl = rootUrl + 'pods';

    //example params array
    var params = new Array(
        'data[limit=7]',
        'data[orderby]="t.post_title ASC"'
    );


    function getItem( params, pod ) {

        var url = podsUrl + '/' + pod;
        url = '?' + params.join('&');

        $.ajax({
            type:"GET",
            url: url,
            dataType : 'json',
            beforeSend : function( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', apiNonce );
            },
            success: function(posts) {
                //do something
            }
        });
    }
})(jQuery);
