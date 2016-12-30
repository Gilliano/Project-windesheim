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
        this.contextmenu = this.createContextmenu();

        // Push this object to the gridItems list
        gridItems.push(this);
    }

    createHTML(link = null, image = null){
        return $(
            '<li data-id='+this.id+'>' +
                '<div class="inner">' +
                    (link!==(null)?'<a href='+link+' target=_blank>':'') +
                        (image!==(null)?'<img src='+image+' class="image">':'<div style="width:100%; height:100%; background-color: '+randomColor('rgb')+'"></div>') +
                    (link!==(null)?'</a>':'') +
                '</div>' +
            '</li>'
        );
    }

    createContextmenu(){
        // return
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
        new GridItem(1,1,5,0),
        new GridItem(1,1,6,0),
        new GridItem(1,1,7,0),
        new GridItem(1,1,8,0),
        new GridItem(1,1,9,0),
        new GridItem(1,1,0,1),
        new GridItem(1,1,2,1),
        new GridItem(2,2,3,1),
        new GridItem(1,1,5,1),
        new GridItem(1,1,6,1),
        new GridItem(1,1,7,1),
        new GridItem(1,1,8,1),
        new GridItem(1,1,9,1),
        new GridItem(1,1,0,2),
        new GridItem(1,1,1,2),
        new GridItem(1,1,2,2),
        new GridItem(1,1,5,2),
        new GridItem(1,1,6,2),
        new GridItem(1,1,7,2),
        new GridItem(1,1,8,2),
        new GridItem(1,1,9,2),
    ];

// Enable Node module
if (typeof(require) == 'function') {
    for (var k in fixtures) {
        exports[k] = fixtures[k];
    }
}
