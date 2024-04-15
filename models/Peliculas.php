<?php

require_once './models/Conexion.php';

class Peliculas {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerPeliculasConGeneros() {
        $query = "SELECT p.*, GROUP_CONCAT(g.nombre SEPARATOR ', ') as generos
                  FROM peliculas p
                  LEFT JOIN peliculas_genero pg ON p.id_pelicula = pg.id_pelicula
                  LEFT JOIN genero g ON pg.id_genero = g.id_genero
                  GROUP BY p.id_pelicula";
        
        $resultado = $this->conexion->conectar()->query($query);
    
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    

    public function insertarPelicula($nombre, $duracion, $sinopsis) {
        // Insertar la película en la tabla peliculas
        $query = "INSERT INTO peliculas (nombre, duracion, sinopsis) VALUES ('$nombre', '$duracion', '$sinopsis')";
        $conexion = $this->conexion->conectar();
        $resultado = $conexion->query($query);
    
        if ($resultado) {
            // Si la inserción fue exitosa, obtener el ID de la película
            $id_pelicula = $conexion->insert_id;
            return $id_pelicula;
        } else {
            // Si hubo un error, retornar false
            return false;
        }
    }
    
    

    public function insertarGenerosPelicula($id_pelicula, $generos) {
        // Insertar los géneros en la tabla peliculas_genero
        foreach ($generos as $id_genero) {
            // Verificar si el género existe antes de insertar
            $query = "SELECT COUNT(*) as count FROM genero WHERE id_genero = $id_genero";
            $result = $this->conexion->conectar()->query($query);
            $row = $result->fetch_assoc();

            if ($row['count'] > 0) {
                $query = "INSERT INTO peliculas_genero (id_pelicula, id_genero) VALUES ($id_pelicula, $id_genero)";
                $resultado = $this->conexion->conectar()->query($query);
                if (!$resultado) {
                    // Manejo de errores, imprime el error de MySQL
                    echo "Error al insertar los géneros: " . mysqli_error($this->conexion->conectar());
                }
            } else {
                echo "El género con ID $id_genero no existe.";
            }
        }
    }

    public function obtenerGenerosDisponibles() {
        $query = "SELECT * FROM genero";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminarGenerosPelicula($id_pelicula) {
        $query = "DELETE FROM peliculas_genero WHERE id_pelicula = $id_pelicula";
        $resultado = $this->conexion->conectar()->query($query);
    
        if (!$resultado) {
            echo "Error al eliminar los géneros de la película: " . mysqli_error($this->conexion->conectar());
        }
    }
    
    public function eliminarPelicula($id_pelicula) {
        $query = "DELETE FROM peliculas WHERE id_pelicula = $id_pelicula";
        $resultado = $this->conexion->conectar()->query($query);
    
        if (!$resultado) {
            echo "Error al eliminar la película: " . mysqli_error($this->conexion->conectar());
        }
    
        return $resultado;
    }

    public function obtenerPeliculaPorId($id_pelicula) {
        $query = "SELECT * FROM peliculas WHERE id_pelicula = $id_pelicula";
        $resultado = $this->conexion->conectar()->query($query);
    
        return $resultado->fetch_assoc();
    }
    
    public function obtenerGenerosPelicula($id_pelicula) {
        $query = "SELECT id_genero FROM peliculas_genero WHERE id_pelicula = $id_pelicula";
        $resultado = $this->conexion->conectar()->query($query);
    
        $generos = array();
        while ($row = $resultado->fetch_assoc()) {
            $generos[] = $row['id_genero'];
        }
    
        return $generos;
    }
    
    public function actualizarPelicula($id_pelicula, $nombre, $duracion, $sinopsis) {
        $query = "UPDATE peliculas SET nombre = '$nombre', duracion = '$duracion', sinopsis = '$sinopsis' WHERE id_pelicula = $id_pelicula";
        $resultado = $this->conexion->conectar()->query($query);
    
        if ($resultado) {
            return true;
        } else {
            echo "Error al actualizar la película: " . mysqli_error($this->conexion->conectar());
            return false;
        }
    }
    
}

?>
