<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Register</title>
</head>
<body>
<div class="container">
<div class="card mt-5">
    <h1 class="card-header p-3">Register</h1>
    <form method="POST" action="{{ url('/register') }}">
        @csrf

        <label for="name">Name:</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>

        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type" required>
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
        </select>

        <button type="submit">Register</button>
    </form>

    @if ($errors->has('registration'))
        <p>{{ $errors->first('registration') }}</p>
    @endif

    <a href="{{ route('login') }}">Back to Login</a>
</div>
</div>
</body>
</html>
