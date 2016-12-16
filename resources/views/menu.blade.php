@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="css/gridstack/gridstack.css">
    <script src="js/gridstack/lodash.js"></script>
    <script src="js/gridstack/gridstack.all.js"></script> {{-- TODO: Doesnt load!?!? --}}
    <script src="js/gridstack/gridstack_init.js"></script>

    <div class="grid-stack">
        <div class="grid-stack-item" data-gs-x="0" data-gs-width="4" data-gs-height="2">
            <div class="grid-stack-item-content">Lala</div>
        </div>
        <div class="grid-stack-item" data-gs-x="0" data-gs-width="4" data-gs-height="4">
            <div class="grid-stack-item-content">Lasala</div>
        </div>
    </div>
@endsection