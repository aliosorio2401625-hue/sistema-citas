<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Descubrir personas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 30px;
            color: #333;
        }

        .contenedor {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            color: #345995;
            text-align: center;
        }

        .subtitulo {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .tarjetas {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .tarjeta {
            background: white;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .tarjeta h2 {
            color: #345995;
            margin-top: 0;
        }

        .dato {
            margin: 12px 0;
        }

        .etiqueta {
            font-weight: bold;
            color: #345995;
        }

        .sin-resultados {
            background: white;
            padding: 25px;
            text-align: center;
            border-radius: 10px;
            color: #777;
        }

        .enlace {
            display: inline-block;
            margin-top: 25px;
            color: #345995;
            text-decoration: none;
        }

        .enlace:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Descubre nuevas personas</h1>

    <p class="subtitulo">
        Estas son algunas personas que coinciden con tus preferencias.
    </p>

    @if ($usuarios->count() > 0)

        <div class="tarjetas">

            @foreach ($usuarios as $usuario)

                <div class="tarjeta">

                    <h2>{{ $usuario->name }}</h2>

                    <p class="dato">
                        <span class="etiqueta">Edad:</span>
                        {{ $usuario->profile->edad ?? 'No especificada' }}
                    </p>

                    <p class="dato">
                        <span class="etiqueta">Género:</span>
                        {{ $usuario->profile->genero ?? 'No especificado' }}
                    </p>

                    <p class="dato">
                        <span class="etiqueta">Descripción:</span><br>
                        {{ $usuario->profile->descripcion ?? 'Sin descripción' }}
                    </p>

                    <p class="dato">
                        <span class="etiqueta">Intereses:</span><br>
                        {{ $usuario->profile->intereses ?? 'Sin intereses registrados' }}
                    </p>

                </div>

            @endforeach

        </div>

    @else

        <div class="sin-resultados">
            <h2>No encontramos personas por ahora.</h2>
            <p>Cuando haya nuevos perfiles compatibles con tus preferencias, aparecerán aquí.</p>
        </div>

    @endif

    <a href="{{ route('inicio') }}" class="enlace">
        Volver al inicio
    </a>

</div>

</body>
</html>
