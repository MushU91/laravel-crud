@extends('layouts.frame')

@section('content')
<div class="d-flex justify-content-between my-3">
    <h2>Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered text-white" style="border-radius: 10px; overflow: hidden; text-align: center;" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $loop->iteration }}</td> <!-- row -->
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->address }}</td>
            <td>
                <a href="{{route('students.edit', $student->id)}}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{route('students.destroy', $student->id )}}" method="POST" style="display: inline;" class="mx-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
