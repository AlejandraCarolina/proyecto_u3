<style>
   
    body {
        background-image: url('img/fondo_pantalla.png'); 
        background-size: cover; 
        background-repeat: no-repeat; 
        background-position: center; /* Ubica la imagen en el centro */
}

</style>

<br>
<br>

<div class="container mt-4">
    <h2>Géneros</h2>

    
    <table class="table">
        <thead class="thead-primary">
            <tr>
                <th>ID</th>
                <th>Nombre del Género</th>
                <th>Acciones</th>
            </tr>
        </thead>    
        <tbody>
            <?php foreach ($generos as $genero): ?>
                <tr>
                    <td><?php echo $genero['id_genero']; ?></td>
                    <td><?php echo $genero['nombre']; ?></td>
                    <td>
                        <!-- Aquí puedes colocar los enlaces para editar y eliminar -->
                        <a href="./index.php?controller=GenerosController&action=editar&id_genero=<?php echo $genero['id_genero']; ?>" class="btn btn-warning">Editar</a>
                        <a href="./index.php?controller=GenerosController&action=eliminar&id_genero=<?php echo $genero['id_genero']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="./index.php?controller=GenerosController&action=alta" class="btn btn-secondary mb-3">Agregar Género</a>

</div>
