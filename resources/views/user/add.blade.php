@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/users_information/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" placeholder="Adresnummer" value="{{ old('address_number') }}" maxlength="10" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" placeholder="Plaats" value="{{ old('city') }}" maxlength="35" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" placeholder="Postcode" value="{{ old('zip_code') }}" maxlength="9" />
		  		</div>
		  		<div class="form-group">
		  			<input type="email" class="form-control" name="alternative_email" placeholder="Eventuele Email" value="{{ old('alternative_email') }}" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="mobile_number" placeholder="Mobiele nummer" value="{{ old('mobile_number') }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="additional_number" placeholder="Eventueel nummer" value="{{ old('additional_number') }}" maxlength="16"/>
		  		</div>
			  	<div class="form-group">
			  		<select name="privacy_level_id" class="form-control">
			  			@foreach ($levels as $level)
			  				<option value="{{ $level->id }}">{{ $level->name }}</option>
			  			@endforeach
			  		</select>
			  	</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Informatie opslaan</button>
			  	</div>
			</form>
	</div>
@stop