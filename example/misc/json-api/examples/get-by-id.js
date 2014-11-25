/**
 * Get an item from a Pod, by Pod name and ID.
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

    function getItem( id, pod ) {
        var url = podsUrl + '/' + pod + '/' + id;
        $.ajax({
            type:"GET",
            url: url,
            dataType : 'json',
            beforeSend : function( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', apiNonce );
            },
            success: function(response) {
                //do something
            }
        });
    }
})(jQuery);
