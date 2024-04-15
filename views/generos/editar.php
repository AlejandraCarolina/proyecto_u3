<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Cinema</title>

    <!-- Enlace al icono para la pestaña -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">

    <style>
        /* Estilos adicionales para personalizar el formulario */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f2f5; /* Fondo gris claro */
            background-image: url('img/fondo_pantalla.png'); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; /* Ubica la imagen en el centro */
        }

        /* Contenedor del formulario */
        .form-container {
            max-width: 400px; /* Ancho máximo del formulario */
            margin: 50px auto; /* Centra el formulario en la página */
            padding: 20px;
            background-color: #ffffff; /* Fondo blanco */
            border-radius: 15px; /* Bordes redondeados */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        /* Estilo para las etiquetas */
        label {
            font-weight: 600; /* Negrita para las etiquetas */
        }

        /* Estilo para los campos del formulario */
        .form-control {
            border-radius: 10px; /* Bordes redondeados */
            border: 1px solid #ced4da; /* Color del borde */
            padding: 10px;
            transition: border-color 0.3s;
        }

        /* Cambia el color del borde al enfocar un campo */
        .form-control:focus {
            border-color: #007bff; /* Color azul de Bootstrap */
        }

        /* Estilo para el botón de enviar */
        .btn-primary {
            border-radius: 10px; /* Bordes redondeados */
            padding: 10px 20px;
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s;
        }

        /* Cambia el color de fondo al pasar el ratón sobre el botón */
        .btn-primary:hover {
            background-color: #0056b3;
        }
   
    </style>
</head>

<body>
    <br>
    <br>
    <!-- Contenedor del formulario -->
    <div class="form-container">
        <h2 class="text-center">Editar Género</h2>
        <br>
        <!-- Formulario -->
        <form action="index.php?controller=GenerosController&action=editar" method="POST">
            <input type="hidden" name="id_genero" value="<?php echo $genero['id_genero']; ?>">
            
            <div class="form-group">
                <label for="nombre">Nombre del Género:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $genero['nombre']; ?>" required>
            </div>

            <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
        </form>

    </div>

    <!-- Incluye Bootstrap JS, Popper.js y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>