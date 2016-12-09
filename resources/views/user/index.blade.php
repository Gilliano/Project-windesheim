@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
		<div class="page-header"><h3><b>Gebruikers</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Adres</th>
						<th>Adresnummer</th>
						<th>Plaats</th>
						<th>Postcode</th>
						<th>Alternatieve E-mail</th>
						<th>Telefoon</th>
						<th>Alternatieve telefoon</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->users_information->address }}</td>
						<td>{{ $user->users_information->address_number }}</td>
						<td>{{ $user->users_information->city }}</td>
						<td>{{ $user->users_information->zip_code }}</td>
						<td>{{ $user->users_information->alternative_email }}</td>
						<td>{{ $user->users_information->mobile_number }}</td>
						<td>{{ $user->users_information->additional_number }}</td>						
						<td><a href="/users/{{ $user->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
						<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen">Verwijderen</button></td>
					</tr>
				@endforeach
				</tbody>
		</table>
	</div>
@stop