<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar perfil</title>
</head>
<body>

    <h1>Completa tu perfil</h1>

    <p>Bienvenido, {{ Auth::user()->name }}. Agrega tus datos personales.</p>

    <form action="{{ route('perfil.store') }}" method="POST">
        @csrf

        <label for="edad">Edad:</label>
        <input
            type="number"
            name="edad"
            id="edad"
            min="1"
            max="120"
            value="{{ old('edad') }}"
        >
        @error('edad')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <label for="descripcion">Descripción personal:</label><br>
        <textarea
            name="descripcion"
            id="descripcion"
            rows="4"
            cols="40"
        >{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <label for="intereses">Intereses:</label><br>
        <textarea
            name="intereses"
            id="intereses"
            rows="4"
            cols="40"
        >{{ old('intereses') }}</textarea>
        @error('intereses')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Guardar perfil</button>
    </form>

    <br>

    <a href="{{ route('inicio') }}">Volver al inicio</a>

</body>
</html>
