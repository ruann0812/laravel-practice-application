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
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Started Date</th>
				      <th scope="col">Target Date</th>
				      <th scope="col">Updated Date</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td>{{ date('d-M-Y', strtotime($todo->started_at)) }}</td>
				      <td>{{ date('d-M-Y', strtotime($todo->done_at)) }}</td>
				      <td>{{ date('d-M-Y', strtotime($todo->updated_at)) }}</td>
				    </tr>
				  </tbody>
				</table>

				<br>
				Completed: <span style="color:{!! $completedFontColor !!}">{{ $todo->completed === 0 ? "In progress" : "Done" }}</span>

				<br><br><a href="/todos" class="btn btn-primary btn-sm float-left">Back</a>
				<a href="/todos/{{ $todo->id }}/edit" class="btn btn-info btn-sm ml-2">Update</a>
			</div>

		</div>

	</div>

</div>

@endsection