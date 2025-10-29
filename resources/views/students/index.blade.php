@extends('layouts.frame')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered text-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->address }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
