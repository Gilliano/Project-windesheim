@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/users/{{ $user->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="address" value="{{ $user->address }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" value="{{ $user->address_number }}" maxlength="10" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" value="{{ $user->city }}" maxlength="35" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" value="{{ $user->zip_code }}" maxlength="9" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="alternative_email" value="{{ $user->alternative_email }}" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="mobile_number" value="{{ $user->mobile_number }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="additional_number" value="{{ $user->additional_number }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<select name="privacy_level_id" class="form-control">
		  				@foreach ($levels as $level)
		  					@if ($level->id === $user->privacy_level_id)
			  					<option value="{{ $user->privacy_level_id }}" name="privacy_level_id" selected>{{ $user->privacyLevel->name }}</option>
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