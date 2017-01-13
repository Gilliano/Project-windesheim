@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/diplomas/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="date" class="form-control" name="graduated_year" placeholder="Behaald op" value="{{ old('graduated_year') }}" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="education" placeholder="Opleiding" value="{{ old('education') }}" minlength="1" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="education_classcode" placeholder="Klascode" value="{{ old('education_classcode') }}" maxlength="25" />
		  		</div>
			  	<div class="form-group">
		  			<select name="school_id" class="form-control">
			  			@foreach ($schools as $school)
			  				<option value="{{ $school->id }}" name="school_id">{{ $school->name }}</option>
			  			@endforeach
			  			<option value="NULL" name="school_id">Staat niet in de lijst</option>
			  		</select>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="school_name" placeholder="Naam school" value="{{ old('school_name') }}" maxlength="45" />
		  		</div>
			  	
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Toevoegen</button>
			  	</div>
			</form>
	</div>
@stop