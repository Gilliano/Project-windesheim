@extends('layouts.app')

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
    <style>
        .fstElement {
            width: 100%;
        }

        .fstControls {
            width: 100%;
        }

        .fstChoiceItem {
            display: inline-block;
            font-size: 1.2em;
            position: relative;
            margin: 0 0.41667em 0.41667em 0;
            padding: 0.33333em 0.33333em 0.33333em 0.33333em;
            float: left;
            border-radius: 0.25em;
            border: 1px solid #43A2F3;
            cursor: auto;
            color: #fff;
            background-color: #43A2F3;
            -webkit-animation: fstAnimationEnter 0.2s;
            -moz-animation: fstAnimationEnter 0.2s;
            animation: fstAnimationEnter 0.2s;
        }

        .circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            line-height: 50px;
            font-size: 2em;
            text-align: center;
            border: 1px solid #000000;
        }

        .menu_icon {
            height: 50px;
            width: 50px;
        }

        .panel {
            border: 1px solid #d3e0e9;
        }
    </style>
@endsection

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
                    <div class="col-md-2">
                        <img src="{{ $gravatar }}">
                    </div>
                    <div class="col-md-5">
                        <h1>{{ $fullname }}</h1>
                    </div>
                    <div class="col-md-2">
                        <div class="circle">15</div>
                    </div>
                    <div class="col-md-2">
                        <a href="/menu">
                            <img src="/img/menu_icon.png" class="menu_icon">
                        </a>
                    </div>
                </div>

                <div class="row">
                    {{-- Algemeen --}}
                    <div class="panel col-md-6">
                        <div class="panel-heading">
                            <h3>Algemeen</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table-condensed">
                                <tr>
                                    <th>School</th>
                                    <td>{{ $school }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        @if(count($educations) <= 1)
                                            Opleiding
                                        @else
                                            Opleidingen
                                        @endif
                                    </th>
                                    <td>
                                        @for($i = 0; $i < count($educations); $i++)
                                            @if(count($educations) == $i+1)
                                                {{ $educations[$i] }}
                                            @else
                                                {{ $educations[$i] . ", " }}
                                            @endif

                                        @endfor
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        @if(count($groups) <= 1)
                                            Klas
                                        @else
                                            Klassen
                                        @endif
                                    </th>
                                    <td>
                                        @for($i = 0; $i < count($groups); $i++)
                                            @if(count($groups) == $i+1)
                                                {{ $groups[$i] }}
                                            @else
                                                {{ $groups[$i] . ", " }}
                                            @endif

                                        @endfor
                                    </td>
                                </tr>
                                <tr>
                                    <th>Adres</th>
                                    <td>{{ $address }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $email }}</td>
                                </tr>
                                <tr>
                                    <th>Alternatieve Email</th>
                                    <td>{{ $alternativeEmail }}</td>
                                </tr>
                                <tr>
                                    <th>Telefoonnummer</th>
                                    <td>{{ $phonenumber }}</td>
                                </tr>
                                <tr>
                                    <th>Alternatief Telefoonnummer</th>
                                    <td>{{ $additionalPhonenumber }}</td>
                                </tr>
                                <tr>
                                    <th>Geboortedatum</th>
                                    <td>{{ $birthday }} ({{ $age }})</td>
                                </tr>
                                <tr>
                                    <th>Geslacht</th>
                                    <td>{{ $sex }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- Diploma's --}}
                    <div class="panel col-md-6">
                        <div class="panel-heading">
                            <h3>Diploma's</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($diplomas as $diploma)
                                {{--<div class="row">--}}
                                <div class="panel col-md-12">
                                    <div class="panel-heading">
                                        <h3>{{ $diploma->education }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table-condensed">
                                            <tr>
                                                <th>Jaar</th>
                                                <td>{{ Carbon\Carbon::parse($diploma->graduated_year)->format('Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Klas</th>
                                                <td>{{ $diploma->education_classcode }}</td>
                                            </tr>
                                            <tr>
                                                <th>School</th>
                                                <td>{{ $diploma->school->name }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Bio --}}
                    <div class="panel col-md-6">
                        <div class="panel-heading">
                            <h3>Autobiografie</h3>
                        </div>
                        <div class="panel-body">
                            {{ $autobiography }}
                        </div>
                    </div>

                    {{-- Jobs --}}
                    <div class="panel col-md-6">
                        <div class="panel-heading">
                            <h3>Werk</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($jobs as $job)
                                {{--<div class="row">--}}
                                <div class="panel col-md-12">
                                    <div class="panel-heading">
                                        <h3>{{ $job->name }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table-condensed">
                                            <tr>
                                                <th>Adres</th>
                                                <td>{{ $job->address }}{{ $job->address_number }}
                                                    , {{ ucfirst($job->city) }}, {{ strtoupper($job->zip_code) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Functie</th>
                                                <td>{{ $job->function }}</td>
                                            </tr>
                                            <tr>
                                                <th>Start</th>
                                                <td>{{ Carbon\Carbon::parse($job->started_at)->formatLocalized('%d %B %Y') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Huidige baan?</th>
                                                <td>
                                                    @if($job->current_job == 0)
                                                        Nee
                                                    @else
                                                        Ja
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Skills --}}
                    <div class="panel col-md-6">
                        <div class="panel-heading">
                            <h3>Skills</h3>
                        </div>
                        <div class="panel-body">
                            @if($email == Auth::user()->email)
                                <form action="/profile/addSkill" method="POST" class="form-group">
                                    {{ csrf_field() }}

                                    <label for="skills">Add Skills</label><br/>
                                    <input type="text" multiple class="skillsInput form-control"
                                           data-user-option-allowed="true"
                                           data-url="a" data-load-once="true" name="skills" placeholder="Add Skills"/>
                                    <input type="submit" class="btn btn-success" value="Add"><br/>
                                </form>
                                @foreach($skills as $skill)
                                    <div data-text="{{ $skill->skill }}" data-value="{{ $skill->skill }}"
                                         class="fstChoiceItem">
                                        {{ $skill->skill }}
                                    </div>
                                @endforeach
                            @else
                                @foreach($skills as $skill)
                                    <div data-text="{{ $skill->skill }}" data-value="{{ $skill->skill }}"
                                         class="fstChoiceItem">
                                        {{ $skill->skill }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- Linke'dTinder --}}
                    <div class="panel col-md-6">
                        <div class="panel-heading">
                            <h3>Linke'dTinder</h3>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
                <div class="panel">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionalJS')
    <script src="js/fastsearch.js"></script>
    <script src="js/fastselect.js"></script>
    <Script>
        $.getScript("js/fastselect.js", function () {
            $('.skillsInput').fastselect();
        })
    </Script>
@endsection


