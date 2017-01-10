@extends('layouts\app')

@section('additionalCSS')
    <link rel="stylesheet" href="css/leaflet.css">
    <style>
        .panel{
            margin-right: 5px;
        }
    </style>
@stop
@section('content')
    {{-- Educations specific statistics --}}
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <ul id="educationlist" class="list-group">
                @foreach($educations as $education)
                    <div name="educationitem">
                        <a href="#" class="list-group-item list-group-item-action text-center">{{$education->name}}</a>
                        <div id="content" class="collapse panel-group">
                            {{-- Show education specific statistics --}}
                            {{-- TODO: Error handling on chart failure --}}
                            {{-- TODO: (bug) Some education charts are invisible --}}
                            <div class="panel panel-default">
                                <div class="row panel-body">
                                    <div class="col-xs-3">
                                        <canvas name="canvas_pie_educationAlumni" data-f="{{$education->name}}" width="40" height="250"></canvas>
                                    </div>
                                    <div class="col-xs-3">
                                        <canvas name="canvas_pie_educationAlumni" data-f="{{$education->name}}" width="40" height="250"></canvas>
                                    </div>
                                    <div class="col-xs-3">
                                        <canvas name="canvas_pie_educationAlumni" data-f="{{$education->name}}" width="40" height="250"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- General statistics --}}
    <div class="panel-group">
        <div class="col-xs-10 col-xs-offset-1 panel panel-default">
            <div class="panel-heading">Diploma's behaald</div>
            <div class="panel-body">
                <canvas id="canvas_bar_educationAlumni" width="40" height="500"></canvas>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-1 panel panel-default">
            <div class="panel-heading">Werkende in omgeving</div>
            <div class="panel-body">
                <div id="leaflet_mapJobs" class="leaflet center-block text-center"></div>
            </div>
        </div>
        <div class="col-xs-5 panel panel-default">
            <div class="panel-heading">Wonende in omgeving</div>
            <div class="panel-body">
                <div id="leaflet_mapLiving" class="leaflet center-block"></div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-1 panel panel-default">
            <div class="panel-heading">Werkend en Wonend in omgeving</div>
            <div class="panel-body">
                <div id="leaflet_mapJobsAndLiving" class="leaflet center-block text-center"></div>
            </div>
        </div>
        <div class="col-xs-3 panel panel-default">
            <div class="panel-heading">Geslacht van gebruikers</div>
            <div class="panel-body">
                <canvas id="canvas_pie_personSex" width="40" height="250"></canvas>
            </div>
        </div>
    </div>
@stop

@section('additionalJS')
    <script src="/js/charts.js"></script>
    <script src="/js/leaflet.js"></script>
@stop