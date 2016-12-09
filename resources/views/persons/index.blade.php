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

            {{-- Form to add person --}}
            <div class="panel-heading"><b>Person toevoegen</b></div>
            <div class="panel-body">
                <form method="post" action="#" class="form-group">
                    {{ csrf_field() }}

                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" name="firstname" placeholder="John" class="form-control">

                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Doe" class="form-control">

                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" class="form-control"> <!-- TODO: Doesnt work in Firfox -->

                    <label for="biography">Biography</label>
                    <textarea id="biography" name="biography" placeholder="Some info about yourself..." style="resize: vertical;" class="form-control"></textarea>

                    <label for="user">User</label>
                    <select id="user" name="user" class="form-control">
                        @foreach($users as $user)
                            <option>{{ $user->id }}</option>
                        @endforeach
                    </select>

                    <label for="privacy">Privacy</label>
                    <select id="privacy" name="privacy" class="form-control">
                        @foreach($privacys as $privacy)
                            <option>{{ $privacy->id }}</option>
                        @endforeach
                    </select>

                    <label for="class">Class</label>
                    <select id="class" name="class" class="form-control">
                        @foreach($groups as $group)
                            <option>{{ $group->id }}</option>
                        @endforeach
                    </select>

                    <br>
                    <input type="submit" id="submit" value="Submit" class="btn btn-success pull-right">
                </form>
            </div>
        </div>

        {{-- Shows a list of all users --}}
            @if(count($persons) > 0)
                @foreach($persons as $person)
                    <div class="panel panel-default center-block" style="width: 500px;">
                        <div class="panel-heading">{{ $person->firstname ." ". $person->lastname }}</div>
                        <div class="panel-body">{{ $person->autobiography }}</div>
                        <div class="panel-footer">
                            <a href="{{ "/persons/".$person->id }}">Edit</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No persons found...</p>
            @endif
    </div>
@stop