@extends('layouts.frame')

@section('content')

<h2>Add Student</h2>

{{-- show validation errors --}}
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- form that sends data to store() --}}
    <form action="{{route('students.store')}}" method="POST">
        @csrf 
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div>
            <label class="form-label">Age:</label>
            <input type="number" name="age" id="" class="form-control" required>
        </div>
        <div>
            <label class="form-label">Address:</label>
            <input type="text" name="address" id="" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary my-5">Add Student</button>
    </form>

@endsection