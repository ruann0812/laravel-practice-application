@extends('layouts.app')


@section('title')

	Edit todo

@endsection

@section('content')

<h1 class="text-center my-5">Edit Todos</h1>

<div class="row justify-content-center">

	<div class="col-md-8">

		<div class="card card-default">

			<div class="card-header">Edit todo</div>

			<div class="card-body">

				@if($errors->any())

					<div class="alert alert-danger">

						<ul class="list-group">

							@foreach($errors->all() as $error)

								<li class="list-group-item">

									{{ $error }}

								</li>

							@endforeach

						</ul>

					</div>

				@endif

				<form action="/todos/{{ $todo->id }}/update-todos" method="POST">
					@csrf
					<div class="form-group">

						<input type="text" class="form-control" placeholder="Name" name="name" value="{{ $todo->name }}">

					</div>

					<div class="form-group">

						<textarea name="description" placeholder="Description" cols="5" rows="5" class="form-control">{{ $todo->description }}</textarea>

					</div>

					<table class="table">
					  <tbody>
					    <tr>
					      <td><input type="text" class="form-control start-date" placeholder="Start Date" name="startDate" value="{{ date('d-M-Y', strtotime($todo->started_at)) }}"></td>
					      <td><input type="text" class="form-control target-date" placeholder="Target Date" name="targetDate" value="{{ date('d-M-Y', strtotime($todo->done_at)) }}"></td>
					    </tr>
					  </tbody>
					</table>

					<div class="form-group">
						Completed: <input type="checkbox" name="completed" class="completed-checkbox" value="{{ $todo->completed }}" {!! $todo->completed === 0 ? "" : "checked='checked'" !!}>
					</div>

					<div class="form-group"></div>

					<div class="form-group text-center">

						<button type="submit" class="btn btn-success">Update</button>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>

@endsection