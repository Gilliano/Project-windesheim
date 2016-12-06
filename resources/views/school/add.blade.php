@extends('layouts.app')

@section('content')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/schools/add">
				{{ csrf_field() }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" placeholder="Naam school" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address" placeholder="Adres" maxlength="45" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="address_number" placeholder="Adresnummer" maxlength="10" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="zip_code" placeholder="Postcode" maxlength="9" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="telephone_number" placeholder="Telefoon" maxlength="16" />
		  		</div>
		  		<div class="form-group">
		  			<input type="email" class="form-control" name="email" placeholder="Email" maxlength="120" />
		  		</div>
		  		<div class="form-group">
		  			<input type="text" class="form-control" name="city" placeholder="Vestiging" maxlength="35"  />
		  		</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Voeg school toe</button>
			  	</div>
			</form>
			@if (count($errors))
				<ul>
					@foreach ($errors->all() as $error) 
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			@endif
	</div>
@stop