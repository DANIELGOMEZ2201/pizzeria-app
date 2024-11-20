<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Clients</title>
</head>
<body>
    <div class="container">
        <h1>Edit Clients</h1>  
        <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
          @method('PUT')
          @csrf

            <div class="mb-3">
              <label for="id" class="form-label">Id</label>
              <input type="text" class="form-control" id="id" name="id" disabled="disabled" value="{{ $client->id }}">
              <div class="form-text">Cliente Id</div>
            </div>

            <div class="mb-3">
              <label for="user_id" class="form-label">Usuario</label>
              <select class="form-select" id="user_id" name="user_id" required>
                <option selected disabled value="">Elige un usuario...</option>
                @foreach ($users as $user)
                   <option value="{{ $user->id }}" {{ $user->id == $client->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ $client->address }}" placeholder="Dirección del cliente">
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Teléfono</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ $client->phone }}" placeholder="Teléfono del cliente">
            </div>

            <div class="mt-3">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ route('clients.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
