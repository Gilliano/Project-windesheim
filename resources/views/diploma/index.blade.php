@extends('layouts.app')

@section('content')
	<div class="col-md-12">
		<div class="page-header"><h3><b>Diplomas</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Behaald op</th>
						<th>Opleiding</th>
						<th>Klascode</th>
						<th>Naam alumni</th>
						<th>Naam school</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($diplomas as $diploma)
						<tr>
							<td>{{ \Carbon\Carbon::parse($diploma->graduated_year)->format('d-m-Y') }}</td>
							<td>{{ $diploma->education }}</td>
							<td>{{ $diploma->education_classcode }}</td>
							<td>{{ $diploma->person->firstname }}</td>
							@if (isset($diploma->school->id))
								<td>{{ $diploma->school->name }}</td>
							@else
								<td>{{ $diploma->school_name }}</td>
							@endif
							<td><a href="/diplomas/{{ $diploma->id }}/edit"><button type="button" class="btn btn-primary">Wijzigen</button></a></td>
							<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#verwijderen{{ $diploma->id }}">Verwijderen</button>
							<div class="modal fade" id="verwijderen{{ $diploma->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je het diploma wilt verwijderen?</h4>
										</div>
										<div class="modal-body">
											<a href="/diplomas/{{ $diploma->id }}/delete"><button type="button" class="btn btn-danger">Ja</button></a>
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
			@if (!$deletedDiplomas->isEmpty())
			<div class="page-header"><h3><b>Verwijderde diplomas</b></h3></div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Behaald op</th>
						<th>Opleiding</th>
						<th>Klascode</th>
						<th>Naam alumni</th>
						<th>Naam school</th>
						<th>Naam school</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($deletedDiplomas as $diploma)
						<tr>
							<td>{{ \Carbon\Carbon::parse($diploma->graduated_year)->format('d-m-Y') }}</td>
							<td>{{ $diploma->education }}</td>
							<td>{{ $diploma->education_classcode }}</td>
							<td>{{ $diploma->person->firstname }}</td>
							<td>{{ $diploma->school->name }}</td>
							<td>{{ $diploma->school_name }}</td>
						<td>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#herstellen{{ $diploma->id }}">Herstellen</button>
							<div class="modal fade" id="herstellen{{ $diploma->id }}" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Weet je zeker dat je het diploma wilt herstellen?</h4>
										</div>
										<div class="modal-body">
											<a href="/diplomas/{{ $diploma->id }}/restore"><button type="button" class="btn btn-danger">Ja</button></a>
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