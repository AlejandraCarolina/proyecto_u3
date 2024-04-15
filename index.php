<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluye Google Fonts para la fuente -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <title>Cinema</title>

    <!-- Enlace al icono para la pestaña -->
    <link rel="icon" href="views/img/logo.png" type="image/x-icon">

    <!-- Incluye Font Awesome para los iconos -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.css" crossorigin="anonymous">


    <style>
        /* Estilos para el cuerpo del documento */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('views/img/cine.png'); /* URL de la imagen de fondo */
            background-position: center; /* Centra la imagen */
            height: 100vh;
            background-size: cover;
        }

        /* Estilos para el menú */
        nav.menu {
            background-color: rgba(0, 0, 0, 0.7); /* Fondo semitransparente para el menú */
            padding: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: fixed; /* Mantiene el menú fijo en la parte superior */
            top: 0; /* Posiciona el menú en la parte superior de la página */
            width: 100%; /* Hace que el menú ocupe todo el ancho */
            z-index: 10; /* Asegura que el menú esté en la capa superior */
        }

        /* Lista del menú */
        .menu ul {
            list-style: none; /* Elimina los puntos de lista */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Centra los elementos del menú horizontalmente */
        }

        /* Estilos para los elementos del menú */
        .menu ul li {
            margin-right: 10px; /* Ajusta el margen entre elementos */
        }

        /* Estilos para los enlaces del menú */
        .menu ul li a {
            color: #fff; /* Blanco para destacar sobre el fondo oscuro */
            text-decoration: none; /* Elimina subrayado */
            padding: 10px 20px; /* Espaciado interno */
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Estilos al pasar el ratón sobre los enlaces */
        .menu ul li a:hover {
            background-color: #555; /* Color gris oscuro en hover */
            color: #e0e0e0; /* Ligera diferencia en el color de texto */
        }

          /* Estilos para el preloader */
          .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Asegura que esté por encima de todo */
        }

        /* Animación de giro */
        .preloader img {
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
       <!-- Preloader -->
       <div class="preloader" id="preloader">
        <!-- Usa una imagen de palomitas de maíz animada -->
        <img src="views/img/palomitas.gif" alt="Icono de Palomitas Animadas">
    </div>

    <!-- Menú -->
    <nav class="menu">
        <ul>
            <li><img src="views/img/logo_cine.gif" alt="Icono GIF" style="width:40px; height:40px;"></li>
            <li><a href="index.php?controller=PeliculasController&action=index">Películas</a></li>
            <li><a href="index.php?controller=EmpleadosController&action=index">Empleados</a></li>
            <li><a href="index.php?controller=GenerosController&action=index">Generos</a></li>
            <li><a href="index.php?controller=ClientesController&action=index">Clientes</a></li>
            <li><a href="index.php?controller=BoletosController&action=index">Boletos</a></li>
            <li><a href="index.php?controller=SnackController&action=index">Snack</a></li>
        </ul>
    </nav>

    <div class="container mt-4">
        <?php
            if (isset($_GET['controller']) && isset($_GET['action'])) {
                $controller = $_GET['controller'];
                $action = $_GET['action'];

                require_once "controllers/$controller.php";
                
                $controller = new $controller();

                $controller->$action();
            }
        ?>
    </div>

            

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Escucha el evento DOMContentLoaded, que se dispara cuando el contenido de la página está listo
            const preloader = document.getElementById('preloader');
            // Oculta el precargador después de un breve tiempo (ajusta este tiempo según sea necesario)
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 1500); // Puedes ajustar este tiempo según sea necesario
        });
    </script>
</body>

</html>
