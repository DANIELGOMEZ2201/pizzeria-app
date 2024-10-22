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
        
        <a href="{{ route('welcome') }}" class="btn btn-warning">Menú</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Posición</th>
                    <th>Cedula</th>
                    <th>Salario</th>
                    <th>Fecha</th>
                    <th>Usuario.ID</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employe)
                    <tr>
                        <td>{{ $employe->id }}</td>
                        <td>{{ $employe->employe_name ?? 'Sin usuario' }}</td>
                        <td>{{ $employe->position }}</td>
                        <td>{{ $employe->identification_number }}</td>
                        <td>{{ $employe->salary }}</td>
                        <td>{{ $employe->hire_date }}</td>
                        <td>{{ $employe->user_id }}</td>
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
