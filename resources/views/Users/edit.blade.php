<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>  
        <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
          @method('PUT')
          @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password (dejar vacío para no cambiar)</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                <option selected disabled value="">Choose a role...</option>
                <option value="cliente" {{ $user->role == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="empleado" {{ $user->role == 'empleado' ? 'selected' : '' }}>Empleado</option>
              </select>
              @error('role')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mt-3">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('users.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
