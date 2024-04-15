<?php

require_once __DIR__ . '/../models/Conexion.php';

class Cliente {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerClientes() {
        $query = "SELECT * FROM clientes";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
    public function obtenerReporte($cantidad, $fecha1, $fecha2) {
        $query = "SELECT id_cliente FROM clientes";
        $resultado = $this->conexion->conectar()->query($query);
        $resultado = $resultado->fetch_all(MYSQLI_ASSOC);
        $clientes_aprobados = [];

        foreach ($resultado as $cliente) {
            $id = $cliente['id'];
            $query = "SELECT COUNT(*) FROM venta_boletos WHERE id_cliente = '$id' AND fecha_hora BETWEEN '$fecha1' AND '$fecha2'";
            $res = $this->conexion->conectar()->query($query);
            $res = $res->fetch_all(MYSQLI_ASSOC);

            if ($res[0]["COUNT(*)"] >= $cantidad) {
                array_push($clientes_aprobados, $id);
            }
        }

        $query = "SELECT * FROM clientes WHERE id_cliente IN (";

        if($clientes_aprobados == null){
            return null;
        }

        foreach ($clientes_aprobados as $id) {
            $query .= $id . ",";
        }
        $query = substr($query, 0, -1);
        $query .= ")";


        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insertarCliente($nombre, $email) {
        $query = "INSERT INTO clientes (nombre, email) VALUES ('$nombre', '$email')";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerClientePorId($id) {
        $query = "SELECT * FROM clientes WHERE id_cliente = '$id'";
        $resultado = $this->conexion->conectar()->query($query);
        return $resultado->fetch_assoc();
    }

    public function actualizarCliente($id, $nombre, $email) {
        $query = "UPDATE clientes SET nombre = '$nombre', email = '$email' WHERE id_cliente = '$id'";
        return $this->conexion->conectar()->query($query);
    }

    public function eliminarCliente($id) {
        $query = "DELETE FROM clientes WHERE id_cliente = $id";
        return $this->conexion->conectar()->query($query);
    }
}

?>
