// Initialize charts
$(document).ready(function () {
    // Alumni pie chart
    $.getScript("js/charts/chart_pie_educationAlumni.js", function(data, textStatus, jqxhr){
        setupChart();
    });
    // Sex pie chart
    $.getScript("js/charts/chart_pie_personSex.js", function(data, textStatus, jqxhr){
        setupChart();
    });
    // Alumni bar chart
    $.getScript("js/charts/chart_bar_educationAlumni.js", function(data, textStatus, jqxhr){
        setupChart();
    });
});