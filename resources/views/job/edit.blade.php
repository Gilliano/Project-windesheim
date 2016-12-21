@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/jobs/{{ $job->id }}/update">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" value="{{ $job->name }}" maxlength="70" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="address" value="{{ $job->address }}" class="form-control" maxlength="45"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="address_number" value="{{ $job->address_number }}" class="form-control" maxlength="10"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="zip_code" value="{{ $job->zip_code }}" class="form-control" maxlength="9"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="city" value="{{ $job->city }}" class="form-control" maxlength="35" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" name="function" value="{{ $job->function }}" class="form-control" maxlength="80" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" name="salary_min" value="{{ $job->salary_min }}" class="form-control" step="0.01"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" name="salary_max" value="{{ $job->salary_max }}" class="form-control" step="0.01"/>
		  		</div>
		  		<div class="form-group">
		  			<input type="date" name="started_at" value="{{ $job->started_at }}" class="form-control" 
		  			/>
		  		</div>
		  		<div class="form-group">
		  			<select name="current_job" class="form-control">
		  				<option value="Ja">Ja</option>
		  				<option value="Nee">Nee</option>
		  			</select>
		  		</div>
		  		<div class="form-group">
		  			<select name="privacy_level_id" class="form-control" required>
		  				@foreach ($levels as $level)
		  					@if ($level->id === $job->privacy_level_id)
			  					<option value="{{ $job->privacy_level_id }}" name="privacy_level_id" selected>{{ $job->privacyLevel->name }}</option>
			  				@else
			  					<option value="{{ $level->id }}" name="privacy_level_id" >{{ $level->name }}</option>
			  				@endif
		  				@endforeach
		  			</select>
		  		</div>
			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Wijzigen</button>
			  	</div>
			</form>
	</div>
@stop