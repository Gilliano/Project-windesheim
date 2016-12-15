@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/educations/{{ $education->id }}/update">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" value="{{ $education->name }}" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" name="length" placeholder="Duur in jaren" value="{{ $education->length }}" class="form-control" min="1" max="10" step="1" required/>
		  		</div>
		  		<div class="form-group">
		  			<select name="school_id" class="form-control" required>
		  				@foreach ($schools as $school)
		  					@if ($school->id === $education->school_id)
			  					<option value="{{ $education->school_id }}" name="school_id" selected>{{ $education->school->name }}</option>
			  				@else
			  					<option value="{{ $school->id }}" name="school_id" >{{ $school->name }}</option>
			  				@endif
		  				@endforeach
		  			</select>
		  		</div>
		  		<div class="form-group">
		  			<select name="education_collection_id" class="form-control" required>
		  				@foreach ($educationsCollection as $educationCollection)
		  					@if ($educationCollection->id === $education->education_collection_id)
			  					<option value="{{ $education->education_collection_id }}" name="education_collection_id" selected>{{ $education->education_collection->name }}</option>
			  				@else
			  					<option value="{{ $educationCollection->id }}" name="education_collection">{{ $educationCollection->name }}</option>
			  				@endif
		  				@endforeach
		  			</select>
		  		</div>
		  		<div class="form-group">
		  			<textarea name="description" rows="4" class="form-control" required>{{ $education->description }}</textarea>
		  		</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Wijzigen</button>
			  	</div>
			</form>
	</div>
@stop