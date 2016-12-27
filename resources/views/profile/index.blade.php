@extends('layouts.app')

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
    <style>
        .fstElement {
            width: 100%;
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

                <div>
                    <img src="http://placehold.it/150x150">
                    <h1 style="display: inline">{{ $user_name }}</h1>

                </div>


                <div class="panel">
                    <div class="panel-heading">
                        <h3>Skills</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/profile/addSkill" method="POST" class="form-group">
                            {{ csrf_field() }}

                            <label for="skills">Add Skills</label><br/>
                            <input type="text" multiple class="skillsInput form-control" data-user-option-allowed="true"
                                   data-url="a" data-load-once="true" name="skills" placeholder="Add Skills"/>
                            <input type="submit"><br/>
                        </form>
                        {{--<input type="text" id="skill" name="skill" placeholder="skill" class="form-control">--}}
                        @foreach($skills as $skill)

                            <div data-text="{{ $skill->skill }}" data-value="{{ $skill->skill }}"
                                 class="fstChoiceItem">
                                {{ $skill->skill }}
                                {{--<button class="fstChoiceRemove" type="button">×</button>--}}
                            </div>

                            {{--{{ $skill->skill }}<br/>--}}
                        @endforeach
                    </div>
                </div>
                <h3>Skills</h3>

                <div class="profile-panel">
                    {{--<input--}}
                    {{--type="text"--}}
                    {{--multiple--}}
                    {{--class="tagsInput"--}}
                    {{--value="Algeria,Angola"--}}
                    {{--data-initial-value='[{"text": "Algeria", "value" : "Algeria"}, {"text": "Angola", "value" : "Angola"}]'--}}
                    {{--data-user-option-allowed="true"--}}
                    {{--data-url="demo/data.json"--}}
                    {{--data-load-once="true"--}}
                    {{--name="languages"/>--}}

                    <form action="/profile/addSkill" method="POST" class="form-group">
                        {{ csrf_field() }}

                        <label for="skills">Add Skills</label><br/>
                        <input type="text" multiple class="skillsInput form-control" data-user-option-allowed="true"
                               data-url="a" data-load-once="true" name="skills" placeholder="Add Skills"/>
                        <input type="submit"><br/>
                        {{--<input type="text" id="skill" name="skill" placeholder="skill" class="form-control">--}}
                        @foreach($skills as $skill)

                            <div data-text="{{ $skill->skill }}" data-value="{{ $skill->skill }}" class="fstChoiceItem">
                                {{ $skill->skill }}
                                {{--<button class="fstChoiceRemove" type="button">×</button>--}}
                            </div>

                            {{--{{ $skill->skill }}<br/>--}}
                        @endforeach
                    </form>
                </div>
            </div>


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


