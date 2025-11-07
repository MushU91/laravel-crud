<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Laravel Validation Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .container{
            position: relative;
            display: inline-block;
        }
        .container input {
            width: 150px;
            padding: 8px 30px 8px 10px;
            font-size: 15px;
        }
        .bi-calendar3 {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555;
            cursor: pointer;
        }
    </style>
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

<div class="container">
    <input type="text" name="date" id="dateInput" value="{{old('date')}}" placeholder="yyyy-mm-dd">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" id="calendarBtn" viewBox="0 0 16 16">
        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
    </svg>
</div><br>
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
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    const fp = flatpickr("#dateInput", {
        dateFormat: "Y-m-d",
        allowInput: false
    });

      document.getElementById("calendarBtn").addEventListener("click", function() {
      fp.open();
    });
  </script>
</body>
</html>
