// Initialize charts
$(document).ready(function () {
    // TODO: Get data from json
    $.get("/json/charts/educationChartAlumni", function(data){
        // console.log(data);
        console.log(data);
        var data = $.parseJSON(data);
        var non_graduated_slice = data[0] / (data[0]+data[1]) * 360;
        var graduated_slice = data[1] / (data[0]+data[1]) * 360;

        var canvas = $("#canvas");
        var chart = new Chart(canvas, {
            type: 'pie',
            data: {
                labels: ["Afgestudeerd", "Niet afgestudeerd"],
                datasets: [{
                    label: 'Studenten Afgestudeerd',
                    data: [graduated_slice, non_graduated_slice],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(item, data){
                            var rounded_values = Math.round(data.datasets[0].data[item.index]/360*100);
                            var label = data.labels[item.index];
                            return label + ": " + rounded_values + "%";
                        }
                    }
                },
                maintainAspectRatio: false,
                responsiveAnimationDuration: 1000 // Without this the animation on Chrome doesnt work..
            }
        });
    });
});