
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>gridster.js</title>

    <meta name="description" content="gridster.js, a drag-and-drop multi-column jQuery grid plugin">
    <meta name="author" content="duscksboard">

    <link rel="stylesheet" type="text/css" href="css/jquery.gridster.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Rancho' rel='stylesheet' type='text/css'>
</head>
<body>

<header role="header">
    <div class="wrapper">
        <a href="http://gridster.net" class="logo">gridster.js</a>
        <h1 class="claim">put a grid in your life</h1>

        <nav>
            <ul>
                <li><a href="#intro">What?</a></li>
                <li><a href="#demos">Demos</a></li>
                <li><a href="#usage">Usage</a></li>
                <li><a href="#documentation">Documentation</a></li>
                <li><a href="#download">Download</a></li>
                <li><a href="https://github.com/dsmorse/gridster.js/issues">Issues</a></li>
            </ul>
        </nav>
    </div>
</header>


<div role="main">

    <section id="intro" class="wrapper m_txt">
        <div>
            <h2 class="heading-xl">Plug in to the grid</h2>
            <p>This is it, the mythical drag-and-drop multi-column grid has arrived. Gridster is a jQuery plugin that allows building intuitive draggable layouts from elements spanning multiple columns. You can even dynamically add and remove elements from the grid. It is on par with sliced bread, or possibly better. MIT licensed. Suitable for children of all ages. Made by <a href="http://ducksboard.com/">Ducksboard</a>.</p>
            <p>It's so sweet we like to call it drag-and-drool.</p>
        </div>
        <div class="ttr">
            <a href="https://github.com/dsmorse/gridster.js/zipball/master" class="i_download"><span>Download now</span></a>
            <a href="https://github.com/dsmorse/gridster.js"><img src="https://badge.fury.io/gh/dsmorse%2Fgridster.js.svg" alt="GitHub version" height="18"></a>
        </div>

    </section>
    <section id="badges" class="wrapper m_txt">
        <div>
            <a href="https://travis-ci.org/dsmorse/gridster.js"><img src="https://travis-ci.org/dsmorse/gridster.js.svg" alt="Build Status" height="24"></a>
            <a href="http://badge.fury.io/rb/gridster.js-rails"><img src="https://badge.fury.io/rb/gridster.js-rails.svg" alt="Gem Version" height="24"></a>

            <a href="http://bower.io/search/?q=gridster-js"><img src="https://badge.fury.io/bo/gridster-js.svg" alt="Bower version" height="24"></a>
        </div>
    </section>


    <section class="demo">
        <div class="gridster">
            <ul>
                <li data-row="1" data-col="1" data-sizex="2" data-sizey="1"></li>
                <li data-row="3" data-col="1" data-sizex="1" data-sizey="1"></li>

                <li data-row="3" data-col="2" data-sizex="2" data-sizey="1"></li>
                <li data-row="1" data-col="2" data-sizex="2" data-sizey="2"></li>

                <li class="try" data-row="1" data-col="4" data-sizex="1" data-sizey="1" data-max-sizex="1" data-max-sizey="1"></li>
                <li data-row="2" data-col="4" data-sizex="2" data-sizey="1"></li>
                <li data-row="3" data-col="4" data-sizex="1" data-sizey="1"></li>

                <li data-row="1" data-col="5" data-sizex="1" data-sizey="1"></li>
                <li data-row="3" data-col="5" data-sizex="1" data-sizey="1"></li>

                <li data-row="1" data-col="6" data-sizex="1" data-sizey="1"></li>
                <li data-row="2" data-col="6" data-sizex="1" data-sizey="2"></li>
            </ul>
        </div>

    </section>


    <section id="demos">
        <div class="wrapper">
            <header>
                <h2 class="heading-xl">Demos</h2>
            </header>
            <article class="m_txt">
                <ul>
                    <li><a href="demos/adding-widgets-dynamically.html">Adding widgets dynamically</a></li>
                    <li><a href="demos/custom-drag-handle.html">Custom drag handle</a></li>
                    <li><a href="demos/expandable-widgets.html">Expandable widgets</a></li>
                    <li><a href="demos/grid-from-serialize.html">Build grid from serialize</a></li>
                    <li><a href="demos/multiple-grids.html">Multiple gridster instances on the same page</a></li>
                    <li><a href="demos/resize.html">Resizable widgets</a></li>
                    <li><a href="demos/resize-limits.html">Resizable widgets with constraints</a></li>
                    <li><a href="demos/serialize.html">Serialize widgets positions</a></li>
                    <li><a href="demos/using-drag-callbacks.html">Using drag callbacks</a></li>
                    <li><a href="demos/using-resize-callbacks.html">Using resize callbacks</a></li>
                    <li><a href="demos/dynamic-grid-width.html">Dynamic grid width</a></li>
                    <li><a href="demos/responsive.html">Responsive grid width</a></li>
                    <li><a href="demos/SwapDrop.html">Grid with larger widgets swapping spots with smaller ones</a></li>
                    <li><a href="demos/sticky-postion.html">Grid that allows widgets to be exactly placed anywhere</a></li>
                </ul>
            </article>
        </div>
    </section>


    <section id="usage">
        <div class="wrapper">
            <header>
                <h2 class="heading-xl">Usage</h2>
            </header>

            <article class="m_txt">
                <h3 class="heading-l">Setup</h3>

                <h4 class="heading-m">Include dependencies</h4>
                <p>Gridster is currently written as a jQuery plugin, so you need to include it in the head of the document. Download the latest release at <a href="http://jquery.com/">jQuery</a>.</p>

                <script src="https://gist.github.com/3129541.js?file=gridder.html"></script>

                <h4 class="heading-m">HTML Structure</h4>
                <p>Class names and tags are customizable, gridster only cares about data attributes. Use a structure like this:</p>

                <script src="https://gist.github.com/3129747.js?file=gridster.html"></script>

                <h4 class="heading-m">Grid it up!</h4>
                <p>Gridster accepts one argument, a hash of with configuration options. See the <a href="#documentation">documentation</a> for details.</p>

                <script src="https://gist.github.com/3129767.js?file=gridder.js"></script>

            </article>

            <article class="m_txt">
                <h3 class="heading-l">Using the API</h3>
                <p>To get hold of the API object, use the jQuery data method like so:</p>

                <script src="https://gist.github.com/3129811.js?file=gridster.js"></script>

                <h4 class="heading-m">Add a new widget to the grid</h4><br>
                <script src="https://gist.github.com/3129866.js?file=gridster.js"></script>

                <h4 class="heading-m">Remove a widget from the grid</h4><br>
                <script src="https://gist.github.com/3129893.js?file=gridster.js"></script>

                <h4 class="heading-m">Get a serialized array with the elements positions</h4>
                <p>Creates a JavaScript array of objects with positions of all widgets, ready to be encoded as a JSON string.</p>

                <script src="https://gist.github.com/3129908.js?file=gridster.js"></script>


            </article>

        </div><!-- .wrapper -->
    </section>


    <section id="documentation">
        <div class="wrapper">
            <header>
                <h2 class="heading-xl">Documentation</h2>

                <h3 class="heading-m">Options</h3>
                <nav>
                    <ul class="m_tags">
                        <li><a href="#widget_class_opt">widget_class</a></li>
                        <li><a href="#widget_margins_opt">widget_margins</a></li>
                        <li><a href="#widget_base_dimensions_opt">widget_base_dimensions</a></li>
                        <li><a href="#min_cols_opt">min_cols</a></li>
                        <li><a href="#max_cols_opt">max_cols</a></li>
                        <li><a href="#min_rows_opt">min_rows</a></li>
                        <li><a href="#max_size_x_opt">max_size_x</a></li>
                        <li><a href="#max_size_y_opt">max_size_y</a></li>
                        <li><a href="#extra_cols_opt">extra_cols</a></li>
                        <li><a href="#extra_rows_opt">extra_rows</a></li>
                        <li><a href="#autogenerate_stylesheet_opt">autogenerate_stylesheet</a></li>
                        <li><a href="#avoid_overlapped_widgets_opt">avoid_overlapped_widgets</a></li>

                        <li><a href="#draggable_start_opt">draggable.start</a></li>
                        <li><a href="#draggable_start_opt">draggable.drag</a></li>
                        <li><a href="#draggable_start_opt">draggable.stop</a></li>

                        <li><a href="#resize_enabled_opt">resize.enabled</a></li>
                        <li><a href="#resize_axes_opt">resize.axes</a></li>
                        <li><a href="#resize_handle_class_opt">resize.handle_class</a></li>
                        <li><a href="#resize_handle_append_to_opt">resize.handle_append_to</a></li>
                        <li><a href="#resize_max_size_opt">resize.max_size</a></li>
                        <li><a href="#resize_start_opt">resize.start</a></li>
                        <li><a href="#resize_resize_opt">resize.resize</a></li>
                        <li><a href="#resize_stop_opt">resize.stop</a></li>

                        <li><a href="#on_overlap_start_opt">collision.on_overlap_start</a></li>
                        <li><a href="#on_overlap_opt">collision.on_overlap</a></li>
                        <li><a href="#on_overlap_stop_opt">collision.on_overlap_stop</a></li>
                    </ul>
                </nav><br><br>

                <div class="m_txt">
                    <h3 class="heading-m">Methods</h3>
                    <p>These are the most commonly used methods. If you want more details, check out the <a href="http://dsmorse.github.io/gridster.js/docs/classes/Gridster.html">documentation generated from source</a>.</p>
                </div>

                <nav>
                    <ul class="m_tags">
                        <li><a href="#add_widget_method">add_widget</a></li>
                        <li><a href="#resize_widget_method">resize_widget</a></li>
                        <li><a href="#remove_widget_method">remove_widget</a></li>
                        <li><a href="#remove_all_widgets_method">remove_all_widgets</a></li>
                        <li><a href="#serialize_method">serialize</a></li>
                        <li><a href="#serialize_changed_method">serialize_changed</a></li>
                        <li><a href="#enable_method">enable</a></li>
                        <li><a href="#disable_method">disable</a></li>
                        <li><a href="#enable_resize_method">enable_resize</a></li>
                        <li><a href="#disable_resize_method">disable_resize</a></li>
                    </ul>
                </nav>
            </header>


            <article id="options" class="m_doc_method">
                <div class="m_txt">
                    <h3 id="widget_class_opt" class="heading-l">Options</h3>
                    <p>A gridster configuration object.</p>

                    <h4 id="widget_selector_opt" class="heading-m">widget_selector: <em>"li"</em></h4>
                    <p>Define which elements are the widgets. Can be a CSS Selector string or a jQuery collection of HTMLElements.</p>

                    <h4 id="widget_margins_opt" class="heading-m">widget_margins: <em>[10, 10]</em></h4>
                    <p>Horizontal and vertical margins respectively for widgets.</p>

                    <h4 id="widget_base_dimensions_opt" class="heading-m">widget_base_dimensions: <em>[140, 140]</em></h4>
                    <p>Base widget dimensions in pixels. The first index is the width, the second is the height.</p>

                    <h4 id="extra_rows_opt" class="heading-m">extra_rows: <em>0</em></h4>
                    <p>Add more rows to the grid in addition to those that have been calculated.</p>

                    <h4 id="extra_cols_opt" class="heading-m">extra_cols: <em>0</em></h4>
                    <p>Add more rows to the grid in addition to those that have been calculated.</p>

                    <h4 id="max_cols_opt" class="heading-m">max_cols: <em>null</em></h4>
                    <p>The maximum number of columns to create. Set to `null` to disable.</p>

                    <h4 id="min_cols_opt" class="heading-m">min_cols: <em>1</em></h4>
                    <p>The minimum number of columns to create.</p>

                    <h4 id="min_rows_opt" class="heading-m">min_rows: <em>15</em></h4>
                    <p>The minimum number of rows to create.</p>

                    <h4 id="max_size_x_opt" class="heading-m">max_size_x: <em>false</em></h4>
                    <p>The maximum number of columns that a widget can span.</p>

                    <h4 id="autogenerate_stylesheet_opt" class="heading-m">autogenerate_stylesheet: <em>true</em></h4>
                    <p>If true, all the CSS required to position all widgets in their respective columns and rows will be generated automatically and injected to the <code>&lt;head&gt;</code> of the document. You can set this to false and write your own CSS targeting rows and cols via data-attributes like so: <code>[data-col="1"] { left: 10px; }</code>.</p>

                    <h4 id="avoid_overlapped_widgets_opt" class="heading-m">avoid_overlapped_widgets: <em>true</em></h4>
                    <p>Don't allow widgets loaded from the DOM to overlap. This is helpful if you're loading widget positions form the database and they might be inconsistent.</p>

                    <h4 id="serialize_params_opt" class="heading-m">serialize_params: <em>function($w, wgd) { return { col: wgd.col, row: wgd.row, size_x: wgd.size_x, size_y: wgd.size_y } }</em></h4>
                    <p>A function to return serialized data for each each widget, used when calling the <a href="#serialize_method">serialize method</a>. Two arguments are passed: <code>$w</code>: the jQuery wrapped HTMLElement, and <code>wgd</code>: the grid coords object with keys <code>col</code>, <code>row</code>, <code>size_x</code> and <code>size_y</code>.</p>

                    <h4 id="draggable_start_opt" class="heading-m">draggable.start: <em>function(event, ui){}</em></h4>
                    <p>A callback for when dragging starts.</p>

                    <h4 id="draggable_drag_opt" class="heading-m">draggable.drag: <em>function(event, ui){}</em></h4>
                    <p>A callback for when the mouse is moved during the dragging.</p>

                    <h4 id="draggable_stop_opt" class="heading-m">draggable.stop: <em>function(event, ui){}</em></h4>
                    <p>A callback for when dragging stops.</p>

                    <h4 id="resize_enabled_opt" class="heading-m">resize.enabled: <em>false</em></h4>
                    <p>Set to true to enable drag-and-drop widget resizing. This setting doesn't affect to the <code>resize_widget</code> method.</p>

                    <h4 id="resize_axes_opt" class="heading-m">resize.axes: <em>['both']</em></h4>
                    <p>Axes in which widgets can be resized. Can be <em>x</em>, <em>y</em> or <em>both</em></p>

                    <h4 id="resize_handle_class_opt" class="heading-m">resize.handle_class: <em>'gs-resize-handle'</em></h4>
                    <p>CSS class name used by resize handles.</p>

                    <h4 id="resize_handle_append_to_opt" class="heading-m">resize.handle_append_to: <em>''</em></h4>
                    <p>Set a valid CSS selector to append resize handles to. If value evaluates to false it's appended to the widget.</p>

                    <h4 id="resize_max_size_opt" class="heading-m">resize.max_size: <em>[Infinity, Infinity]</em></h4>
                    <p>Limit widget dimensions when resizing. Array values should be integers: <code>[max_cols_occupied, max_rows_occupied]</code></p>

                    <h4 id="resize_start_opt" class="heading-m">resize.start: <em>function(e, ui, $widget) {}</em></h4>
                    <p>A callback executed when resizing starts.</p>

                    <h4 id="resize_resize_opt" class="heading-m">resize.resize: <em>function(e, ui, $widget) {}</em></h4>
                    <p>A callback executed during the resizing.</p>

                    <h4 id="resize_stop_opt" class="heading-m">resize.stop: <em>function(e, ui, $widget) {}</em></h4>
                    <p>A callback executed when resizing stops.</p>

                    <h4 id="on_overlap_start_opt" class="heading-m">collision.on_overlap_start: <em>function(collider_data) { }</em></h4>
                    <p>A callback for the first time when a widget enters a new grid cell.</p>

                    <h4 id="on_overlap_opt" class="heading-m">collision.on_overlap: <em>function(collider_data) { }</em></h4>
                    <p>A callback for each time a widget moves inside a grid cell.</p>

                    <h4 id="on_overlap_stop_opt" class="heading-m">collision.on_overlap_stop: <em>function(collider_data) { }</em></h4>
                    <p>A callback for the first time when a widget leaves its old grid cell.</p>
                </div>
            </article>


            <article id="add_widget_method" class="m_doc_method">
                <h3>.add_widget( html, [size_x], [size_y], [col], [row] )</h3>

                <div class="m_txt">
                    <p>Create a new widget with the given html and add it to the grid.</p>

                    <h4 class="heading-m">Parameters</h4>
                    <dl>
                        <dt>html <em>String|HTMLElement</em></dt>
                        <dd>The string of HTMLElement that represents the widget is going to be added.</dd>
                        <dt>size_x <em>Number</em></dt>
                        <dd>The number of rows that the widget occupies. Defaults to <em>1</em>.</dd>
                        <dt>size_y <em>Number</em></dt>
                        <dd>The number of columns that the widget occupies. Defaults to <em>1</em>.</dd>
                        <dt>col <em>Number</em></dt>
                        <dd>The column the widget should start in.</dd>
                        <dt>row <em>Number</em></dt>
                        <dd>The row the widget should start in.</dd>
                    </dl>

                    <h4 class="heading-m">Returns</h4>
                    <p>Returns the jQuery wrapped HTMLElement representing the widget that's been created.</p>
                </div>
            </article>

            <article id="resize_widget_method" class="m_doc_method">
                <h3>.resize_widget( $widget, [size_x], [size_y], [reposition], [callback] )</h3>

                <div class="m_txt">
                    <p>Change the size of a widget. Width is limited to the current grid width.</p>

                    <h4 class="heading-m">Parameters</h4>
                    <dl>
                        <dt>$widget <em>HTMLElement</em></dt>
                        <dd>The jQuery wrapped HTMLElement that represents the widget is going to be resized.</dd>
                        <dt>size_x <em>Number</em></dt>
                        <dd>The number of rows that the widget is going to span. Defaults to current size_x.</dd>
                        <dt>size_y <em>Number</em></dt>
                        <dd>The number of columns that the widget is going to span. Defaults to current size_y.</dd>
                        <dt>reposition <em>Boolean</em></dt>
                        <dd>Set to false to not move the widget to the left if there is insufficient space on the right.
                            By default <code>size_x</code> is limited to the space available from the column where the widget begins, until the last column to the right.</dd>
                    </dl>

                    <h4 class="heading-m">Returns</h4>
                    <p>Returns the jQuery wrapped HTMLElement representing the widget that's been resized.</p>
                </div>
            </article>

            <article id="remove_widget_method" class="m_doc_method">
                <h3>.remove_widget( el, [callback] )</h3>

                <div class="m_txt">
                    <p>Remove a widget from the grid.</p>

                    <h4 class="heading-m">Parameters</h4>
                    <dl>
                        <dt>el <em>HTMLElement</em></dt>
                        <dd>The jQuery wrapped HTMLElement representing the widget that you want to remove.</dd>
                        <dt>callback <em>Function</em></dt>
                        <dd>A callback for when the widget is removed.</dd>
                    </dl>

                    <h4 class="heading-m">Returns</h4>
                    <p>Returns the instance of the Gridster class.</p>
                </div>
            </article>

            <article id="serialize_method" class="m_doc_method">
                <h3>.serialize( [$widgets] )</h3>

                <div class="m_txt">
                    <p>Creates an array of objects representing the current position of all widgets in the grid.</p>

                    <h4 class="heading-m">Parameters</h4>
                    <dl>
                        <dt>$widgets <em>HTMLElement</em></dt>
                        <dd>The collection of jQuery wrapped HTMLElements you want to serialize. If no argument is passed all widgets will be serialized.</dd>
                    </dl>

                    <h4 class="heading-m">Returns</h4>
                    <p>Returns an Array of Objects (ready to be encoded as a JSON string) with the data specified by the <a href="#serialize_params_opt">serialize_params</a> option.</p>

                </div>
            </article>

            <article id="serialize_changed_method" class="m_doc_method">
                <h3>.serialize_changed( )</h3>

                <div class="m_txt">
                    <p>Creates an array of objects representing the current position of the widgets who have changed position.</p>
                    <h4 class="heading-m">Returns</h4>
                    <p>Returns an Array of Objects (ready to be encoded as a JSON string) with the data specified in the <a href="#serialize_params_opt">serialize_params</a> option.</p>
                </div>
            </article>

            <article id="enable_method" class="m_doc_method">
                <h3>.enable( )</h3>

                <div class="m_txt">
                    <p>Enables dragging.</p>
                    <h4 class="heading-m">Returns</h4>
                    <p>Returns the instance of the Gridster class.</p>
                </div>
            </article>

            <article id="disable_method" class="m_doc_method">
                <h3>.disable( )</h3>

                <div class="m_txt">
                    <p>Disables dragging.</p>
                    <h4 class="heading-m">Returns</h4>
                    <p>Returns the instance of the Gridster class.</p>
                </div>
            </article>

        </div><!-- .wrapper -->
    </section>



    <section id="download">
        <div class="wrapper">
            <header>
                <h2 class="heading-xl">Download</h2>
            </header>

            <article class="m_txt">
                <p>Remember that gridster depends on jQuery. Download the latest release at <a href="http://jquery.com/">jQuery</a>.
                </p>

                <h3 class="heading-l">gridster.<u>js</u></h3>
                <dl>
                    <dt>Development version</dt>
                    <dd><a href="https://raw.github.com/dsmorse/gridster.js/master/dist/jquery.gridster.js">jquery.gridster.js</a></dd>
                    <dt>Production version (minified)</dt>
                    <dd><a href="https://raw.github.com/dsmorse/gridster.js/master/dist/jquery.gridster.min.js">jquery.gridster.min.js</a></dd>
                </dl>

                <h3 class="heading-l">gridster.<u>css</u></h3>
                <dl>
                    <dt>Development version</dt>
                    <dd><a href="https://raw.github.com/dsmorse/gridster.js/master/dist/jquery.gridster.css">jquery.gridster.css</a></dd>
                    <dt>Production version (minified)</dt>
                    <dd><a href="https://raw.github.com/dsmorse/gridster.js/master/dist/jquery.gridster.min.css">jquery.gridster.min.css</a></dd>
                </dl>

                <h3 class="heading-l">or clone the repo from github</h3>
                <dl>
                    <dt>Github project</dt>
                    <dd><a href="https://github.com/dsmorse/gridster.js">gridster.js</a></dd>
                    <dt>Download .zip</dt>
                    <dd><a href="https://github.com/dsmorse/gridster.js/zipball/master">gridster.js.zip</a></dd>
                </dl>


            </article>

        </div><!-- .wrapper -->
    </section>

    <section id="download">
        <div class="wrapper">
            <header>
                <h2 class="heading-xl">Browser support</h2>
            </header>

            <article class="m_txt">
                <p>Gridster supports Internet Explorer 9+, Firefox, Chrome, Safari and Opera.</p>
            </article>

        </div><!-- .wrapper -->
    </section>

