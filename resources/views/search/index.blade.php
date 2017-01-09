@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                {{-- Status logging --}}
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif

                <div class="row">
                    <div class="panel col-md-12">
                        <div class="panel-heading">
                            <h3>Zoekresultaten voor '{{ $search }}'</h3>
                            <h4>
                                @if($resultsCount == 1)
                                    1 resultaat gevonden
                                @else
                                    {{ $resultsCount }} resultaten gevonden
                                @endif
                            </h4>
                        </div>
                        <div class="panel-body">

                            @if(count($personResults) > 0 )
                                {{-- Personen --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Personen</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($personResults as $person)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $person->firstname }} {{ $person->lastname }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        @if($person->autobiography == "")
                                                            @if($person->sex == 1)
                                                                Deze persoon heeft geen autobiografie. Ga naar zijn
                                                                profiel
                                                                om meer over
                                                                hem te weten te komen.
                                                            @elseif($person->sex == 0)
                                                                Deze persoon heeft geen autobiografie. Ga naar haar
                                                                profiel
                                                                om meer over
                                                                haar te weten te komen.
                                                            @endif

                                                        @else()
                                                            {{ $person->autobiography }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($jobResults) > 0 )
                                {{-- Jobs --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Jobs</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($jobResults as $job)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $job->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($companyResults) > 0 )
                                {{-- Company --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Bedrijven</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($companyResults as $company)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $company->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ $company->description }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($certificateResults) > 0 )
                                {{-- Certificate --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Certificaten</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($certificateResults as $certificate)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $certificate->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ $certificate->description }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($educationResults) > 0 )
                                {{-- Education --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Opleidingen</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($educationResults as $education)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $education->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ $education->description }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($educationCollectionResults) > 0 )
                                {{-- Education Collection --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Opleiding Categorieen</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($educationCollectionResults as $educationCollection)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $educationCollection->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ $educationCollection->description }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($schoolResults) > 0 )
                                {{-- School --}}
                                <div class="row">
                                    <div class="panel col-md-12">
                                        <div class="panel-heading">
                                            <h3>Scholen</h3>
                                        </div>
                                        <div class="panel-body">
                                            @foreach($schoolResults as $school)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $school->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ $school->description }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


