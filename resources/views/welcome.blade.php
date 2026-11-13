<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Citas</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #345995;
            color: white;
            padding: 18px 10%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 22px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .contenido {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .bienvenida {
            background-color: white;
            padding: 45px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .bienvenida h2 {
            color: #345995;
            font-size: 32px;
            margin-top: 0;
        }

        .bienvenida p {
            line-height: 1.6;
            color: #555;
            max-width: 650px;
        }

        .boton {
            display: inline-block;
            margin-top: 15px;
            padding: 12px 22px;
            background-color: #345995;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .opciones {
            display: flex;
            gap: 20px;
            margin-top: 25px;
        }

        .opcion {
            flex: 1;
            background-color: white;
            padding: 22px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .opcion h3 {
            color: #345995;
            margin-top: 0;
        }

        footer {
            margin-top: 60px;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            header {
                display: block;
                text-align: center;
            }

            nav {
                margin-top: 15px;
            }

            nav a {
                margin: 0 8px;
            }

            .opciones {
                display: block;
            }

            .opcion {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Sistema de Citas</h1>

<nav>
    <a href="{{ route('inicio') }}">Inicio</a>
    <a href="{{ route('registro.create') }}">Registrar usuario</a>
    <a href="{{ route('perfiles.index') }}">Ver usuarios</a>
</nav>

    </header>

    <main class="contenido">
        <section class="bienvenida">
            <h2>Bienvenido</h2>

            <p>
                Este sistema permite crear un perfil, conocer otros usuarios
                y administrar solicitudes de citas desde un mismo lugar.
            </p>

            <a href="{{ route('registro.create') }}" class="boton">Comenzar</a>
        </section>

        <section class="opciones">
            <div class="opcion">
                <h3>Crear perfil</h3>
                <p>Registra tus datos personales y agrega información sobre tus intereses.</p>
            </div>

            <div class="opcion">
                <h3>Ver perfiles</h3>
                <p>Consulta la información de otros usuarios registrados en el sistema.</p>
            </div>

            <div class="opcion">
                <h3>Mis citas</h3>
                <p>Revisa y administra las solicitudes de citas recibidas o enviadas.</p>
            </div>
        </section>
    </main>

    <footer>
        Proyecto de Programación Web — 2026
    </footer>
</body>
</html>