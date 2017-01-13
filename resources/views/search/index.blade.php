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

                        <div class="panel-group" id="accordion">
                            @if(count($personResults) > 0 )
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#personen">
                                        <div class="panel-heading">
                                            <h2>Personen ({{ count($personResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="personen" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            @foreach($personResults as $person)
                                                <a href="/profile/{{ $person->id }}">
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
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if(count($jobResults) > 0 )
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#jobs">
                                        <div class="panel-heading">
                                            <h2>Jobs ({{ count($jobResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="jobs" class="panel-collapse collapse">
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
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#bedrijven">
                                        <div class="panel-heading">
                                            <h2>Bedrijven ({{ count($companyResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="bedrijven" class="panel-collapse collapse">
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
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#certificaten">
                                        <div class="panel-heading">
                                            <h2>Certificaten ({{ count($certificateResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="certificaten" class="panel-collapse collapse">
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
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#opleidingen">
                                        <div class="panel-heading">
                                            <h2>Opleidingen ({{ count($educationResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="opleidingen" class="panel-collapse collapse">
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
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#opleidingCategorieen">
                                        <div class="panel-heading">
                                            <h2>Opleiding Categorieen ({{ count($educationCollectionResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="opleidingCategorieen" class="panel-collapse collapse">
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
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#scholen">
                                        <div class="panel-heading">
                                            <h2>Scholen ({{ count($schoolResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="scholen" class="panel-collapse collapse">
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

                            @if(count($groupResults) > 0 )
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#klassen">
                                        <div class="panel-heading">
                                            <h2>Klassen ({{ count($groupResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="klassen" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @foreach($groupResults as $group)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ $group->name }}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        {{ $group->description }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(count($diplomaResults) > 0 )
                                <div class="panel panel-default">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#diplomas">
                                        <div class="panel-heading">
                                            <h2>Diploma's ({{ count($diplomaResults) }})</h2>
                                        </div>
                                    </a>
                                    <div id="diplomas" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            @foreach($diplomaResults as $diploma)
                                                {{--<div class="row">--}}
                                                <div class="panel col-md-12">
                                                    <div class="panel-heading">
                                                        <h3>{{ Carbon\Carbon::parse($diploma->graduated_year)->format('Y') }}
                                                            - {{ $diploma->education }}</h3>
                                                    </div>
                                                    <div class="panel-body">

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
    </div>
    </div>
@endsection


