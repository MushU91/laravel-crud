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
        <div class="my-3">
            <label class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" >
            {{-- @error('name')
            <div class="alert alert-danger">{{$messages}}</div>
            @enderror --}}
        </div>
        <div class="my-3">
            <label class="form-label">Age:</label>
            <input type="number" name="age" id="" class="form-control" >
        </div>
        <div class="my-3">
            <label class="form-label">Address:</label>
            <input type="text" name="address" id="" class="form-control" >
        </div>

        <button type="submit" class="btn btn-success my-5">Add Student</button>
        <div class="btn-danger btn">
        <a href="{{route('students.index')}} " class="text-white" style="text-decoration: none">GO BACK</a>
    </div>

    </form>
    
@endsection