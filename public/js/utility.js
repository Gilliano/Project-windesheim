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

/**
 Returns the html-string representation of jQuery object.
 You can also replace the whole element with some html by passing html string as an attribute.
 Pavel Pravosud <pavel@pravosud.com>
 Licensed under MIT license in 2012
 https://github.com/rwz/jquery.outerHTML
 */
(function ($) {
    'use strict';

    var jdiv = $('<div>'), div = jdiv.get(0);

    var getter = ('outerHTML' in div) ?
        // native support
        function(){ return this.get(0).outerHTML; } :

        // no native support
        function(){ return jdiv.html(this.first().clone()).html(); };

    $.fn.outerHTML = function(){
        return arguments.length ?
            this.replaceWith.apply(this, arguments) :
            getter.call(this);
    };

}(jQuery));

/*! https://mths.be/startswith v0.2.0 by @mathias */
if (!String.prototype.startsWith) {
    (function() {
        'use strict'; // needed to support `apply`/`call` with `undefined`/`null`
        var defineProperty = (function() {
            // IE 8 only supports `Object.defineProperty` on DOM elements
            try {
                var object = {};
                var $defineProperty = Object.defineProperty;
                var result = $defineProperty(object, object, object) && $defineProperty;
            } catch(error) {}
            return result;
        }());
        var toString = {}.toString;
        var startsWith = function(search) {
            if (this == null) {
                throw TypeError();
            }
            var string = String(this);
            if (search && toString.call(search) == '[object RegExp]') {
                throw TypeError();
            }
            var stringLength = string.length;
            var searchString = String(search);
            var searchLength = searchString.length;
            var position = arguments.length > 1 ? arguments[1] : undefined;
            // `ToInteger`
            var pos = position ? Number(position) : 0;
            if (pos != pos) { // better `isNaN`
                pos = 0;
            }
            var start = Math.min(Math.max(pos, 0), stringLength);
            // Avoid the `indexOf` call if no match is possible
            if (searchLength + start > stringLength) {
                return false;
            }
            var index = -1;
            while (++index < searchLength) {
                if (string.charCodeAt(start + index) != searchString.charCodeAt(index)) {
                    return false;
                }
            }
            return true;
        };
        if (defineProperty) {
            defineProperty(String.prototype, 'startsWith', {
                'value': startsWith,
                'configurable': true,
                'writable': true
            });
        } else {
            String.prototype.startsWith = startsWith;
        }
    }());
}

//# sourceMappingURL=utility.js.map
