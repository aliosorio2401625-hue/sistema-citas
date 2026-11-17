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
            color: #333;
        }

        .contenedor {
            max-width: 1300px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            color: #345995;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #345995;
            color: white;
        }

        .mensaje {
            color: green;
        }

        .sin-perfil {
            color: #888;
            font-style: italic;
        }

        .enlace {
            color: #345995;
            text-decoration: none;
        }

        .enlace:hover {
            text-decoration: underline;
        }

        @media (max-width: 750px) {
            .contenedor {
                overflow-x: auto;
            }

            table {
                min-width: 1100px;
            }
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Usuarios registrados</h1>

    @if (session('success'))
        <p class="mensaje">{{ session('success') }}</p>
    @endif

    <p>
        <a href="{{ route('registro.create') }}" class="enlace">
            Registrar nuevo usuario
        </a>
        |
        <a href="{{ route('inicio') }}" class="enlace">
            Inicio
        </a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo electrónico</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Preferencia</th>
                <th>Descripción</th>
                <th>Intereses</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($usuarios as $usuario)

                <tr>
                    <td>{{ $usuario->id }}</td>

                    <td>{{ $usuario->name }}</td>

                    <td>{{ $usuario->email }}</td>

                    @if ($usuario->profile)

                        <td>
                            {{ $usuario->profile->edad ?? 'No especificada' }}
                        </td>

                        <td>
                            {{ $usuario->profile->genero ?? 'No especificado' }}
                        </td>

                        <td>
                            {{ $usuario->profile->preferencia ?? 'No especificada' }}
                        </td>

                        <td>
                            {{ $usuario->profile->descripcion ?? 'Sin descripción' }}
                        </td>

                        <td>
                            {{ $usuario->profile->intereses ?? 'Sin intereses registrados' }}
                        </td>

                    @else

                        <td colspan="5" class="sin-perfil">
                            Este usuario todavía no ha completado su perfil.
                        </td>

                    @endif

                </tr>

            @empty

                <tr>
                    <td colspan="8">
                        Aún no hay usuarios registrados.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

</div>

</body>
</html>
