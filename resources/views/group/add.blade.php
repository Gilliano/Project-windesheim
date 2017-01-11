@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/groups/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" placeholder="Naam" value="{{ old('name') }}" minlength="1" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="date" class="form-control" name="cohort_start" placeholder="Start cohort" value="{{ old('cohort_start') }}" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="date" class="form-control" name="cohort_end" placeholder="Eind cohort" value="{{ old('cohort_end') }}" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" class="form-control" name="started_amount" placeholder="Aantal gestarte studenten" value="{{ old('started_amount') }}" step="1" max="100"/>
		  		</div>
			  	<div class="form-group">
			  		<select name="education_id" class="form-control">
			  			@foreach ($educations as $education)
			  				<option value="{{ $education->id }}" name="education_id">{{ $education->name }}</option>
			  			@endforeach
			  		</select>
			  	</div>
			  	<div class="form-group">
		  			<textarea name="description" placeholder="Beschrijving" class="form-control" rows="4">{{ old('description') }}</textarea>
		  		</div>
			  	
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Toevoegen</button>
			  	</div>
			</form>
	</div>
@stop