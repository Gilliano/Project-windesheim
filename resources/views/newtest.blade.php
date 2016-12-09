<!doctype html>
<html>
<head>
    <title>Demo &raquo; Dynamic grid width &raquo; gridster.js</title>

    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/styles.css">

    <link rel="stylesheet" type="text/css" href="/css/jquery.gridster.min.css">
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>--}}
    <script src="/js/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>

</head>

<body>
<button class="save-layout btn btn-success">Save Layout</button>
<button class="add-tile btn btn-warning" id="addWidgetButton">Add Tile</button>
<button class="reset-layout btn btn-danger">Reset Layout</button>
<div class="container-fluid">
    <div class="row">
        <div class="gridster col-md-12">
            <ul id="gridster-tiles">
                @foreach($positions as $position)
                    <li data-row="{{ $position->row }}"
                        data-col="{{ $position->col }}"
                        data-min-sizex="1"
                        data-min-sizey="2"
                        data-sizex="{{ $position->size_x }}"
                        data-sizey="{{ $position->size_y }}"
                        id="tile_{{ $i++ }}">
                        <img src="img/menu/statistieken.png" class="tile-icon">
                        <p class="tile-title">Statistieken</p>
                    </li>
                @endforeach

                {{--Menu Tiles:--}}
                {{--- Statistieken--}}
                {{--- Mail (Sturen)--}}
                {{--- Enquete--}}
                {{--- Linkedtinder--}}
                {{--- Achievements--}}
                {{--- Vacatures (voor gastcolleges bijvoorbeeld)--}}
                {{--- Forum--}}
                {{--- Agenda--}}
                {{--- Meetup--}}
                {{--- Socialmedia--}}
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteCookie(name) {
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 UTC;';
    }

    var colors = Array("#99B433", "#EE1111", "#00A300", "#B91D47", "#525252", "#1E7145", "#DA532C", "#FF0097", "#E3A21A", "#9F00A7", "#FFC40D", "#7E3878", "#2B5797", "#603CBA", "#2D89EF", "#00ABA9");

    var gridster;

    $(function () {

        var log = document.getElementById('log');

        gridster = $(".gridster ul").gridster({
            widget_base_dimensions: [175, 75],
            widget_margins: [15, 15],
            autogrow_cols: true,
            resize: {
                enabled: true,
                max_size: [2, 4],
            }
        }).data('gridster');


        $(".save-layout").on("click", function () {
            var s = gridster.serialize();
            document.cookie = "positions=" + JSON.stringify(s) + "; expires=31 Dec 3000 23:59:59 UTC";
        });


        i = "{!! $i !!}";
        i = parseInt(i);
        i = i - 1;

        $(document).on("click", "#addWidgetButton", function (e) {
            e.preventDefault();
            i = i + 1;
            var color = colors[Math.floor(Math.random() * colors.length)];
            gridster.add_widget.apply(gridster, ['<li id="tile_' + i + '"><img src="img/menu/statistieken.png" class="tile-icon"><p class="tile-title">Statistieken</p></li>', 1, 2]);
            document.getElementById("tile_" + i).style.backgroundColor = color;
        });

        $(".reset-layout").on("click", function () {
            deleteCookie('positions');
            location.reload();
        });

        $("#tile_0").on("click", function () {
            window.location = '#';
        });
    });

    $(document).ready(function () {
        tileCount = $('ul#gridster-tiles>li').length;

        for (c = 0; c < tileCount; c++) {
            var tile = document.getElementById("tile_" + c);
            var color = colors[Math.floor(Math.random() * colors.length)];

            tile.style.backgroundColor = color;

            switch (c) {
                case 0:
                    tile.innerHTML = '<img src="img/menu/statistieken.png" class="tile-icon"><p class="tile-title">Statistieken</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 1:
                    tile.innerHTML = '<img src="img/menu/mail2.png" class="tile-icon"><p class="tile-title">Mail</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 2:
                    tile.innerHTML = '<img src="img/menu/enquete.png" class="tile-icon"><p class="tile-title">Enquête</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 3:
                    tile.innerHTML = '<img src="img/menu/linkedtinder.png" class="tile-icon"><p class="tile-title">Link\'edTinder</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 4:
                    tile.innerHTML = '<img src="img/menu/vacatures.png" class="tile-icon"><p class="tile-title">Vacatures</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 5:
                    tile.innerHTML = '<img src="img/menu/achievements.png" class="tile-icon"><p class="tile-title">Achievements</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 6:
                    tile.innerHTML = '<img src="img/menu/forum.png" class="tile-icon"><p class="tile-title">Forum</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 7:
                    tile.innerHTML = '<img src="img/menu/agenda.png" class="tile-icon"><p class="tile-title">Agenda</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 8:
                    tile.innerHTML = '<img src="img/menu/meetup.png" class="tile-icon"><p class="tile-title">Meetup</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 9:
                    tile.innerHTML = '<img src="img/menu/facebook.png" class="tile-icon"><p class="tile-title">Facebook</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 10:
                    tile.innerHTML = '<img src="img/menu/twitter.png" class="tile-icon"><p class="tile-title">Twitter</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
                case 11:
                    tile.innerHTML = '<img src="img/menu/hyves.png" class="tile-icon"><p class="tile-title">Hyves</p><span class="gs-resize-handle gs-resize-handle-both"></span>';
                    break;
            }
        }
    });
</script>
</body>
</html>
