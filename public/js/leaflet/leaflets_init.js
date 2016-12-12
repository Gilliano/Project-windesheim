$(document).ready(function(){
    var map = L.map('map_canvas',{
        center: [52.370464, 5.222064],
        zoom: 13
    });

    // TODO: Let client pick tileLayer? (https://leaflet-extras.github.io/leaflet-providers/preview/)
    L.tileLayer('http://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png', {
        attribution: '<a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // TODO: Get locations from JsonController
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: "mapJobs",
        params: []
    };

    // var locations = [
    //     [52.33987673,5.24159433],
    //     [52.33987673,5.24159433],
    //     [52.37806505,5.2533045],
    //     [52.36552146,5.24578219],
    //     [52.38436404,5.2769549],
    //     [52.3359957,5.30724449],
    //     [52.35717584,5.26951984],
    //     [52.33899752,5.2425606],
    //     [52.37266567,5.24847067],
    //     [52.32739643,5.28655794],
    //     [52.34918586,5.28868294]
    // ];
    var locations = [];
    $.getJSON("/json/charts", sendData, function(response){
        console.log(response);
        $.each(response, function(index, value){
            locations.push([value.lat, value.lng]);
        });

        var markers = L.markerClusterGroup();
        $.each(locations, function(index, value){
            markers.addLayer(L.marker(value));
        });

        map.addLayer(markers);
    });
});