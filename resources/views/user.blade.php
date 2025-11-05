@extends('layouts.frame')

@section('content')
<form action="{{route('welcome')}} " method="GET">
    @csrf
    <input type="number" name="age" placeholder="Enter Your Age">
    <button type="submit">Enter</button>
</form>

@endsection