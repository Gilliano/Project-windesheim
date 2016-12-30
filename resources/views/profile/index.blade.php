@extends('layouts.app')

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
    <style>
        .fstElement {
            width: 100%;
        }

        .side {
            display: inline
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
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                        <h1>{{ $user_name }}</h1>
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
                    <div class="panel col-md-5">
                        <div class="panel-heading">
                            <h3>Algemeen</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table-condensed">
                                <tr>
                                    <th>School</th>
                                    <td>Windesheim Flevoland</td>
                                </tr>
                                <tr>
                                    <th>Klas</th>
                                    <td>ADSD01</td>
                                </tr>
                                <tr>
                                    <th>Opleiding</th>
                                    <td>ADSD (ICT)</td>
                                </tr>
                                <tr>
                                    <th>Adres</th>
                                    <td>Arturo Toscaninistraat 50</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- Diploma's --}}
                    <div class="panel col-md-5 col-md-offset-2">
                        <div class="panel-heading">
                            <h3>Diploma's</h3>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Bio --}}
                    <div class="panel col-md-5">
                        <div class="panel-heading">
                            <h3>Bio</h3>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>

                    {{-- Jobs --}}
                    <div class="panel col-md-5 col-md-offset-2">
                        <div class="panel-heading">
                            <h3>Jobs</h3>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>

                <div class="row">
                    {{-- Skills --}}
                    <div class="panel col-md-5">
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
                    <div class="panel col-md-5 col-md-offset-2">
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


