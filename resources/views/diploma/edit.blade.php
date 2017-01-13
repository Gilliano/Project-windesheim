@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/diplomas/{{ $diploma->id }}/update">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="graduated_year" value="{{ $diploma->graduated_year }}" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="education" placeholder="Opleiding" value="{{ $diploma->education }}" class="form-control" minlength="1" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="education_classcode" placeholder="Klascode" value="{{ $diploma->education_classcode }}" class="form-control" maxlength="25" />
		  		</div>
		  		<div class="form-group">
		  			<select name="school_id" class="form-control" required>
		  				@foreach ($schools as $school)
		  					@if (empty($diploma->school_id))
			  						<option value="NULL" name="school_id" selected>Staat niet in de lijst</option>
			  						<option value="{{ $school->id }}" name="school_id" >{{ $school->name }}</option>
			  				@else
			  					@if ($diploma->school_id == $school->id)
				  					<option value="{{ $diploma->school_id }}" name="school_id" selected>{{ $diploma->school->name }}</option>
				  				@endif
			  				@endif
		  				@endforeach
		  			</select>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="school_name" placeholder="Naam school" value="{{ $diploma->school_name }}" class="form-control" maxlength="5" />
		  		</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Wijzigen</button>
			  	</div>
			</form>
	</div>
@stop