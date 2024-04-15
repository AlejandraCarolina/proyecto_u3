<?php

require_once './models/Conexion.php';

class Empleados {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerEmpleados() {
        $query = "SELECT * FROM empleados";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insertarEmpleado($nombre, $apellido, $puesto, $salario, $fechaContratacion) {
        $query = "INSERT INTO empleados (nombre, apellido, puesto, salario, fecha_contratacion) VALUES ('$nombre', '$apellido', '$puesto', '$salario', '$fechaContratacion')";
        return $this->conexion->conectar()->query($query);
    }

    public function obtenerEmpleadoPorId($id) {
        $query = "SELECT * FROM empleados WHERE id_empleado = $id";
        $resultado = $this->conexion->conectar()->query($query);

        return $resultado->fetch_assoc();
    }

    public function actualizarEmpleado($id, $nombre, $apellido, $puesto, $salario, $fechaContratacion) {
        $query = "UPDATE empleados SET nombre = '$nombre', apellido = '$apellido', puesto = '$puesto', salario = '$salario', fecha_contratacion = '$fechaContratacion' WHERE id_empleado = $id";
        return $this->conexion->conectar()->query($query);
    }

    public function eliminarEmpleado($id) {
        $query = "DELETE FROM empleados WHERE id_empleado = $id";
        return $this->conexion->conectar()->query($query);
    }
}
