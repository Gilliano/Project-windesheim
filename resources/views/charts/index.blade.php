@extends('layouts\app')

<link rel="stylesheet" href="css/leaflet.css">

@section('content')
    {{-- Create canvas for statistics --}}
    <div class="row">
        <div class="col-xs-6">
            <canvas id="canvas_pie_educationAlumni" width="40" height="250"></canvas>
        </div>
        <div class="col-xs-6">
            <canvas id="canvas_pie_personSex" width="40" height="250"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <canvas id="canvas_bar_educationAlumni" width="40" height="500"></canvas>
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
@stop

@section('additionalJS')
    <script src="/js/charts.js"></script>
    <script src="/js/leaflet.js"></script>
@stop