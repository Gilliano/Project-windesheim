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

                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <div class="panel-heading">Skills</div>

                        <div class="panel-body">
                            <form action="/profile/addSkill" method="POST" class="form-group">
                                {{ csrf_field() }}

                                <label for="skill">Add Skill</label>
                                <input type="text" id="skill" name="skill" placeholder="skill" class="form-control">
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
