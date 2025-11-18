@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('register') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>

    <input type="password" name="password" placeholder="Password" required>

    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <input type="email" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required>

    <button type="submit">Register</button>
</form>
