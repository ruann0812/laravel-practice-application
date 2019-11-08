@extends('layouts.app')

@section('title')

	Single todo - {{ $todo->name }}

@endsection


@section('content')

<h1 class="text-center my-5">
	{{ $todo->name }}
</h1>

<div class="row justify-content-center">

	<div class="col-md-8">

		<div class="card card-default">

			<div class="card-header">
				Details
			</div>


			<div class="card-body">
				{{ $todo->description }}
				<br><br>
				@if($todo->recurring === 0)
					<table class="table">
					  <thead>
					    <tr>
					      <th>Started</th>
					      <th>Target</th>
					      <th>Time</th>
					      <th>Updated Date</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>{{ date('d-M-Y', strtotime($todo->started_at))  }}</td>
					      <td>{{ date('d-M-Y', strtotime($todo->done_at)) }}</td>
					      <td>{{ date('h:i A', strtotime($todo->started_at))  }} - {{ date('h:i A', strtotime($todo->done_at)) }}</td>
					      <td>{{ date('d-M-Y', strtotime($todo->updated_at)) }}</td>
					    </tr>
					  </tbody>
					</table>
				@endif

				<br>
				Status: <span style="color:{!! $completedFontColor !!}">{{ $todo->completed === 0 ? "In progress" : "Done" }}</span>

				@if($todo->recurring === 1)
					<br> <span style="color:Red">Recurring task</span>
				@endif



				<br><br><a href="/todos" class="btn btn-primary btn-sm float-left">Back</a>
				<a href="/todos/{{ $todo->id }}/edit" class="btn btn-info btn-sm ml-2">Update</a>
			</div>

		</div>

	</div>

</div>

@endsection