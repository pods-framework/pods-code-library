/**
 * Get an item from a Pod, by Pod name and ID.
 *
 * Requires https://github.com/WP-API/client-js and that the root URL for the WP REST API, and client-js' nonce be localize into the script.
 */
(function($){

    //root JSON URL
    var root_URL = WP_API_Settings.root;

    //API nonce
    var api_NONCE = WP_API_Settings.nonce;

    //Pods endpoint URL
    var pods_URL = root_URL + 'pods';

    function getItem( id, pod ) {
        var URL = pods_URL + '/' + pod + '/' + 'id';
        $.ajax({
            type:"GET",
            url: url,
            dataType : 'json',
            beforeSend : function( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', api_Nonce );
            },
            success: function(response) {
                //do something
            }
        });
    }
})(jQuery);
