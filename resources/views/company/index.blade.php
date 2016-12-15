@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="page-header"><h3><b>Bedrijven</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Beschrijving</th>
						<th>Privacy level</th>
						<th>Beheer</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($companies as $company)
					<tr>
						<td>{{ $company->name }}</td>
						<td>{{ $company->description }}</td>
						<td>{{ $company->privacyLevel->name }}</td>		
						<td><a href="/companies/{{ $company->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
						<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen{{ $company->id }}">Verwijderen</button>
							<div class="modal fade" id="verwijderen{{ $company->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je dit bedrijf wilt verwijderen?</h4>
										</div>
										<div class="modal-body">
											<a href="/companies/{{ $company->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
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
			@if (!$deletedCompanies->isEmpty())
			<hr>
			<div class="page-header"><h3><b>Verwijderde bedrijven</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Naam</th>
						<th>Beschrijving</th>
						<th>Privacy level</th>
						<th>Beheer</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($deletedCompanies as $company)
					<tr>
						<td>{{ $company->name }}</td>
						<td>{{ $company->description }}</td>
						<td>{{ $company->privacyLevel->name }}</td>						
						<td><a href="/companies/{{ $company->id }}/restore"<button type="button" class="btn btn-success">Herstellen</button></td>
					</tr>
				@endforeach
				</tbody>
		</table>
	</div>
@stop