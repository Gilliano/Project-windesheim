/**
 * Utility functions
 */

// Returns a random color
// Choose a format for returning the color
// formats: 'rgb', null
function randomColor(format = null){
    var red = Math.floor((Math.random() * 255));
    var green = Math.floor((Math.random() * 255));
    var blue = Math.floor((Math.random() * 255));
    if(format == "rgb")
        var randomcolor = "rgb("+red+","+green+","+blue+")";
    else
        var randomcolor = {red: red, green: green, blue: blue};

    return randomcolor;
}