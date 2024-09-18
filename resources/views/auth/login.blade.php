<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <title>Login</title>
</head>
<body>
<div class="container">
<div class="card mt-5">
    <h1 class="card-header p-3">Login</h1>
    <div class="card-body">
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required autofocus>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <a href="{{ route('register') }}">Sign Up</a>
</div>

    @if ($errors->has('login'))
        <p>{{ $errors->first('login') }}</p>
    @endif
</div>
</div>
</body>
</html>
