
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Iniciar sesión</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px;
        }

        .contenedor {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        h1 {
            color: #345995;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 12px;
            width: 100%;
            background: #345995;
            color: white;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Iniciar sesión</h1>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">

        @csrf

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

        <button type="submit">
            Ingresar
        </button>

    </form>

    <p>
        ¿No tienes una cuenta?
        <a href="{{ route('registro.create') }}">Regístrate aquí</a>
    </p>

    <a href="{{ route('inicio') }}">Regresar al inicio</a>

</div>

</body>
</html>
