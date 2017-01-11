$(document).ready(function(){
    // Check if there is a cookie saved
    $.getJSON("/api/v1/cookies/grid_layout", function(data){
        if(data != null)
        {
            gridItems = []; // Clear the gridItems cache
            $.each(data, function(index, value){
                var item = new GridItem(value.width, value.height, value.x, value.y, value.image, value.link);
            });
            createGrid(gridItems);
        }
        else
        {
            console.log("No saved grid_layout found");
            createGrid(fixtures.GRID1);
        }
    });
});

var Grid = {
    currentSize: 3, // Amount of rows
    direction: 'horizontal',
    buildElements: function(items) { // Create the items
        var item, i;
        var return_array = [];
        for (i = 0; i < items.length; i++) {
            item = items[i];
            $item = item.html;
            $item.attr({
                'data-w': item.width,
                'data-h': item.height,
                'data-x': item.x,
                'data-y': item.y
            });
            return_array.push($item);
        }
        return return_array;
    },
    resize: function(size) {
        if (size) {
            this.currentSize = size;
        }
        $('#grid').gridList('resize', this.currentSize);
    }
};

$(window).resize(function() {
    $('#grid').gridList('reflow');
});

function createGrid(itemCollection) {
    // Clear the grid
    $("#grid").empty();

    // Build the items
    var items = Grid.buildElements(itemCollection);
    $.each(items, function(index, item){
        $('#grid').append(item);
    });

    // Convert the UL to a gridList
    $('#grid').gridList({
        lanes: Grid.currentSize,
        direction: Grid.direction,
        widthHeightRatio: 0.99,//264 / 294,
        heightToFontSizeRatio: 0.25,
        onChange: function(changedItems) {
            // Save the new positions to the objects
            $.each(changedItems, function(index, item){
                var gridItem = gridItems[item.id];
                gridItem.x = item.x;
                gridItem.y = item.y;
                gridItem.width = item.w;
                gridItem.height = item.h;
                gridItem.html = gridItem.createHTML();
                gridItems[gridItem.id] = gridItem;
            });
            saveGridLayout();
        }
    });

    // Create the contextmenu for the grid items
    $.contextMenu({
        selector: '.ui-draggable > .inner',
        trigger: 'right',
        autoHide: true, // TODO: Sometimes menu doesnt hide.. (https://github.com/swisnl/jQuery-contextMenu/issues/132)
        callback: function(key, options) {
            var gridItemID = $(this).parent().data('id');
            var gridItem = gridItems[gridItemID];
            switch (key){
                case 'edit_link':
                    // Show modal to edit link
                    $("#edit_modal").find("#edit_link_div").show();
                    if(gridItem.link != null)
                    {
                        if(gridItem.link.startsWith('http://'))
                            gridItem.link = gridItem.link.replace('http://', "");
                        else if(gridItem.link.startsWith('https://'))
                            gridItem.link = gridItem.link.replace('https://', "");
                    }
                    $("#edit_modal").find("#edit_link").val(gridItem.link);
                    $("#edit_modal").find("#edit_link_title").show();
                    $("#edit_modal").find("#edit_id").val(gridItemID);
                    $("#edit_modal").modal('toggle');
                    break;
                case 'edit_image':
                    // Show modal to edit image
                    $("#edit_modal").find("#edit_image_div").show();
                    $("#edit_modal").find("#edit_image").val(gridItem.image);
                    $("#edit_modal").find("#edit_image_title").show();
                    $("#edit_modal").find("#edit_id").val(gridItemID);
                    $("#edit_modal").modal('toggle');
                    break;
                case 'sizes_1x1':
                case 'sizes_2x1':
                case 'sizes_1x2':
                case 'sizes_2x2':
                    var size = key.replace('sizes_', '').split('x');
                    gridItem.width = parseInt(size[0]);
                    gridItem.height = parseInt(size[1]);
                    var itemElement = $(this).parent();
                    $('#grid').gridList('resizeItem', itemElement, {
                        w: gridItem.width,
                        h: gridItem.height
                    });
                    saveGridLayout();
                    break;
                // case 'edit_delete':
                //     // Delete grid item
                //     gridItems.splice(gridItemID, 1);
                //     // TODO: Recalculate collision or something
                //     // Save
                //     saveGridLayout();
                //     createGrid(gridItems);
                //     break;
                case 'quit':
                    break;
            }
        },
        items: {
            "edit_link": {name: "Change link"},
            "edit_image": {name: "Change image"},
            "sizes": {
                name: "Sizes",
                items: {
                    "sizes_1x1": {name: "1x1"},
                    "sizes_1x2": {name: "1x2"},
                    "sizes_2x1": {name: "2x1"},
                    "sizes_2x2": {name: "2x2"}
                }
            },
            "edit_delete": {name: "Delete", disabled: true},
            "sep1": "---------",
            "quit": {name: "Quit"}
        }
    });

    // Add eventhandler for modal closing
    $("#edit_modal").on('hide.bs.modal', function(){
        // Hide the elements used for link and image editing
        $("#edit_modal").find("#edit_link_div").hide();
        $("#edit_modal").find("#edit_link_title").hide();
        $("#edit_modal").find("#edit_image_div").hide();
        $("#edit_modal").find("#edit_image_title").hide();
    });

    // Add eventhandler for modal saving
    $("#edit_save").on('click', function(){
        // Decide what save function we need to call
        var method = $("#edit_modal").find(".modal-title:visible").text().toLowerCase();
        var gridItemID = parseInt($("#edit_modal").find("#edit_id").val());
        var gridItem = gridItems[gridItemID];
        switch (method)
        {
            case "edit link":
                // TODO: In modal form validation
                // TODO: Add dropdown (fastselect) with predefined sites?
                // Save new link to grid item
                gridItem.link = $("#edit_modal").find("#edit_link").val();
                if(!gridItem.link.startsWith('http://') && !gridItem.link.startsWith('https://'))
                    gridItem.link = "http://" + gridItem.link;
                console.log(gridItem.link);
                gridItem.html = gridItem.createHTML(gridItem.link, gridItem.image);
                saveGridLayout();
                createGrid(gridItems);
                $("#edit_modal").modal('hide');
                break;
            case "edit image":
                // TODO: Add image upload?
                // Save new image to grid item
                gridItem.image = $("#edit_modal").find("#edit_image").val();
                gridItem.html = gridItem.createHTML(gridItem.link, gridItem.image);
                saveGridLayout();
                createGrid(gridItems);
                $("#edit_modal").modal('hide');
                break;
        }
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

function saveGridLayout() {
    // Convert to JSON
    // Save the JSON string to a cookie
    var grid = JSON.stringify(gridItems);

    // Call CookieController to create a cookie
    var sendData = {
        _token: window.Laravel.csrfToken,
        name: 'grid_layout',
        value: grid
    };
    $.post("/api/v1/cookies", sendData, function(data){
        // console.log("Cookie saved!");
    });
}