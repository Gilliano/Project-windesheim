@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/companies/{{ $company->id }}/update">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" value="{{ $company->name }}" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<textarea name="description" rows="4" class="form-control" required>{{ $company->description }}</textarea>
		  		</div>
		  		<div class="form-group">
		  			<select name="privacy_level_id" class="form-control">
		  				@foreach ($levels as $level)
		  					@if ($level->id === $company->privacy_level_id)
			  					<option value="{{ $company->privacy_level_id }}" name="privacy_level_id" selected>{{ $company->privacyLevel->name }}</option>
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