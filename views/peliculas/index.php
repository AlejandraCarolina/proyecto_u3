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
    <h2>Películas</h2>

    <table class="table">
        <thead class="thead-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Duración</th>
                <th>Sinopsis</th>
                <th>Géneros</th>
                <th>Acciones</th>
            </tr>
        </thead>    
        <tbody>
            <?php foreach ($peliculas as $pelicula): ?>
                <tr>
                    <td><?php echo $pelicula['id_pelicula']; ?></td>
                    <td><?php echo $pelicula['nombre']; ?></td>
                    <td><?php echo $pelicula['duracion']; ?></td>
                    <td><?php echo $pelicula['sinopsis']; ?></td>
                    <td>
                        <?php 
                        $generos = explode(', ', $pelicula['generos']); 
                        foreach ($generos as $genero): ?>
                            <span class="badge badge-light"><?php echo $genero; ?></span>
                        <?php endforeach; ?>
                    </td>
                    <td>
                        <!-- Aquí puedes colocar los enlaces para editar y eliminar -->
                        <a href="./index.php?controller=PeliculasController&action=editar&id_pelicula=<?php echo $pelicula['id_pelicula']; ?>" class="btn btn-warning">Editar</a>
                        <a href="./index.php?controller=PeliculasController&action=eliminar&id_pelicula=<?php echo $pelicula['id_pelicula']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="./index.php?controller=PeliculasController&action=alta" class="btn btn-secondary mb-3">Agregar Película</a>

</div>
