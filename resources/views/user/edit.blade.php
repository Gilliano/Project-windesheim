@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/schools/{{ $user->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" value="{{ $school->name }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address" value="{{ $school->address }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" value="{{ $school->address_number }}" maxlength="10" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" value="{{ $school->city }}" maxlength="35" required />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" value="{{ $school->zip_code }}" maxlength="9" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="telephone_number" value="{{ $school->telephone_number }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<input type="email" class="form-control" name="email" value="{{ $school->email }}" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<textarea name="description" class="form-control" placeholder="Beschrijving" rows="4">{{ $school->description }}</textarea>
		  		</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Wijzigen</button>
			  	</div>
			</form>
	</div>
@stop