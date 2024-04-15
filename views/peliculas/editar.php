<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Editar Película</title>
    <!-- Enlace al icono para la pestaña -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <style>
        /* Estilos adicionales para personalizar el formulario */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f2f5; /* Fondo gris claro */
        }

        /* Contenedor del formulario */
        .form-container {
            max-width: 600px; /* Ancho máximo del formulario */
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
    <!-- Contenedor del formulario -->
    <div class="form-container">
        <h2 class="text-center">Editar Película</h2>
        <!-- Formulario para editar una película -->
        <form action="index.php?controller=PeliculasController&action=editar" method="POST">
            <input type="hidden" name="id_pelicula" value="<?php echo $pelicula['id_pelicula']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $pelicula['nombre']; ?>" required>
            </div>

            <div class="form-group">
                <label for="duracion">Duración:</label>
                <input type="time" class="form-control" id="duracion" name="duracion" value="<?php echo $pelicula['duracion']; ?>" required>
            </div>

            <div class="form-group">
                <label for="generos">Géneros:</label>
                <!-- Aquí puedes generar los checkboxes para los géneros -->
                <?php foreach ($generos as $genero): ?>
                    <div class="form-check">
                        <?php
                            $checked = in_array($genero['id_genero'], $generosSeleccionados) ? 'checked' : '';
                        ?>
                        <input type="checkbox" class="form-check-input" id="gen<?php echo $genero['id_genero']; ?>" name="id_genero[]" value="<?php echo $genero['id_genero']; ?>" <?php echo $checked; ?>>
                        <label class="form-check-label" for="gen<?php echo $genero['id_genero']; ?>"><?php echo $genero['nombre']; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="form-group">
                <label for="sinopsis">Sinopsis:</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4" required><?php echo $pelicula['sinopsis']; ?></textarea>
            </div>

            <button type="submit" class="btn btn-secondary btn-block">Actualizar Película</button>
        </form>
    </div>

    <!-- Incluye Bootstrap JS, Popper.js y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
