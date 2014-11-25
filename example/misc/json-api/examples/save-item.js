/**
 * Save items to a pod.
 *
 * Be sure to modify the building of JSONObj to match how data is populated from your page, and what fields your Pod has.
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

    function saveItem( id, pod ) {
        var url = podsUrl + '/' + pod + '/' + id;
        var title = '';
        var homePlanet = '';
        var lightsaberColor = '';
        var JSONObj = {
            "title"         :title,
            "home_planet"   :homePlanet,
            'lightsaber_color' : lightsaberColor,
            "status"        :'publish'
        };

        //encode data as JSON
        var data = JSON.stringify(JSONObj);

        $.ajax({
            type:"POST",
            url: url,
            dataType : 'json',
            data: data,
            beforeSend : function( xhr ) {
                xhr.setRequestHeader( 'X-WP-Nonce', apiNonce );
            },
            success: function(response) {
                alert( 'WOO!');
            }
        });
    }
})(jQuery);

