// Initialize charts
$(document).ready(function () {
    // Alumni chart
    $.getScript("js/charts/chart_educationAlumni.js", function(data, textStatus, jqxhr){
        setupChart();
    });
    // Sex chart
    $.getScript("js/charts/chart_personSex.js", function(data, textStatus, jqxhr){
        setupChart();
    });
});