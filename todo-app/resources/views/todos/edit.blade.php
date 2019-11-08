@extends('layouts.app')


@section('title')

	Edit task

@endsection

@section('content')

<h1 class="text-center my-5">Edit Task</h1>

<div class="row justify-content-center">

	<div class="col-md-8">

		<div class="card card-default">

			<div class="card-header">Edit task</div>

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
					@if($todo->recurring === 0)
						<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Started Date</th>
						      <th scope="col">Target Date</th>
						    </tr>
						  </thead>
						  <tbody>
						  <tr>
						  </tr>
						    <tr>
						      <td>
							      <div class="form-group">
							        <div class='input-group date' id='datetimepicker1'>
							          <input type='text' class="form-control start-time" name="startDate" value="{{ date('d-M-Y h:i A', strtotime($todo->started_at)) }}" autocomplete="off" />
							          <span class="input-group-addon">
				                        CHANGE <i class="far fa-calendar"></i>
							          </span>
							        </div>
							      </div>
						      </td>
						      <td>
							      <div class="form-group">
							        <div class='input-group date' id='datetimepicker2'>
							          <input type='text' class="form-control target-time" name="targetDate" value="{{ date('d-M-Y h:i A', strtotime($todo->done_at)) }}" autocomplete="off"/>
							          <span class="input-group-addon">
				                        CHANGE <i class="far fa-calendar"></i>
							          </span>
							        </div>
							      </div>
						      </td>
						    </tr>
						  </tbody>
						</table>
					@endif

					@if($todo->complete == 0)
						<div class="form-group">
							Status: <a href="/todos/{{ $todo->id }}/complete" style="color:white;" class="btn btn-warning btn-sm">Complete</a>
							<a href="/todos" class="btn btn-primary btn-sm">Back</a><br>
						</div>
					@endif

					@if($todo->recurring == 1)
						<span style="color:Red">Recurring task</span>
					@endif

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