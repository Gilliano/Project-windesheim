// Gets called from the google map api <script>
function initMap(){
    // Get zip codes
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: "heatmapJobs",
        params: []
    };

    // Get json values from method
    $.post("/json/charts", sendData, function(data){
        var data = $.parseJSON(data);

        // Define the heat points
        var heatData = {
            max: 100,
            data: []
        };
        $.each(data, function(index, value){
            var obj = {lat: value.lat, lng: value.lng, count: value.count};
            heatData.data.push(obj);
        });
        // console.log(heatData);

        // Setup start location
        var location = new google.maps.LatLng(52.352041, 5.249306);
        var options = {
            zoom: 7,
            center: location,
            mapTypeId: 'satellite'
        };

        var map = new google.maps.Map(document.getElementById("map_canvas"), options);
        var heatmap = new HeatmapOverlay(map,
            {
                "radius": 0.2,
                "maxOpacity": 1,
                "scaleRadius": true,
                "useLocalExtrema": true,
                latField: 'lat',
                lngField: 'lng',
                valueField: 'count'
            }
        );

        heatmap.setData(heatData);
    });
};