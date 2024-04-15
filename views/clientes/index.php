
<style>
   
    body {
        background-image: url('img/fondo_pantalla.png'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; /* Ubica la imagen en el centro */
}

</style>

<br><br><br><br>

<div class="container mt-4">
    <h2>Listado de Clientes</h2>

    <a href="./index.php?controller=ClientesController&action=alta" class="btn btn-primary mb-3">Agregar Cliente</a>
    <form method="POST" action="./index.php?controller=ClientesController&action=reporte">
        <div class="input-group mb-3">
            <input type="number" class="form-control" placeholder="Cantidad de Películas" name="cantidad">
            <input type="date" class="form-control" placeholder="Fecha Inicial" name="fecha1">
            <input type="date" class="form-control" placeholder="Fecha Final" name="fecha2">
            <button class="btn btn-outline-secondary" type="submit">Clientes que vieron Peliculas en un periodo de tiempo</button>
        </div>
    </form>


    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['id_cliente']; ?></td>
                <td><?php echo $cliente['nombre']; ?></td>
                <td><?php echo $cliente['email']; ?></td>
                <td>
                    <a href="./index.php?controller=ClientesController&action=editar&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-warning">Editar</a>
                    <a href="./index.php?controller=ClientesController&action=eliminar&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