</div>

<a href="https://github.com/dsmorse/gridster.js"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

<footer role="footer">
    <div class="wrapper">
        <a href="http://gridster.net" class="logo-small">gridster.js</a>
        <p class="claim">put a grid in your life</p>
    </div>


    <p>
        A project by: <a href="http://ducksboard.com" class="ducksboard-logo">Ducksboard</a>
    </p>
</footer>

<script type="text/javascript" src="assets/js/libs/jquery-1.7.2.min.js"></script>
<script src="dist/jquery.gridster.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    var gridster;

    $(function(){

        gridster = $(".gridster > ul").gridster({
            widget_margins: [10, 10],
            widget_base_dimensions: [140, 140],
            min_cols: 6,
            resize: {
                enabled: true
            }
        }).data('gridster');


        // var collection = [
        //     ['<li><div class="title">drag</div>Widget content</li>', 1, 2],
        //     ['<li><div class="title">drag</div>Widget content</li>', 5, 2],
        //     ['<li><div class="title">drag</div>Widget content</li>', 3, 2],
        //     ['<li><div class="title">drag</div>Widget content</li>', 2, 1],
        //     ['<li><div class="title">drag</div>Widget content</li>', 4, 1],
        //     ['<li><div class="title">drag</div>Widget content</li>', 1, 2],
        //     ['<li><div class="title">drag</div>Widget content</li>', 2, 1],
        //     ['<li><div class="title">drag</div>Widget content</li>', 3, 2],
        //     ['<li><div class="title">drag</div>Widget content</li>', 1, 1],
        //     ['<li><div class="title">drag</div>Widget content</li>', 2, 2],
        //     ['<li><div class="title">drag</div>Widget content</li>', 1, 3],
        // ];

        // $.each(collection, function(i, widget){
        //     gridster.add_widget.apply(gridster, widget)
        // });

    });
</script>


<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-33489625-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

</body>
</html>
