// Class for easily creating grid elements
class GridItem {
    constructor(width, height, x, y, image = null, link = null){
        this.id = gridItems.length; // Make sure it has a unique id
        this.width = width;
        this.height = height;
        this.x = x;
        this.y = y;
        this.image = image;
        this.link = link;
        this.html = this.createHTML(link, image);

        // Push this object to the gridItems list
        gridItems.push(this);
    }

    createHTML(link = null, image = null){
        return $(
            '<li data-id='+this.id+'>' +
                '<div class="inner">' +
                    '<div class="controls">' +
                        '<a href="#zoom1" class="edit" data-a="resize" data-w="1" data-h="1">1x1</a>' +
                        '<a href="#zoom2" class="edit" data-a="resize" data-w="2" data-h="1">2x1</a>' +
                        '<a href="#zoom1" class="edit" data-a="resize" data-w="1" data-h="2">1x2</a>' +
                        '<a href="#zoom2" class="edit" data-a="resize" data-w="2" data-h="2">2x2</a>' +
                        '<a href="#edit" class="edit" data-a="edit">edit</a>' +
                    '</div>' +
                    (link!==(null)?'<a href='+link+'>':'') +
                        (image!==(null)?'<img src='+image+' class="image">':'<div style="width:100%; height:100%; background-color: '+randomColor('rgb')+'"></div>') +
                    (link!==(null)?'</a>':'') +
                '</div>' +
            '</li>'
        );
    }

    toJSON(){
        return {
            id: this.id,
            width: this.width,
            height: this.height,
            x: this.x,
            y: this.y,
            image: this.image,
            link: this.link,
            // html: this.html // cycling object error
        };
    }
}

var gridItems = [];
var fixtures = {};

fixtures.GRID1 = [
        new GridItem(1,1,0,0,"https://www.nasa.gov/sites/default/files/styles/image_card_4x3_ratio/public/thumbnails/image/leisa_christmas_false_color.png?itok=Jxf0IlS4", "https://www.google.com"),
        new GridItem(1,2,1,0),
        new GridItem(1,1,2,0),
        new GridItem(1,1,3,0),
        new GridItem(1,1,4,0),
        new GridItem(1,1,0,1),
        new GridItem(1,1,2,1),
        new GridItem(1,1,3,1),
    ];

// Enable Node module
if (typeof(require) == 'function') {
    for (var k in fixtures) {
        exports[k] = fixtures[k];
    }
}
