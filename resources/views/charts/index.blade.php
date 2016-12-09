@extends('layouts\app')

<script src="/js/charts/Chart.bundle.min.js"></script>

@section('content')
    <div>
        <canvas id="canvas_educationAlumni" width="40" height="250"></canvas>
    </div>
    <div>
        <canvas id="canvas_personSex" width="40" height="250"></canvas>
    </div>

    <script src="/js/charts/charts_init.js"></script>
@stop