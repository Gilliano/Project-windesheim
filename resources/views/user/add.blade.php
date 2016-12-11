@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/users/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<input type="password" class="form-control" name="address_number" placeholder="Adresnummer" value="{{ old('address_number') }}" maxlength="10" />
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
			  		<textarea name="description" class="form-control" placeholder="Beschrijving" rows="4">{{ old('description') }}</textarea>
			  	</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Voeg school toe</button>
			  	</div>
			</form>
	</div>
@stop