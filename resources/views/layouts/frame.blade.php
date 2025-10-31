<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        body{
            background-color: #F9E3D7;
            color: black;
        
        }
        nav{
            background-color:#f6e8c6c0;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav a:hover{
            text-decoration: underline;
        }
        .container{
            flex: 1; 
            /* push footer down */
        }
        footer{
            background-color: #A6D784;
            color: black;
            text-align: center;
            padding: 10px 0;
            font-weight: bold;
        }
        
    </style>
</head>
<body >
    {{-- nav --}}
    <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
    
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-backpack4-fill" viewBox="0 0 16 16">
  <path d="M8 0a2 2 0 0 0-2 2H3.5a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h4v.5a.5.5 0 0 0 1 0V7h4a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H10a2 2 0 0 0-2-2m1 2a1 1 0 0 0-2 0zm-4 9v2h6v-2h-1v.5a.5.5 0 0 1-1 0V11z"/>
  <path d="M14 7.599A3 3 0 0 1 12.5 8H9.415a1.5 1.5 0 0 1-2.83 0H3.5A3 3 0 0 1 2 7.599V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5z"/>
</svg>

    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{route('students.index')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('students.create')}}">Create</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
{{-- nav --}}
<div class="container py-5">
    @yield('content')
</div>

<footer>
    &copy; 2025 Student CRUD
</footer>
</body>
</html>