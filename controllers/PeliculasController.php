<?php

require_once './models/Peliculas.php';

class PeliculasController {
    private $peliculasModel;

    public function __construct() {
        $this->peliculasModel = new Peliculas();
    }

    public function index() {
        $peliculas = $this->peliculasModel->obtenerPeliculasConGeneros();
        include './views/peliculas/index.php';
    }

    public function alta() {
        // Obtener los géneros disponibles
        $generos = $this->peliculasModel->obtenerGenerosDisponibles();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario si se envió
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $sinopsis = $_POST['sinopsis'];
            // Aquí deberías obtener los géneros seleccionados
            // Por ahora, asumiré que se llama "generos" y es un array
            $generosSeleccionados = $_POST['id_genero'];
            if (!is_array($generosSeleccionados)) {
                // If it's not an array, convert it to one
                $generosSeleccionados = array($generosSeleccionados);
            }
            
            // Insertar la película en la tabla peliculas y obtener su ID
            $id_pelicula = $this->peliculasModel->insertarPelicula($nombre, $duracion, $sinopsis);
            
            if ($id_pelicula) {
                // Si se insertó la película correctamente, entonces insertar los géneros
                $this->peliculasModel->insertarGenerosPelicula($id_pelicula, $generosSeleccionados);
            } else {
                // Manejar el caso en que la inserción de la película falla
                echo "Error al insertar la película.";
            }
        } else {
            // Cargar la vista con los géneros disponibles
            include './views/peliculas/alta.php';
        }
    }
    
    public function eliminar() {
        if (isset($_GET['id_pelicula'])) {
            $id_pelicula = $_GET['id_pelicula'];
    
            // Eliminar los géneros asociados a la película en la tabla peliculas_genero
            $this->peliculasModel->eliminarGenerosPelicula($id_pelicula);
    
            // Eliminar la película en la tabla peliculas
            $resultado = $this->peliculasModel->eliminarPelicula($id_pelicula);
    
            if ($resultado) {
                echo "Película eliminada correctamente.";
            } else {
                echo "Error al eliminar la película.";
            }
        } else {
            echo "ID de película no especificado.";
        }
    }
    
    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_pelicula = $_POST['id_pelicula'];
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $sinopsis = $_POST['sinopsis'];
            $generosSeleccionados = $_POST['id_genero'];

            // Actualizar la película
            $resultado = $this->peliculasModel->actualizarPelicula($id_pelicula, $nombre, $duracion, $sinopsis);

            if ($resultado) {
                // Eliminar los géneros asociados a la película antes de insertar los nuevos
                $this->peliculasModel->eliminarGenerosPelicula($id_pelicula);

                // Insertar los nuevos géneros
                $this->peliculasModel->insertarGenerosPelicula($id_pelicula, $generosSeleccionados);

                echo "Película actualizada correctamente.";
            } else {
                echo "Error al actualizar la película.";
            }
        } else {
            if (isset($_GET['id_pelicula'])) {
                $id_pelicula = $_GET['id_pelicula'];

                // Obtener la película a editar
                $pelicula = $this->peliculasModel->obtenerPeliculaPorId($id_pelicula);

                if (!$pelicula) {
                    echo "La película con ID $id_pelicula no existe.";
                    return;
                }

                // Obtener los géneros disponibles
                $generos = $this->peliculasModel->obtenerGenerosDisponibles();

                // Obtener los géneros asociados a la película
                $generosSeleccionados = $this->peliculasModel->obtenerGenerosPelicula($id_pelicula);

                include './views/peliculas/editar.php';
            } else {
                echo "ID de película no especificado.";
            }
        }
    }
    
}
?>

