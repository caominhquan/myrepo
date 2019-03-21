@extends('layout')
@section('content')
	@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	<a href="/create" class="btn btn-primary">Add Employee</a>
	<table class="table table-stripped table-bordered">
		<thead class="thead-dark">
			<tr>
				<th scope="col">ID</th>
				<th scope="col">Email</th>
				<th scope="col">Post</th>
				<th scope="col">Image</th>
				<th scope="col">EDIT</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($employees as $employee)
			<tr>
				<th>{{ $employee->id }}</th>
				<th>{{ $employee->email }}</th>
				<th>{{ $employee->post }}</th>
				<th><img src="{{ asset('uploads/employee/' . $employee->image) }}" width="180px" height="100px"></th>
				<th><a href="/edit/ {{ $employee->id }}" class="btn btn-success">EDIT</a></th>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection