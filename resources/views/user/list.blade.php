<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h3 class="card-header"><i class="fa fa-users"></i> User List</h3>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert"> 
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('logout') }}" method="POST" class="mb-4">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-sign-out-alt"></i> Logout</button>
                </form>

                <a href="{{ route('import.form') }}" class="btn btn-primary mb-3"><i class="fa fa-file-upload"></i> Import User Data</a>
    
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-warning float-end" href="{{ route('export.users') }}"><i class="fa fa-download"></i> Export User Data</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
