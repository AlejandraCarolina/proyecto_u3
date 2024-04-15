<?php

require_once './models/Conexion.php';

class Generos {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerGeneros() {
        $query = "SELECT * FROM genero";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insertarGeneros($nombre) {
        $query = "INSERT INTO genero (nombre) VALUES ('$nombre')";
        return $this->conexion->conectar()->query($query);
    }

    public function actualizarGenero($id_genero, $nombre){
        $query = "UPDATE genero SET nombre = '$nombre' WHERE id_genero = $id_genero";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerGeneroPorID($id_genero){
        $sql = "SELECT * FROM genero WHERE id_genero = $id_genero";
        $result = $this->conexion->conectar()->query($sql);
        return $result->fetch_assoc();
    }

    public function eliminarGenero($id_genero){
        $query = "DELETE FROM genero WHERE id_genero = $id_genero";
        return $this->conexion->conectar()->query($query);
    }

}
?>