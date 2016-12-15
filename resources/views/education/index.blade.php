@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="page-header"><h3><b>Opleidingen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Beschrijving</th>
						<th>Duur in jaren</th>
						<th>School</th>
						<th>Richting</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($educations as $education)
					<tr>
						<td>{{ $education->name }}</td>
						<td>{{ $education->description }}</td>
						<td>{{ $education->length }}</td>
						<td>{{ $education->school->name }}</td>
						<td>{{ $education->education_collection->name }}</td>
						<td><a href="/educations/{{ $education->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
						<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen{{ $education->id }}">Verwijderen</button>
							<div class="modal fade" id="verwijderen{{ $education->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je deze opleiding wilt verwijderen?</h4>
										</div>
										<div class="modal-body">
											<a href="/educations/{{ $education->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
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
			@if (!$deletedEducations->isEmpty())
			<div class="page-header"><h3><b>Verwijderde opleidingen</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Beschrijving</th>
						<th>Duur in jaren</th>
						<th>School</th>
						<th>Richting</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($deletedEducations as $education)
					<tr>
						<td>{{ $education->name }}</td>
						<td>{{ $education->description }}</td>
						<td>{{ $education->length }}</td>						
						<td>{{ $education->school->name }}</td>						
						<td>{{ $education->education_collection->name }}</td>						
						<td><a href="/educations/{{ $education->id }}/restore"<button type="button" class="btn btn-success">Herstellen</button></td>
					</tr>
				@endforeach
				</tbody>
		</table>
		@endif
	</div>
@stop