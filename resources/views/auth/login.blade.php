<form action="{{route('login.store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
