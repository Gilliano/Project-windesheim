@extends('layouts.app')

@section('additionalCSS')
    <link href="css/fastselect.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    {{-- Status logging --}}
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif

                    <div class="panel-heading">Profile of {{ $user_name }}</div>

                    <div class="panel-body">
                        <div class="panel-heading">Skills</div>

                        <div class="panel-body">
                            <input
                                    type="text"
                                    multiple
                                    class="tagsInput"
                                    value="Algeria,Angola"
                                    data-initial-value='[{"text": "Algeria", "value" : "Algeria"}, {"text": "Angola", "value" : "Angola"}]'
                                    data-user-option-allowed="true"
                                    data-url="demo/data.json"
                                    data-load-once="true"
                                    name="languages"/>

                            <form action="/profile/addSkill" method="POST" class="form-group">
                                {{ csrf_field() }}

                                <label for="skills">Add Skills</label>
                                <input type="text" multiple class="skillsInput" data-user-option-allowed="true" data-url="a" data-load-once="true" name="skills"/>
                                <input type="text" id="skill" name="skill" placeholder="skill" class="form-control">
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
            $('.tagsInput').fastselect();
            $('.skillsInput').fastselect();
        })
    </Script>
@endsection


