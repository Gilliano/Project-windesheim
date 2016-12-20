@extends('layouts\app')

{{-- For Leaflet --}}
<link rel="stylesheet" href="css/leaflet/leaflet.css"/>
<script src="js/leaflet/leaflet.js"></script>
{{-- For Leaflet plugin: Marker Cluster --}}
<link rel="stylesheet" href="css/leaflet/markerCluster/MarkerCluster.css"/>
<link rel="stylesheet" href="css/leaflet/markerCluster/MarkerCluster.Default.css"/>
<script src="js/leaflet/markerCluster/leaflet.markercluster.js"></script>

{{-- TODO: Needs to be in seperate file --}}
{{-- Custom style --}}
<style>
    .row {
        margin-left: 0px !important;
        margin-right: 0px !important;
        margin-top: 0px !important;
        margin-bottom: 15px !important;
    }

    .leaflet {
        width: 50em;
        height: 50em;
    }
</style>

@section('content')
    {{-- Create canvas for statistics --}}
    <div class="row">
        <div class="col-xs-6">
            <canvas id="canvas_educationAlumni" width="40" height="250"></canvas>
        </div>
        <div class="col-xs-6">
            <canvas id="canvas_personSex" width="40" height="250"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="text-center"><b>Werkende in omgeving</b></div>
            <div id="leaflet_mapJobs" class="leaflet center-block text-center">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="text-center"><b>Wonende in omgeving</b></div>
            <div id="leaflet_mapLiving" class="leaflet center-block">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="text-center"><b>Werkend en Wonend in omgeving</b></div>
            <div id="leaflet_mapJobsAndLiving" class="leaflet center-block text-center">
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