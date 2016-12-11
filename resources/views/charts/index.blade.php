@extends('layouts\app')

<script src="/js/charts/Chart.bundle.min.js"></script>

@section('content')
    {{-- Create canvas for charts --}}
    <div class="row">
        <div class="col-xs-5">
            <canvas id="canvas_educationAlumni" width="40" height="250"></canvas>
        </div>
        <div class="col-xs-3">
            <canvas id="canvas_personSex" width="40" height="250"></canvas>
        </div>
    </div>

    {{-- Execute chart initialization --}}
    <script src="/js/charts/charts_init.js"></script>
@stop