@extends('layouts.app')

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
    <style>
        .fstElement {
            width: 100%;
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
                        <img src="http://placehold.it/100x100">
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
                                <tr>
                                    <th></th>
                                    <td></td>
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
                            <h3>Jobs</h3>
                        </div>
                        <div class="panel-body">

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
//            $('.tagsInput').fastselect();
            $('.skillsInput').fastselect();
        })
    </Script>
@endsection


