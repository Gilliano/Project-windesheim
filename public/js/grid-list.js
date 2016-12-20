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
        this.createHTML(link, image);

        // Push this object to the gridItems list
        gridItems.push(this);
    }

    createHTML(link = null, image = null){
        this.html = $(
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

$(document).ready(function(){
    createGrid(fixtures.GRID1);
});

var Grid = {
    currentSize: 4, // Amount of rows
    buildElements: function($gridContainer, items) { // Create the items
        var item, i;
        for (i = 0; i < items.length; i++) {
            item = items[i];
            $item = item.html;
            $item.attr({
                'data-w': item.width,
                'data-h': item.height,
                'data-x': item.x,
                'data-y': item.y
            });
            $gridContainer.append($item);
        }
    },
    resize: function(size) {
        if (size) {
            this.currentSize = size;
        }
        $('#grid').gridList('resize', this.currentSize);
    },
    // flashItems: function(items) {
    //     // Hack to flash changed items visually
    //     for (var i = 0; i < items.length; i++) {
    //         (function($element) {
    //             $element.addClass('changed');
    //             setTimeout(function() {
    //                 $element.removeClass('changed');
    //             }, 0);
    //         })(items[i].$element);
    //     }
    // }
};

$(window).resize(function() {
    $('#grid').gridList('reflow');
});

function createGrid(itemCollection) {
    // Clear the grid
    $("#grid").empty();

    // Build the items
    Grid.buildElements($('#grid'), itemCollection);

    // Convert the UL to a gridList
    $('#grid').gridList({
        lanes: Grid.currentSize,
        widthHeightRatio: 264 / 294,
        heightToFontSizeRatio: 0.25,
        onChange: function(changedItems) {
            // Save the new positions to the objects
            $.each(changedItems, function(index, item){
                var gridItem = gridItems[item.id];
                gridItem.x = item.x;
                gridItem.y = item.y;
                gridItems[gridItem.id] = gridItem;
            })
        }
    });

    // Eventhandler for the control buttons
    $('#grid li .edit').click(function(e) {
        e.preventDefault();
        var itemElement = $(e.currentTarget).closest('li');
        var gridItem = gridItems[itemElement.data('id')];
        var itemAction = $(e.currentTarget).data('a');

        if(itemAction == 'resize')
        {
            // Resize grid item according to given data
            $('#grid').gridList('resizeItem', itemElement, {
                w: $(e.currentTarget).data('w'),
                h: $(e.currentTarget).data('h')
            });

            // Save the changes to the object
            gridItem.width = $(e.currentTarget).data('w');
            gridItem.height = $(e.currentTarget).data('h');
            // gridItem.createHTML();
            gridItems[gridItem.id] = gridItem;
        }
        else if(itemAction == 'edit')
        {
            // Open modal to edit the grid items properties
            $("#edit_id").val(gridItem.id);
            $("#edit_link").val(gridItem.link!==(null)?gridItem.link:'');
            $("#edit_image").val(gridItem.image!==(null)?gridItem.image:'');
            $("#modal_edit").modal('show');
        }
    });

    // Eventhandler for saving edit modal
    $('#edit_save').on('click', function(e){
        // Update grid item and refresh the grid
        // TODO: Expand Form validation
        // TODO: Improve performance
        var gridItem = gridItems[$("#edit_id").val()];
        var link = null, image = null;
        if($("#edit_link").val() != '')
            link = $("#edit_link").val();
        if($("#edit_image").val() != '')
            image = $("#edit_image").val();
        gridItem.createHTML(link, image);
        gridItems[gridItem.id] = gridItem;

        // Recreate the grid
        createGrid(gridItems);

        // Hide the modal
        $("#modal_edit").modal('hide');
    });

    //// Adds a row to the grid
    // $('.add-row').click(function(e) {
    //     e.preventDefault();
    //     Grid.resize(Grid.currentSize + 1);
    // });

    //// Removes a row from the grid
    // $('.remove-row').click(function(e) {
    //     e.preventDefault();
    //     Grid.resize(Math.max(1, Grid.currentSize - 1));
    // });
};

//# sourceMappingURL=grid-list.js.map
