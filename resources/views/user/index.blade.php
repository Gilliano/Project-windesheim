@extends('layouts.app')

@section('content')
	<div class="col-md-12">
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
						<td>{{ $user->userInformation->address }}</td>
						<td>{{ $user->userInformation->address_number }}</td>
						<td>{{ $user->userInformation->city }}</td>
						<td>{{ $user->userInformation->zip_code }}</td>
						<td>{{ $user->userInformation->alternative_email }}</td>
						<td>{{ $user->userInformation->mobile_number }}</td>
						<td>{{ $user->userInformation->additional_number }}</td>						
						<td><a href="/users/{{ $user->userInformation->id }}/edit"<button type="button" class="btn btn-primary">Wijzigen</button></td>
						<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen">Verwijderen</button></td>
					</tr>
				@endforeach
				</tbody>
		</table>
		<div class="modal fade" id="verwijderen" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Weet je zeker dat je deze gebruiker wilt verwijderen?</h4>
						</div>
						<div class="modal-body">
							<a href="/users/{{ $user->userInformation->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
							<button type="button" class="btn btn-success" data-dismiss="modal">Nee</button>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="page-header"><h3><b>Verwijderde gebruikers</b></h3></div>
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
				@foreach ($deletedUsers as $userInformation)
					<tr>
						<td>{{ $userInformation->address }}</td>
						<td>{{ $userInformation->address_number }}</td>
						<td>{{ $userInformation->city }}</td>
						<td>{{ $userInformation->zip_code }}</td>
						<td>{{ $userInformation->alternative_email }}</td>
						<td>{{ $userInformation->mobile_number }}</td>
						<td>{{ $userInformation->additional_number }}</td>						
						<td><a href="/users/{{ $userInformation->id }}/restore"<button type="button" class="btn btn-success">Herstellen</button></td>
					</tr>
				@endforeach
				</tbody>
		</table>
	</div>
@stop