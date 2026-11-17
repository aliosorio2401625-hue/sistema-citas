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

        <label for="genero">Mi género:</label>
        <select name="genero" id="genero">
            <option value="">Selecciona una opción</option>
            <option value="hombre" {{ old('genero') == 'hombre' ? 'selected' : '' }}>Hombre</option>
            <option value="mujer" {{ old('genero') == 'mujer' ? 'selected' : '' }}>Mujer</option>
            <option value="otro" {{ old('genero') == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>
        @error('genero')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>

        <label for="preferencia">¿A quién deseas conocer?</label>
        <select name="preferencia" id="preferencia">
            <option value="">Selecciona una opción</option>
            <option value="hombres" {{ old('preferencia') == 'hombres' ? 'selected' : '' }}>Hombres</option>
            <option value="mujeres" {{ old('preferencia') == 'mujeres' ? 'selected' : '' }}>Mujeres</option>
            <option value="ambos" {{ old('preferencia') == 'ambos' ? 'selected' : '' }}>Ambos</option>
        </select>
        @error('preferencia')
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
