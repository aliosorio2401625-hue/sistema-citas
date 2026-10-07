<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de perfil</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
        }

        .contenedor {
            width: 420px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        h1 {
            color: #345995;
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        button {
            margin-top: 20px;
            padding: 11px 20px;
            background-color: #345995;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            display: inline-block;
            margin-left: 15px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <h1>Crear perfil</h1>

        <p>Ingresa la información solicitada para crear tu perfil.</p>

        <form action="#" method="GET">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="correo">Correo electrónico</label>
            <input type="email" id="correo" name="correo" required>

            <label for="edad">Edad</label>
            <input type="number" id="edad" name="edad" min="18" required>

            <label for="intereses">Intereses</label>
            <textarea id="intereses" name="intereses"></textarea>

            <button type="submit">Crear perfil</button>
            <a href="/">Regresar</a>
        </form>
    </div>
</body>
</html>
