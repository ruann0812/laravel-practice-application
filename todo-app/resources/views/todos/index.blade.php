@extends('layouts.app')


@section('title')

	Tasks List

@endsection

@section('content')

	<h1 class="text-center my-5">Tasks List</h1>

	<div class="row justify-content-center">

		<div class="col-md-10">

			<div class="card card-default">
				<div class="card-header">

					Tasks

					<div class="dropdown float-right">
					  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Filter By
					  </a>

					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					    <a class="dropdown-item" href="/todos/filter/all">All</a>
					    <a class="dropdown-item" href="/todos/filter/today">Today</a>
					    <a class="dropdown-item" href="/todos/filter/this-month">Current Month</a>
					  </div>
					</div>

				</div>

				<div class="card-body">

					<ul class="list-group">
						@foreach($todos as $todo)
							<li class="list-group-item">
								{{ $todo->name }}
								<a href="/todos/{{ $todo->id }}/edit" class="btn btn-info btn-sm float-right ml-2">Update</a>
								<a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-right">View</a>
							</li>
						@endforeach
					</ul>

				</div>

			</div>

		</div>

	</div>

@endsection