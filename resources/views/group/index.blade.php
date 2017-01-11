@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="page-header"><h3><b>Klassen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Beschrijving</th>
						<th>Coördinator</th>
						<th>Start cohort</th>
						<th>Eind cohort</th>
						<th>Gestart aantal studenten</th>
						<th>Opleiding</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($groups as $group)
						<tr>
							<td>{{ $group->name }}</td>
							<td>{{ $group->description }}</td>
							<td>{{ $group->coordinator->firstname }}</td>
							<td>{{ \Carbon\Carbon::parse($group->cohort_start)->format('d-m-Y') }}</td>
							<td>{{ \Carbon\Carbon::parse($group->cohort_end)->format('d-m-Y') }}</td>
							<td>{{ $group->started_amount }}</td>
							<td>{{ $group->education->name }}</td>
							<td><a href="/groups/{{ $group->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
							<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen{{ $group->id }}">Verwijderen</button>
							<div class="modal fade" id="verwijderen{{ $group->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je de klas: {{ $group->name }} wilt verwijderen?</h4>
										</div>
										<div class="modal-body">
											<a href="/groups/{{ $group->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
											<button type="button" class="btn btn-success" data-dismiss="modal">Nee</button>
										</div>
									</div>
								</div>
							</div>
						</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
			<hr>
			@if (!$deletedGroups->isEmpty())
			<div class="page-header"><h3><b>Verwijderde klassen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Beschrijving</th>
						<th>Coördinator</th>
						<th>Start cohort</th>
						<th>Eind cohort</th>
						<th>Gestart aantal studenten</th>
						<th>Opleiding</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($deletedGroups as $group)
					<tr>
						<td>{{ $group->name }}</td>
						<td>{{ $group->description }}</td>
						<td>{{ $group->coordinator->firstname }}</td>
						<td>{{ $group->cohort_start }}</td>
						<td>{{ $group->cohort_end }}</td>
						<td>{{ $group->started_amount }}</td>
						<td>{{ $group->education->name }}</td>
						<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#herstellen{{ $group->id }}">Herstellen</button>
							<div class="modal fade" id="herstellen{{ $group->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je de klas: {{ $group->name }} wilt herstellen?</h4>
										</div>
										<div class="modal-body">
											<a href="/groups/{{ $group->id }}/restore"><button type="button" class="btn btn-danger">Ja</button></a>
											<button type="button" class="btn btn-success" data-dismiss="modal">Nee</button>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
@stop