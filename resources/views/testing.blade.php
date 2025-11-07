<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel Validation Example</title>
</head>
<body>
  <h2>Laravel 11 Validation Example</h2>

  {{-- @if ($errors->any())
      <div style="color: red;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif --}}

  @if (session('success'))
      <div style="color: green;">{{ session('success') }}</div>
  @endif

  <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf

   <input type="text" name="text_field" placeholder="Text" value="{{ old('text_field') }}">
@error('text_field')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
@error('email')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="password" name="password" placeholder="Password">
@error('password')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="number" name="number" placeholder="Number" value="{{ old('number') }}">
@error('number')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="date" name="date" value="{{ old('date') }}">
@error('date')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="color" name="color" value="{{ old('color','#000000') }}">
@error('color')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="file" name="file">
@error('file')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="url" name="url" value="{{ old('url') }}" placeholder="https://example.com">
@error('url')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<label><input type="checkbox" name="checkbox" value="1" {{ old('checkbox') ? 'checked' : '' }}> Accept Terms</label>
@error('checkbox')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<label><input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> Male</label>
<label><input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female</label>
@error('gender')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="range" name="range" min="1" max="100" value="{{ old('range',50) }}">
@error('range')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="tel" name="tel" placeholder="Phone" value="{{ old('tel') }}">
@error('tel')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="hidden" name="hidden" value="secret123">
@error('hidden')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="month" name="month" value="{{ old('month') }}">
@error('month')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="time" name="time" value="{{ old('time') }}">
@error('time')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="week" name="week" value="{{ old('week') }}">
@error('week')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="search" name="search" placeholder="Search something" value="{{ old('search') }}">
@error('search')
    <span style="color:red;">{{ $message }}</span>
@enderror
<br><br>

<input type="submit" value="Submit">

  </form>
</body>
</html>
