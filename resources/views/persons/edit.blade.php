@extends("layouts.app");

@section('content')
    <div class="container">
        <div class="panel panel-default center-block" style="width: 500px;">
            {{-- Error logging --}}
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Oops something went wrong...
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Status logging --}}
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif

            {{-- Form to edit person --}}
            @if($current_person != null)
                <div class="panel-heading"><b>Person aanpassen</b></div>
                <div class="panel-body">
                    <form method="post" action="#" class="form-group">
                        {{ csrf_field() }}

                        <label for="firstname">Firstname</label>
                        <input type="text" id="firstname" name="firstname" value="{{ $current_person->firstname }}" class="form-control">

                        <label for="lastname">Lastname</label>
                        <input type="text" id="lastname" name="lastname" value="{{ $current_person->lastname }}" class="form-control">

                        <label for="birthday">Birthday</label>
                        <input type="date" id="birthday" name="birthday" value="{{ \Carbon\Carbon::parse($current_person->birthday)->format('Y-m-d') }}" class="form-control"> <!-- TODO: Doesnt work in Firfox -->

                        <label for="biography">Biography</label>
                        <textarea id="biography" name="biography" style="resize: vertical;" class="form-control">{{ $current_person->autobiography }}</textarea>

                        <label for="user">User</label>
                        <select id="user" name="user" class="form-control">
                            @foreach($users as $user)
                                {{ $selected = $user->id==$current_person->users_id?'selected':'' }}
                                <option {{$selected}}>{{ $user->id }}</option>
                            @endforeach
                        </select>

                        <label for="privacy">Privacy</label>
                        <select id="privacy" name="privacy" class="form-control">
                            @foreach($privacys as $privacy)
                                {{ $selected = $privacy->id==$current_person->privacy_levels_id?'selected':'' }}
                                <option {{$selected}}>{{ $privacy->id }}</option>
                            @endforeach
                        </select>

                        <label for="class">Class</label>
                        <select id="class" name="class" class="form-control">
                            <option selected>Empty</option>
                        </select>

                        <br>
                        <input type="submit" name="submit" id="delete" value="Delete" class="btn btn-danger">
                        <input type="submit" name="submit" id="update" value="Update" class="btn btn-success pull-right">
                    </form>
                </div>
            @else
                <div class="alert alert-danger">
                    No user found with this id!
                </div>
            @endif
        </div>
    </div>
@stop