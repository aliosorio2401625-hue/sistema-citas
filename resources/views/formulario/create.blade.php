
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px;
        }

        .contenedor {
            max-width: 420px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        h1 { color: #345995; }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        button {
            margin-top: 20px;
            padding: 11px 20px;
            background: #345995;
            color: white;
            border: 0;
            cursor: pointer;
        }

        .error { color: red; }
        .mensaje { color: green; }
    </style>
</head>

<body>
<div class="contenedor">

    <h1>Crear usuario</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registro.store') }}" method="POST">
        @csrf

        <label for="name">Nombre completo</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
        >

        <label for="email">Correo electrónico</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >

        <label for="password">Contraseña</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <label for="password_confirmation">
            Confirmar contraseña
        </label>
        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
        >

        <button type="submit">Registrarme</button>

        <p>
            <a href="{{ route('inicio') }}">Regresar al inicio</a>
        </p>
    </form>

</div>
</body>
</html>
