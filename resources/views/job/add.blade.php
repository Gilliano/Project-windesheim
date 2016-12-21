@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/jobs/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" placeholder="Naam" value="{{ old('name') }}" minlength="1" maxlength="70" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address" placeholder="Adres" value="{{ old('address') }}" maxlength="45"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" placeholder="Adresnummer" value="{{ old('address_number') }}"" maxlength="10" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" placeholder="Postcode" value="{{ old('zip_code') }}" maxlength="9"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" placeholder="Plaats" value="{{ old('city') }}" minlength="1" maxlength="35" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="function" placeholder="Functie" value="{{ old('function') }}" minlength="1" maxlength="80" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" class="form-control" name="salary_min" placeholder="Minimale salaris" value="{{ old('salary_min') }}" min="1" max="9999999999"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="salary_max" placeholder="Maximale salaris" value="{{ old('salary_max') }}" min="1" max="9999999999"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="date" class="form-control" name="started_at" placeholder="Startdatum" value="{{ old('started_at') }}"/>
		  		</div>
			  	<div class="form-group">
			  		<select name="current_job" class="form-control">
			  				<option value="Ja" name="current_job">Ja</option>
			  				<option value="Nee" name="current_job">Nee</option>
			  		</select>
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