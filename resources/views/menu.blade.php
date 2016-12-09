<!DOCTYPE html>
<html>
<head>
    <title>gridster test</title>
    <link rel="stylesheet" type="text/css" href="/css/jquery.gridster.css">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
</head>
<body>
<section class="demo">
    <div class="gridster">
        <ul>
            <li data-row="1" data-col="1" data-sizex="1" data-sizey="1"><div id="tile1" class="tile">

                    <div class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="http://handsontek.net/demoimages/tiles/twitter1.png" class="img-responsive"/>
                            </div>
                            <div class="item">
                                <img src="http://handsontek.net/demoimages/tiles/twitter2.png" class="img-responsive"/>
                            </div>
                        </div>
                    </div>

                </div></li>
            <li data-row="2" data-col="1" data-sizex="1" data-sizey="2"><h1>WORLD</h1></li>
            <li data-row="3" data-col="1" data-sizex="1" data-sizey="1"><h1>OR ELSE<h1></l>
            <li data-row="1" data-col="2" data-sizex="2" data-sizey="1"></li>
            <li data-row="2" data-col="2" data-sizex="2" data-sizey="2"></li>
            <li data-row="1" data-col="4" data-sizex="1" data-sizey="1"></li>
            <li data-row="2" data-col="4" data-sizex="2" data-sizey="1"></li>
            <li data-row="3" data-col="4" data-sizex="1" data-sizey="1"></li>
            <li data-row="1" data-col="5" data-sizex="1" data-sizey="1"></li>
            <li data-row="3" data-col="5" data-sizex="1" data-sizey="1"></li>
            <li data-row="1" data-col="6" data-sizex="1" data-sizey="1"></li>
            <li data-row="2" data-col="6" data-sizex="1" data-sizey="2"></li>
        </ul>
    </div>
</section>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.gridster.js" charster="utf-8"></script>
<script type="text/javascript">
    var gridster;

    $(function() {
        gridster = $(".gridster > ul").gridster({
            widget_margins: [10, 10],
            widget_base_dimensions: [140, 140],
            min_cols: 6
        }).data('gridster');
    });
</script>
</body>
</html>