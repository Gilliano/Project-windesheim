@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/users_information/{{ $userInformation->id }}">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="address" value="{{ $userInformation->address }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" value="{{ $userInformation->address_number }}" maxlength="10" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" value="{{ $userInformation->city }}" maxlength="35" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" value="{{ $userInformation->zip_code }}" maxlength="9" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="alternative_email" value="{{ $userInformation->alternative_email }}" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="mobile_number" value="{{ $userInformation->mobile_number }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="additional_number" value="{{ $userInformation->additional_number }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<select name="privacy_level_id" class="form-control">
		  				@foreach ($levels as $level)
		  					@if ($level->id === $userInformation->privacy_level_id)
			  					<option value="{{ $userInformation->privacy_level_id }}" name="privacy_level_id" selected>{{ $userInformation->privacyLevel->name }}</option>
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