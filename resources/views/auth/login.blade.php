@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
