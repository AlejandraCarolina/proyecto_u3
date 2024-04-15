<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Venta de Snacks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Alta de Venta de Snacks</h1>
        <form action="index.php?controller=SnackController&action=alta" method="POST">
            <div class="form-group">
                <label for="id_cliente">Cliente:</label>
                <select name="id_cliente" id="id_cliente" class="form-control" required>
                    <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['id_cliente']; ?>"><?php echo $cliente['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_hora">Fecha:</label>
                <input type="date" name="fecha_hora" id="fecha_hora" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="producto">Producto:</label>
                <input type="text" name="producto" id="producto" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="costo_unitario">Costo Unitario:</label>
                <input type="number" step="0.01" name="costo_unitario" id="costo_unitario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" step="0.01" name="total" id="total" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar Venta</button>
        </form>
    </div>
</body>
</html>
