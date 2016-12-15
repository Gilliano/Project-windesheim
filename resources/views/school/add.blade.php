@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/schools/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" placeholder="Naam school" value="{{ old('name') }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address" placeholder="Adres" value="{{ old('address') }}" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" placeholder="Adresnummer" value="{{ old('address_number') }}" maxlength="10" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" placeholder="Postcode" value="{{ old('zip_code') }}" maxlength="9" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="telephone_number" placeholder="Telefoon" value="{{ old('telephone_number') }}" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" placeholder="Vestiging" value="{{ old('city') }}" maxlength="35" required/>
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