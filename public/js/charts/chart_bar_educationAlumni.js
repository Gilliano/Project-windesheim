function setupChart(){
    // Setup data for post
    var functionName = "educationAlumniChart";
    var educationName = "*";
    var sendData = {
        _token: window.Laravel.csrfToken,
        function: functionName,
        params: [educationName]
    };

    // Get json values from method
    $.getJSON("/json/charts", sendData, function(data){
        // console.log(data);

        // TODO: Get graduated total per education
        var educations_info = [];
        var educations = data.results;
        $.each(educations, function(index, education){
            var non_graduated_total = 0;
            var graduated_total = 0;
            $.each(education, function(i, group){
                non_graduated_total += group['start_amount'] - group['final_amount'];
                graduated_total += group['final_amount'];
            });
            educations_info.push({'name': index, 'non_grad': non_graduated_total, 'grad': graduated_total});
        });

        // Split the data into seperate arrays
        // so we can easily handle them in the chart
        var availeable_colors = ['rgba(255, 0, 0, 0.5)', 'rgba(0, 255, 0, 0.5)', 'rgba(0, 0, 255, 0.5)'];
        var educations_names = [];
        var educataions_data = [];
        var educations_color = [];
        var colorIndex = 0;
        $.each(educations_info, function(index, education){
            educations_names.push(education.name); // Store the name of the education
            educataions_data.push(education.grad); // Store the number of graduates
            educations_color.push(availeable_colors[colorIndex]); // Pick the next color
            if(colorIndex < 2)
                colorIndex++;
            else
                colorIndex = 0;
        });

        var canvas = $("#canvas_bar_educationAlumni"); // Retrieve the canvas to draw our pie on

        // Create a new bar chart
        var chart = new Chart(canvas, {
            type: 'bar',
            data: {
                labels: educations_names, // All the education names
                datasets: [{
                    label: "",
                    data: educataions_data, // All the education graduats
                    backgroundColor: educations_color,
                    borderColor: educations_color,
                    borderWidth: 1
                }],
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 10
                        }
                    }]
                },
                title: {
                    display: true,
                    text: "Diploma's behaald"
                },
                maintainAspectRatio: false,
                responsiveAnimationDuration: 1000 // Without this the animation on Chrome doesnt work..
            }
        });
    });
}