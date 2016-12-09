@extends('layouts.app')

@section('content')
	<div class="col-md-10 col-md-offset-1">
		<div class="page-header"><h3><b>Alumni</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Voornaam</th>
						<th>Achternaam</th>
						<th>Geboortedatum</th>
						<th>Geslacht</th>
						<th>Autobiografie</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{ $user->users_information->firstname }}</td>
						<td>{{ $person->person->lastname }}</td>
						<td>{{ $person->person->birthday }}</td>
						@if ($person->person->sex === 1)
						<td>Man</td>
						@else
						<td>Vrouw</td>
						@endif
						<td>{{ $person->person->autobiography }}</td>
						<td><a href="/users/{{ $person->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
						<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen">Verwijderen</button></td>
					</tr>
				@endforeach
				</tbody>
		</table>
	</div>
@stop