<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
</head>
<body>

    <h1>Editar mi perfil</h1>

    <p>Actualiza tus datos personales.</p>

    <form action="{{ route('perfil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="edad">Edad:</label>
        <input
            type="number"
            name="edad"
            id="edad"
            min="1"
            max="120"
            value="{{ old('edad', $perfil->edad) }}"
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
        >{{ old('descripcion', $perfil->descripcion) }}</textarea>

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
        >{{ old('intereses', $perfil->intereses) }}</textarea>

        @error('intereses')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Actualizar perfil</button>
    </form>

    <br>

    <a href="{{ route('inicio') }}">Volver al inicio</a>

</body>
</html>
