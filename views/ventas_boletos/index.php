<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <!-- Mostrar venta diaria -->
    <?php if (!isset($datosFiltrados) || (isset($datosFiltrados) && !$datosFiltrados)): ?>
    <div class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3">Venta Diaria</h3>
                <?php if (!empty($ventasDiarias)): ?>
                    <div class="card bg-dark text-white">
                        <div class="card-body">
                            <h5 class="card-title">Fecha: <?php echo date('Y-m-d'); ?></h5> <!-- Muestra la fecha actual -->
                            <p class="card-text">Total al día: <?php echo $ventasDiarias['total_ventas']; ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <p>No hay ventas registradas.</p>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                    <!-- Agregar formulario para filtrar por rango de fechas -->
                    <div class="form-group">
                        <form id="form-filtrar" action="index.php" method="GET">
                            <input type="hidden" name="controller" value="BoletosController">
                            <input type="hidden" name="action" value="filtrar">
                            <div class="form-row">
                                <div class="col">
                                    <label for="fecha_inicio">Fecha de inicio:</label>
                                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="fecha_fin">Fecha de fin:</label>
                                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                                </div>
                            </div>
                            <!-- Botón Filtrar debajo de las fechas -->
                            <div class="form-row mt-2">
                                <div class="col">
                                    <button type="submit" class="btn btn-dark">Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Mostrar lista de ventas completa -->
    <?php if (!isset($datosFiltrados) || (isset($datosFiltrados) && !$datosFiltrados)): ?>
        <div class="lista-ventas">
            <table class="table table-striped">
                <!-- Encabezados de la tabla -->
                <thead class="thead-dark">
                    <!-- Encabezados de las columnas -->
                    <tr>
                        <th>ID Boleto</th>
                        <th>ID Cliente</th>
                        <th>ID Película</th>
                        <th>ID Empleado</th>
                        <th>Fecha y Hora</th>
                        <th>Cantidad</th>
                        <th>Sala</th>
                        <th>Costo</th>
                        <th>Asiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Verificar si $ventas está definida y no es null -->
                    <?php if(isset($ventas) && is_array($ventas)): ?>
                        <!-- Recorrer las ventas -->
                        <?php foreach ($ventas as $venta): ?>
                            <tr>
                                <!-- Datos de cada venta -->
                                <td><?php echo $venta['id_boleto']; ?></td>
                                <td><?php echo $venta['id_cliente']; ?></td>
                                <td><?php echo $venta['id_pelicula']; ?></td>
                                <td><?php echo $venta['id_empleado']; ?></td>
                                <td><?php echo $venta['fecha_hora']; ?></td>
                                <td><?php echo $venta['cantidad']; ?></td>
                                <td><?php echo $venta['sala']; ?></td>
                                <td><?php echo $venta['costo']; ?></td>
                                <td><?php echo $venta['asiento']; ?></td>
                                <!-- Acciones -->
                                <td>
                                    <a href="index.php?controller=BoletosController&action=eliminar&id=<?php echo $venta['id']; ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10">No hay ventas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <!-- Enlace para agregar nueva venta -->
            <a href="index.php?controller=BoletosController&action=alta" class="btn btn-dark">Agregar Venta</a>
        </div>
    <?php endif; ?>

    <!-- Mostrar las ventas filtradas si $datosFiltrados está definido y es true -->
    <?php if (isset($datosFiltrados) && $datosFiltrados): ?>
    <h1 class="mt-4">Ventas Filtradas</h1>
    <?php if (!empty($ventasFiltradas)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Boleto</th>
                        <th>ID Cliente</th>
                        <th>ID Película</th>
                        <th>ID Empleado</th>
                        <th>Fecha y Hora</th>
                        <th>Cantidad</th>
                        <th>Sala</th>
                        <th>Costo</th>
                        <th>Asiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventasFiltradas as $venta): ?>
                        <tr>
                            <td><?php echo $venta['id_boleto']; ?></td>
                            <td><?php echo $venta['id_cliente']; ?></td>
                            <td><?php echo $venta['id_pelicula']; ?></td>
                            <td><?php echo $venta['id_empleado']; ?></td>
                            <td><?php echo $venta['fecha_hora']; ?></td>
                            <td><?php echo $venta['cantidad']; ?></td>
                            <td><?php echo $venta['sala']; ?></td>
                            <td><?php echo $venta['costo']; ?></td>
                            <td><?php echo $venta['asiento']; ?></td>
                            <td>
                                <form id="form-eliminar-<?php echo $venta['id_boleto']; ?>" action="index.php" method="POST">
                                    <input type="hidden" name="controller" value="BoletosController">
                                    <input type="hidden" name="action" value="eliminar">
                                    <input type="hidden" name="id_boleto" value="<?php echo $venta['id_boleto']; ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
                <!-- Botón para regresar al index -->
                <a href="index.php?controller=BoletosController&action=index" class="btn btn-primary">Regresar</a>
    <?php else: ?>
        <p>No hay ventas registradas en el rango de fechas especificado.</p>
    <?php endif; ?>
<?php endif; ?>

</div>

<!-- Script de JavaScript para manejar la solicitud AJAX -->
<script>
    // Función para manejar el envío del formulario de filtrado
    document.getElementById('form-filtrar').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío por defecto del formulario

        // Obtener los datos del formulario
        var formData = new FormData(this);

        // Realizar la solicitud AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?' + new URLSearchParams(formData).toString(), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Actualizar el contenido de la página con la respuesta del servidor
                document.body.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>
</body>
</html>
