@extends('layouts.app')

@section('content')
		<div class="col-md-9 col-md-offset-1">
		<div class="page-header"><h3><b>Scholen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Adres</th>
						<th>Adresnummer</th>
						<th>Postcode</th>
						<th>Telefoon</th>
						<th>Gevestigd in</th>
						<th>Wijzigen</th>
						<th>Info</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($schools as $school)
					<tr>
						<td>{{ $school->name }}</td>
						<td>{{ $school->address }}</td>
						<td>{{ $school->address_number }}</td>
						<td>{{ $school->zip_code }}</td>
						<td>{{ $school->telephone_number }}</td>
						<td>{{ $school->city }}</td>
						<td><a href="/schools/{{ $school->id }}/edit"><button type="button" class="btn btn-primary">Wijzig school</button></a></td>
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
							<h4 class="modal-title">Weet je zeker dat je deze school wilt verwijderen?</h4>
						</div>
						<div class="modal-body">
							<a href="/schools/{{ $school->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
							<button type="button" class="btn btn-success" data-dismiss="modal">Nee</button>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="page-header"><h3><b>Verwijderde scholen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Adres</th>
						<th>Adresnummer</th>
						<th>Postcode</th>
						<th>Telefoon</th>
						<th>Gevestigd in</th>
						<th>Herstellen</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($deletedSchools as $school)
					<tr>
						<td>{{ $school->name }}</td>
						<td>{{ $school->address }}</td>
						<td>{{ $school->address_number }}</td>
						<td>{{ $school->zip_code }}</td>
						<td>{{ $school->telephone_number }}</td>
						<td>{{ $school->city }}</td>
						<td><a href="/schools/{{ $school->id }}/restore"><button type="button" class="btn btn-info">Herstellen</button></a></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
@stop