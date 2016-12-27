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
            });

            // Convert to JSON
            // console.log(JSON.stringify(gridItems));
            // TODO: Save the JSON string to a cookie
            var grid = JSON.stringify(gridItems);

            // var date_obj = new Date();
            // date_obj.setMonth(date_obj.getMonth() + 1); // Define lifetime of the cookie;
            // var exp_date = date_obj.toUTCString();//.setMonth(new Date().getMonth() + 1);//.toUTCString();

            // TODO: Call CookieController to create a cookie
            // document.cookie = "grid="+grid+"; expires="+exp_date+";";
            var sendData = {
                _token: window.Laravel.csrfToken,
                name: 'grid_layout',
                value: grid
            };
            $.post("/api/v1/cookies", sendData, function(data){
                console.log("Cookie saved!");

                $.get("/api/v1/cookies/grid_layout", function (data) {
                    console.log(data);

                    sendData._method = "delete";
                    $.post("/api/v1/cookies/grid_layout", sendData, function(data){
                        console.log("Cookie deleted!");

                        $.get("/api/v1/cookies/grid_layout", function (data) {
                            console.log(data);
                        });
                    });
                });
            });
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
            link = $("#edit_link").val(); // TODO: Check if we need to add 'http' prefix? Otherwise laravel returns an error...
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