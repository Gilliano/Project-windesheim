function setupChart(){
    // Setup data for post
    var functionName = "educationAlumniChart";
    var educationName = "HBO-ICT";
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: functionName,
        params: [educationName]
    };

    // Get json values from method
    $.getJSON("/json/charts", sendData, function(data){
        // console.log(data.results[educationName]);

        // Retrieve the amount of people that have
        // finished the education and the amount
        // that have not finished it (for all groups)
        var groups = data.results[educationName];
        var non_graduated_total = 0;
        var graduated_total = 0;
        $.each(groups, function(index, value){
             non_graduated_total += value['start_amount'] - value['final_amount'];
             graduated_total += value['final_amount'];
        });

        // Calculate the angle for the pie
        var non_graduated_slice = non_graduated_total / (non_graduated_total+graduated_total) * 360;
        var graduated_slice = graduated_total / (non_graduated_total+graduated_total) * 360;

        var canvas = $("#canvas_pie_educationAlumni"); // Retrieve the canvas to draw our pie on

        // Create a new pie chart
        var chart = new Chart(canvas, {
            type: 'pie',
            data: {
                labels: ["Afgestudeerd", "Niet afgestudeerd"],
                datasets: [{
                    data: [graduated_slice, non_graduated_slice],
                    backgroundColor: [
                        'rgba(98, 244, 66, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderColor: [
                        'rgba(98, 244, 66, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Studenten Afgestudeerd '+educationName
                },
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