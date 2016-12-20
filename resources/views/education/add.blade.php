@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/educations/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" placeholder="Naam" value="{{ old('name') }}" minlength="1" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" name="length" placeholder="Duur in jaren" value="{{ old('length') }}" class="form-control" min="1" max="10" step="1" required/>
		  		</div>
			  	<div class="form-group">
			  		<select name="school_id" class="form-control" required>
			  			@foreach ($schools as $school)
			  				<option value="{{ $school->id }}" name="school_id">{{ $school->name }}</option>
			  			@endforeach
			  		</select>
			  	</div>
			  	<div class="form-group">
			  		<select name="education_collection_id" class="form-control" required>
			  			@foreach ($educationsCollection as $educationCollection)
			  				<option value="{{ $educationCollection->id }}" name="education_collection_id">{{ $educationCollection->name }}</option>
			  			@endforeach
			  		</select>
			  	</div>
			  	<div class="form-group">
		  			<textarea name="description" placeholder="Beschrijving" rows="4" class="form-control">{{ old('description') }}</textarea>
		  		</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Toevoegen</button>
			  	</div>
			</form>
	</div>
@stop