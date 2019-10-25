@extends('layouts.app')

@section('title')

	Single todo - {{ $todo->name }}

@endsection


@section('content')

<h1 class="text-center my-5">
	{{ $todo->name }}
</h1>

<div class="row justify-content-center">

	<div class="col-md-6">

		<div class="card card-default">

			<div class="card-header">
				Details
			</div>


			<div class="card-body">
				{{ $todo->description }}
				<br><br><a href="/todos" class="btn btn-primary btn-sm float-left">Back</a>
			</div>

		</div>

	</div>

</div>

@endsection