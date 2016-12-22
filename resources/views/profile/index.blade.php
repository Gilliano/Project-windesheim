@extends('layouts.app')

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
                            <form action="/profile/addSkill" method="POST" class="form-group">
                                {{ csrf_field() }}

                                <label for="skill">Add Skill</label>
                                <input
                                        type="text"
                                        multiple
                                        class="tagsInput"
                                        value="@foreach($skills as $skill){{ $skill->skill }},@endforeach"
                                        data-initial-value='[{"text": "Algeria", "value" : "Algeria"}, {"text": "Angola", "value" : "Angola"}]'
                                        data-user-option-allowed="true"
                                        data-load-once="true"
                                        name="language"/>
                                <input type="text" id="skill" name="skill" placeholder="skill" class="form-control">
                                @foreach($skills as $skill)
                                    {{ $skill->skill }}<br/>
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
    <script src="js/fastselect.js"></script>
    <Script>
        $('.tagsInput').fastselect();
    </Script>
@endsection


