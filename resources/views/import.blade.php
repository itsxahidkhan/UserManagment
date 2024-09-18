<!DOCTYPE html>
<html>
<head>
    <title>Import Users</title>
</head>
<body>
    <form action="{{ url('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Import</button>
        @if (session('success'))
            <p>{{ session('success') }}</p>
        @endif
    </form>
</body>
</html>
