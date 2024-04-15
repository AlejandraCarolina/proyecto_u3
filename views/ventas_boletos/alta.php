<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Venta de Boletos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Alta de Venta de Boletos</h1>
        <form action="index.php?controller=BoletosController&action=alta" method="POST">
            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
                <select name="id_cliente" id="id_cliente" class="form-control" required>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['id_cliente']; ?>"><?php echo $cliente['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_pelicula">Película:</label>
                <select name="id_pelicula" id="id_pelicula" class="form-control" required>
                    <?php foreach ($peliculas as $pelicula): ?>
                        <option value="<?php echo $pelicula['id_pelicula']; ?>"><?php echo htmlspecialchars($pelicula['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_empleado">Empleado:</label>
                <select name="id_empleado" id="id_empleado" class="form-control" required>
                    <?php foreach ($empleados as $empleado): ?>
                        <option value="<?php echo $empleado['id_empleado']; ?>"><?php echo $empleado['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_hora">Fecha</label>
                <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad de Boletos:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sala">Sala:</label>
                <input type="text" name="sala" id="sala" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="costo">Costo:</label>
                <input type="number" step="0.01" name="costo" id="costo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="asiento">Asiento:</label>
                <input type="text" name="asiento" id="asiento" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>
</body>
</html>
