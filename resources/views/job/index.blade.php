@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="page-header"><h3><b>Banen</b></h3></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Naam persoon</th>
					<th>Naam baan</th>
					<th>Adres</th>
					<th>Adresnummer</th>
					<th>Postcode</th>
					<th>Plaats</th>
					<th>Functie</th>
					<th>Min. salaris</th>
					<th>Max. salaris</th>
					<th>Startdatum</th>
					<th>Huidige baan</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($jobs as $job)
				<tr>
					<td>{{ $job->person->firstname }}</td>
					<td>{{ $job->name }}</td>
					<td>{{ $job->address }}</td>
					<td>{{ $job->address_number }}</td>
					<td>{{ $job->zip_code }}</td>
					<td>{{ $job->city }}</td>
					<td>{{ $job->function }}</td>
					<td>{{ $job->salary_min }}</td>
					<td>{{ $job->salary_max }}</td>
					<td>{{ \Carbon\Carbon::parse($job->started_at)->format('d-m-Y') }}</td>
					@if ($job->current_job === 1)
						<td>Ja</td>
					@else
						<td>Nee</td>
					@endif
					<td><a href="/jobs/{{ $job->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
					<td>
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen{{ $job->id }}">Verwijderen</button>
						<div class="modal fade" id="verwijderen{{ $job->id }}" tabindex="-1" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Weet je zeker dat je de baan: {{ $job->name }} wilt verwijderen?</h4>
									</div>
									<div class="modal-body">
										<a href="/jobs/{{ $job->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
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
			@if (!$deletedJobs->isEmpty())
			<div class="page-header"><h3><b>Verwijderde banen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam persoon</th>
						<th>Naam baan</th>
						<th>Adres</th>
						<th>Adresnummer</th>
						<th>Postcode</th>
						<th>Plaats</th>
						<th>Functie</th>
						<th>Min. salaris</th>
						<th>Max. salaris</th>
						<th>Startdatum</th>
						<th>Huidige baan</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($deletedJobs as $job)
					<tr>
						<td>{{ $job->person->firstname }}</td>
						<td>{{ $job->name }}</td>
						<td>{{ $job->address }}</td>
						<td>{{ $job->address_number }}</td>
						<td>{{ $job->zip_code }}</td>
						<td>{{ $job->city }}</td>
						<td>{{ $job->function }}</td>
						<td>{{ $job->salary_min }}</td>
						<td>{{ $job->salary_max }}</td>
						<td>{{ \Carbon\Carbon::parse($job->started_at)->format('d-m-Y') }}</td>
						@if ($job->current_job === 1)					
							<td>Ja</td>
						@else
							<td>Nee</td>
						@endif
						<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#restore{{ $job->id }}">Herstellen</button></td>
							<div class="modal fade" id="restore{{ $job->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je de baan: {{ $job->name }} wilt herstellen?</h4>
										</div>
										<div class="modal-body">
											<a href="/jobs/{{ $job->id }}/restore"><button type="button" class="btn btn-success">Ja</button></a>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Nee</button>
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