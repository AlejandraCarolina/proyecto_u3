<style>
    
    body {
        background-image: url('img/fondo_pantalla.png'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; /* Ubica la imagen en el centro */
    }
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <br>
    <br>
    <div class="container mt-4">
        <h1>Listado de Empleados</h1>
        <div class="mb-4">
            <a href="index.php?controller=EmpleadosController&action=alta" class="btn btn-success">Agregar Empleado</a>
        </div>
        <div class="row">
            <?php foreach ($empleados as $empleado): ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $empleado['nombre'] . ' ' . $empleado['apellido']; ?></h5>
                            <p class="card-text"><strong>Puesto:</strong> <?php echo $empleado['puesto']; ?></p>
                            <p class="card-text"><strong>Salario:</strong> <?php echo $empleado['salario']; ?></p>
                            <p class="card-text"><strong>Fecha de Contratación:</strong> <?php echo $empleado['fecha_contratacion']; ?></p>
                            <a href="index.php?controller=EmpleadosController&action=editar&id=<?php echo $empleado['id_empleado']; ?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?controller=EmpleadosController&action=eliminar&id=<?php echo $empleado['id_empleado']; ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
