@extends('layouts.frame')

@section('content')

<h3>Edit Student</h3>

<form action="{{route('students.update', $student->id)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label >Name:</label>
        <input type="text"  name="name" class="form-control" value="{{$student->name}}">
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label >Age:</label>
        <input type="number"  name="age" class="form-control" value="{{$student->age}}">
        @error('age')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label >Address:</label>
        <input type="text" name="address" class="form-control" value="{{$student->address}}">
        @error('address')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection