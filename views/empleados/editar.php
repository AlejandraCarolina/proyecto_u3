<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Empleado</h1>
        <form action="index.php?controller=EmpleadosController&action=editar" method="POST">
            <input type="hidden" name="id_empleado" value="<?php echo $empleado['id_empleado']; ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $empleado['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $empleado['apellido']; ?>" required>
            </div>
            <div class="form-group">
                <label for="puesto">Puesto:</label>
                <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $empleado['puesto']; ?>" required>
            </div>
            <div class="form-group">
                <label for="salario">Salario:</label>
                <input type="number" step="0.01" class="form-control" id="salario" name="salario" value="<?php echo $empleado['salario']; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_contratacion">Fecha de Contratación:</label>
                <input type="date" class="form-control" id="fecha_contratacion" name="fecha_contratacion" value="<?php echo $empleado['fecha_contratacion']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
