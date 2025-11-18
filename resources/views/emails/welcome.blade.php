<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Thanks for registering at Our Website.</p>

    <p>
        <strong>Your Info</strong>
        Email: {{$user->email}} <br>
        Registered at : {{ $user->created_at->format('Y-m-d H:i:s')}}
    </p>

    <p> The Our Team</p>
</body>
</html>