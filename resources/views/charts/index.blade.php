@extends('layouts\app')

{{-- For Leaflet --}}
<link rel="stylesheet" href="css/leaflet/leaflet.css"/>
<script src="js/leaflet/leaflet.js"></script>
{{-- For Leaflet plugin: Marker Cluster --}}
<link rel="stylesheet" href="css/leaflet/markerCluster/MarkerCluster.css"/>
<link rel="stylesheet" href="css/leaflet/markerCluster/MarkerCluster.Default.css"/>
<script src="js/leaflet/markerCluster/leaflet.markercluster.js"></script>

@section('content')
    {{-- Create canvas for statistics --}}
    <div class="row">
        <div class="col-xs-5">
            <canvas id="canvas_educationAlumni" width="40" height="250"></canvas>
        </div>
        <div class="col-xs-3">
            <canvas id="canvas_personSex" width="40" height="250"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div id="map_canvas" style="width: 100%; height: 100%;">
            </div>
        </div>
    </div>

    {{-- For Charts --}}
    <script src="/js/charts/Chart.bundle.min.js"></script>
    {{-- Chart initialization --}}
    <script src="/js/charts/charts_init.js"></script>
    {{-- Leaflet initialization --}}
    <script src="js/leaflet/leaflets_init.js"></script>
@stop