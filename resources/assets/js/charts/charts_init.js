// Initialize charts
$(document).ready(function () {
    // Alumni pie chart
    $("canvas[name='canvas_pie_educationAlumni']").each(function(index, canvas){
        setupPieEducationAlumni($(canvas).data('f'), canvas);
    });
    // Sex pie chart
    setupPiePersonSex();
    // Alumni bar chart
    setupBarEducationAlumni();
});

// Click event handler for educationlist items
$("#educationlist").find("a").on('click', function(){
    // Remove active from all other items
    $("#educationlist").find("a").each(function(index, item){
        if($(item).hasClass('active'))
            $(item).removeClass('active');
        $(item).parent().find('.collapse').collapse("hide");
    });

    // Check if item is not yet active
    if(!$(this).hasClass('active'))
        $(this).addClass('active');

    // Open up div with education specific charts
    $(this).parent().find('.collapse').collapse("show");
});