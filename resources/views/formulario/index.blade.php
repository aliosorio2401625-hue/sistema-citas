
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios registrados</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 30px;
        }

        .contenedor {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 { color: #345995; }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #345995;
            color: white;
        }

        .mensaje { color: green; }
    </style>
</head>

<body> 
<div class="contenedor">

    <h1>Usuarios registrados</h1>

    @if (session('success'))
        <p class="mensaje">{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('registro.create') }}">Registrar nuevo usuario</a>
        |
        <a href="{{ route('inicio') }}">Inicio</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        Aun no hay usuarios registrados 
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
</body>
</html>
