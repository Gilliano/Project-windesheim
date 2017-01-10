function setupPiePersonSex(){
    // Setup data for post
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: "personSexChart",
        params: []
    };

    // Get json values from method
    $.getJSON("/json/charts", sendData, function(data){
        // console.log(data);
        var man_slice = data[0] / (data[0]+data[1]) * 360; // Calculate the angle for this pie_slice
        var female_slice = data[1] / (data[0]+data[1]) * 360; // Calculate the angle for this pie_slice

        var canvas = $("#canvas_pie_personSex"); // Retrieve the canvas to draw our pie on
        // Create a new chart
        var chart = new Chart(canvas, {
            type: 'pie',
            data: {
                labels: ["Man", "Vrouw"],
                datasets: [{
                    data: [man_slice, female_slice],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(244, 66, 209, 0.5)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(244, 66, 209,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    // display: true,
                    // text: 'Geslacht van geregistreerde gebruikers'
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