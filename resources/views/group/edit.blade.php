@extends('layouts.app')

@section('content')
@include('/errors._form_errors')
	<div class="col-md-9 col-md-offset-1">
		<form method="post" action="/groups/{{ $group->id }}/update">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}
				<div class="form-group">
		  			<input type="text" class="form-control" name="name" value="{{ $group->name }}" minlength="1" maxlength="45" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="date" name="cohort_start" value="{{ Carbon\Carbon::parse($group->cohort_start)->format('Y-m-d') }}" class="form-control" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="date" name="cohort_end" value="{{ Carbon\Carbon::parse($group->cohort_end)->format('Y-m-d') }}" class="form-control" required/>
		  		</div>
		  		<div class="form-group">
		  			<input type="number" name="started_amount" value="{{ $group->started_amount }}" class="form-control" min="1" max="100" required/>
		  		</div>
		  		<div class="form-group">
		  			<select name="coordinator_id" class="form-control" required>
		  				@foreach ($users as $user)
		  					@if ($user->person->id === $group->coordinator_id)
			  					<option value="{{ $group->coordinator_id }}" name="coordinator_id" selected>{{ $coordinator->person->firstname }}</option>
			  				@else
			  					<option value="{{ $user->person->id }}" name="coordinator_id" >{{ $user->person->firstname }}</option>
			  				@endif
		  				@endforeach
		  			</select>
		  		</div>
		  		<div class="form-group">
		  			<select name="education_id" class="form-control" required>
		  				@foreach ($educations as $education)
		  					@if ($education->id === $group->education_id)
			  					<option value="{{ $group->education_id }}" name="education_id" selected>{{ $group->education->name }}</option>
			  				@else
			  					<option value="{{ $education->id }}" name="education_id" >{{ $education->name }}</option>
			  				@endif
		  				@endforeach
		  			</select>
		  		</div>
		  		<div class="form-group">
		  			<textarea name="description" class="form-control" rows="4">{{ $group->description }}</textarea>
		  		</div>

			  	<div class="form-group">
			  		<button type="submit" class="btn btn-success form-control">Wijzigen</button>
			  	</div>
			</form>
	</div>
@stop