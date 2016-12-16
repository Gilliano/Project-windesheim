function setupLeaflet(){
    var map = L.map('leaflet_mapLiving',{
        center: [52.370464, 5.222064],
        zoom: 13
    });

    // TODO: Let client pick tileLayer? (https://leaflet-extras.github.io/leaflet-providers/preview/)
    L.tileLayer('http://{s}.tile.openstreetmap.se/hydda/full/{z}/{x}/{y}.png', {
        attribution: '<a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Get locations from JsonController
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: "mapLiving",
        params: []
    };

    var locations = [];
    $.getJSON("/json/charts", sendData, function(response){
        // console.log(response);

        $.each(response, function(index, value){
            if(value.error == null)
                locations.push([value[0].lat, value[0].lng]);
        });

        var markers = L.markerClusterGroup();
        $.each(locations, function(index, value){
            markers.addLayer(L.marker(value));
        });

        map.addLayer(markers);
    });
}