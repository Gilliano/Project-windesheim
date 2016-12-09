function setupChart(){
    // Setup data for post
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: "educationAlumniChart",
        params: ["Rosalee Schamberger PhD"]
    };

    // Get json values from method
    $.post("/json/charts", sendData, function(data){
        console.log(data);
        var data = $.parseJSON(data);
        var non_graduated_slice = data[0] / (data[0]+data[1]) * 360; // Calculate the angle for this pie_slice
        var graduated_slice = data[1] / (data[0]+data[1]) * 360; // Calculate the angle for this pie_slice

        var canvas = $("#canvas_educationAlumni"); // Retrieve the canvas to draw our pie on
        // Create a new chart
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
}