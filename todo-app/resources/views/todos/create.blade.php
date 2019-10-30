@extends('layouts.app')


@section('title')

	Create new task

@endsection

@section('content')

<h1 class="text-center my-5">Create Task</h1>

<div class="row justify-content-center">

	<div class="col-md-8">

		<div class="card card-default">

			<div class="card-header">Create new task</div>

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

				<form action="/store-todos" method="POST">
					@csrf
					<div class="form-group">

						<input type="text" class="form-control" placeholder="Name" name="name" autocomplete="off">

					</div>

					<div class="form-group">

						<textarea name="description" placeholder="Description" cols="5" rows="5" class="form-control"></textarea>

					</div>

					<table class="table">
					  <tbody>
					    <tr>
					      <td><input type="text" class="form-control start-date" placeholder="Start Date" name="startDate" autocomplete="off"></td>
					      <td><input type="text" class="form-control target-date" placeholder="Target Date" name="targetDate" autocomplete="off"></td>
					    </tr>
					  </tbody>
					</table>

					<div class="form-group text-center">

						<button type="submit" class="btn btn-success">Create task</button>

					</div>

				</form>

			</div>

		</div>

	</div>

</div>

@endsection