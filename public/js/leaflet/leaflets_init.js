$(document).ready(function(){
    $.getScript("/js/leaflet/leaflet_mapJobs.js", function(){
        setupLeaflet();
    });

    $.getScript("/js/leaflet/leaflet_mapLiving.js", function(){
        setupLeaflet();
    });

    $.getScript("/js/leaflet/leaflet_mapJobAndLiving.js", function(){
        setupLeaflet();
    });
});