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

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        nav span {
            color: white;
        }

        nav button {
            padding: 8px 12px;
            background-color: white;
            color: #345995;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contenido {
            max-width: 1100px;
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

        .boton:hover {
            background-color: #254575;
        }

        .opciones {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }

        .opcion {
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
                justify-content: center;
                flex-wrap: wrap;
            }

            .bienvenida {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Sistema de Citas</h1>

        <nav>
            <a href="{{ route('inicio') }}">Inicio</a>

            @auth
                <span>Hola, {{ Auth::user()->name }}</span>

                @if (Auth::user()->profile)
                    <a href="{{ route('perfil.edit') }}">Editar mi perfil</a>
                @else
                    <a href="{{ route('perfil.create') }}">Completar mi perfil</a>
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>

            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                <a href="{{ route('registro.create') }}">Registrarse</a>
            @endauth
        </nav>
    </header>

    <main class="contenido">

        @if (session('success'))
            <p style="color: green; text-align: center;">
                {{ session('success') }}
            </p>
        @endif

        <section class="bienvenida">
            <h2>Bienvenido</h2>

            <p>
                Este sistema permite crear un perfil, conocer otros usuarios
                y administrar solicitudes de citas desde un mismo lugar.
            </p>

            @guest
                <a href="{{ route('registro.create') }}" class="boton">
                    Comenzar
                </a>
            @else
                <p>Ya has iniciado sesión. Puedes continuar utilizando el sistema.</p>
            @endguest
        </section>

        <section class="opciones">

            <div class="opcion">
                <h3>Crear perfil</h3>

                <p>
                    Registra tus datos personales y agrega información
                    sobre tus intereses.
                </p>

                @auth
                    @if (Auth::user()->profile)
                        <a href="{{ route('perfil.edit') }}" class="boton">
                            Editar perfil
                        </a>
                    @else
                        <a href="{{ route('perfil.create') }}" class="boton">
                            Crear perfil
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="boton">
                        Iniciar sesión
                    </a>
                @endauth
            </div>

            <div class="opcion">
                <h3>Ver perfiles</h3>

                <p>
                    Consulta la información de otros usuarios
                    registrados en el sistema.
                </p>

                @auth
                    <a href="{{ route('perfiles.index') }}" class="boton">
                        Ver perfiles
                    </a>
                @else
                    <a href="{{ route('login') }}" class="boton">
                        Iniciar sesión
                    </a>
                @endauth
            </div>

            <div class="opcion">
                <h3>Descubrir personas</h3>

                <p>
                    Encuentra personas según tus preferencias
                    y conoce usuarios con intereses similares.
                </p>

                @auth
                    <a href="{{ route('descubrir.index') }}" class="boton">
                        Descubrir personas
                    </a>
                @else
                    <a href="{{ route('login') }}" class="boton">
                        Iniciar sesión
                    </a>
                @endauth
            </div>

            <div class="opcion">
                <h3>Mis citas</h3>

                <p>
                    Revisa y administra las solicitudes de citas
                    recibidas o enviadas.
                </p>

                @auth
                    <span>Próximamente</span>
                @else
                    <a href="{{ route('login') }}" class="boton">
                        Iniciar sesión
                    </a>
                @endauth
            </div>

        </section>

    </main>

    <footer>
        Proyecto de Programación Web — 2026
    </footer>

</body>
</html>
