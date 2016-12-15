@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/companies/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" placeholder="Naam" value="{{ old('name') }}" minlength="1" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<textarea name="description" placeholder="Beschrijving" rows="4" class="form-control" required>{{ old('description') }}</textarea>
		  		</div>
			  	<div class="form-group">
			  		<select name="privacy_level_id" class="form-control">
			  			@foreach ($levels as $level)
			  				<option value="{{ $level->id }}" name="privacy_level_id">{{ $level->name }}</option>
			  			@endforeach
			  		</select>
			  	</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Toevoegen</button>
			  	</div>
			</form>
	</div>
@stop