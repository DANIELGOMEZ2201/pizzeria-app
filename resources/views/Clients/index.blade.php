<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>List Clients</title>
</head>
<body>
    <div class="container">
        <h1>List Clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-success">Add Clients</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->user->name ?? 'Sin usuario' }}</td> <!-- Asumiendo que el modelo Client tiene una relación con User -->
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
